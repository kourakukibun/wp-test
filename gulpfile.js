const gulp = require('gulp');

// gulp- 系のプラグインを plugins.xxxx で利用する(ハイフン付モジュール名はキャメルケース)
const $ = require('gulp-load-plugins')();

// gulp- 系以外のモジュール
$.fs = require('fs');
$.browserSync = require('browser-sync');
$.runSequence = require('run-sequence');
$.del = require('del');
$.frontMatter = require('front-matter');
$.imageminJpg = require('imagemin-jpeg-recompress');
$.imageminPng = require('imagemin-pngquant');

const njkFunc = require('./func.js');

// configを読み込む
const yaml = require('js-yaml');
const config = yaml.safeLoad($.fs.readFileSync('./gulpconfig.yml', 'utf8'));


//#--------------------------
//# libs task
//#--------------------------
gulp.task('libs', ['libs:js', 'libs:css']);

// ライブラリCSSを結合
gulp.task('libs:css', function() {
  gulp.src([
    config.path.src.libs.css + '**/*.css'
  ])
    .pipe($.plumber({
      errorHandler: $.notify.onError('Error: <%= error.message %>')
    }))
    .pipe($.concat('libs.css'))
    .pipe($.cleanCss())
    .pipe($.lineEndingCorrector({
      verbose: true,
      eolc: config.lineFeed.css,
      encoding: config.encoding.css
    }))
    .pipe(gulp.dest(config.path.dest.css + 'libs/'))
    .pipe($.browserSync.reload({
      stream: true
    }));
});

// ライブラリJSを結合
gulp.task('libs:js', function() {
  gulp.src([
    config.path.src.libs.js + '**/*.js'
  ])
    .pipe($.plumber({
      errorHandler: $.notify.onError('Error: <%= error.message %>')
    }))
    .pipe($.concat('libs.js'))
    .pipe($.uglify({
      output: {
        comments: /^!/
      }
    }))
    .pipe($.lineEndingCorrector({
      verbose: true,
      eolc: config.lineFeed.js,
      encoding: config.encoding.js
    }))
    .pipe(gulp.dest(config.path.dest.js + 'libs/'))
    .pipe($.browserSync.reload({
      stream: true
    }));

  // jqueryをdestへcopy
  gulp.src([
    'node_modules/jquery/dist/jquery.min.js'
  ])
    .pipe(gulp.dest(config.path.dest.js + 'libs/'));
});


//#--------------------------
//# html compile task
//#--------------------------
const getDataJson = function (file) {
  return JSON.parse($.fs.readFileSync(file, 'utf8'));
};

gulp.task('html', function () {
  var getDataProject = getDataJson('./project.json');
  var currentFile;

  gulp.src([
    config.path.src.html + 'pages/**/*.njk'
  ])
    .pipe($.plumber({
      errorHandler: $.notify.onError('Error: <%= error.message %>')
    }))
    .pipe($.data(function(file) {
      return { 'filename': file.path };
    }))
    .pipe($.data(function (file) {
      var content = $.frontMatter(String(file.contents));
      file.contents = new Buffer(content.body);
      // return { 'filename': file.path }, content.attributes;
      // return content.attributes, { 'filename': file.path };
      return content.attributes;
    }))
    .pipe($.nunjucksRender({
      path: [config.path.src.html],
      ext: '.php',
      data: {
        dataProject: getDataProject
      },
      envOptions: {
        autoescape: false
      },
      manageEnv: function(env) {
        env.addFilter('relative', function(str) {
          var path = njkFunc.func.setRelativePath(str);
          return path;
        });
      }
    }))
    .pipe($.lineEndingCorrector({
      verbose: true,
      eolc: config.lineFeed.html,
      encoding: config.encoding.html
    }))
    .pipe(gulp.dest(config.path.dest.html))
    // .pipe($.htmlhint('htmlhintrc.json'))
    .pipe($.htmlhint.failReporter())
    .pipe($.browserSync.reload({
      stream: true
    }));
});


//#--------------------------
//# sass compile task
//#--------------------------
gulp.task('css', function () {
  gulp.src([config.path.src.sass + '/**/*.scss'])
    .pipe($.plumber({
      errorHandler: $.notify.onError('Error: <%= error.message %>')
    }))
    .pipe($.sass({
      style: 'expanded',
      includePaths: config.path.src.sass
    }))
    // ベンダープレフィックスを追加
    .pipe($.autoprefixer({
      browsers: config.style.browsers
    }))
    // ソースマップ出力
    // CSSプロパティの順序を並び替え
    .pipe($.csscomb('./csscomb.json'))
    // CSS整形
    .pipe($.cssbeautify({
      indent: config.style.indent,
      openbrace: 'end-of-line',
      autosemicolon: true
    }))
    // 改行が2つ連続してる場合は、1つにする
    .pipe($.replace(/(;\n)\n/g, '$1'))
    // 連続するコメント行は1行あける
    .pipe($.replace(/(\*\/\n)(\/\*)/g, '$1\n$2'))
    // 改行コード設定
    .pipe($.lineEndingCorrector({
      verbose: true,
      eolc: config.lineFeed.css,
      encoding: config.encoding.css
    }))
    // media query整理
    .pipe($.groupCssMediaQueries())
    .pipe(gulp.dest(config.path.dest.css))
    .pipe($.browserSync.reload({
      stream: true
    }));
});


//#--------------------------
//# javascript task
//#--------------------------
gulp.task('js', function () {
  gulp.src([
    config.path.src.js + 'modules/*.js',
    config.path.src.js + 'app.js'
  ])
    .pipe($.plumber({
      errorHandler: $.notify.onError('Error: <%= error.message %>')
    }))
    .pipe($.concat('app.bundle.js'))
    .pipe($.lineEndingCorrector({
      verbose: true,
      eolc: config.lineFeed.js,
      encoding: config.encoding.js
    }))
    .pipe(gulp.dest(config.path.dest.js))
    .pipe($.browserSync.reload({
      stream: true
    }));
});


//#--------------------------
//# ESLint task
//#--------------------------
gulp.task('eslint', function () {
  gulp.src([
    config.path.src.js + '**/*.js'
  ])
    .pipe($.plumber({
      errorHandler: $.notify.onError('Error: <%= error.message %>')
    }))
    .pipe($.eslint())
    .pipe($.eslint.format())
    .pipe($.eslint.failAfterError());
});


//#--------------------------
//# imagemin task
//#--------------------------
// jpg,png画像の圧縮タスク
gulp.task('imagemin', function(){
  gulp.src( config.path.dest.img + '/**/*.+(jpg|jpeg|png)' )
    .pipe($.imagemin([
      $.imageminPng(),
      $.imageminJpg()
    ]))
    .pipe(gulp.dest( config.path.dest.img ));
});

//#--------------------------
//# server task
//#--------------------------
//# PHPビルトインサーバ
//# const php = require ('gulp-connect-php');
// PHPビルトインサーバ用
// gulp.task('buit-in-server', function() {
//   return php.server({
//     base: 'htdocs',
//     port: 8000
//   });
// });

gulp.task('serve', function () {
  $.browserSync.init({
    // server: {
    //   baseDir: config.destRoot
    // },
    // startPath: config.server.startPath,
    proxy: "portfolio.local",
    open: config.server.open
  });

  $.watch([
    'project.json',
    config.path.src.html + '**/*.njk'
  ], function () {
    gulp.start(['html']);
  });
  $.watch([config.path.src.js + '**/*.js'], function () {
    gulp.start(['js','eslint']);
  });
  $.watch([config.path.src.sass + '**/*.scss'], function () {
    gulp.start(['css']);
  });
  $.watch([
    config.path.src.libs.css + '**/*.css',
    config.path.src.libs.js + '**/*.js'], function () {
    gulp.start(['libs']);
  });
});

gulp.task('reload', function () {
  $.browserSync.reload();
});

//#--------------------------
//# Watch : ファイル監視 & リロード
//#--------------------------
gulp.task('watch', function() {

  gulp.watch([
    config.path.dest.html + '**/*.html',
    config.path.dest.css + '**/*.css',
    config.path.dest.js + '**/*.js',
    config.path.dest.img + '**/*.+(png|jpg|jpeg|gif|svg)'
  ], ['reload']);

});


//# 以下 Base タスク -----------------------------

//# buildタスク
const buildTasks = [
  'libs',
  'html',
  'css',
  'js'
];


gulp.task('build', function () {
  gulp.start(buildTasks);
});


//# defaultタスク
gulp.task('default', function (callback) {
  $.runSequence(
    buildTasks,
    ['serve', 'watch'],
    callback
  );
});
