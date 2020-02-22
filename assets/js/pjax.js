(function ($) {
  var loadFiles = {
    js: [],
    css: []
  };
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

  function loadJs(file) {
    var footer = $("footer").remove("script[role='reload']");
    $("<scri" + "pt>" + "</scr" + "ipt>").attr({ role: 'reload', src: file, type: 'text/javascript' }).appendTo(footer);
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
  })
  $(document).on('pjax:start', function () {
    $('body').addClass('overflow-hidden');
    $('.pjax-loading-wrapper').fadeIn();
  });
  $(document).on('pjax:end', function () {
    $('body').removeClass('overflow-hidden');
    $('.pjax-loading-wrapper').fadeOut('slow');
  });
})(jQuery);
window.onload = function () {
  console.log('已经动态加载资源：', loadFiles);
};
var loadFiles = {
  js: [],
  css: []
};
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