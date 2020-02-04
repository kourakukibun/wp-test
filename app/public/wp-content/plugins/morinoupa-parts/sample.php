<?php

  function mu_MorinoupaParts() {

    const VERSION = '1.0.0';
    const PLUGIN_ID = 'morinoupa-gallery';
    const CREDENTIAL_ACTION = self::PLUGIN_ID . '-nonce-action';
    const CREDENTIAL_NAME = self::PLUGIN_ID . '-nonce-key';
    const PLUGIN_DB_PREFIX = self::PLUGIN_ID . '_';
    const CONFIG_MENU_SLUG  = self::PLUGIN_ID . '-config';

    static function init() {
      return new self();
    }

    function __construct() {
      if (is_admin() && is_user_logged_in()) {
        // メニュー追加
        add_action('admin_menu', [$this, 'set_plugin_menu']);
        add_action('admin_menu', [$this, 'set_plugin_sub_menu']);
      }
    }

    function set_plugin_menu() {
      add_menu_page(
        'もりのうぱギャラリー', /* ページタイトル*/
        'もりのうぱギャラリー', /* メニュータイトル */
        'manage_options', /* 権限 */
        'morinoupa-gallery', /* ページを開いたときのURL */
        [$this, 'show_about_plugin'], /* メニューに紐づく画面を描画するcallback関数 */
        'dashicons-format-gallery', /* アイコン see: https://developer.wordpress.org/resource/dashicons/#awards */
        99 /* 表示位置のオフセット */
      );
    }

    function set_plugin_sub_menu() {
      add_submenu_page(
      'morinoupa-gallery', /* 親メニューのslug */
      '設定',
      '設定',
      'manage_options',
      'morinoupa-config',
      [$this, 'show_config_form']);
    }

    function show_about_plugin() {
      $html = '<h1>もりのうぱギャラリー</h1>';
      $html .= '<p>標準ギャラリーをスライダー式ギャラリーで表示します。</p>';
      echo $html;
    }

    function show_config_form() {
      $title = get_option(self::PLUGIN_DB_PREFIX . "_title");
?>
<div class="wrap">
<h1>もりのうぱギャラリーの設定</h1>

<form action="" method='post' id="my-submenu-form">
<?php // ②：nonceの設定 ?>
<?php wp_nonce_field(self::CREDENTIAL_ACTION, self::CREDENTIAL_NAME) ?>

<p>
<label for="title">タイトル：</label>
<input type="text" name="title" value="<?= $title ?>"/>
</p>

<p><input type='submit' value='保存' class='button button-primary button-large'></p>
</form>
</div>
<?php
    }
