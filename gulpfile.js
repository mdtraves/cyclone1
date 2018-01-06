let gulp = require("gulp");
let sass = require("gulp-sass");
let clean = require("gulp-clean-css");
let runSequence = require('gulp-run-sequence');
let concat = require('gulp-concat-css');



gulp.task("sass", function(){
    return gulp.src("app/scss/main.scss")
        .pipe(sass())
        .pipe(gulp.dest("app/css"))
});

gulp.task("clean", function(){
    return gulp.src("app/css/*.css")
        .pipe(clean())
        .pipe(gulp.dest("dist/css"))
});



gulp.task('dev', function(done) {
    runSequence('sass', 'clean', function() {
        console.log('Run something else');
        done();
    });
});

gulp.task ("watch", () => {
    gulp.watch("app/scss/*.scss", ["dev"]);
})