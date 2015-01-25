// 引入 gulp
var gulp = require('gulp');

// 引入组件
var nib = require('nib');
// var btStylus = require('bootstrap-stylus');
var stylus = require('gulp-stylus');
// var cssmin = require('gulp-cssmin');
// var seajs = require('gulp-seajs');
// var CMDTrans = require('gulp-cmd-transport');
// var coffee = require('gulp-coffee');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var jshint = require('gulp-jshint');
// var concat = require('gulp-concat');
// var concat = require('gulp-concat');
// var clean = require('gulp-clean');
// var clean = require('gulp-rimraf');
// var del = require('del');
// var copy = require('gulp-copy');
// var zip = require('gulp-zip');
// var imagemin = require('gulp-imagemin');
// var changed = require('gulp-changed');
// var watch = require('gulp-watch');
// var livereload = require('gulp-livereload');

var base = 'wp-content/themes/e-mall/';
var app = {
  src: './**',
  destfiles: [
    './*.htm?',
    './*.php',
    './favicon.*',
    './css/**',
    './js/**',
    './img/**',
    '!./**/*-debug.*',
    '!./**/*.styl',
    '!./**/*.coffee',
    '!./**/*.psd',
    '!./**/bower_components/**',
    '!./**/spm_modules/**',
    '!./**/bak/**',
    '!./**/*-bak.*'
  ],
  zipfiles: ['./dist/**'],
  // 没搞懂怎样排除目录
  // zip: [
  //   './*.php',
  //   './*.htm?',
  //   './favicon.*',
  //   './**/css/*',
  //   './**/js/*',
  //   './**/img/*',
  //   './**/upload/*',
  //   '!./**/bower_components/*',
  //   '!./**/spm_modules/*',
  //   '!./**/bak/*',
  //   '!*-bak.*'
  // ],
  dest: 'dist',
  watch: ['./**/*.php', './**/*.htm?', './**/*.css', './**/*.js', './img/**/*'],

  stylus: {
    src: base + 'css/main.styl',
    dest: base + 'css',
    watch: base + 'css/*.styl'
  },

  coffee: {
    src: base + 'js/*.coffee',
    dest: base + 'js',
    watch: base + 'js/*.coffee'
  },

  js: {
    debug: base + 'js/*-debug.js',
    src: base + 'js/*.js',
    dest: base + 'js',
    watch: base + 'js/*-debug.js'
  },

  img: {
    src: base + 'img/**/*',
    dest: base + 'img',
    watch: base + 'img/**/*'
  }
};

// 删除目标文件夹
// gulp.task('clean', function(callback) {
//   // return gulp.src(app.dest, {read: false})
//   //   .pipe(clean());
//   del(app.dest, callback);
// });

// 复制文件到目标文件夹
// gulp.task('copy', ['clean'], function() {
//   return gulp.src(app.destfiles)
//     .pipe(gulp.dest(app.dest));
// });
// gulp.task('copy', ['clean'], function() {
//   return gulp.src(app.destfiles)
//     .pipe(copy(app.dest));
// });

// 压缩目标文件夹中的文件
// gulp.task('zip', ['copy'], function() {
//   gulp.src(app.zipfiles)
//     .pipe(zip('app.zip'))
//     .pipe(gulp.dest(app.dest));
// });

// 创建 stylus 任务
gulp.task('stylus', function() {
  gulp.src(app.stylus.src)
    .pipe(stylus({
      compress: true,
      use: [nib()]
    }))
    // .pipe(cssmin())
    .pipe(gulp.dest(app.stylus.dest));
    // .pipe(livereload());
});

// 创建 coffee 任务
// gulp.task('coffee', function() {
//   return gulp.src(app.coffee.src)
//     .pipe(coffee())
//     .pipe(uglify())
//     .pipe(gulp.dest(app.coffee.dest));
// });

// 合并压缩 JS
gulp.task('jsmin', function() {
  gulp.src(app.js.debug)
    // .pipe(watch())
    // .pipe(concat('all.js'))
    // .pipe(rename({suffix: '-min'}))
    .pipe(rename(function(path) {
      path.basename = path.basename.replace(/-debug$/, '');
    }))
    .pipe(uglify())
    .pipe(gulp.dest(app.js.dest));
});

// 检查脚本
gulp.task('jshint', function() {
  gulp.src(app.js.debug)
    .pipe(jshint())
    .pipe(jshint.reporter('default'));
});

// Copy all static images
// gulp.task('img', function() {
//   return gulp.src(app.img.src)
//     .pipe(imagemin({
//       optimizationLevel: 5
//     }))
//     .pipe(gulp.dest('build/img'));
// });

// Rerun the task when a file changes
gulp.task('watch', function() {
  gulp.watch(app.stylus.watch, ['stylus']);
  // gulp.watch(app.coffee.watch, ['coffee']);
  gulp.watch(app.js.watch, ['jshint', 'jsmin']);
  // gulp.watch(app.img.src, ['img']);
});

// livereload task
// gulp.task('livereload', function() {
//   livereload.listen();
//   gulp.watch(app.watch).on('change', livereload.changed);
// });

// The default task (called when you run `gulp` from cli)
// gulp.task('default', ['stylus', 'coffee', 'jsmin', 'watch']);
gulp.task('default', ['stylus', 'jshint', 'jsmin', 'watch']);

// 打包文件
gulp.task('build', ['clean', 'copy', 'zip']);