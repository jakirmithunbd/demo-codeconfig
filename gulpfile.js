const { src, dest, watch, series, parallel } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');
const babel = require('gulp-babel');
const terser = require('gulp-terser');
const concat = require('gulp-concat');
const rename = require('gulp-rename');
const sourcemaps = require('gulp-sourcemaps');
const imagemin = require('gulp-imagemin');
const htmlmin = require('gulp-htmlmin');
const browserSync = require('browser-sync').create();
const gulpif = require('gulp-if');
const cleanCSS = require('gulp-clean-css');
const del = require('del');

// Paths configuration
const paths = {
  html: {
    src: 'src/**/*.html',
    dest: 'assets/'
  },
  styles: {
    src: 'src/scss/**/[^_]*.scss',
    dest: 'assets/css/',
    watch: 'src/scss/**/*.scss'
  },
  scripts: {
    src: 'src/js/**/*.js',
    dest: 'assets/js/'
  },
  images: {
    src: 'src/images/**/*',
    dest: 'assets/images/'
  },
  fonts: {
    src: 'src/fonts/**/*',
    dest: 'assets/fonts/'
  }
};

// Environment check
let isProduction = false;

// Clean assets folder
function clean() {
  return del(['assets']);
}

// HTML task
function html() {
  return src(paths.html.src)
    .pipe(gulpif(isProduction, htmlmin({
      collapseWhitespace: true,
      removeComments: true
    })))
    .pipe(dest(paths.html.dest))
    .pipe(browserSync.stream());
}

// Styles task
function styles() {
  return src(paths.styles.src)
    .pipe(gulpif(!isProduction, sourcemaps.init()))
    .pipe(sass({
      outputStyle: isProduction ? 'compressed' : 'expanded'
    }).on('error', sass.logError))
    .pipe(postcss([
      autoprefixer()
    ]))
    .pipe(gulpif(isProduction, cleanCSS({
      level: 2
    })))
    .pipe(gulpif(!isProduction, sourcemaps.write('.')))
    .pipe(dest(paths.styles.dest))
    .pipe(browserSync.stream());
}

// Scripts task
function scripts() {
  return src(paths.scripts.src)
    .pipe(gulpif(!isProduction, sourcemaps.init()))
    .pipe(babel({
      presets: ['@babel/preset-env']
    }))
    .pipe(concat('main.js'))
    .pipe(gulpif(isProduction, terser({
      compress: {
        drop_console: true
      }
    })))
    .pipe(gulpif(isProduction, rename({ suffix: '.min' })))
    .pipe(gulpif(!isProduction, sourcemaps.write('.')))
    .pipe(dest(paths.scripts.dest))
    .pipe(browserSync.stream());
}

// Images task
function images() {
  return src(paths.images.src)
    .pipe(gulpif(isProduction, imagemin([
      imagemin.gifsicle({ interlaced: true }),
      imagemin.mozjpeg({ quality: 80, progressive: true }),
      imagemin.optipng({ optimizationLevel: 5 }),
      imagemin.svgo({
        plugins: [
          { removeViewBox: false },
          { cleanupIDs: false }
        ]
      })
    ])))
    .pipe(dest(paths.images.dest));
}

// Fonts task
function fonts() {
  return src(paths.fonts.src)
    .pipe(dest(paths.fonts.dest));
}

// Browser Sync
function serve() {
  browserSync.init({
    server: {
      baseDir: './assets',
      serveStaticOptions: {
        extensions: ['html']
      }
    },
    port: 3000,
    open: true,
    notify: false,
    middleware: function (req, res, next) {
      // Add proper MIME types for fonts
      if (req.url.match(/\.(woff|woff2|ttf|eot|otf)$/)) {
        res.setHeader('Content-Type', 'font/woff2');
      }
      next();
    }
  });

  watch(paths.html.src, html);
  watch(paths.styles.watch, styles);
  watch(paths.scripts.src, scripts);
  watch(paths.images.src, images);
  watch(paths.fonts.src, fonts);
}

// Set production environment
function setProduction(done) {
  isProduction = true;
  done();
}

// Development build
const dev = series(
  clean,
  parallel(html, styles, scripts, images, fonts),
  serve
);

// Production build
const build = series(
  setProduction,
  clean,
  parallel(html, styles, scripts, images, fonts)
);

// Watch task
function watchFiles() {
  watch(paths.html.src, html);
  watch(paths.styles.watch, styles);
  watch(paths.scripts.src, scripts);
  watch(paths.images.src, images);
  watch(paths.fonts.src, fonts);
}

// Export tasks
exports.clean = clean;
exports.html = html;
exports.styles = styles;
exports.scripts = scripts;
exports.images = images;
exports.fonts = fonts;
exports.serve = serve;
exports.watch = watchFiles;
exports.build = build;
exports.default = dev;
