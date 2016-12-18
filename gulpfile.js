// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var jshint       = require('gulp-jshint'),
    sass         = require('gulp-sass'),
    concat       = require('gulp-concat'),
    uglify       = require('gulp-uglify'),
    rename       = require('gulp-rename'),
    changed      = require('gulp-changed'),
    imagemin     = require('gulp-imagemin'),
    autoprefixer = require('gulp-autoprefixer');

// Images
gulp.task('images', function() {
    return gulp.src('assets/images/**')
        .pipe(changed('dist/images'))
        .pipe(imagemin())
        .pipe(gulp.dest('dist/images'));
});

// Compile Our Sass
gulp.task('sass', function() {
    // ignore vendor plugins
    gulp.src(['assets/scss/vendor/**'])
        .pipe(gulp.dest('dist/css/vendor'));

    return gulp.src('assets/scss/*.scss')
        .pipe(sass({ outputStyle: 'compressed' }))
        .pipe(autoprefixer({
            browsers: ['last 2 versions', 'ie >= 9', 'and_chr >= 2.3'],
            cascade: false
        }))
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest('dist/css'));
});

// Lint Task
gulp.task('lint', function() {
    return gulp.src('assets/js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'));
});

// Concatenate & Minify JS
gulp.task('scripts', function() {
    gulp.src(['assets/js/vendor/*.js'])
        .pipe(uglify())
        .pipe(gulp.dest('dist/js/vendor'));

    return gulp.src('assets/js/*.js')
        .pipe(concat('all.js'))
        .pipe(rename('all.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('dist/js'));
});

// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('assets/js/*.js', ['lint', 'scripts']);
    gulp.watch('assets/scss/**', ['sass']);
    gulp.watch('assets/images/**', ['images']);
});

// Default Task
gulp.task('default', ['images', 'lint', 'sass', 'scripts', 'watch']);