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

?>
