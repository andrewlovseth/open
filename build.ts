/**
 * Production Build Script
 *
 * Compiles SCSS → CSS and bundles JS using Bun's native tools.
 * Run with: bun run build
 */

import * as sass from "sass";
import { transform, browserslistToTargets } from "lightningcss";
import { Glob } from "bun";
import { mkdir, rm, exists } from "node:fs/promises";
import { join, basename, dirname } from "node:path";

const isProd = process.env.NODE_ENV === "production";

const paths = {
	scss: {
		global: "src/scss/global.scss",
		templates: "src/scss/templates/*/_index.scss",
	},
	js: {
		entry: "src/js/main.js",
	},
	out: {
		css: "public/css",
		templates: "public/css/templates",
		js: "public",
	},
};

// Browser targets for LightningCSS (matches autoprefixer defaults)
const targets = browserslistToTargets([
	"last 2 versions",
	"> 1%",
	"not dead",
]);

/**
 * Compile a single SCSS file to CSS
 */
async function compileSCSS(inputPath: string, outputPath: string): Promise<void> {
	const result = sass.compile(inputPath, {
		style: isProd ? "compressed" : "expanded",
		quietDeps: true,
		sourceMap: !isProd,
		loadPaths: ["src/scss"],
	});

	// Remove BOM if present and process with LightningCSS for autoprefixing
	const cssContent = result.css.replace(/^\uFEFF/, '');

	const { code } = transform({
		filename: outputPath,
		code: Buffer.from(cssContent),
		minify: isProd,
		targets,
	});

	await Bun.write(outputPath, code);
}

/**
 * Compile global stylesheet
 */
async function buildGlobalCSS(): Promise<void> {
	console.log("📦 Compiling global.scss...");
	await compileSCSS(paths.scss.global, join(paths.out.css, "global.css"));
	console.log("✅ global.css");
}

/**
 * Compile all template stylesheets
 */
async function buildTemplateCSS(): Promise<void> {
	console.log("📦 Compiling template stylesheets...");

	// Ensure output directory exists
	await mkdir(paths.out.templates, { recursive: true });

	const glob = new Glob(paths.scss.templates);
	const files = await Array.fromAsync(glob.scan("."));

	let success = 0;
	let failed = 0;

	for (const file of files) {
		const templateName = basename(dirname(file));
		const outputPath = join(paths.out.templates, `${templateName}.css`);

		try {
			await compileSCSS(file, outputPath);
			success++;
		} catch (error) {
			console.error(`❌ Failed: ${templateName}`);
			console.error(`   ${error instanceof Error ? error.message : error}`);
			failed++;
		}
	}

	console.log(`✅ Templates: ${success} compiled${failed > 0 ? `, ${failed} failed` : ""}`);
}

/**
 * Bundle JavaScript with Bun
 */
async function buildJS(): Promise<void> {
	console.log("📦 Bundling JavaScript...");

	const result = await Bun.build({
		entrypoints: [paths.js.entry],
		outdir: paths.out.js,
		minify: isProd,
		sourcemap: isProd ? "none" : "inline",
		target: "browser",
		format: "iife",
		banner: "// Bundled JavaScript - Do not edit directly, edit src/js/ files instead",
	});

	if (!result.success) {
		console.error("❌ JavaScript bundling failed:");
		for (const log of result.logs) {
			console.error(`   ${log}`);
		}
		process.exit(1);
	}

	console.log("✅ main.js");
}

/**
 * Clean output directories
 */
async function clean(): Promise<void> {
	console.log("🧹 Cleaning output directories...");

	if (await exists(paths.out.css)) {
		await rm(paths.out.css, { recursive: true });
	}

	const jsFile = join(paths.out.js, "main.js");
	if (await exists(jsFile)) {
		await rm(jsFile);
	}

	const jsMapFile = join(paths.out.js, "main.js.map");
	if (await exists(jsMapFile)) {
		await rm(jsMapFile);
	}
}

/**
 * Main build process
 */
async function build(): Promise<void> {
	const start = performance.now();

	console.log(`\n🔨 Building for ${isProd ? "production" : "development"}...\n`);

	await clean();

	// Ensure output directories exist
	await mkdir(paths.out.css, { recursive: true });
	await mkdir(paths.out.templates, { recursive: true });

	// Run builds in parallel
	await Promise.all([
		buildGlobalCSS(),
		buildTemplateCSS(),
		buildJS(),
	]);

	const elapsed = ((performance.now() - start) / 1000).toFixed(2);
	console.log(`\n✨ Build complete in ${elapsed}s\n`);
}

// Run
build().catch((error) => {
	console.error("Build failed:", error);
	process.exit(1);
});
