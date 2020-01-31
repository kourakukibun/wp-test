<?php get_header(); ?>

<body>

<div class="l-wrapper" id="top">

<!-- [ HEADER-AREA ] -->
<?php include('template-parts/template-header.php'); ?>
<!-- /[ HEADER-AREA ] -->

<!-- [ CONTENT-AREA ] -->
<div class="l-contents">
<main class="l-main">

<div class="l-main-inner">
<div class="l-section">
<?php if (have_posts()): the_post(); ?>
<h1 class="mod-heading2"><?php the_title(); ?></h1>
<?php
  the_content();
  endif;
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
