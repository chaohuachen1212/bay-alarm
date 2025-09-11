var extend = require('deep-extend');
var fs = require('fs');
var gulp = require('gulp');
var gulpAutoprefixer = require('gulp-autoprefixer');
var path = require('path');
var plumber = require('gulp-plumber');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var webpack = require('webpack');
var webpackStream = require('webpack-stream');
var WebpackBabiliPlugin = require("babili-webpack-plugin");
var sourcemaps = require('gulp-sourcemaps');
var browserSync = require('browser-sync').create();
require('dotenv').config({ path: './../.env' });

var config = {
  PHP_SOURCES: [
    '../**/*.php'
  ],
  JS_SOURCE: {
    app: './js/app.js'
  },
  JS_SOURCES: [
    './js/**/*.js',
  ],
  JS_OUT_DIR: '../js/',
  JS_OPTIONS: {
    uglify: {
      mangle: false
    }
  },
  SASS_SOURCE_DIR: './scss/*.scss',
  SASS_SOURCES: [
    './scss/**/*.scss',
  ],
  SASS_OUT_DIR: '../'
};

var webpackConfig = {
  entry: config.JS_SOURCE,
  module: {
    loaders: [
      { test: /\.json$/, loader: "json-loader" },
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: [{
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env'],
            plugins: ['@babel/plugin-proposal-class-properties']
          },
        }]
      },
    ],
  },
  output: {
    path: path.resolve(__dirname, config.JS_OUT_DIR),
    filename: '[name].js'
  },
};

var webpackProdConfig = extend({
  plugins: [
    new webpack.LoaderOptionsPlugin({
      minimize: true,
      debug: false
    }),
    new WebpackBabiliPlugin({}, {
      comments: false
    })
  ]
}, webpackConfig);

gulp.task('browser-sync', function() {
  browserSync.init({
    open: false,
    notify: false,
    port: 1111,
    proxy: process.env.PROXY_URL
  });

  gulp.watch(config.PHP_SOURCES).on('change', browserSync.reload);
  gulp.watch(config.SASS_SOURCES).on('change', browserSync.reload);
  gulp.watch(config.JS_SOURCES).on('change', browserSync.reload);
});

gulp.task('compile-js', function() {
  return gulp.src(config.JS_SOURCES)
      .pipe(plumber())
      .pipe(concat('./js/app.js'))
      .pipe(webpackStream(
        webpackProdConfig, webpack
      ))
      .pipe(uglify())
      .pipe(gulp.dest(config.JS_OUT_DIR));
});

gulp.task('watch-js', () => {
  webpackConfig.watch = true;

  gulp.src(config.JS_SOURCES)
    .pipe(sourcemaps.init())
    .pipe(plumber())
    .pipe(webpackStream(
      webpackConfig, webpack
    ))
    .pipe(sourcemaps.write())
    .pipe(uglify())
    .pipe(gulp.dest(config.JS_OUT_DIR));
});

gulp.task('compile-sass', function() {
  gulp.src(config.SASS_SOURCE_DIR)
  .pipe(sourcemaps.init())
  .pipe(plumber())
  .pipe(sass({
    outputStyle: 'compressed'
  })).on('error', sass.logError)
  .pipe(rename(function(path) {
    path.basename = 'style';
  }))
  .pipe(gulpAutoprefixer({
    browsers: [
      'last 1 version',
      'last 2 iOS versions'
    ],
  }))
  .pipe(sourcemaps.write('./maps', {
    mapFile: function(mapFilePath) {
      return mapFilePath.replace('.css.map', '.map');
    }
  }))
  .pipe(gulp.dest(config.SASS_OUT_DIR));
});

gulp.task('watch-sass', function() {
  gulp.watch(config.SASS_SOURCES, ['compile-sass']);
});

gulp.task('build', ['compile-js', 'compile-sass']);
gulp.task('grow-build', ['compile-js', 'compile-sass']);
gulp.task('default', ['watch-js', 'watch-sass', 'browser-sync']);
