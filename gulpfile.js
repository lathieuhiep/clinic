'use strict';

const { src, dest, watch, series } = require('gulp')
const sass = require('gulp-sass')(require('sass'))
const sourcemaps = require('gulp-sourcemaps')
const browserSync = require('browser-sync')
const concat = require('gulp-concat')
const uglify = require('gulp-uglify')
const minifyCss = require('gulp-clean-css')
const concatCss = require('gulp-concat-css')
const rename = require("gulp-rename")

const pathAssets = './assets'
const pathNodeModule = './node_modules'

// server
function server() {
    browserSync.init({
        proxy: "localhost/180tranphu/",
        open: 'local',
        cors: true,
        ghostMode: false
    })
}

/*
Task build Bootstrap
* */

// Task build style bootstrap
function buildStylesBootstrap() {
    return src(`${pathAssets}/scss/bootstrap.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathAssets}/libs/bootstrap/`))
        .pipe(browserSync.stream());
}
exports.buildStylesBootstrap = buildStylesBootstrap;

// Task build js bootstrap
function buildLibsBootstrapJS() {
    return src([
        `${pathNodeModule}/bootstrap/dist/js/bootstrap.bundle.js`
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathAssets}/libs/bootstrap/`))
        .pipe(browserSync.stream());
}
exports.buildLibsBootstrapJS = buildLibsBootstrapJS


/*
Task build swiper
* */

// Task build style swiper
function buildStylesSwiper() {
    return src(`${pathNodeModule}/swiper/swiper-bundle.css`)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(minifyCss({
            compatibility: 'ie8',
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(sourcemaps.write())
        .pipe(dest(`${pathAssets}/libs/swiper/`))
        .pipe(browserSync.stream());
}
exports.buildStylesSwiper = buildStylesSwiper;

// Task build js bootstrap
function buildLibsSwiperJS() {
    return src([
        `${pathNodeModule}/swiper/swiper-bundle.js`
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathAssets}/libs/swiper/`))
        .pipe(browserSync.stream());
}
exports.buildLibsSwiperJS = buildLibsSwiperJS


// Task build style
function buildStyles() {
    return src(`${pathAssets}/scss/style.scss`)
        .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(sourcemaps.write())
        .pipe(dest('./'))
        .pipe(browserSync.stream());
}
exports.buildStyles = buildStyles;

// Task build style elementor
function buildStylesElementor() {
    return src(`${pathAssets}/scss/elementor-addon/elementor-addon.scss`)
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`./extension/elementor-addon/css/`))
        .pipe(browserSync.stream());
}
exports.buildStylesElementor = buildStylesElementor;

// Task build style post
function buildStylesPost() {
    return src(`${pathAssets}/scss/post-type/post/post.scss`)
        .pipe(sass().on('error', sass.logError))
        .pipe(minifyCss({
            level: {1: {specialComments: 0}}
        }))
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathAssets}/css/post/`))
        .pipe(browserSync.stream());
}
exports.buildStylesPost = buildStylesPost;

// buildJSTheme
function buildJSTheme() {
    return src([
        `${pathAssets}/js/*.js`,
        `!${pathAssets}/js/*.min.js`
    ], {allowEmpty: true})
        .pipe(uglify())
        .pipe(rename( {suffix: '.min'} ))
        .pipe(dest(`${pathAssets}/js/`))
        .pipe(browserSync.stream());
}
exports.buildJSTheme = buildJSTheme


// Task watch
function watchTask() {
    server()

    watch([
        `${pathAssets}/scss/variables-site/*.scss`,
        `${pathAssets}/scss/bootstrap.scss`
    ], buildStylesBootstrap)

    watch([
        `${pathAssets}/scss/variables-site/*.scss`,
        `${pathAssets}/scss/base/*.scss`,
        `${pathAssets}/scss/style.scss`,
    ], buildStyles)

    watch([
        `${pathAssets}/scss/variables-site/*.scss`,
        `${pathAssets}/scss/elementor-addon/*.scss`
    ], buildStylesElementor)

    watch([
        `${pathAssets}/scss/variables-site/*.scss`,
        `${pathAssets}/scss/post-type/post/*.scss`
    ], buildStylesPost)

    watch([`${pathAssets}/js/*.js`, `!${pathAssets}/js/*.min.js`], buildJSTheme)

    watch([
        './**/*.php',
        './assets/images/*.{png,jpg,jpeg,gif}'
    ], browserSync.reload);
}
exports.watchTask = watchTask