const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const sourcemaps = require('gulp-sourcemaps');
const log = require('fancy-log');
const postcssImport = require('postcss-import');
const headerComment = require('gulp-header-comment');
const tailwindcss = require('tailwindcss');

const sassSourceFile = './assets/sass/app.sass'
const outputFolder = './assets/css/'

const styleSourceFile = 'style.sass';
const styleOutputFolder = './';
const watchedResources = ['assets/sass/**/*', 'assets/sass/*', './*', './**/*'];
const comment = `
Theme Name: Wordpress theme Introduction
Author: the WordPress team
Author URI: https://wordpress.org/
Description: Our default theme for 2020 is designed to take full advantage of the flexibility of the block editor. Organizations and businesses have the ability to create dynamic landing pages with endless layouts using the group and column blocks. The centered content column and fine-tuned typography also makes it perfect for traditional blogs. Complete editor styles give you a good idea of what your content will look like, even before you publish. You can give your site a personal touch by changing the background colors and the accent color in the Customizer. The colors of all elements on your site are automatically calculated based on the colors you pick, ensuring a high, accessible color contrast for your visitors.

Tags: blog, one-column, custom-background, custom-colors, custom-logo, custom-menu, editor-style, featured-images, footer-widgets, full-width-template, rtl-language-support, sticky-post, theme-options, threaded-comments, translation-ready, block-styles, wide-blocks, accessibility-ready

Version: 1.3
Requires at least: 5.0
Tested up to: 5.4
Requires PHP: 7.4
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Text Domain: twentytwenty
This theme, like WordPress, is licensed under the GPL.
Use it to make something cool, have fun, and share what you've learned with others.
`
/* -------------------------------------------------------------------------- */
/*                                  Tailwind                                  */
/* -------------------------------------------------------------------------- */
gulp.task('tailwind', function (done) {
  gulp.src(styleSourceFile)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', function (err) {
      log.error(err.message);
    }))
    .pipe(postcss([tailwindcss('./tailwind.config.js'), postcssImport, autoprefixer, cssnano]))
    .pipe(headerComment(comment))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(styleOutputFolder))
    .on('end', done);
});
gulp.task('watch', gulp.series('tailwind', function (done) {
  gulp.watch(watchedResources, gulp.parallel('tailwind'));
  done();
}));

/* -------------------------------------------------------------------------- */
/*                                    SASS                                    */
/* -------------------------------------------------------------------------- */
gulp.task('sass', function (done) {
  gulp.src(sassSourceFile)
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', function (err) {
      log.error(err.message);
    }))
    .pipe(postcss([postcssImport, autoprefixer, cssnano]))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest(outputFolder))
    .on('end', done);
});

gulp.task('sasswatch', gulp.series('sass', function (done) {
  gulp.watch(watchedResources, gulp.parallel('sass'));
  done();
}));

gulp.task('default', gulp.series('watch', function () { }));