var postUrl = location.protocol + '//' + location.host + location.pathname;// 获取文章路径
// 这一步是子评论的监控回复按钮事件 回复的BUTTON添加onclick属性
const replyMsg = (id, author) => {
  const tmp = id.replace("comment-", "");
  $("#veditor").focus();
  $('html,body').animate({scrollTop:$('.blog-post-comments').offset().top-70}, 500);
  $("#veditor").attr("placeholder", "@" + author);
  $("#veditor").attr("parent", id);
  $("#comment-form").attr("action", postUrl + "/comment?parent=" + tmp);
};
// 依赖jquery,请自行加载
$(() => {
  // 监听评论表单提交
  $('#comment-form').submit(() => {
    let params = $('#comment-form').serialize();
    // 添加functions.php中定义的判断参数
    params += '&Ajax=comment';
    // 解析新评论并附加到评论列表
    const appendComment = (comment) => {
      // 评论列表
      let el = $('.comment-list');
      if (comment.parent !== 0) {
        // 子评论则重新定位评论列表
        el = $('#comment-' + comment.parent);
        // 父评论不存在子评论时
        if (el.find('.comment-list').length < 1) {
          $('<ol class="comment-list" id="parent-' + comment.parent +'"></ol>').appendTo(el);
        }
        el = el.find('#parent-' + comment.parent);
      }
      if (el.length === 0) {
        $('<div class="vlist"><div class="vcard"></div><ol class="comment-list"></ol></div>').appendTo($('#comments'));
        el = $('#comments > .comment-list');
      }
      // 评论html模板，根据具体主题定制
      let html = '<div class="vlist" id="comment-{coid}"><div class="vcard" id="c-{coid}"><img class="vimg" src="{avatar}"><div class="vh"><div class="vhead"><span class="vnick"><a href="{url}" rel="external nofollow">{author}</a></span><span class="vsys">{browser}</span>&nbsp;<span class="vsys">{os}</span></div><div class="vmeta"><span class="vtime">{datetime}</span><span class="vat"><a href="javascript:void(0);" onclick="replyMsg(\'{coid}\',\'{author}\')">回复</a></span></div><div class="vcontent">{content}</div></div></div></div>\n';
      if ($("#veditor").attr("parent") !== null) {
        html = '<div class="vlist" id="comment-{coid}"><div class="vcard" id="c-{coid}"><img class="vimg" src="{avatar}"><div class="vh"><div class="vhead"><span class="vnick"><a href="{url}" rel="external nofollow">{author}</a></span><span class="vsys">{browser}</span>&nbsp;<span class="vsys">{os}</span></div><div class="vmeta"><span class="vtime">{datetime}</span><span class="vat"><a href="javascript:void(0);" onclick="replyMsg(\'{coid}\',\'{author}\')">回复</a></span></div><div class="vcontent"><p><a href="#comment-{parent}">@{author}</a> {content}</p></div></div></div></div>\n';
      }
      $.each(comment, (k, v) => {
        regExp = new RegExp('{' + k + '}', 'g');
        html = html.replace(regExp, v);
      });
      $(html).appendTo(el);
    };
    // ajax提交评论
    $.ajax({
      url: $("#comment-form").attr("action"),
      type: 'POST',
      data: params,
      dataType: 'json',
      beforeSend: () => {
        $('#comment-form').find('.vsubmit').addClass('loading').html('<i class="icon icon-loading icon-pulse"></i> 提交中...').attr('disabled', 'disabled');
      },
      complete: () => {
        $('#comment-form').find('.vsubmit').removeClass('loading').html('提交评论').removeAttr('disabled');
      },
      success: (result) => {
        if (result.status === 1) {
          // 新评论附加到评论列表
          appendComment(result.comment);
          $('#comment-form').find('textarea').val('');
        } else {
          // 提醒错误消息
          alert(undefined === result.msg ? '评论出错' : result.msg);
        }
      },
      error: (xhr, ajaxOptions, thrownError) => {
        alert('评论失败，请重试');
      }
    });
    return false;
  });
});