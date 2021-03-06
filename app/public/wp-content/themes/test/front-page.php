<?php get_header(); ?>

<body>

<div class="l-wrapper" id="top">

<!-- [ HEADER-AREA ] -->
<?php include('template-parts/template-header.php'); ?>
<!-- /[ HEADER-AREA ] -->

<!-- [ CONTENT-AREA ] -->
<div class="l-contents">
<main class="l-main">

<div class="l-main-inner bg-02">
<section class="l-section">
<h2 class="mod-heading2">Mori Tomohide</h2>
<p class="mod-p mod-center">Webサイト制作・運用の仕事に携わり18年になりました。<br>今後も、より多くの方々のお役に立てるサービスを提供していきたいと考えています。</p>
</section><!-- /.l-section -->
</div><!-- /.l-main-inner -->

<div id="about" class="l-main-inner">
<section class="l-section">
<h2 class="mod-heading2">タスク管理はgulpを使用</h2>
<div class="l-column">
<div class="l-column-inner wide-1">
<figure class="home-image-gulp">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/logo_gulp.png" alt="gulp">
</figure>
</div><!-- /.l-column-inner -->
<div class="l-column-inner wide-3">
<ul class="mod-ul">
<li>開発環境作をシンプルに作成できる</li>
<li>プラグインが豊富</li>
<li>自由度が高い</li>
</ul>
<p class="mod-p">といった利点により、gulpを使用しています。今でも使い勝手としては一番良いものだと感じています。</p>
</div><!-- /.l-column-inner -->
</div><!-- /.l-column -->
</section><!-- /.l-section -->

<section class="l-section">
<h2 class="mod-heading2">HTMLのプリプロセッサはNunjucksを使用</h2>
<div class="l-column alternate">
<div class="l-column-inner wide-1">
<figure>
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/logo_njk.png" alt="Nunjucks">
</figure>
</div><!-- /.l-column-inner -->
<div class="l-column-inner wide-3">
<p class="mod-p">HTMLと同じ書式で利用できる点により、Nunjucksを採用しています。</p>
<p class="mod-p">個人的には、シンプルに、また閉じタグ忘れ等のイージーミスをなくすためにpugを使いたいところですが、複数人で行うプロジェクトなどに携わる場合は、担当者が抵抗感なく作業してもらうためにNunjucksによるコーディングをメインとして進めてまいりました。</p>
</div><!-- /.l-column-inner -->
</div><!-- /.l-column -->
</section><!-- /.l-section -->

<section class="l-section">
<h2 class="mod-heading2">CSSのプリプロセッサはSass（Scss）を使用</h2>
<div class="l-column">
<div class="l-column-inner wide-1">
<figure class="home-image-sass">
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/logo_sass.png" alt="Sass">
</figure>
</div><!-- /.l-column-inner -->
<div class="l-column-inner wide-3">
<p class="mod-p">CSSのプリプロセッサには、定番のSass（Scss）を採用しています。</p>
<p class="mod-p">これも個人的には、記法がシンプルなSass記法を使いたいところですが、CSSの記法に準じたScssが主流ということもあり、泣く泣くScssで書いています。</p>
</div><!-- /.l-column-inner -->
</div><!-- /.l-column -->
</section><!-- /.l-section -->

<section class="l-section">
<h2 class="mod-heading2">jQueryはまだまだ現役</h2>
<div class="l-section-inner">
<p class="mod-p">「jQueryはもう使わない」</p>
<p class="mod-p">そんな風潮もありますが、基本JSではjQueryを使用しています。<br>
プロジェクトを１人で回す・・・なんてことは稀であり、複数人で携わることを考えた場合は前述にもありますが、できるだけコードの中身はシンプルに、そして記述ミスをなくすことが一番大事なことだと考えています（これは、作業スピードアップにも繋がります）。</p>
<p class="mod-p">なおJSに関しては、CoffeeScriptなどの導入も一時期行っていましたが、最終的にはjQueryで書くのが一番わかりやすい、ということとなった経緯があります。</p>
</div><!-- /.l-section-inner -->
</section><!-- /.l-section -->
</div><!-- /.l-main-inner -->

<div id="lineup" class="l-main-inner bg-01">
<div class="l-section">
<h2 class="mod-heading2">Products</h2>
<p class="mod-p">諸事情により制作物はほぼ出すことができませんが、一部掲載いたします。</p>

<section id="lineup-1" class="l-section-inner">
<h3 class="mod-heading3">eラーニング制作</h3>
<p class="mod-p">日本女子大学光学部の依頼により制作した光学教材を紹介。</p>
<div class="l-column col-2">
<div class="l-column-inner">
<?php
  $uri = esc_url(home_url()).'/gallery/ponjo';
  disp_specific_post($uri);
?>
</div><!-- /.l-column-inner -->
<div class="l-column-inner">
<ul class="mod-ul">
<li>制作年　：2008年</li>
<li>制作期間：2ヶ月</li>
<li>メンバー：1人</li>
<li>主担当　：全て</li>
</ul>
<p class="mod-p">FlashでActionScript2.0を使用し制作しました。</p>
<p class="mod-p">光学という、文系の自分とは全く異なる分野の教材ということもあり、制作期間中約２割は、大学に赴き、教授の教えを受け、また実験の様子を見学させていただきました。</p>
<p class="mod-p">大学生のみならず、小学生を集めた講義などでも利用されたようです。</p>
</div><!-- /.l-column-inner -->
</div><!-- /.l-column -->
</section><!-- /.l-section-inner -->

<section id="lineup-2" class="l-section-inner">
<h3 class="mod-heading3">パナソニック関連</h3>
<p class="mod-p">2011年の夏キャンペーン向けサイトを紹介。</p>
<div class="l-column col-2">
<div class="l-column-inner">
<figure>
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/product_02.png" alt="">
</figure>
</div><!-- /.l-column-inner -->
<div class="l-column-inner">
<ul class="mod-ul">
<li>制作年　：2011年</li>
<li>制作期間：1ヶ月</li>
<li>メンバー：3人</li>
<li>主担当　：設計・Flash制作・運営</li>
</ul>
<p class="mod-p">パナソニック関連会社に勤めているときに、親会社であるパナソニックモバイルコミュニケーションズ株式会社より依頼を受け制作し、キャンペーンの運用も約３ヶ月ほど行っていました。</p>
<p class="mod-p">FlashDevelopでActionScript3.0を使用し、キャンペーンサイト用のフレームワークを作成し、他多数のキャンペーンサイトを手掛けました。</p>
</div><!-- /.l-column-inner -->
</div><!-- /.l-column -->
</section><!-- /.l-section-inner -->

<section id="lineup-3" class="l-section-inner">
<h3 class="mod-heading3">個人制作</h3>
<p class="mod-p">知人が店長をしているレストランのサイトを制作。</p>
<div class="l-column col-2">
<div class="l-column-inner">
<figure>
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/home/product_03.png" alt="">
</figure>
</div><!-- /.l-column-inner -->
<div class="l-column-inner">
<ul class="mod-ul">
<li>制作年　：2010年</li>
<li>制作期間：2ヶ月</li>
<li>メンバー：2人</li>
<li>主担当　：設計・Flash制作・コーディング</li>
</ul>
<p class="mod-p">トップページ及び配下ページのメニュー部分を、FlashDevelopでActionScriptを使用し制作しました。</p>
<p class="mod-p">カメラ好きのレストランオーナーが、自分の撮った写真をたくさん載せたい、との意向を踏まえ、写真が目立つサイトにしました。また開設当時は、最も効果的と教えてもらったSEO対策を施したことで、「waikiki」、「ワイキキ」で検索すると上位（ほぼ１位）で表示されるようになっていました。</p>
<p class="mod-p">現在もこのサイトは稼働中ですが、プレーヤーが入っていないとFlashが見れなくなっておりSEO的にも悪く、デザインも今時ではないのでリニューアルを進めているところです・・・が、予算的に厳しいみたいです。</p>
</div><!-- /.l-column-inner -->
</div><!-- /.l-column -->
</section><!-- /.l-section-inner -->

<section id="lineup-4" class="l-section-inner">
<h3 class="mod-heading3">東京2020関連</h3>
<p class="mod-p">2018年より、一部東京2020関連のWebサイト制作に携わりました。</p>
<ul class="mod-ul">
<li>制作年　：2018年</li>
<li>制作期間：2ヶ月</li>
<li>メンバー：5人</li>
<li>主担当　：コーディング</li>
</ul>
<p class="mod-p">斬新なデザインに加え、アクセシビリティ（AAレベル）準拠という厄介な問題に対応するコーディングを行わないといけない、という案件でした。守らないといけない規則も多いため、破綻しないコード設計に注力しました。</p>
<p class="mod-p">結果、本体のサイトにも一部参加できたので、いろんな意味で良い経験をさせていただきました。</p>
</section><!-- /.l-section-inner -->

<section id="lineup-5" class="l-section-inner">
<h3 class="mod-heading3">その他</h3>
<p class="mod-p">前職ではバシャログ。にて <a href="http://bashalog.c-brains.jp/author/kouraku.php" target="_blank">kouraku</a> として、仕事に関わる内容を元にフロントエンド目線でアレンジした内容を展開。<br>
その中で作成したサンプルの一部（＋αで若干要素を追加したりしています）を掲載します。</p>
<h4 class="mod-heading4">Vue.js：スプレッドシートとの連携</h4>
<p class="mod-p">スプレッドシートで作成した進捗確認用ファイルリストの内容をVue.jsを使用して表示しています。</p>
<iframe src="https://embed.plnkr.co/b3NmQkSrlBUATC0A/" width="100%" height="600"></iframe>
<h4 class="mod-heading4">Vue.js：スタイルガイド</h4>
<p class="mod-p">Vue.jsを使ってスタイルガイドを作ってみました。<br>
タスク管理ツールを不要とし、setting.jsonで指定したCSSファイルの内容をVue.jsが拾ってきて表示するので、気軽に使えるものとなりました。</p>
<p class="mod-p">ただし、jQueryのライブラリ等を使用した際の問題が未だスマートに解決できていません。</p>
<iframe src="https://embed.plnkr.co/wrk9Zi6Fh8JgcpTO/" width="100%" height="600"></iframe>
</section><!-- /.l-section-inner -->
</div><!-- /.l-main-inner -->
</div><!-- /.l-section -->
</div><!-- /.l-main-inner -->

<div id="parts" class="l-main-inner">
<div class="l-section">
<h2 class="mod-heading2">WP向けパーツ</h2>
<h3 class="mod-heading3">新着情報サンプル</h3>
<p class="mod-p">「news」カテゴリの投稿記事一覧サンプルです。</p>
<?php
  set_query_var('newsnum', 4);
  get_template_part('product-parts/newslist');
?>

<h3 class="mod-heading3">標準ギャラリーカスタマイズ</h3>
<p class="mod-p">Wordpress標準のギャラリーで取り込ませた画像をslickを使用してスライダーで表示させ、サムネイルとモーダルはオリジナルで処理を作成し追加してみました。</p>
<?php
  $uri = esc_url(home_url()).'/gallery/standard';
  disp_specific_post($uri);
?>
</div><!-- /.l-section -->
</div><!-- /.l-main-inner -->

</main>
</div><!-- /.l-contents -->
<!-- /[ CONTENT-AREA ] -->

<!-- [ FOOTER-AREA ] -->
<?php include('template-parts/template-footer.php'); ?>
<!-- /[ FOOTER-AREA ] -->

</div><!-- /.l-wrapper -->

<?php get_footer(); ?>
