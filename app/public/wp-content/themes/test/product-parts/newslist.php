<?php
  $num = get_query_var('newsnum');
  if (!isset($num)) :
    $num = 8;
  endif;
?>
<?php
  query_posts('cat=2&posts_per_page='.$num);
  if ( have_posts() ) :
?>
<div class="mod-list-info">
<ul>
<?php
  while ( have_posts() ) : the_post();
?>
<li>
<a href="<?php echo get_permalink(); ?>">
<div class="mod-list-info-image">
<figure>
<?php
  if ( has_post_thumbnail() ) :
  the_post_thumbnail('home-thum', array('class' => 'mod-img2bg'));
  else :
?>
<img src="<?php echo get_template_directory_uri(); ?>/assets/img/ph_default_01.png" alt="" class="mod-img2bg">
<?php
  endif;
?>
</figure>
</div><!-- /.mod-list-info-image -->
<div class="mod-list-info-text">
<span class="date"><?php the_time('Y.m.d'); ?></span>
<span class="text"><?php the_title(); ?></span>
</div><!-- /.mod-list-info-text -->
</a>
</li>
<?php
  endwhile;
?>
</ul>
</div><!-- /.mod-list-info -->
<?php
  else :
?>
<p class="mod-p mod-center">新着情報はありません。</p>
<?php
  endif;
?>
