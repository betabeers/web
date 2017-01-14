'use strict';

var gulp         = require('gulp');

// Gulp Plugins
var sass         = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync  = require('browser-sync');
var notify       = require('gulp-notify');
var cleanCSS = require('gulp-clean-css');
var rename = require('gulp-rename');
var sourcemaps = require('gulp-sourcemaps');

var app = {};

app.name = 'Betabeers Web'; // Define the project name
app.domain = 'betabeers.app'; // Define your domain

app.src = 'scss/**/*.scss';
app.dest = 'css/';

gulp.task('sync', function() {
    browserSync.init([
        app.dest + '*.css'
    ], {
        host: app.domain,
        proxy: app.domain,
        ui: false,
        open: false
    });
});

gulp.task('sass', function() {
    return gulp.src(app.src)
        .pipe(sass({includePaths: 'bower_components/compass-mixins/lib',
            outputStyle: 'expanded'}).on('error', sass.logError))
        .pipe(autoprefixer({ browsers: ['last 2 version', 'safari 5', 'ie >= 9'] }))
        .pipe(gulp.dest(app.dest))
        .pipe(browserSync.reload({stream: true}))
        .pipe(notify({message: app.name + ' compiled successfully', onLast: true}));
});

gulp.task('minify', function () {
    gulp.src(app.dest + '*.css')
        .pipe(sourcemaps.init())
        .pipe(cleanCSS(
            {
                recursivelyOptimizeProperties: true
            }
        ))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest(app.dest))
        .pipe(notify({message: app.name + ' minified successfully', onLast: true}));
    ;
});

gulp.task('watch', function() {
    gulp.watch(app.src, ['sass']);
});

gulp.task('default', ['sass', 'minify']);
