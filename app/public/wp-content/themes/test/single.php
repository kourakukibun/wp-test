<?php get_header(); ?>

<body>

<div class="l-wrapper" id="top">

<!-- [ HEADER-AREA ] -->
<?php include('template-parts/template-header.php'); ?>
<!-- /[ HEADER-AREA ] -->

<div class="l-kv">
<img src="http://placeimg.com/1000/300/nature" alt="" class="mod-img2bg">
</div><!-- /.l-kv -->

<!-- [ CONTENT-AREA ] -->
<div class="l-contents">
<main class="l-main">

<div class="l-main-inner">
<article class="l-section">
<?php if (have_posts()): the_post(); ?>
<h1 class="mod-heading2"><?php the_title(); ?></h1>
<?php the_content(); ?>
<?php endif; ?>
<?php get_template_part('template-parts/template-pagination'); ?>
</article><!-- /.l-section -->
</div><!-- /.l-main-inner -->

</main>
</div><!-- /.l-contents -->
<!-- /[ CONTENT-AREA ] -->

<!-- [ FOOTER-AREA ] -->
<?php include('template-parts/template-footer.php'); ?>
<!-- /[ FOOTER-AREA ] -->

</div><!-- /.l-wrapper -->

<?php get_footer(); ?>
