const gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
const cleanCSS = require("gulp-clean-css");
const rename = require("gulp-rename");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const path = require("path");

// 🧹 ESM-compatible del wrapper
const del = async (paths) => {
  const { deleteAsync } = await import('del');
  return deleteAsync(paths);
};

// Paths
const scssPath = [
  "src/scss/main.scss",
];
const watchPath = "src/scss/**/*.scss";
const outputPath = "assets/css/";
const jsOutputPath = "assets/js/";

// 🧹 Clean old sourcemaps
function cleanMaps() {
  return del("assets/css/*.css.map");
}

function compileDevCSS() {
  console.log("🔄 Compiling CSS...");
  return gulp
    .src(scssPath, { sourcemaps: true })
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(
      rename(function (file) {
        if (file.basename === "style") {
          file.basename = path.basename(file.dirname);
        }
        file.dirname = "";
      })
    )
    .pipe(gulp.dest(outputPath, { sourcemaps: "." }));
}

// Compile minified CSS for production
function compileProdCSS() {
  console.log("⚙️ Compiling minified CSS...");
  return gulp
    .src(scssPath)
    .pipe(sass().on("error", sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(cleanCSS())
    .pipe(
      rename(function (file) {
        if (file.basename === "style") {
          file.basename = path.basename(file.dirname);
        }
        file.dirname = "";
      })
    )
    .pipe(gulp.dest(outputPath));
}

// compile js 
function compileDevJS() {
  console.log("🔄 Compiling JS...");
  return gulp
    .src("src/js/*.js", { sourcemaps: true })
    .pipe(gulp.dest(jsOutputPath, { sourcemaps: "." })); // changed outputPath → jsOutputPath
}

// Watch SCSS files
function watchSCSS() {
  console.log("👀 Watching for SCSS changes...");
  gulp.watch(watchPath, compileDevCSS);
}

// Watch JS files
function watchJS() {
  console.log("👀 Watching for JS changes...");
  gulp.watch("src/js/*.js", compileDevJS);
}

// Default task
exports.default = gulp.series(
  compileDevCSS,
  gulp.parallel(watchSCSS, watchJS) // watchers run concurrently
);

// Production build task
exports.build = gulp.series(compileProdCSS);
