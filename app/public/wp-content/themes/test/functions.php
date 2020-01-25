<?php
function test_setup() {
   add_theme_support( 'post-thumbnails' );
   add_theme_support( 'menus');
}

add_image_size( 'home-thum', 300, 250, true );
add_action( 'after_setup_theme', 'test_setup' );

?>
