<?php
  $cat = get_the_category();
  $catname = get_cat_name($cat[0]->term_id);
  $catid = get_cat_ID($catname);
  $post_id = get_the_ID();
  $post_id_array = array();
  $args = array( 'posts_per_page' => -1, 'category' => $catid, 'exclude' => $post_id_array );
  $posts = get_posts( $args );
  $posts_ids = array();

  foreach ( $posts as $post ) {
    $posts_ids[] += $post->ID;
  }

  $post_current = array_search($post_id, $posts_ids);
  $post_last = count($posts_ids);

  wp_reset_postdata();

  echo '<div class="mod-pager">';

  // 「次へ」リンク
  if ($post_last >= $pagination && $post_current > ($pagination - 2)) {
    next_post_link('<div class="mod-pager-inner next">%link</div>','<span class="fas fa-arrow-circle-left"></span>次の記事へ',true);
  }

  // 「前へ」リンク
  if ($post_last >= $pagination && $is_last == false && $pagination != $post_last) {
    previous_post_link('<div class="mod-pager-inner prev">%link</div>','前の記事へ<span class="fas fa-arrow-circle-right"></span>',true);
  }

  echo '</div>';

?>
