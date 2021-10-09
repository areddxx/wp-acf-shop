var gulp = require('gulp'),
    plumber = require('gulp-plumber'),
    watch = require('gulp-watch'),
    livereload = require('gulp-livereload'),
    cleanCSS = require('gulp-clean-css'),
    concat = require('gulp-concat'),
    jshint = require('gulp-jshint'),
    stylish = require('jshint-stylish'),
    rename = require('gulp-rename'),
    notify = require('gulp-notify'),
    sass = require('gulp-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    sourcemaps = require('gulp-sourcemaps'),
    rollup = require('gulp-better-rollup'),
    babel = require('rollup-plugin-babel'),
    resolve = require('rollup-plugin-node-resolve'),
    commonjs = require('rollup-plugin-commonjs'),
    uglify = require('rollup-plugin-uglify');

var onError = (err) => {
  console.log('An error occurred:', err.message );
  this.emit('end');
}

var PATHS = {
  sass: [
    'node_modules/foundation-sites/scss/',
  ],
  javascript: [

    // Include your own custom scripts (located in the custom folder)

    // Animation libraries.
    'node_modules/scrollmagic/scrollmagic/minified/ScrollMagic.min.js',
    // 'node_modules/scrollmagic/scrollmagic/minified/plugins/debug.addIndicators.min.js',
    // 'node_modules/jarallax/dist/jarallax.min.js',

    // Node Modules
    // 'node_modules/shufflejs/dist/shuffle.min.js', // ShuffleJS (Galleries)

    // Components
    'assets/js/components/menu.js',
    'assets/js/components/notifications.js',
    'assets/js/components/tabs.js',
    'assets/js/components/animations.js',

    // Modules: Add module functionality here
    'assets/js/modules/hero-carousel.js',
    // 'assets/js/modules/floor-plans.js',
    // 'assets/js/modules/galleries.js',

    // Ajax .
    // 'assets/js/ajax/comments.js', // Enable this if the theme will use post comments.

    // General
    'assets/js/app.js',
  ]
};

gulp.task('scss', () => {
    return gulp.src('assets/scss/app.scss')
    .pipe(sourcemaps.init() )
    .pipe(sourcemaps.identityMap() )
    .pipe(plumber({ errorHandler: onError } ) )
    .pipe(sass({ includePaths : PATHS.sass }) )
    .pipe(autoprefixer('last 3 version') )
    .pipe(gulp.dest('./assets/css/') )
    .pipe(cleanCSS({compatibility: 'ie11'}))
    .pipe(rename({ suffix: '.min' } ) )
    .pipe(sourcemaps.write('sourcemaps') )
    .pipe(gulp.dest('./assets/css/min/') )
    .pipe(livereload() );
} );

gulp.task('javascript', () => {
  return gulp.src(PATHS.javascript)
    .pipe(plumber({ errorHandler: onError } ) )
    .pipe(rollup({ plugins: [babel(), resolve(), commonjs(), uglify.uglify()] }, 'umd') )
    .pipe(concat('app.js') )
    .pipe(rename({ suffix: '.min' }) )
    .pipe(gulp.dest('./assets/js/min/') );
});

gulp.task('watch', () => {
  livereload.listen();
  gulp.watch('./assets/scss/**/*.scss', gulp.series('scss'));
  gulp.watch('./assets/js/*.js', gulp.series('javascript'));
  gulp.watch('./assets/js/components/*.js', gulp.series('javascript'));
  gulp.watch('./assets/js/modules/*.js', gulp.series('javascript'));
  gulp.watch('./assets/js/ajax/*.js', gulp.series('javascript'));
  gulp.watch('./**/*.php').on('change', (file ) => {
    livereload.changed(file );
  });
});

gulp.task('default', gulp.series('scss', 'javascript', 'watch', () => {

}));