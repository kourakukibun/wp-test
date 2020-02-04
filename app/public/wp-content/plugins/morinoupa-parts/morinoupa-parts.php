<?php
/*
  Plugin Name: Morinoupa-Parts
  Plugin URI:
  Description: 標準パーツカスタマイズ
  Version: 1.0.0
  Author: Mori Tomohide
  Author URI: http://web.morinoupa.jp/
  License: GPLv2

  Morinoupa-Parts is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  any later version.

  Morinoupa-Parts is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with Morinoupa-Parts. If not, see {URI to Plugin License}.
 */

class mu_MorinoupaParts {
  static function init() {
    return new self();
  }

  function __construct() {
    if (is_admin() && is_user_logged_in()) {
      // メニュー追加
      add_action('admin_menu', [$this, 'set_plugin_menu']);
    }
  }

  function set_plugin_menu() {
    add_menu_page(
      'MorinoupaParts',
      'MorinoupaParts',
      'manage_options',
      'mu_setting',
      [$this, 'show_about_plugin'],
      'dashicons-hammer',
      99
    );
  }

  function show_about_plugin() {
      $html = "<h1>標準パーツカスタマイズ</h1>";
      $html .= "<p>.mu_custom_xxxxx</p>";
      echo $html;
  }
} // END of mu_MorinoupaParts
add_action('init', 'mu_MorinoupaParts::init');

// js/css読み込み
function myplugin_load() {
  wp_enqueue_script('myplugin_js', plugins_url('js/app.js', __FILE__ ), array('jquery'), '1.0', true);
  wp_register_style('myplugin_css', plugins_url('css/common.css', __FILE__));
  wp_enqueue_style('myplugin_css');
}
add_action('wp_enqueue_scripts', 'myplugin_load');
?>
