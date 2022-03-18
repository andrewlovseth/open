const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();

function style() {
    return gulp
        .src('src/scss/main.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('./public'))
        .pipe(browserSync.stream());
}

function scripts() {
    return gulp
        .src('src/js/main.js')
        .pipe(sourcemaps.init())
        .pipe(gulp.dest('./public'))
        .pipe(browserSync.stream());
}

function watch() {
    browserSync.init({
        proxy: 'https://open.local',
    });

    gulp.watch('./src/scss/**/*.scss', style);
    gulp.watch('./src/js/**/*.js', scripts);
    gulp.watch('./**/*.php').on('change', browserSync.reload);
}

exports.style = style;
exports.scripts = scripts;
exports.watch = watch;
