var gulp = require('gulp'),
	combineCSS = require('combine-css'),
	sass = require('gulp-sass'),
	minifyCSS = require('gulp-minify-css'),
	concat = require('gulp-concat');

var paths = {
  css: 'assets/js/**/*',
  images: 'assets/images/**/*'
};

/* Convert scss to css */
gulp.task('sass', function () {
    gulp.src('./assets/scss/*.scss')
        .pipe(sass())
        .pipe(gulp.dest('./assets/css'));
});

/* combine css files */
gulp.task('combine', function() {
    gulp.src('./assets/css/*.css')
        .pipe(combineCSS({
            lengthLimit: 256,//2KB
            prefix: 'combined-',
            selectorLimit: 4080
        }))
        .pipe(gulp.dest('./assets/combinedCSS'));
});

/* concat css files */
gulp.task('concat-css', function() {
	  gulp.src(['./assets/css/bitsy_main.css', './assets/css/bitsy_form.css'])
	    .pipe(concat('bitsy.css'))
	    .pipe(gulp.dest('./assets/tmp'))
	});

/* minimize css */
gulp.task('minify-css', function() {
	  gulp.src('./assets/tmp/bitsy.css')
	    .pipe(minifyCSS({keepBreaks:true}))
	    .pipe(gulp.dest('./public/css/'))
	});

gulp.task('default', [
	'sass', 
	'concat-css', 
	'minify-css'
]);