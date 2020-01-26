<?php
  $num = get_query_var('newsnum');
  if (!isset($num)) :
    $num = 8;
  endif;
?>
<div class="mod-list-info">
<ul>
<?php
  query_posts('cat=2&posts_per_page='.$num);
  if ( have_posts() ) :
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
<img src="/wp-content/themes/test/assets/img/ph_default_01.png" alt="" class="mod-img2bg">
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
  else :
?>
新着情報はありません。
<?php
  endif;
?>
</ul>
</div><!-- /.mod-list-info -->
