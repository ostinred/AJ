var gulp = require("gulp");
var autoprefixer = require("gulp-autoprefixer");
var concat = require("gulp-concat");
var sass = require("gulp-sass");
var sourcemaps = require("gulp-sourcemaps");
var plumber = require("gulp-plumber");
var jsmin = require("gulp-uglify");
var notify = require("gulp-notify");
var browserSync = require("browser-sync").create();
var imagemin = require("gulp-imagemin");
var pngquant = require("imagemin-pngquant");
var jpegtran = require("imagemin-jpegtran");
var gifsicle = require("imagemin-gifsicle");
var imageminSvgo = require("imagemin-svgo");
var babel = require("gulp-babel");
var clean = require("gulp-clean");

var config = {
  path: {
    styles: "./src/scss/**/*.scss",
    html: "./src/**/*.html",
    img: "./src/img/**/*",
    js: "./src/js/**/*.js",
    homeDir: "./",
    video: "./src/video/**/*",
    pdf: "./src/pdf/**/*",
    fonts: "./src/fonts/**/*",
    favicon: "./src/favicon/**/*",
  },
  output: {
    html: "./dest/",
    cssFile: "app.min.css",
    cssPath: "./dest/css/",
    homeDir: "./dest/",
    img: "./dest/img",
    jsDest: "./dest/js",
    video: "./dest/video",
    pdf: "./dest/pdf",
    fonts: "./dest/fonts",
    favicon: "./dest",
  },
};

gulp.task("scss", function () {
  return (
    gulp
      .src(config.path.styles)
      // .pipe(sourcemaps.init())
      .pipe(plumber())
      .pipe(
        sass({ errLogToConsole: false, outputStyle: "compressed" })
      )
      .on("error", function (err) {
        notify().write(err);
        this.emit("end");
      })
      .pipe(concat(config.output.cssFile))
      .pipe(autoprefixer("last 2 versions"))
      // .pipe(sourcemaps.write())
      .pipe(gulp.dest(config.output.cssPath))
      .pipe(browserSync.stream())
  );
});

gulp.task("serve", function () {
  browserSync.init({
    server: {
      baseDir: config.output.html,
    },
  });

  gulp.watch(config.path.styles, ["scss"]);
  gulp.watch(config.path.js, ["jsWatch"]);
  gulp.watch(config.path.img, ["copyImages"]);
  gulp.watch(config.path.html, ["copyHTML"]);
  gulp.watch(config.path.video, ["copyVideo"]);
  gulp.watch(config.path.html).on("change", browserSync.reload);
});

gulp.task("copyHTML", function () {
  gulp.src(config.path.html).pipe(gulp.dest(config.output.html));
});

gulp.task("copyVideo", function () {
  gulp.src(config.path.video).pipe(gulp.dest(config.output.video));
});

gulp.task("cleanImages", function () {
  gulp.src(config.output.img, { read: false }).pipe(clean());
});

gulp.task("copyImages", function () {
  gulp.src(config.path.img).pipe(gulp.dest(config.output.img));
});

gulp.task("copyPDF", function () {
  gulp.src(config.path.pdf).pipe(gulp.dest(config.output.pdf));
});

gulp.task("copyFonts", function () {
  gulp.src(config.path.fonts).pipe(gulp.dest(config.output.fonts));
});

gulp.task("copyFavicon", function () {
  gulp
    .src(config.path.favicon)
    .pipe(gulp.dest(config.output.favicon));
});

gulp.task("jsWatch", function () {
  return gulp
    .src(config.path.js)
    .pipe(jsmin())
    .pipe(gulp.dest(config.output.jsDest));
});

gulp.task("default", [
  "copyHTML",
  "copyImages",
  "copyFavicon",
  "copyPDF",
  "copyFonts",
  "copyVideo",
  "scss",
  "jsWatch",
  "serve",
]);
