////////////////////////////////////////////////////////////////////////////////
// 名称: 主程序
// 作者: Steven
// 说明: Require headjs
// 更新: 2015-2-5
////////////////////////////////////////////////////////////////////////////////

// Main
(function(win, undefined) {
  // Helpers
  // var nav = win.navigator;
  // var loc = win.location;
  var doc = win.document;
  var html = doc.documentElement;

  // var isIE6 = navigator.userAgent.indexOf('MSIE 6.0') !== -1;
  // var isIE6 = !!window.ActiveXObject && !window.XMLHttpRequest;
  // var isIE10 = navigator.userAgent.indexOf('MSIE 10.0') !== -1;
  // var isIE11 = /\btrident\/[0-9].*rv[ :]11\.0/.test(navigator.userAgent);
  // var isIE678 = /\bMSIE [678]\.0\b/.test(navigator.userAgent);

  var isString = function(val) {
    return Object.prototype.toString.call(val) === '[object String]';
  };

  var $id = function(id) {
    // return 'string' === typeof id ? document.getElementById(id) : id;
    return isString(id) ? document.getElementById(id) : id;
  };

  // 加载脚本
  head.load(['js/jquery-1.11.2.js', 'js/jquery-easing.js', 'js/jquery-fullpage.js'], function() {
    // 通用变量
    // var $win = $(win);
    // var $html = $(html);
    var $header = $('#header');
    var $menu = $header.find('nav');
    var $main = $('#main');
    // var $panels = $main.children('.panel');

    // 设置全屏滚动
    $main.fullpage({
      // verticalCentered: false,
      sectionSelector: '.panel',
      // paddingTop: 113,
      menu: $menu,
      anchors: ['home', 'panel1', 'panel2', 'panel3', 'panel4'],
      navigation: true,
      navigationTooltips: ['首页', '惊喜一', '惊喜二', '惊喜三', '我要提意见'],
      afterRender: function(anchorLink, index) {
        // $header.addClass(anchorLink);
      },
      afterLoad: function(anchorLink, index) {
        $header.attr('rel', anchorLink);
        // if (index === 5) {
        //   $header.slideUp();
        // }
      },
      onLeave: function(index, nextIndex, direction) {
        $header.removeAttr('rel');
        if (nextIndex === 5) {
          $header.slideUp();
        }
        if (index === 5) {
          $header.slideDown();
        }
      }
    });
  });
})(window);