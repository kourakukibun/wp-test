<?php
// ショートコードテスト
function testFunc() {
  ob_start();
  echo the_title();
  return ob_get_clean();
}
add_shortcode('test', 'testFunc');

// セットアップ
function test_setup() {
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'menus');
}

add_image_size( 'home-thum', 300, 250, true );
add_action( 'after_setup_theme', 'test_setup' );

// PHPファイルインクルード
function include_php_file($params = array()) {
  extract(shortcode_atts(array(
    'file' => 'default'
  ), $params));
  ob_start();
  include(get_theme_root() . '/' . get_template() . "/product-parts/$file.php");
  return ob_get_clean();
}
add_shortcode('product-parts', 'include_php_file');

//プラグインIDを指定し解除する
function dequeue_plugins_style() {
  wp_dequeue_style('wp-block-library');
}
add_action( 'wp_enqueue_scripts', 'dequeue_plugins_style', 9999);

function disp_specific_post($post_id) {
  $post = get_post($post_id, 'OBJECT', 'raw');
  $post_include = apply_filters( 'the_content',$post->post_content);
  echo $post_include;
}

// 不要項目削除
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'feed_links_extra', 3);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
?>
