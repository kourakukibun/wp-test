(function(global) {
  'use strict';

  /**
   * デバイス判別
   * @constructor
   */
  function Device(userAgent) {
    this.userAgent = userAgent;
  }

  Device.prototype.getPlatformClass = function () {
    var ua = this.userAgent;
    switch (true) {
    case /Windows/.test(ua): return 'win';
    case /Android/.test(ua): return 'android';
    case /iPhone|iPad/.test(ua): return 'ios';
    case /Mac OS X/.test(ua): return 'mac';
    }
    return '';
  };

  Device.prototype.getPlatformAndroidOldClass = function () {
    var ua = this.userAgent;
    if (ua.indexOf('Android') > 0 ) {
      var version = parseFloat(ua.slice(ua.indexOf('Android')+8));

      if (version < 4.4) {
        return 'android-old';
      } else {
        return '';
      }

    } else {
      return '';
    }
  };

  Device.prototype.getBrowserClass = function () {
    var ua = this.userAgent;
    switch (true) {
    case /Edge/.test(ua): return 'edge';
    case /Chrome/.test(ua): return 'chrome';
    case /Firefox/.test(ua): return 'firefox';
    case /MSIE|Trident/.test(ua): return 'ie';
    case /Silk\//.test(ua): return 'aosp';
    case /CriOS/.test(ua): return 'chrome';
    case /Safari\//.test(ua): return 'safari';
    }
    return '';
  };

  Device.prototype.getIeVersionClass = function () {
    var ua = this.userAgent;
    switch (true) {
    case /Trident\/.*rv:11/.test(ua): return 'ie11';
    case /MSIE 10\./.test(ua): return 'ie10';
    case /MSIE 9\./.test(ua): return 'ie9';
    case /MSIE 8\./.test(ua): return 'ie8';
    }
    return '';
  };

  /**
   * デバイス種別により異なるクラスを取得
   * @return {String} is-tablet is-mobile is-pc のいずれか
   */
  Device.prototype.getKindOfDeviceClass = function () {
    switch (true) {
    case this.isTablet(): return 'is-tablet';
    case this.isMobile(): return 'is-mobile';
    }
    return 'is-pc';
  };

  Device.prototype.isTablet = function () {
    return this.isWindowsTablet()
      || this.isIpad()
      || this.isAndroidTablet()
      || this.isKindle();
  };

  Device.prototype.isMobile = function () {
    return this.isWindowsPhone()
      || this.isIphone()
      || this.isAndroidMobile()
      || this.isFirefoxMobile()
      || this.isBlackBerry();
  };

  Device.prototype.isWindowsTablet = function () {
    return /Windows/.test(this.userAgent) && /Touch/.test(this.userAgent);
  };

  Device.prototype.isIpad = function () {
    return /iPad/.test(this.userAgent);
  };

  Device.prototype.isAndroidTablet = function () {
    return /Android/.test(this.userAgent) && (! /Mobile/.test(this.userAgent));
  };

  Device.prototype.isKindle = function () {
    return /Android/.test(this.userAgent) && /Silk/.test(this.userAgent);
  };

  Device.prototype.isWindowsPhone = function () {
    return /Windows Phone/.test(this.userAgent);
  };

  Device.prototype.isIphone = function () {
    return /iPhone/.test(this.userAgent);
  };

  Device.prototype.isAndroidMobile = function () {
    return /Android/.test(this.userAgent) && /Mobile/.test(this.userAgent);
  };

  Device.prototype.isFirefoxMobile = function () {
    return /Firefox/.test(this.userAgent) && /Android/.test(this.userAgent);
  };

  Device.prototype.isBlackBerry = function () {
    return /BlackBerry/.test(this.userAgent);
  };

  Device.prototype.getAllClasses = function (defaultClass) {
    var classes = [],
      os = this.getPlatformClass(),
      browser = this.getBrowserClass(),
      androidOld = this.getPlatformAndroidOldClass(),
      ieVersion = this.getIeVersionClass(),
      device = this.getKindOfDeviceClass();

    if (typeof defaultClass !== 'undefined') {
      classes.push(defaultClass);
    }
    if (os !== '') {
      classes.push(os);
    }
    if (androidOld !== '') {
      classes.push(androidOld);
    }
    if (browser !== '') {
      classes.push(browser);
    }
    if (ieVersion !== '') {
      classes.push(ieVersion);
    }
    if (device !== '') {
      classes.push(device);
    }
    return classes.join(' ');
  };

  /**
   * タブレット時のviewportを指定
   * @param obj
   */
  Device.prototype.setTabletViewport = function() {
    // 指定するviewportの幅
    let tabletViewPort = document.createElement('meta');
    tabletViewPort.setAttribute('name', 'viewport');
    tabletViewPort.setAttribute('content', 'width=1300');
    document.head.appendChild(tabletViewPort);
  };

  // Exports (外部から使えるようにするイディオム)
  if ('process' in global) {
    module['exports'] = Device;
  }
  global['Device'] = Device;

})((window || 0).self || global);

/* global Device */
(function (window, $) {
  'use strict';

  // Set Namespace
  var APP = window.APP = window.APP || {};

  // メディアクエリ（CSS定義）
  APP.mqSp = window.matchMedia('(max-width: 767px)');
  APP.mqPc = window.matchMedia('(min-width: 768px)');
  APP.mqTb = window.matchMedia('(min-width: 768px) and (max-width: 1200px)');

  // SPメニューボタン設定
  APP.SetSpHeaderBtn = function ($elm) {
    var that = this;
    that.$elm = $elm;
    that.$body = $('body');
    that.$wrapper = $('.l-wrapper');
    that.$header = $('.l-header-menu-inner');
    that.$target = $('.l-header-nav');
    that.$closeBtn = $('.l-header-close-btn');
    that.MENUOPEN = 'is-menu-open';
    that.topPos = 0;
    that.isOpen = false;

    that.$elm.on('click', function () {
      that.changeStatus();
    });

    that.$closeBtn.on('click', function () {
      that.close();
      that.isOpen = !that.isOpen;
    });
  };
  APP.SetSpHeaderBtn.prototype = {
    changeStatus: function () {
      var that = this;
      if (that.isOpen) {
        that.close();
      } else {
        that.open();
      }
      that.isOpen = !that.isOpen;
    },
    close: function () {
      var that = this;

      that.$body.removeClass(that.MENUOPEN);
      that.$wrapper.css({
        'top': 0
      });
      $('html, body').prop({scrollTop: that.topPos});
    },
    open: function () {
      var that = this;

      that.topPos = $(window).scrollTop();
      that.$body.addClass(that.MENUOPEN);
      that.$wrapper.css({
        'top': -(that.topPos)
      });

      that.$header.animate({
        scrollTop: 0
      }, 0);
    }
  };

  // アコーディオン
  APP.SetAc = function($elm) {
    var that = this;
    that.$elm = $elm;
    that.$trigger = $elm.find('.mod-ac-trigger');
    that.$target = $elm.find('.mod-ac-target');
    that.ACTIVE = 'is-active';

    that.$trigger.on('click', function() {
      if ($elm.hasClass(that.ACTIVE)) {
        $elm.removeClass(that.ACTIVE);
        that.$target.slideUp(500, 'swing');
      } else {
        $elm.addClass(that.ACTIVE);
        that.$target.slideDown(500, 'swing');
      }
    });
  };

  // スクロールイベント（ページトップ）
  APP.SetPageTop = function($elm) {
    var that = this;
    that.$elm = $elm;
    that.$body = $('body');
    that.$footer = $('.l-footer');
    that.scr = $(window).scrollTop();
    that.winH = $(window).height();
    that.maxH = 0;

    $(window).on('load resize scroll', function() {
      that.update();
    });
  };
  APP.SetPageTop.prototype = {
    update: function() {
      var that = this;

      that.scr = $(window).scrollTop();
      that.winH = $(window).height();
      that.maxH = that.$footer.offset().top - that.winH;
      if (that.scr >= that.maxH) {
        if ($(window).height() < that.$body.height()-that.$footer.outerHeight()) {
          that.$body.addClass('is-pagetop-fixed');
          that.$elm.css({'bottom': that.$footer.outerHeight() + 20 +'px'});
        }
      } else if (that.scr > that.winH/2 && that.scr < that.maxH) {
        that.$body.addClass('is-pagetop-active').removeClass('is-pagetop-fixed');
        that.$elm.removeAttr('style');
      } else {
        that.$body.removeClass('is-pagetop-active is-pagetop-fixed');
        that.$elm.removeAttr('style');
      }
    }
  };

  APP.SetGallery = function ($elm, idx) {
    var that = this;
    that.$elm = $elm;
    that.idx = idx;
    that.$for = $elm.find('.blocks-gallery-grid');
    that.$forItem = that.$for.find('.blocks-gallery-item');
    that.$forLink = that.$for.find('a');
    that.$nav = $('<div class="blocks-gallery-nav">').appendTo($elm);
    that.$navInner = $('<div class="blocks-gallery-nav-inner">').appendTo(that.$nav);
    that.CURRENT = 'is-current';
    that.ACTIVE = 'is-active';
    that.CLOSE = 'is-close';

    that.$forItem.each(function() {
      var src = $(this).find('img').attr('src');
      $(this).css({
        background: 'url(' + src + ') no-repeat 50% 50%',
        'background-size': 'cover'
      });
      $(this).find('img').css({
        visibility: 'hidden',
        width: '100%',
        height: '100%'
      });
      var $navItem = $('<div class="blocks-gallery-nav-item">').appendTo(that.$navInner);
      $('<div class="blocks-gallery-nav-image">').appendTo($navItem).css({
        background: 'url(' + src + ') no-repeat 50% 50%',
        'background-size': 'cover'
      });
    });

    that.$navItem = that.$nav.find('.blocks-gallery-nav-item');

    that.$navItem.each(function (index) {
      $(this).attr('data-index', index);
    });

    that.$for.on('init', function () {
      var index = that.$for.find('.blocks-gallery-item.slick-slide.slick-current').attr('data-slick-index');
      that.setNavSlide(index);
    });

    that.$for.slick({
      prevArrow: '<button type="button" class="slick-prev"><span class="fas fa-angle-left"></span><span class="sr-only">前へ</span></button>',
      nextArrow: '<button type="button" class="slick-next"><span class="fas fa-angle-right"></span><span class="sr-only">次へ</span></button>'
    });

    that.$navItem.on('click', function () {
      var index = $(this).data('index');
      that.setForSlide(index);
    });

    that.$for.on('beforeChange', function (event, slick, currentSlide, nextSlide) {
      that.$elm.find('.blocks-gallery-nav-item').removeClass(that.CURRENT);
      that.setNavSlide(nextSlide);
    });


    if (that.$forLink.length) {
      that.modalId = 'modal-' + that.idx;

      that.$modal = $('<div id="' + that.modalId + '" class="mod-gallery-modal"></div>').appendTo('body');
      that.$modalInner = $('<div class="mod-gallery-modal-inner"></div>').appendTo(that.$modal);
      that.$modalPrev = $('<a href="javascript:void(0)" class="mod-gallery-modal-arrow prev" title="prev"><span class="fas fa-angle-left"></span><span class="sr-only">前へ</span></a>').appendTo(that.$modal);
      that.$modalNext = $('<a href="javascript:void(0)" class="mod-gallery-modal-arrow next" title="next"><span class="fas fa-angle-right"></span><span class="sr-only">次へ</span></a>').appendTo(that.$modal);
      that.$modalClose = $('<a href="javascript:void(0)" class="mod-gallery-modal-close" title="close"><span class="fas fa-times"></span><span class="sr-only">閉じる</span></a>').appendTo(that.$modal);
      that.$forLink.each(function () {
        that.$modalInner.append('<div class="mod-gallery-modal-item"><img src="' + $(this).children().attr('src') + '" alt=""></div>');
      });
      that.$modalItems = that.$modalInner.find('.mod-gallery-modal-item');
      that.$targetModal = $('#' + that.modalId);

      that.$forLink.on('click', function (e) {
        e.preventDefault();
        that.modalIndex = parseInt($(this).parents('.blocks-gallery-item').data('slick-index'));
        that.$targetModal.addClass(that.ACTIVE);
        that.setModalSlide(that.modalIndex);
      });

      that.$modal.on('click', function () {
        if (!$(event.target).closest('.mod-gallery-modal-item img').length && !$(event.target).closest('.mod-gallery-modal-arrow').length && !$(event.target).closest('.mod-gallery-modal-close').length) {
          that.modalClose();
        }
      });
      that.$modalPrev.on('click', function () {
        that.$modalItems.removeClass(that.ACTIVE);
        that.modalIndex--;
        if (that.modalIndex < 0) {
          that.modalIndex = that.$modalItems.length - 1;
        }
        that.setModalSlide(that.modalIndex);
        that.setForSlide(that.modalIndex);
        that.setNavSlide(that.modalIndex);
      });
      that.$modalNext.on('click', function () {
        that.$modalItems.removeClass(that.ACTIVE);
        that.modalIndex++;
        if (that.modalIndex >= that.$modalItems.length) {
          that.modalIndex = 0;
        }
        that.setModalSlide(that.modalIndex);
        that.setForSlide(that.modalIndex);
        that.setNavSlide(that.modalIndex);
      });
      that.$modalClose.on('click', function () {
        that.modalClose();
      });
    }
  };
  APP.SetGallery.prototype = {
    setForSlide: function (index) {
      var that = this;
      that.$for.slick('slickGoTo', index, false);
    },
    setNavSlide: function (index) {
      var that = this;
      that.$nav.find('.blocks-gallery-nav-item[data-index="' + index + '"]').addClass(that.CURRENT);
    },
    modalClose: function () {
      var that = this;
      that.$targetModal.addClass(that.CLOSE);
      that.$modalInner.find('.mod-gallery-modal-item').removeClass(that.ACTIVE);
      setTimeout(function () {
        that.$targetModal.removeClass(that.ACTIVE + ' ' + that.CLOSE);
      }, 310);
    },
    setModalSlide: function () {
      var that = this;
      that.$modalInner.find('.mod-gallery-modal-item').eq(that.modalIndex).addClass(that.ACTIVE);
    }
  };


  $(function () {
    var html = window.document.getElementsByTagName('html');
    // デバイス情報にもとづくクラス名をbodyに追加
    var device = new Device(navigator.userAgent);
    html[0].className = device.getAllClasses(html[0].className);

    if ($('html').hasClass('is-tablet')) {
      device.setTabletViewport();
    }

    // ギャラリー
    $('.wp-block-gallery').each(function (index) {
      new APP.SetGallery($(this), index);
    });

    // 画像背景置換
    $('.mod-img2bg').each(function() {
      var src = $(this).attr('src');
      $(this).parent().css({
        background: 'url('+src+') no-repeat 50% 50%',
        'background-size': 'cover'
      });
      $(this).css({
        visibility: 'hidden',
        width: '100%',
        height: '100%'
      });
    });

    // SP メニューボタン設定
    $('.mod-sp-menu').each(function () {
      APP.spmenu = new APP.SetSpHeaderBtn($(this));
    });

    // アコーディオン
    $('.mod-ac').each(function() {
      new APP.SetAc($(this));
    });

    // ページ内リンク
    var offset = 0;
    $('a[href^="#"]').on('click', function () {
      if (APP.mqSp.matches) {
        offset = $('.l-header').outerHeight();
      } else {
        offset = 80;
      }
      if (!$(this).hasClass('no-scroll')) {
        var href = $(this).attr('href');
        var $target = $(href === '#' || href === '' ? 'html' : href);
        $target.velocity('scroll', {
          duration: 500,
          easing: 'easeInOutQuad',
          offset: -(offset)
        });
        return false;
      }
    });

    // インスタ表示参考スクリプト（環境ごとに表示分け）
    // アクセストークンはインスタDevelopperサイトで取得。
    // 一部効率が良くないのでリファクタリングをお願いします。
    $('#instafeed').each(function() {
      var token = '';
      var numPhotos = 6; // 表示件数
      var container = document.getElementById('instafeed');
      var scrElement = document.createElement('script');
      var HONBAN = 'honban.c-brains.jp';
      var TEST = 'test.c-brains.jp';
      var LOCAL = 'localhost:3000';

      if (document.URL.match(HONBAN)) {
        token = 'honban.token';
      } else if (document.URL.match(TEST)) {
        token = 'test.token';
      } else if (document.URL.match(LOCAL)) {
        token = 'local.token';
      }

      window.processResult = function( data ) {
        for ( var x in data.data ) {
          container.innerHTML += '<li><a href="'+ data.data[x].link +'" target="_blank"><img src="' + data.data[x].images.low_resolution.url + '"></a></li>';
        }
      };

      scrElement.setAttribute( 'src', 'https://api.instagram.com/v1/users/self/media/recent?access_token=' + token + '&count=' + numPhotos + '&callback=processResult' );
      document.body.appendChild( scrElement );
    });

    // スクロールイベント（ページトップ）
    $('.mod-pagetop').each(function() {
      new APP.SetPageTop($(this));
    });

  });
})(window, jQuery);
