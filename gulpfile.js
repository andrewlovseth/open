const { src, dest, watch, series, parallel } = require("gulp");
const sass = require("gulp-dart-sass");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cleanCSS = require("gulp-clean-css");
const sourcemaps = require("gulp-sourcemaps");
const plumber = require("gulp-plumber");
const rename = require("gulp-rename");
const through = require("through2");
const browserSync = require("browser-sync").create();
const { execSync } = require("child_process");
const fs = require("fs");
const path = require("path");
const esbuild = require("esbuild");

const isProd = process.env.NODE_ENV === "production";

const paths = {
    scss: {
        global: "src/scss/global.scss",
        templates: "src/scss/templates/*/_index.scss", // All template directories
        watch: "src/scss/**/*.scss",
    },
    js: {
        src: "src/js/main.js",
        watch: "src/js/**/*.js",
    },
    php: {
        watch: ["./**/*.php", "./templates/**/*.php", "./template-parts/**/*.php"],
    },
    out: {
        root: "public/css",
        templates: "public/css/templates",
        js: "public",
    },
};

function noop() {
    return through.obj();
}

function cssGlobal() {
    return src(paths.scss.global, { allowEmpty: true })
        .pipe(plumber())
        .pipe(!isProd ? sourcemaps.init() : noop())
        .pipe(sass.sync({ quietDeps: true }).on("error", sass.logError))
        .pipe(postcss([autoprefixer()]))
        .pipe(isProd ? cleanCSS({ level: 2 }) : noop())
        .pipe(!isProd ? sourcemaps.write(".") : noop())
        .pipe(dest(paths.out.root))
        .pipe(browserSync.stream());
}

// Compile every templates/**/_index.scss to public/css/templates/<folder>.css
function cssTemplates() {
    console.log("🚀 Starting cssTemplates...");

    const fs = require("fs");
    const sass = require("sass"); // Use Node.js sass directly
    const glob = require("glob");
    const autoprefixer = require("autoprefixer");
    const postcss = require("postcss");

    // Ensure output directory exists
    const outputDir = paths.out.templates;
    if (!fs.existsSync(outputDir)) {
        fs.mkdirSync(outputDir, { recursive: true });
        console.log("📁 Created templates directory:", outputDir);
    }

    // Get all template files
    const templateFiles = glob.sync(paths.scss.templates);
    console.log(`📁 Found ${templateFiles.length} template files`);

    // Process each template
    let success = 0;
    let failed = 0;

    templateFiles.forEach((filePath) => {
        try {
            // Extract template name
            const templateName = path.basename(path.dirname(filePath));

            console.log(`🔄 Compiling ${templateName}...`);

            // Compile with Node.js sass
            const result = sass.compile(filePath, {
                style: "expanded",
                quietDeps: true,
            });

            let css = result.css;

            // Apply autoprefixer
            const prefixed = postcss([autoprefixer()]).process(css, { from: undefined });
            css = prefixed.css;

            // Apply minification in production
            if (isProd) {
                const CleanCSS = require("clean-css");
                const minified = new CleanCSS({ level: 2 }).minify(css);
                css = minified.styles;
            }

            // Write output
            const outputPath = path.join(outputDir, `${templateName}.css`);
            fs.writeFileSync(outputPath, css);

            console.log(`✅ Generated: ${outputPath}`);
            success++;
        } catch (error) {
            console.error(`❌ Failed to compile ${filePath}:`);
            console.error(`   ${error.message}`);
            failed++;
        }
    });

    console.log(`🎯 Templates: ${success} success, ${failed} failed`);

    // Return a resolved promise to maintain Gulp compatibility
    return Promise.resolve();
}

function jsBundle(cb) {
    console.log("🚀 Starting jsBundle...");

    const buildOptions = {
        entryPoints: [paths.js.src],
        bundle: true,
        outfile: path.join(paths.out.js, "main.js"),
        format: "iife",
        platform: "browser",
        target: ["es2017"],
        minify: isProd,
        sourcemap: !isProd,
        // MicroModal is loaded from CDN as a global, so we don't bundle it
        // Swiper is dynamically imported from CDN, so it's handled at runtime
        banner: {
            js: "// Bundled JavaScript - Do not edit directly, edit src/js/ files instead",
        },
    };

    esbuild
        .build(buildOptions)
        .then(() => {
            console.log("✅ JavaScript bundled successfully");
            cb();
        })
        .catch((error) => {
            console.error("❌ JavaScript bundling failed:", error);
            cb(error);
        });
}

function clean(cb) {
    try {
        execSync(`rimraf ${paths.out.root}`);
        // Also clean the bundled JS file
        const bundledJs = path.join(paths.out.js, "main.js");
        const bundledJsMap = path.join(paths.out.js, "main.js.map");
        if (fs.existsSync(bundledJs)) {
            fs.unlinkSync(bundledJs);
        }
        if (fs.existsSync(bundledJsMap)) {
            fs.unlinkSync(bundledJsMap);
        }
        cb();
    } catch (e) {
        cb(e);
    }
}

function initBrowserSync(cb) {
    browserSync.init({
        proxy: "https://open.local", // Adjust this to your local development URL
        https: true,
        open: false,
        notify: false,
        watchEvents: ["change", "add", "unlink", "addDir", "unlinkDir"],
    });
    cb();
}

function reloadBrowser(cb) {
    browserSync.reload();
    cb();
}

function watchFiles() {
    watch(paths.scss.watch, series(cssGlobal, cssTemplates));
    watch(paths.js.watch, series(jsBundle, reloadBrowser));
    watch(paths.php.watch, reloadBrowser);
}

exports.clean = clean;
exports.cssGlobal = cssGlobal;
exports.cssTemplates = cssTemplates;
exports.jsBundle = jsBundle;
exports.build = series(clean, parallel(cssGlobal, cssTemplates, jsBundle));
exports.dev = series(parallel(cssGlobal, cssTemplates, jsBundle), initBrowserSync, watchFiles);
