var gulp        = require('gulp');
var $           = require('gulp-load-plugins')();

//Plugins
$.minifycss     = require('gulp-minify-css')

gulp.task('css', function () {
    return gulp.src('assets/less/styles.less')
        .pipe($.less({}))
        .pipe($.base64({
            baseDir: '../',
            extensions: ['png', /\.jpg#datauri$/i],
            exclude:    null,
            maxImageSize: 24*1024, // bytes
            debug: true
        }))
        .pipe($.concat('styles.css'))
        .pipe($.minifycss())
        .pipe(gulp.dest('../assets/'));
});


gulp.task('scripts', function() {
    return gulp.src([
        'assets/js/libs/jquery.1.10.2.js',
        'assets/js/libs/bootstrap/transition.js',
        'assets/js/libs/bootstrap/alert.js',
        'assets/js/libs/bootstrap/button.js',
        'assets/js/libs/bootstrap/carousel.js',
        'assets/js/libs/bootstrap/collapse.js',
        'assets/js/libs/bootstrap/dropdown.js',
        'assets/js/libs/bootstrap/modal.js',
        'assets/js/libs/bootstrap/tooltip.js',
        'assets/js/libs/bootstrap/popover.js',
        'assets/js/libs/bootstrap/scrollspy.js',
        'assets/js/libs/bootstrap/tab.js',
        'assets/js/libs/bootstrap/affix.js',
        'assets/js/junaid.js'
    ])
        .pipe($.jshint())
        .pipe($.concat('scripts.js'))
        .pipe($.uglify({mangle: false}))
        .pipe(gulp.dest('../assets/'));

});


// Watch Files For Changes
gulp.task('watch', function() {
    gulp.watch('assets/less/*.less', ['css']);
    gulp.watch('assets/js/*.js', ['scripts']);
});

// Default Task
gulp.task('default', ['scripts', 'css', 'watch']);