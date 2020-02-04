/* global Device */
(function (window, $) {
  'use strict';

  // Set Namespace
  var MUAPP = window.MUAPP = window.MUAPP || {};

  // メディアクエリ（CSS定義）
  MUAPP.mqSp = window.matchMedia('(max-width: 767px)');
  MUAPP.mqPc = window.matchMedia('(min-width: 768px)');
  MUAPP.mqTb = window.matchMedia('(min-width: 768px) and (max-width: 1200px)');

  $(function () {
    console.log('aaaa');
  });

})(window, jQuery);
