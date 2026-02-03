/**
 * Development Server
 *
 * Proxies to DDEV with live reload support.
 * Run with: bun run dev
 */

import * as sass from "sass";
import { transform, browserslistToTargets } from "lightningcss";
import { watch } from "node:fs";
import { mkdir, exists } from "node:fs/promises";
import { join, basename, dirname, relative } from "node:path";
import { Glob } from "bun";

const DDEV_URL = "https://opendrives.dev";
const DEV_PORT = 3000;

// Allow self-signed certs for DDEV
process.env.NODE_TLS_REJECT_UNAUTHORIZED = "0";

const paths = {
	scss: {
		global: "src/scss/global.scss",
		templates: "src/scss/templates/*/_index.scss",
		watch: "src/scss",
	},
	js: {
		entry: "src/js/main.js",
		watch: "src/js",
	},
	php: {
		watch: [".", "templates", "template-parts", "functions"],
	},
	out: {
		css: "public/css",
		templates: "public/css/templates",
		js: "public",
	},
};

// Browser targets for LightningCSS
const targets = browserslistToTargets([
	"last 2 versions",
	"> 1%",
	"not dead",
]);

// Track connected WebSocket clients
const wsClients = new Set<WebSocket>();

// Live reload script injected into HTML
const LIVE_RELOAD_SCRIPT = `
<script>
(function() {
  const ws = new WebSocket('ws://localhost:${DEV_PORT}/__ws');
  ws.onmessage = function(e) {
    const data = JSON.parse(e.data);
    if (data.type === 'css') {
      // Hot reload CSS without page refresh
      document.querySelectorAll('link[rel="stylesheet"]').forEach(link => {
        const href = link.getAttribute('href');
        if (href && href.includes(data.file)) {
          const url = new URL(href, location.href);
          url.searchParams.set('_reload', Date.now());
          link.href = url.toString();
        }
      });
      // Also reload global.css for any SCSS change
      if (!data.file) {
        document.querySelectorAll('link[rel="stylesheet"]').forEach(link => {
          const href = link.getAttribute('href');
          if (href) {
            const url = new URL(href, location.href);
            url.searchParams.set('_reload', Date.now());
            link.href = url.toString();
          }
        });
      }
    } else if (data.type === 'reload') {
      location.reload();
    }
  };
  ws.onclose = function() {
    console.log('[dev] Connection lost, retrying...');
    setTimeout(() => location.reload(), 1000);
  };
})();
</script>
</body>`;

/**
 * Compile a single SCSS file to CSS
 */
async function compileSCSS(inputPath: string, outputPath: string): Promise<void> {
	const result = sass.compile(inputPath, {
		style: "expanded",
		quietDeps: true,
		sourceMap: true,
		loadPaths: ["src/scss"],
	});

	// Remove BOM if present
	const cssContent = result.css.replace(/^\uFEFF/, '');

	const { code } = transform({
		filename: outputPath,
		code: Buffer.from(cssContent),
		minify: false,
		targets,
	});

	await Bun.write(outputPath, code);
}

/**
 * Compile global stylesheet
 */
async function buildGlobalCSS(): Promise<void> {
	try {
		await compileSCSS(paths.scss.global, join(paths.out.css, "global.css"));
		console.log("✅ global.css");
	} catch (error) {
		console.error("❌ global.css failed:", error instanceof Error ? error.message : error);
	}
}

/**
 * Compile all template stylesheets
 */
async function buildAllTemplateCSS(): Promise<void> {
	await mkdir(paths.out.templates, { recursive: true });

	const glob = new Glob(paths.scss.templates);
	const files = await Array.fromAsync(glob.scan("."));

	for (const file of files) {
		await buildSingleTemplateCSS(file);
	}
}

/**
 * Compile a single template stylesheet
 */
async function buildSingleTemplateCSS(file: string): Promise<string | null> {
	const templateName = basename(dirname(file));
	const outputPath = join(paths.out.templates, `${templateName}.css`);

	try {
		await compileSCSS(file, outputPath);
		console.log(`✅ ${templateName}.css`);
		return templateName;
	} catch (error) {
		console.error(`❌ ${templateName}.css failed:`, error instanceof Error ? error.message : error);
		return null;
	}
}

/**
 * Bundle JavaScript with Bun
 */
async function buildJS(): Promise<boolean> {
	const result = await Bun.build({
		entrypoints: [paths.js.entry],
		outdir: paths.out.js,
		minify: false,
		sourcemap: "inline",
		target: "browser",
		format: "iife",
		banner: "// Bundled JavaScript - Do not edit directly, edit src/js/ files instead",
	});

	if (result.success) {
		console.log("✅ main.js");
		return true;
	} else {
		console.error("❌ main.js failed:");
		for (const log of result.logs) {
			console.error(`   ${log}`);
		}
		return false;
	}
}

/**
 * Broadcast message to all connected WebSocket clients
 */
function broadcast(message: object): void {
	const data = JSON.stringify(message);
	for (const client of wsClients) {
		try {
			client.send(data);
		} catch {
			wsClients.delete(client);
		}
	}
}

/**
 * Initial build of all assets
 */
async function initialBuild(): Promise<void> {
	console.log("🔨 Initial build...\n");

	await mkdir(paths.out.css, { recursive: true });
	await mkdir(paths.out.templates, { recursive: true });

	await Promise.all([
		buildGlobalCSS(),
		buildAllTemplateCSS(),
		buildJS(),
	]);

	console.log("");
}

/**
 * Start file watchers
 */
function startWatchers(): void {
	// Debounce mechanism
	const debounceTimers = new Map<string, Timer>();

	function debounced(key: string, fn: () => void, delay = 100): void {
		const existing = debounceTimers.get(key);
		if (existing) clearTimeout(existing);
		debounceTimers.set(key, setTimeout(fn, delay));
	}

	// Watch SCSS files
	watch(paths.scss.watch, { recursive: true }, (event, filename) => {
		if (!filename || !filename.endsWith(".scss")) return;

		debounced(`scss:${filename}`, async () => {
			console.log(`\n📝 SCSS changed: ${filename}`);

			// Check if this is a template-specific file
			const templateMatch = filename.match(/templates\/([^/]+)\//);

			if (templateMatch) {
				// Compile just that template
				const templateDir = `src/scss/templates/${templateMatch[1]}/_index.scss`;
				if (await exists(templateDir)) {
					await buildSingleTemplateCSS(templateDir);
					broadcast({ type: "css", file: `${templateMatch[1]}.css` });
				}
			}

			// Always rebuild global.css (it may import the changed file)
			await buildGlobalCSS();
			broadcast({ type: "css", file: "global.css" });
		});
	});

	// Watch JS files
	watch(paths.js.watch, { recursive: true }, (event, filename) => {
		if (!filename || !filename.endsWith(".js")) return;

		debounced("js", async () => {
			console.log(`\n📝 JS changed: ${filename}`);
			const success = await buildJS();
			if (success) {
				broadcast({ type: "reload" });
			}
		});
	});

	// Watch PHP files
	for (const dir of paths.php.watch) {
		if (!Bun.file(dir).exists) continue;

		watch(dir, { recursive: true }, (event, filename) => {
			if (!filename || !filename.endsWith(".php")) return;

			debounced("php", () => {
				console.log(`\n📝 PHP changed: ${filename}`);
				broadcast({ type: "reload" });
			});
		});
	}

	console.log("👀 Watching for changes...\n");
}

/**
 * Create the development server
 */
function createServer(): void {
	const server = Bun.serve({
		port: DEV_PORT,

		async fetch(req) {
			const url = new URL(req.url);

			// Handle WebSocket upgrade
			if (url.pathname === "/__ws") {
				const upgraded = server.upgrade(req);
				if (upgraded) return undefined;
				return new Response("WebSocket upgrade failed", { status: 400 });
			}

			// Proxy to DDEV
			const targetUrl = new URL(url.pathname + url.search, DDEV_URL);

			try {
				// Copy headers but override Host and disable compression
				// (we need uncompressed HTML to inject the live reload script)
				const reqHeaders = new Headers(req.headers);
				reqHeaders.set("Host", new URL(DDEV_URL).host);
				reqHeaders.set("Accept-Encoding", "identity");

				const proxyReq = new Request(targetUrl.toString(), {
					method: req.method,
					headers: reqHeaders,
					body: req.body,
				});

				const response = await fetch(proxyReq);

				// Clone headers and remove content-encoding (we requested uncompressed)
				const resHeaders = new Headers(response.headers);
				resHeaders.delete("content-encoding");
				resHeaders.delete("content-length"); // Length changes after injection

				// For HTML responses, inject live reload script
				const contentType = resHeaders.get("content-type") || "";
				if (contentType.includes("text/html")) {
					let html = await response.text();

					// Inject live reload script before </body>
					html = html.replace("</body>", LIVE_RELOAD_SCRIPT);

					return new Response(html, {
						status: response.status,
						headers: resHeaders,
					});
				}

				return new Response(response.body, {
					status: response.status,
					headers: resHeaders,
				});
			} catch (error) {
				console.error("Proxy error:", error);
				return new Response("Proxy error", { status: 502 });
			}
		},

		websocket: {
			open(ws) {
				wsClients.add(ws);
			},
			close(ws) {
				wsClients.delete(ws);
			},
			message() {
				// Client doesn't send messages
			},
		},
	});

	console.log(`🚀 Dev server running at http://localhost:${DEV_PORT}`);
	console.log(`   Proxying to ${DDEV_URL}\n`);
}

/**
 * Main entry point
 */
async function main(): Promise<void> {
	console.log("\n🔧 OpenDrives Theme Development Server\n");

	await initialBuild();
	createServer();
	startWatchers();
}

main().catch((error) => {
	console.error("Dev server failed:", error);
	process.exit(1);
});
