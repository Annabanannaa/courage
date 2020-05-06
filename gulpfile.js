'use strict';

var gulp = require('gulp');
var plumber = require("gulp-plumber");
var sourcemap = require("gulp-sourcemaps");
var rename = require("gulp-rename");
var sass = require("gulp-sass");
var postcss = require("gulp-postcss");
var autoprefixer = require("autoprefixer");
var csso = require("gulp-csso");


gulp.task("css", function () {
  return gulp.src("./source/scss/**/*.scss")
    .pipe(plumber())
    .pipe(sourcemap.init())
    .pipe(sass())
    .pipe(postcss([
      autoprefixer()
    ]))
    .pipe(csso())
    .pipe(rename("style.min.css"))
    .pipe(sourcemap.write("."))
    .pipe(gulp.dest("./source/css"))
});


gulp.task('watch', function () {
  gulp.watch("./source/scss/**/*.scss", gulp.series("css"));
})

gulp.task("start", gulp.series("css"));
