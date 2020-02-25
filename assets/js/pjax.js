var loadFiles = {
  js: [],
  css: []
};
(function ($) {
  function getBaseUrl() {
    var ishttps = 'https:' == document.location.protocol ? true : false;
    var url = window.location.host;
    if (ishttps) {
      url = 'https://' + url;
    } else {
      url = 'http://' + url;
    }
    return url;
  }

  /**
   * 动态加载JS文件的方法
   * Load javascript file method
   *
   * @param {String}   fileName              JS文件名
   * @param {Function} [callback=function()] 加载成功后执行的回调函数
   * @param {String}   [into='head']         嵌入页面的位置
   */
  function loadScript(fileName, callback, into) {
    into = into || 'body';
    callback = callback || function () {
    };
    var script = null;
    script = document.createElement('script');
    script.type = 'text/javascript';
    script.src = fileName;
    script.onload = function () {
      loadFiles.js.push(fileName);
      callback();
    };
    if (into === 'head') {
      document.getElementsByTagName('head')[0].appendChild(script);
    } else {
      document.body.appendChild(script);
    }
  }

  /**
   * 动态加载CSS文件的方法
   * Load css file method
   *
   * @param {String}   fileName              CSS文件名
   * @param {Function} [callback=function()] 加载成功后执行的回调函数
   * @param {String}   [into='head']         嵌入页面的位置
   */
  function loadCSS(fileName, callback, into) {
    into = into || 'head';
    callback = callback || function () {
    };

    var css = document.createElement('link');
    css.type = 'text/css';
    css.rel = 'stylesheet';
    css.onload = css.onreadystatechange = function () {
      loadFiles.css.push(fileName);
      callback();
    };
    css.href = fileName;
    if (into === 'head') {
      document.getElementsByTagName('head')[0].appendChild(css);
    } else {
      document.body.appendChild(css);
    }
  }

  let url = '"' + getBaseUrl() + '"';
  $(document).pjax('a[href^=' + url + ']:not(a[target="_blank"], a[no-pjax])', {
    container: '#pjax',
    fragment: '#pjax',
    timeout: 8000
  });
  $(document).on('pjax:send', function () {
    $('body').addClass('overflow-hidden');
    $('.pjax-loading-wrapper').fadeIn();
  });
  $(document).on('pjax:complete', function () {
    $('.site-wrapper').removeClass('toggled');
    $('.sidebar-container').removeClass('boxshadow-right');
    $('.global-modal').remove();
    $('.site-tooltip-wrapper').remove();
    $('.site-popover-wrapper').remove();
    $('body').removeClass('overflow-hidden');
    setTimeout(() => {
      $('.pjax-loading-wrapper').fadeOut('slow');
    }, 800);
    if (checkValine === 1) {
      loadScript('//cdn.jsdelivr.net/npm/leancloud-storage/dist/av-min.js', function () {
        loadScript(
          'https://cdn.jsdelivr.net/npm/valine/dist/Valine.min.js',
          function () {
            if (document.getElementById('vcomments') !== null) {
              new Valine({
                el: '#vcomments',
                appId: '<?php $this->options->APPID()?>',
                appKey: '<?php $this->options->APPKEY()?>',
                notify: true,
                verify: true,
                avatar: 'mm',
                visitor: true, // 文章访问量统计
                highlight: true, // 代码高亮
                recordIP: true, // 是否记录评论者IP
                placeholder: '人生在世，错别字在所难免，无需纠正。'
              });
            }
          }
        );
      });
    }
    // 自定义脚本回调
    if (typeof window.ga !== 'undefined') window.ga('send', 'pageview', window.location.pathname + window.location.search);
    if (typeof window._hmt !== 'undefined') window._hmt.push(['_trackPageview', window.location.pathname + window.location.search]);
    loadScript("https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js");
    loadScript("https://cdn.jsdelivr.net/npm/scrollreveal@4.0.5/dist/scrollreveal.min.js");
    loadScript(bundle);
    loadCSS(styleCss);
    loadCSS(stylesCss);
  });
  loadScript("https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js");
  loadScript("https://cdn.jsdelivr.net/npm/scrollreveal@4.0.5/dist/scrollreveal.min.js");
  loadScript(bundle);
  loadCSS(styleCss);
  loadCSS(stylesCss);
})(jQuery);
window.onload = function () {
  console.log('已经动态加载资源：', loadFiles);
};