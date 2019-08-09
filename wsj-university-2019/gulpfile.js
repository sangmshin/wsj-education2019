var gulp = require('gulp');
const { series, parallel } = require('gulp');
var sass = require('gulp-sass');
var babel = require("gulp-babel");
var concat = require('gulp-concat');
var notify = require('gulp-notify');
var jslint = require('gulp-jslint');
var rename = require('gulp-rename');
var imagemin = require('gulp-imagemin');
var autoprefixer = require('gulp-autoprefixer');
var bs = require('browser-sync').create(); // create a browser sync instance.


function img(){

    return gulp.src('./assets/img/raw/*.{png,jpg,gif,svg}')
            .pipe(imagemin({
                optimizationLevel: 7,
                progressive: true
            }))

            .pipe(gulp.dest('./dist/img'))
            .pipe(notify({
                message: 'Images task complete',
                onLast: true,
                sound: false
            }));
}

function css(){

    return gulp
        .src('./assets/css/*.scss')
        .pipe(sass({
            outputStyle: 'expanded'
        }).on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('./dist/css'))
        .pipe(notify({
            message: 'Sass Compilation task complete',
            onLast: true,
            sound: false
        }))
        .pipe(bs.stream())
}

function js(){

   return gulp
        .src('./assets/js/custom/*.js')
        .pipe(jslint())
        .pipe(concat('custom.js'))
        .pipe(babel({
            presets:['env']
        }))
        .pipe(gulp.dest('./dist/js'))
        .pipe(notify({
            message: 'JS scripts task complete',
            onLast: true,
            sound: false
        }))
}

function watch(){
    
    // local wordpress setup
    bs.init({
        proxy: '10.2.128.134:8888/education-2018/', // We need to use a proxy instead of the built-in server because WordPress has to do some server-side rendering for the theme to work
        watchOptions: {
            debounceDelay: 1000 // This introduces a small delay when watching for file change events to avoid triggering too many reloads
        }
    });
    // no wordpress setup
    // bs.init({ server: { baseDir: "./" } });
    
    // js();
    // img();
    // css();
    gulp.watch("./assets/js/custom/*.js", js)
    gulp.watch("./assets/js/custom/*.js", js).on('change', bs.reload);
    gulp.watch('./assets/img/raw/*.{png,jpg,gif,svg}', img).on('change', bs.reload);
    gulp.watch('./assets/img/raw/*', {cwd:'./'}, img).on('change', bs.reload);
    gulp.watch('./assets/css/*.scss', css).on('change', bs.reload);
    gulp.watch("./assets/css/partials/*.scss", css).on('change', bs.reload);
    gulp.watch("./*.*").on('change', bs.reload);
    gulp.watch("./tpl-2019/*.*").on('change', bs.reload);
}

// exports.js = js;
// exports.img = img;
// exports.css = css;
// exports.watch = watch;

gulp.task('default', parallel(img, css, js, watch));
