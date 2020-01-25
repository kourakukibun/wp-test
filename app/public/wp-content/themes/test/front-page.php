<?php get_header(); ?>

<body>

<div class="l-wrapper" id="top">

<?php include('template-parts/template-header.php'); ?>

<div class="l-kv">
<img src="http://placeimg.com/1000/300/nature" alt="" class="mod-img2bg">
</div><!-- /.l-kv -->

<!-- [[ CONTENT-AREA ]] -->
<div class="l-contents">
<main class="l-main">

<div class="l-main-inner">
<div class="l-section">
<h2 class="mod-heading2">News</h2>
<div class="l-info">
<ul>
<?php
  query_posts('cat=2&posts_per_page=8');
  if ( have_posts() ) :
  while ( have_posts() ) : the_post();
?>
<li>
<a href="<?php echo get_permalink(); ?>">
<figure>
<?php the_post_thumbnail('home-thum'); ?>
</figure>
<span class="l-info-text"><?php the_title(); ?></span>
<span class="l-info-date"><?php the_time('Y.m.d'); ?></span>
</a>
</li>
<?php
    endwhile;
    else :
?>
新着情報はありません。
<?php
    endif;
?>
</ul>
</div><!-- /.l-info -->
</div><!-- /.l-section -->
</div><!-- /.l-main-inner -->

<div class="l-main-inner">
<div class="l-section">
<h1>.l-section内Heading1</h1>
<h2>.l-section内Heading2</h2>
<h3>.l-section内Heading3</h3>
</div><!-- /.l-section -->
</div><!-- /.l-main-inner -->

<div class="l-main-inner bg-01">
<div class="l-section">
<h2>Paragraph</h2>
<p>.l-section内p。吾輩は猫である。名前はまだ無い。<br>どこで生れたかとんと見当がつかぬ。</p>
<p>何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。<br>吾輩はここで始めて人間というものを見た。<br>しかもあとで聞くとそれは書生という人間中で一番獰悪な種族であったそうだ。<br>この書生というのは時々我々を捕えて煮て食うという話である。<br>しかしその当時は何という考もなかったから別段恐しいとも思わなかった。</p>
<p>ただ彼の掌に載せられてスーと持ち上げられた時何だかフワフワした感じがあったばかりである。<br>掌の上で少し落ちついて書生の顔を見たのがいわゆる人間というものの見始であろう。<br>この時妙なものだと思った感じが今でも残っている。</p>
<p>第一毛をもって装飾されべきはずの顔がつるつるしてまるで薬缶だ。</p>
<p>その後猫にもだいぶ逢ったがこんな片輪には一度も出会わした事がない。<br>のみならず顔の真中があまりに突起している。</p>
</div><!-- /.l-section -->
</div><!-- /.l-main-inner -->

<div class="l-main-inner bg-02">
<div class="l-section">
<h2>List</h2>
<dl>
<dt>.l-section内dl</dt>
<dd>This is a definition list division.</dd>
<dt>Definition List Title</dt>
<dd>This is a definition list division.</dd>
<dt>Definition List Title</dt>
<dd>This is a definition list division.</dd>
</dl>

<ul>
<li>.l-section内ul</li>
<li>List Item 2</li>
<li>List Item 3</li>
</ul>

<ol>
<li>.l-section内ol</li>
<li>List Item 2</li>
<li>List Item 3</li>
</ol>
</div><!-- /.l-section -->
</div><!-- /.l-main-inner -->

<div class="l-main-inner bg-01">
<div class="l-sample">
<h1 class="mod-heading1">.mod-Heading1 : l-setion以外で同スタイルを使用したい場合など</h1>
<h2 class="mod-heading2">.mod-Heading2</h2>
<h3 class="mod-heading3">.mod-Heading3</h3>

<p class="mod-p">.mod-p : 吾輩は猫である。名前はまだ無い。<br>どこで生れたかとんと見当がつかぬ。</p>
<p class="mod-p">何でも薄暗いじめじめした所でニャーニャー泣いていた事だけは記憶している。<br>吾輩はここで始めて人間というものを見た。<br>しかもあとで聞くとそれは書生という人間中で一番獰悪な種族であったそうだ。<br>この書生というのは時々我々を捕えて煮て食うという話である。<br>しかしその当時は何という考もなかったから別段恐しいとも思わなかった。</p>
<p class="mod-p">ただ彼の掌に載せられてスーと持ち上げられた時何だかフワフワした感じがあったばかりである。<br>掌の上で少し落ちついて書生の顔を見たのがいわゆる人間というものの見始であろう。<br>この時妙なものだと思った感じが今でも残っている。</p>
<p class="mod-p">第一毛をもって装飾されべきはずの顔がつるつるしてまるで薬缶だ。</p>
<p class="mod-p">その後猫にもだいぶ逢ったがこんな片輪には一度も出会わした事がない。<br>のみならず顔の真中があまりに突起している。</p>

<dl class="mod-dl">
<dt>.mod-dl : Definition List Title</dt>
<dd>This is a definition list division.</dd>
<dt>Definition List Title</dt>
<dd>This is a definition list division.</dd>
<dt>Definition List Title</dt>
<dd>This is a definition list division.</dd>
</dl>

<ul class="mod-ul">
<li>.mod-ul : List Item 1</li>
<li>List Item 2</li>
<li>List Item 3</li>
</ul>

<ol class="mod-ol">
<li>.mod-ol : List Item 1</li>
<li>List Item 2</li>
<li>List Item 3</li>
</ol>
</div><!-- /.l-sample -->
</div><!-- /.l-main-inner -->

<div class="l-main-inner bg-01">
<div class="l-section">
<h2>よく使うモジュールサンプル</h2>
<h3>アコーディオン</h3>
<ul>
<li class="mod-ac">
<a href="javascript:void(0)" class="mod-ac-trigger">トリガー1 .mod-ac-trigger</a>
<div class="mod-ac-target">ターゲット1 .mod-ac-target</div>
</li>
<li class="mod-ac">
<a href="javascript:void(0)" class="mod-ac-trigger">トリガー2 .mod-ac-trigger</a>
<div class="mod-ac-target">ターゲット2 .mod-ac-target</div>
</li>
<li class="mod-ac">
<a href="javascript:void(0)" class="mod-ac-trigger">トリガー3 .mod-ac-trigger</a>
<div class="mod-ac-target">ターゲット3 .mod-ac-target</div>
</li>
</ul>
<p>開くときに、.mod-acに.is-activeが付与されます。アイコンを開閉で変更したいときは、.mod-acの.is-activeを参照してください。</p>
</div><!-- /.l-section -->
</div><!-- /.l-main-inner -->

<div class="l-main-inner">
<div class="l-section">
<div class="mod-sample">サンプル処理（コンソールで確認）</div>
</div><!-- /.l-section -->
</div><!-- /.l-main-inner -->

</main>
</div><!-- /.l-contents -->

</div><!-- /.l-wrapper -->

<?php include('template-parts/template-footer.php'); ?>

<?php get_footer(); ?>
