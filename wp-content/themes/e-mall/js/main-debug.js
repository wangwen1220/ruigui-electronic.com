////////////////////////////////////////////////////////////////////////////////
// 名称: 主程序
// 作者: Steven
// 说明: Require Zepto
// 更新: 2014-8-1
////////////////////////////////////////////////////////////////////////////////

// Main
(function($) {
  // Helpers
  var isIE6 = !!window.ActiveXObject && !window.XMLHttpRequest;

  var isString = function(val) {
    return Object.prototype.toString.call(val) === '[object String]';
  };

  var $id = function(id) {
    // return 'string' === typeof id ? document.getElementById(id) : id;
    return isString(id) ? document.getElementById(id) : id;
  };

  // It will work if an element is hidden inside a scroll-able container.
  var visibleY = function(el) {
    var top = el.getBoundingClientRect().top;
    var rect;
    el = el.parentNode;

    do {
      rect = el.getBoundingClientRect();
      if (top <= rect.bottom === false)
        return false;
      el = el.parentNode;
    } while (el != document.body);

    // Check its within the document viewport
    return top <= document.documentElement.clientHeight;
  };

  // 更好的解决方案
  var getViewportSize = function(w) {
    w = w || window;
    var d = w.document;

    if (w.innerWidth !== null) return {
      w: w.innerWidth,
      h: w.innerHeight
    };

    if (document.compatMode === 'CSS1Compat') {
      return {
        w: d.documentElement.clientWidth,
        h: d.documentElement.clientHeight
      };
    }

    return {
      w: d.body.clientWidth,
      h: d.body.clientWidth
    };
  };

  var isViewportVisible = function(el) {
    var box = el.getBoundingClientRect();
    var height = box.height || (box.bottom - box.top);
    var width = box.width || (box.right - box.left);
    var viewport = getViewportSize();

    if (!height || !width) return false;
    if (box.top > viewport.h || box.bottom < 0) return false;
    if (box.right < 0 || box.left > viewport.w) return false;
    return true;
  };

  // 分享到
  var shareTo = function(site, title, content, imgsrc) {
    var url = window.location.href.split('#')[0];
    title = title || document.title;
    content = content || $('meta[name=description]')[0].content;
    imgsrc = imgsrc || $(this).data('src') || '';

    url = encodeURIComponent(url);
    title = encodeURIComponent(title);
    content = encodeURIComponent(content);
    imgsrc = encodeURIComponent(imgsrc);

    switch (site) {
      case 'blogger':
        url = 'http://www.blogger.com/blog_this.pyra?t=' + title + '&u=' + url;
        break;
      case 'linkedin':
        url = 'http://www.linkedin.com/cws/share?url=' + url + '&title=' + title;
        break;
      case 'delicious':
        url = 'http://www.delicious.com/post?title=' + title + '&url=' + url;
        break;
      case 'digg':
        url = 'http://digg.com/submit?phase=2&url=' + url + '&title=' + title + '&bodytext=' + content + '&topic=tech_deals';
        break;
      case 'reddit':
        url = 'http://reddit.com/submit?url=' + url + '&title=' + title;
        break;
      case 'furl':
        url = 'http://www.furl.net/savedialog.jsp?t=' + title + '&u=' + url;
        break;
      case 'rawsugar':
        url = 'http://www.rawsugar.com/home/extensiontagit/?turl=' + url + '&tttl=' + title;
        break;
      case 'stumbleupon':
        url = 'http://www.stumbleupon.com/submit?url=' + url + '&title=' + title;
        break;
      case 'blogmarks':
        break;
      case 'facebook':
        url = 'http://www.facebook.com/share.php?src=bm&v=4&u=' + url + '&t=' + title;
        break;
      case 'technorati':
        url = 'http://technorati.com/faves?sub=favthis&add=' + url;
        break;
      case 'spurl':
        url = 'http://www.spurl.net/spurl.php?v=3&title=' + title + '&url=' + url;
        break;
      case 'simpy':
        url = 'http://www.simpy.com/simpy/LinkAdd.do?title=' + title + '&href=' + url;
        break;
      case 'ask':
        break;
      case 'google':
        url = 'http://www.google.com/bookmarks/mark?op=edit&output=popup&bkmk=' + url + '&title=' + title;
        break;
      case 'netscape':
        url = 'http://www.netscape.com/submit/?U=' + url + '&T=' + title + '&C=' + content;
        break;
      case 'slashdot':
        url = 'http://slashdot.org/bookmark.pl?url=' + url + '&title=' + title;
        break;
      case 'backflip':
        url = 'http://www.backflip.com/add_page_pop.ihtml?title=' + title + '&url=' + url;
        break;
      case 'bluedot':
        url = 'http://bluedot.us/Authoring.aspx?u=' + url + '&t=' + title;
        break;
      case 'kaboodle':
        url = 'http://www.kaboodle.com/za/selectpage?p_pop=false&pa=url&u=' + url;
        break;
      case 'squidoo':
        url = 'http://www.squidoo.com/lensmaster/bookmark?' + url;
        break;
      case 'twitter':
        url = 'http://twitter.com/share?url=' + url + '&text=' + title;
        break;
      case 'pinterest':
        url = 'http://pinterest.com/pin/create/button/?url=' + url + '&media=' + imgsrc + '&description=' + title;
        break;
      case 'vk':
        url = 'http://vk.com/share.php?url=' + url;
        break;
      case 'bluedot':
        url = 'http://blinkbits.com/bookmarklets/save.php?v=1&source_url=' + url + '&title=' + title;
        break;
      case 'blinkList':
        url = 'http://blinkbits.com/bookmarklets/save.php?v=1&source_url=' + url + '&title=' + title;
        break;
      case 'googleplus':
        url = 'https://plus.google.com/share?url=' + url + '&t=' + title;
        break;
      default:
        // alert('This share undefined!');
        return;
    }

    window.open(url, 'sharewindow');
  };

  // 文档加载完执行
  $(function() {
    // 通用变量
    var $html = $('html');
    var $header = $('#header');
    var $search = $('#search');
    var $main = $('#main');
    var $mask = $('#mask');
    var $cats = $('#categories');
    var $cart = $('#cart');
    var $loading = $('#js-loading');

    // use fastclick
    // FastClick.attach(document.body);
    if (typeof FastClick !== 'undefined' && typeof document.body !== 'undefined') {
      FastClick.attach(document.body);
    }

    // Global: 搜索
    $search.data('$hidden', $search.find('.js-hide'))
      .on('focusin click', '.js-key', function() {
        // console.log('msg');
        if ($main.hasClass('js-hide')) {
          return;
        }

        this.focus();
        this.value = '';
        $search.siblings().addClass('js-hide');
        $search.data('$hidden').removeClass('js-hide');
        $search.find('.search-hot').hide();
      })
      .on('click', '.js-cancel', function() {
        $search.find('.js-key').val('');
        $search.find('.js-keylist').empty();
        $search.siblings().removeClass('js-hide');
        $search.data('$hidden').addClass('js-hide');
        $search.find('.search-hot').show();
      })
      .on('click', '.js-clear', function() {
        $search.find('.js-key').val('').focus();
        $search.find('.js-keylist').empty();
      })
      .on('keyup', '.js-key', function() {
        var url = $search.children('form').attr('action');
        var key = $.trim($search.find('.js-key').val());
        var $keylist = $search.find('.js-keylist');

        if (!key) {
          $search.find('.js-keylist').empty();
          return;
        }

        $.get(url, {
          key: key
        }, function(data) {
          var html = $.map(data, function(item, index) {
            return item.suggestion;
          }).join('');

          $keylist.html(html);
        }, 'json');
      });

    // Global: 底部搜索
    $('#search-footer').on('click', '.search-trigger', function() {
      // $search.find('.js-key').click();
      $search.find('.js-key').trigger('focusin');
    });

    // Home: 产品分类 Slider
    $cats.find('.slider').swipe({
      // startSlide: 2,
      // speed: 400,
      // auto: 3000,
      continuous: false,
      // disableScroll: false,
      // stopPropagation: false,
      callback: function(index, elem) {
        var $slider = $(elem.parentNode.parentNode);
        var $nav = $slider.next('.nav');
        var swipe = $slider.data('swipe');
        var length = swipe.getNumSlides();

        if (index === 0) {
          $nav.addClass('next').removeClass('prev');
        } else if (index === length - 1) {
          $nav.addClass('prev').removeClass('next');
        }
      },
      // transitionEnd: function(index, elem) {}
    });

    $cats.on('click', '.slider-wrap > .nav', function() {
      var $this = $(this);
      var swipe = $this.prev().data('swipe');

      swipe[$this.hasClass('next') ? 'next' : 'prev']();
    });

    // Home: 显示全部分类
    $cats.children('.viewmore').on('click', function() {
      var $ths = $(this);

      if ($ths.hasClass('unfold')) {
        $ths.text('All Categories').removeClass('unfold')
          // .prev().slideUp(500);
          .prev().addClass('js-hide');
      } else {
        $ths.text('Hide Up').addClass('unfold')
          // .prev().slideDown(1000);
          .prev().removeClass('js-hide');
      }
    });

    // Global: 购物车
    $cart.on('click', '.js-close', function(e) {
      // $(this.parentNode.parentNode).remove();
      $(this.parentNode).addClass('fold');

      return false;
    });

    // Home: 推荐产品 Slider
    $main.find('.js-slider').swipe({
      // startSlide: 2,
      // speed: 400,
      auto: 3000
        // continuous: false,
        // disableScroll: false,
        // stopPropagation: false,
        // callback: function(index, elem) {},
        // transitionEnd: function(index, elem) {}
    });

    // Search result: 展开/折叠联系信息
    $main.on('click', '.search-result .actions .fold', function() {
      $(this).parents('section').toggleClass('unfold');
    });

    // Search result: 加入购物车
    $main.on('click', '.search-result .actions .cart', function() {
      var $this = $(this);
      var url = $this.data('url');
      var $counter = $cart.find('.counter');
      var counter = parseInt($counter.text(), 10);

      if ($this.hasClass('added')) {
        $.getJSON(url, {
          action: 'del'
        }, function(data) {
          if (data.status === 'success') {
            $counter.text(--counter);
            $this.removeClass('added');
          }
        });
      } else {
        $.getJSON(url, {
          action: 'add'
        }, function(data) {
          if (data.status === 'success') {
            $counter.text(++counter);
            $this.addClass('added');
          }
        });
      }
      // $this.toggleClass('added');
    });

    // 标题前的 section
    $main.find('.search-result > .w-title').prev('section').addClass('nobd');

    // Search result: 下拉到指定元素显示时刷新
    if ($loading.length) {
      // loading 进度图标
      new Spinner({
        lines: 17, // The number of lines to draw
        length: 0, // The length of each line
        width: 3, // The line thickness
        radius: 5, // The radius of the inner circle
        corners: 0, // Corner roundness (0..1)
        rotate: 0, // The rotation offset
        direction: 1, // 1: clockwise, -1: counterclockwise
        color: '#555', // #rgb or #rrggbb or array of colors
        speed: 1, // Rounds per second
        trail: 100, // Afterglow percentage
        shadow: false, // Whether to render a shadow
        hwaccel: false, // Whether to use hardware acceleration
        className: 'spinner', // The CSS class to assign to the spinner
        zIndex: 0, // The z-index (defaults to 2000000000 or 2e9)
        top: '50%', // Top position relative to parent
        left: '50%' // Left position relative to parent
      }).spin($('<i/>').prependTo($loading)[0]);
      // return;

      template.config('escape', false);
      var render = template.compile($id('tpl-prolist').innerHTML);

      $(window).on('DOMContentLoaded load resize scroll', function() {
        var url = $loading.data('url');
        var page = $loading.data('page') || 1;
        var loading = $loading.data('loading') || false;

        if (isViewportVisible($loading[0]) && !loading) { // 进入视口且不在加载中
          // console.log('进入视口');
          $loading.data('loading', true);

          $.getJSON(url, {
            page: page
          }, function(data) {
            // console.log(data);
            // 给关键字添加标识
            // $.each(data.list, function(i, v) {
            //   var kws = v.keywords;
            //   if (kws) {
            //     // v.title = v.title.replace(kws, '<strong>' + kws + '</strong>');
            //     v.title = v.title.replace(new RegExp(kws, 'ig'), '<strong>$&</strong>');
            //   }
            //   console.log(v.title)
            // });

            // 如果没有更多产品
            if (data.status === 'nomore') $loading.hide();

            $loading.before(render(data)).data('page', ++page).data('loading', false);
          });
        }
      });

      // $loading.inViewport(function() {
      //   console.log('进入视口');
      //   var $loading = $(this);
      //   var url = $loading.data('url');
      //   var page = $loading.data('page') || 1;

      //   $.getJSON(url, {pagenum: page}, function(data) {
      //    var html;
      //    // console.log(data);
      //    if (data.length) {
      //       html = (function(data) { // 数据渲染
      //         var liArr = [];
      //         $.each(data, function() {
      //           liArr.push(this.html);
      //         });
      //         return liArr.join('');
      //       })(data);

      //       $loading.before(html).data('page', ++page);
      //     } else {
      //       $loading.remove();
      //     }

      //     // 如果加载按钮还在视口中
      //     // if ($loading.is(':visible')) {
      //     //   $loading.trigger('inview.scrollspy.amui');
      //     // }
      //   });
      // }, function(){
      //   console.log('离开视口');
      // });
    }

    // Details: 产品图片 Slider
    (function() {
      var $scroller = $('#js-scroller');

      if (!$scroller.length) return;

      var $list = $scroller.children('.list');
      var len = $list.children('.item').length;
      var width = $list.children('.item').width();
      var hammerScroller = new Hammer($list[0]);

      $list.width(width * len);

      hammerScroller.on('swipeleft', function(e) {
        var left = $list.position().left;
        // console.log(left / width);

        if (Math.abs(left / width) < len - 1) {
          $list.animate({
            translateX: left - width + 'px'
          }, 200, 'ease-in-out');
        }
      });

      hammerScroller.on('swiperight', function(e) {
        var left = $list.position().left;
        // console.log(left / width);

        if (Math.abs(left / width) > 0) {
          $list.animate({
            translateX: left + width + 'px'
          }, 200, 'ease-in-out');
        }
      });
    })();

    // document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false);
    // new IScroll('#js-scroller', {
    //   scrollX: true,
    //   scrollY: false,
    //   momentum: false,
    //   snap: true,
    //   scrollerWidth: 200,
    //   snapSpeed: 400
    //   // keyBindings: true,
    //   // indicators: {
    //   //   el: document.getElementById('indicator'),
    //   //   resize: false
    //   // }
    // });
    // $main.find('.js-slider-pics').swipe({
    //   // startSlide: 2,
    //   slideWidth: 220,
    //   // speed: 400,
    //   // auto: 3000
    //   continuous: false,
    //   // disableScroll: false,
    //   // stopPropagation: false,
    //   init: function(index, elem) {
    //     var $elem = $(elem);
    //     $elem.addClass('inview').siblings().removeClass('inview');
    //     $elem.next().addClass('inview');
    //     $elem.prev().addClass('inview');
    //   },
    //   callback: function(index, elem) {
    //     var $elem = $(elem);
    //     $elem.addClass('inview').siblings().removeClass('inview');
    //     $elem.next().addClass('inview');
    //     $elem.prev().addClass('inview');
    //   }
    //   // transitionEnd: function(index, elem) {}
    // });

    // Details: learn more
    $main.on('click', '.proshow .learn-more', function() {
      $(this).toggleClass('unfold').prev().toggleClass('js-hide');

      if (this.classList.contains('unfold')) {
        this.innerHTML = 'Hide up';
      } else {
        this.innerHTML = 'Learn More';
      }
    });

    // Details: 分享到
    $('#js-share').on('click', 'a', function() {
      shareTo(this.className);
    });

    // Details: Add to cart
    $('#contact-bar').on('click', '.cart', function() {
      var $this = $(this);
      var $counter = $cart.find('.counter');
      var counter = parseInt($counter.text(), 10);

      if ($this.hasClass('added')) {
        $counter.text(--counter);
        $this.removeClass('added');
      } else {
        $counter.text(++counter);
        $this.addClass('added');
      }
    }).on('click', '.addto-products', function() {
      var $this = $(this);
      var url = $this.data('url');

      if (!$this.hasClass('added')) {
        $.getJSON(url, {action: 'add'}, function(data) {
          if (data.status === 'success') {
            $this.addClass('added').text('In My Products');
          }
        });
        return false;
      }
    });

    // 设置文章字体大小
    // $('#js-setfont').on('tap', function(event) {
    //   event.preventDefault();
    //   var $ths = $(this);
    //   var $art = $('#js-art');
    //   var txt = $ths.text();

    //   if (txt === 'T小') {
    //     $art.css('font-size', '18px');
    //     $ths.text('T中');
    //   } else if (txt === 'T中') {
    //     $art.css('font-size', '20px');
    //     $ths.text('T大');
    //   } else if (txt === 'T大') {
    //     $art.css('font-size', '16px');
    //     $ths.text('T小');
    //   }
    // });

    // 返回顶部
    // $gotop.on('click', function(event) {
    //   window.scrollTo(0, 0);
    //   return false;
    //   // $('html, body').scrollTop(0);
    //   // $('html, body').animate({
    //   //   scrollTop: 0
    //   // }, 600);
    // });

    // 转到
    // $('.goto').click(function() {
    //   $('html, body').animate({
    //     scrollTop: $($(this).attr('href')).offset().top
    //   }, {
    //     duration: 500,
    //     easing: 'swing'
    //   });
    //   return false;
    // });
  });
})(window.Zepto || window.jQuery);