<?php
error_reporting(0);
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define('Spring_VERSION', '1.0.1');
define('__TYPECHO_GRAVATAR_PREFIX__', Helper::options()->Gravatar ? Helper::options()->Gravatar : '//cdn.v2ex.com/gravatar/');
require_once 'lib/Utils.php';
require_once 'lib/Comments.php';
if (!empty(Helper::options()->cdn)) {
  define('__TYPECHO_UPLOAD_URL__', $_SERVER['REQUEST_SCHEME'] . '://' . Helper::options()->cdn);
}
function themeConfig($form)
{
  echo '<script>var Spring_VERSION = "' . Spring_VERSION . '";</script>';
  ?>
  <style>form {
      position: relative;
      max-width: 100%
    }

    form input:not([type]), form input[type="date"], form input[type="datetime-local"], form input[type="email"], form input[type="number"], form input[type="password"], form input[type="search"], form input[type="tel"], form input[type="time"], form input[type="text"], form input[type="file"], form input[type="url"] {
      font-family: 'Lato', 'Helvetica Neue', Arial, Helvetica, sans-serif;
      margin: 0em;
      outline: none;
      -webkit-appearance: none;
      tap-highlight-color: rgba(255, 255, 255, 0);
      line-height: 1.21428571em;
      padding: 0.67857143em 1em;
      font-size: 1em;
      background: #FFFFFF;
      border: 1px solid rgba(34, 36, 38, 0.15);
      color: rgba(0, 0, 0, 0.87);
      border-radius: 0.28571429rem;
      -webkit-box-shadow: 0em 0em 0em 0em transparent inset;
      box-shadow: 0em 0em 0em 0em transparent inset;
      -webkit-transition: color 0.5s ease, border-color 0.5s ease;
      transition: color 0.5s ease, border-color 0.5s ease
    }

    form textarea {
      margin: 0em;
      -webkit-appearance: none;
      tap-highlight-color: rgba(255, 255, 255, 0);
      padding: 0.78571429em 1em;
      background: #FFFFFF;
      border: 1px solid rgba(34, 36, 38, 0.15);
      outline: none;
      color: rgba(0, 0, 0, 0.87);
      border-radius: 0.28571429rem;
      -webkit-box-shadow: 0em 0em 0em 0em transparent inset;
      box-shadow: 0em 0em 0em 0em transparent inset;
      -webkit-transition: color 0.1s ease, border-color 0.5s ease;
      transition: color 0.1s ease, border-color 0.5s ease;
      font-size: 1em;
      line-height: 1.2857;
      resize: vertical
    }

    form textarea:not([rows]) {
      height: 12em;
      min-height: 8em;
      max-height: 24em
    }

    form textarea, form input[type="checkbox"] {
      vertical-align: top
    }

    form textarea:focus, form input:focus {
      color: rgba(0, 0, 0, 0.95);
      border-color: #85B7D9;
      border-radius: 0.28571429rem;
      background: #FFFFFF;
      -webkit-box-shadow: 0px 0em 0em 0em rgba(34, 36, 38, 0.35) inset;
      box-shadow: 0px 0em 0em 0em rgba(34, 36, 38, 0.35) inset;
      -webkit-appearance: none
    }

    .tip {
      max-width: 100%;
      position: relative;
      min-height: 1em;
      margin: 0 10px;
      background: #F8F8F9;
      padding: 1em 1.5em;
      line-height: 1.4285em;
      color: rgba(0, 0, 0, 0.87);
      -webkit-transition: opacity 0.1s ease, color 0.1s ease, background 0.1s ease, -webkit-box-shadow 0.1s ease;
      transition: opacity 0.1s ease, color 0.1s ease, background 0.1s ease, -webkit-box-shadow 0.1s ease;
      transition: opacity 0.1s ease, color 0.1s ease, background 0.1s ease, box-shadow 0.1s ease;
      transition: opacity 0.1s ease, color 0.1s ease, background 0.1s ease, box-shadow 0.1s ease, -webkit-box-shadow 0.1s ease;
      border-radius: 0.28571429rem;
      -webkit-box-shadow: 0 0 0 1px rgba(34, 36, 38, .22) inset, 0 2px 4px 0 rgba(34, 36, 38, .12), 0 2px 10px 0 rgba(34, 36, 38, .15);
      box-shadow: 0 0 0 1px rgba(34, 36, 38, .22) inset, 0 2px 4px 0 rgba(34, 36, 38, .12), 0 2px 10px 0 rgba(34, 36, 38, .15)
    }

    .tip-header {
      text-align: center;
      margin: 10px auto 20px auto;
      color: #444;
      text-shadow: 0 0 2px #c2c2c2
    }

    .current-ver {
      position: relative;
      border-color: #b21e1e !important;
      background-color: #DB2828 !important;
      color: #FFF !important;
      left: -37px;
      padding-left: 1rem;
      border-bottom-right-radius: 5px;
      padding-right: 1.2em
    }

    .current-ver:after {
      position: absolute;
      content: '';
      top: 100%;
      left: 0;
      background-color: transparent !important;
      border-style: solid;
      border-width: 0 1.2em 1.2em 0;
      border-color: transparent;
      border-right-color: inherit;
      width: 0;
      height: 0
    }

    .btn.primary {
      cursor: pointer;
      display: inline-block;
      background: #E0E1E2 none;
      color: rgba(0, 0, 0, 0.6);
      padding: 0 1.5em;
      border-radius: 0.28571429rem;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
      outline: none;
      -webkit-transition: opacity 0.5s ease, background-color 0.5s ease, color 0.5s ease, background 0.5s ease, -webkit-box-shadow 0.5s ease;
      transition: opacity 0.5s ease, background-color 0.5s ease, color 0.5s ease, background 0.5s ease, -webkit-box-shadow 0.5s ease;
      transition: opacity 0.5s ease, background-color 0.5s ease, color 0.5s ease, box-shadow 0.5s ease, background 0.5s ease;
      transition: opacity 0.5s ease, background-color 0.5s ease, color 0.5s ease, box-shadow 0.5s ease, background 0.5s ease, -webkit-box-shadow 0.5s ease;
      -webkit-tap-highlight-color: transparent
    }

    .btn.primary:hover {
      background-color: #CACBCD;
      color: rgba(0, 0, 0, 0.8)
    }

    .btn.primary[type="submit"] {
      position: fixed;
      right: 100px;
      bottom: 100px
    }

    .btn.confirm {
      background-color: #95f798 !important
    }

    .btn.alert {
      background-color: #fa9492 !important
    }

    i.confirm {
      position: absolute;
      left: .5em
    }

    i.confirm:after, i.confirm:before {
      content: "";
      background: green;
      display: block;
      position: absolute;
      width: 3px;
      border-radius: 3px
    }

    i.confirm:after {
      height: 6px;
      transform: rotate(-45deg);
      top: 9px;
      left: 6px
    }

    i.confirm:before {
      height: 11px;
      transform: rotate(45deg);
      top: 5px;
      left: 10px
    }

    i.alert {
      position: absolute;
      left: .5em
    }

    i.alert:after, i.alert:before {
      content: "";
      background: red;
      display: block;
      position: absolute;
      width: 3px;
      border-radius: 3px;
      left: 9px
    }

    i.alert:after {
      height: 3px;
      top: 14px
    }

    i.alert:before {
      height: 8px;
      top: 4px
    }

    .multiline {
      position: relative;
      display: inline-block;
      -webkit-backface-visibility: hidden;
      backface-visibility: hidden;
      outline: none;
      vertical-align: baseline;
      font-style: normal;
      min-height: 17px;
      font-size: 1rem;
      line-height: 17px;
      min-width: 17px
    }

    .multiline input[type="checkbox"], .multiline input[type="radio"] {
      cursor: pointer;
      position: absolute;
      top: 0px;
      left: 0px;
      opacity: 0 !important;
      outline: none;
      z-index: 3;
      width: 17px;
      height: 17px
    }

    .multiline {
      min-height: 1.5rem
    }

    .multiline input {
      width: 3.5rem;
      height: 1.5rem
    }

    .multiline .box, .multiline label {
      min-height: 1.5rem;
      padding-left: 4.5rem;
      color: rgba(0, 0, 0, 0.87)
    }

    .multiline label {
      padding-top: 0.15em
    }

    .multiline .box:before, .multiline label:before {
      cursor: pointer;
      display: block;
      position: absolute;
      content: '';
      z-index: 1;
      -webkit-transform: none;
      transform: none;
      border: none;
      top: 0rem;
      background: rgba(0, 0, 0, 0.05);
      -webkit-box-shadow: none;
      box-shadow: none;
      width: 3.5rem;
      height: 1rem;
      border-radius: 500rem
    }

    .multiline .box:after, .multiline label:after {
      cursor: pointer;
      background: #FFFFFF -webkit-gradient(linear, left top, left bottom, from(transparent), to(rgba(0, 0, 0, 0.05)));
      background: #FFFFFF -webkit-linear-gradient(transparent, rgba(0, 0, 0, 0.05));
      background: #FFFFFF linear-gradient(transparent, rgba(0, 0, 0, 0.05));
      position: absolute;
      content: '' !important;
      opacity: 1;
      z-index: 2;
      border: none;
      -webkit-box-shadow: 0px 1px 2px 0 rgba(34, 36, 38, 0.15), 0px 0px 0px 1px rgba(34, 36, 38, 0.15) inset;
      box-shadow: 0px 1px 2px 0 rgba(34, 36, 38, 0.15), 0px 0px 0px 1px rgba(34, 36, 38, 0.15) inset;
      width: 1.2rem;
      height: 1.2rem;
      top: -.1rem;
      left: 0em;
      border-radius: 500rem;
      -webkit-transition: background 0.3s ease, left 0.3s ease;
      transition: background 0.3s ease, left 0.3s ease
    }

    .multiline input ~ .box:after, .multiline input ~ label:after {
      left: -0.05rem;
      -webkit-box-shadow: 0px 1px 2px 0 rgba(34, 36, 38, 0.15), 0px 0px 0px 1px rgba(34, 36, 38, 0.15) inset;
      box-shadow: 0px 1px 2px 0 rgba(34, 36, 38, 0.15), 0px 0px 0px 1px rgba(34, 36, 38, 0.15) inset
    }

    .multiline input:focus ~ .box:before, .multiline input:focus ~ label:before {
      background-color: rgba(0, 0, 0, 0.15);
      border: none
    }

    .multiline .box:hover::before, .multiline label:hover::before {
      background-color: rgba(0, 0, 0, 0.15);
      border: none
    }

    .multiline input:checked ~ .box, .multiline input:checked ~ label {
      color: rgba(0, 0, 0, 0.95) !important
    }

    .multiline input:checked ~ .box:before, .multiline input:checked ~ label:before {
      background-color: #2185D0 !important
    }

    .multiline input:checked ~ .box:after, .multiline input:checked ~ label:after {
      left: 2.3rem;
      -webkit-box-shadow: 0px 1px 2px 0 rgba(34, 36, 38, 0.15), 0px 0px 0px 1px rgba(34, 36, 38, 0.15) inset;
      box-shadow: 0px 1px 2px 0 rgba(34, 36, 38, 0.15), 0px 0px 0px 1px rgba(34, 36, 38, 0.15) inset
    }

    .multiline input:focus:checked ~ .box, .multiline input:focus:checked ~ label {
      color: rgba(0, 0, 0, 0.95) !important
    }

    .multiline input:focus:checked ~ .box:before, .multiline input:focus:checked ~ label:before {
      background-color: #0d71bb !important
    }

    #typecho-option-item-MathJaxConfig-15 {
      display: none
    }
  </style>
  <?php
  echo '<div class="tip"><span class="current-ver"><strong><code>Ver ' . Spring_VERSION . '</code></strong></span>
    <div class="tip-header"><h1>Theme-Spring</h1></div>
    <p>感谢选择使用 <code>Spring</code> </p>
    <p><a href="https://github.com/JaydenForYou/Spring/issues">issue</a></p>
</div>';
  $bgUrl = new Typecho_Widget_Helper_Form_Element_Text('bgUrl', NULL, 'https://www.bing.com/th?id=OHR.Lunarnewyeareve2020_ZH-CN1514309048_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=HpEdgeAn', _t('首页背景图片'), _t('在这里填入一个图片 URL 地址'));
  $Gravatar = new Typecho_Widget_Helper_Form_Element_Text('Gravatar', NULL, NULL, _t('自定义 Gravatar 源'), _t('输入Gravatar源，如https://cdn.v2ex.com/gravatar/'));
  $cdn = new Typecho_Widget_Helper_Form_Element_Text('cdn', NULL, NULL, _t('使用自己的静态存储'), _t('输入静态存储链接(不需要带http/https)'));
  $APPID = new Typecho_Widget_Helper_Form_Element_Text('APPID', NULL, NULL, _t('APP ID'), _t('输入在Valine获取的APP ID'));
  $APPKEY = new Typecho_Widget_Helper_Form_Element_Text('APPKEY', NULL, NULL, _t('APP KEY'), _t('输入在Valine获取的APP KEY'));
  $serverURLs = new Typecho_Widget_Helper_Form_Element_Text('serverURLs', NULL, NULL, _t('Valine安全域名'), _t('输入在Valine设置的安全域名'));
  $weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL, '#', _t('微博地址'), _t('输入微博地址'));
  $beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, NULL, _t('ICP备案号'), _t(''));
  $Subtitle = new Typecho_Widget_Helper_Form_Element_Text('Subtitle', NULL, NULL, _t('站点副标题'), _t(''));
  $alipay = new Typecho_Widget_Helper_Form_Element_Text('alipay', NULL, NULL, _t('支付宝收款二维码链接'), _t(''));
  $wpay = new Typecho_Widget_Helper_Form_Element_Text('wpay', NULL, NULL, _t('微信收款二维码链接'), _t(''));
  $qiniu = new Typecho_Widget_Helper_Form_Element_Text('qiniu', NULL, NULL, _t('七牛云替换全站镜像'), _t('需要带http/https'));
  $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, '#', _t('GITHUB'), _t(''));
  $QQGROUP = new Typecho_Widget_Helper_Form_Element_Text('QQGROUP', NULL, '#', _t('QQ群链接'), _t(''));
  $ititle = new Typecho_Widget_Helper_Form_Element_Text('ititle', NULL, '首页标题', _t('首页标题'), _t(''));
  $Logo = new Typecho_Widget_Helper_Form_Element_Text('Logo', NULL, '网站logo', _t('网站logo'), _t(''));
  $form->addInput($bgUrl);
  $form->addInput($Logo);
  $form->addInput($ititle);
  $form->addInput($Subtitle);
  $form->addInput($beian);
  $form->addInput($qiniu);
  $form->addInput($weibo);
  $form->addInput($Gravatar);
  $form->addInput($cdn);
  $form->addInput($APPID);
  $form->addInput($APPKEY);
  $form->addInput($serverURLs);
  $form->addInput($alipay);
  $form->addInput($wpay);
  $form->addInput($github);
  $form->addInput($QQGROUP);
  $JConfig = new Typecho_Widget_Helper_Form_Element_Checkbox('JConfig',
    array(
      'enableComments' => '开启主题自带评论系统'
    ),
    null,
    '开关设置'
  );
  $form->addInput($JConfig->multiMode());
}

function themeFields($layout)
{
  //$showTOC = new Typecho_Widget_Helper_Form_Element_Radio('showTOC', array(true => _t('开启'), false => _t('关闭')), false, _t('TOC文章目录解析'), _t('1代表开启,0代表关闭,解析h1-h6标签'));
  $previewContent = new Typecho_Widget_Helper_Form_Element_Text('previewContent', NULL, NULL, _t('文章摘要'), _t('设置文章的预览内容，留空自动截取文章前55个字。'));
  $thumbnail = new Typecho_Widget_Helper_Form_Element_Text('thumbnail', NULL, NULL, _t('文章/页面缩略图Url'), _t('需要带上http(s)://'));
  $layout->addItem($thumbnail);
  //$layout->addItem($showTOC);
  $layout->addItem($previewContent);
}

function get_post_view($archive)
{
  $cid = $archive->cid;
  $db = Typecho_Db::get();
  $prefix = $db->getPrefix();
  if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
    $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
    echo 0;
    return;
  }
  $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
  if ($archive->is('single')) {
    $views = Typecho_Cookie::get('extend_contents_views');
    if (empty($views)) {
      $views = array();
    } else {
      $views = explode(',', $views);
    }
    if (!in_array($cid, $views)) {
      $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
      array_push($views, $cid);
      $views = implode(',', $views);
      Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
    }
  }
  echo $row['views'];
}

function themeInit($archive)
{
  // 判断是否是添加评论的操作
  // 为文章或页面、post操作，且包含参数`themeAction=comment`(自定义)
  if ($archive->is('single') && $archive->request->isPost() && $archive->request->is('Ajax=comment')) {
    // 为添加评论的操作时
    ajaxComment($archive);
  }
}

/**
 * ajaxComment
 * 实现Ajax评论的方法(实现feedback中的comment功能)
 * @param Widget_Archive $archive
 * @return void
 */
function ajaxComment($archive)
{
  $options = Helper::options();
  $user = Typecho_Widget::widget('Widget_User');
  $db = Typecho_Db::get();
  // Security 验证不通过时会直接跳转，所以需要自己进行判断
  // 需要开启反垃圾保护，此时将不验证来源
  if ($archive->request->get('_') != Helper::security()->getToken($archive->request->getReferer())) {
    $archive->response->throwJson(array('status' => 0, 'msg' => _t('非法请求')));
  }
  /** 评论关闭 */
  if (!$archive->allow('comment')) {
    $archive->response->throwJson(array('status' => 0, 'msg' => _t('评论已关闭')));
  }
  /** 检查ip评论间隔 */
  if (!$user->pass('editor', true) && $archive->authorId != $user->uid &&
    $options->commentsPostIntervalEnable) {
    $latestComment = $db->fetchRow($db->select('created')->from('table.comments')
      ->where('cid = ?', $archive->cid)
      ->where('ip = ?', $archive->request->getIp())
      ->order('created', Typecho_Db::SORT_DESC)
      ->limit(1));

    if ($latestComment && ($options->gmtTime - $latestComment['created'] > 0 &&
        $options->gmtTime - $latestComment['created'] < $options->commentsPostInterval)) {
      $archive->response->throwJson(array('status' => 0, 'msg' => _t('对不起, 您的发言过于频繁, 请稍侯再次发布')));
    }
  }

  $comment = array(
    'cid' => $archive->cid,
    'created' => $options->gmtTime,
    'agent' => $archive->request->getAgent(),
    'ip' => $archive->request->getIp(),
    'ownerId' => $archive->author->uid,
    'type' => 'comment',
    'status' => !$archive->allow('edit') && $options->commentsRequireModeration ? 'waiting' : 'approved'
  );

  /** 判断父节点 */
  if ($parentId = $archive->request->filter('int')->get('parent')) {
    if ($options->commentsThreaded && ($parent = $db->fetchRow($db->select('coid', 'cid')->from('table.comments')
        ->where('coid = ?', $parentId))) && $archive->cid == $parent['cid']) {
      $comment['parent'] = $parentId;
    } else {
      $archive->response->throwJson(array('status' => 0, 'msg' => _t('父级评论不存在')));
    }
  }
  $feedback = Typecho_Widget::widget('Widget_Feedback');
  //检验格式
  $validator = new Typecho_Validate();
  $validator->addRule('author', 'required', _t('必须填写用户名'));
  $validator->addRule('author', 'xssCheck', _t('请不要在用户名中使用特殊字符'));
  $validator->addRule('author', array($feedback, 'requireUserLogin'), _t('您所使用的用户名已经被注册,请登录后再次提交'));
  $validator->addRule('author', 'maxLength', _t('用户名最多包含200个字符'), 200);

  if ($options->commentsRequireMail && !$user->hasLogin()) {
    $validator->addRule('mail', 'required', _t('必须填写电子邮箱地址'));
  }

  $validator->addRule('mail', 'email', _t('邮箱地址不合法'));
  $validator->addRule('mail', 'maxLength', _t('电子邮箱最多包含200个字符'), 200);

  if ($options->commentsRequireUrl && !$user->hasLogin()) {
    $validator->addRule('url', 'required', _t('必须填写个人主页'));
  }
  $validator->addRule('url', 'url', _t('个人主页地址格式错误'));
  $validator->addRule('url', 'maxLength', _t('个人主页地址最多包含200个字符'), 200);

  $validator->addRule('text', 'required', _t('必须填写评论内容'));

  $comment['text'] = $archive->request->text;

  /** 对一般匿名访问者,将用户数据保存一个月 */
  if (!$user->hasLogin()) {
    /** Anti-XSS */
    $comment['author'] = $archive->request->filter('trim')->author;
    $comment['mail'] = $archive->request->filter('trim')->mail;
    $comment['url'] = $archive->request->filter('trim')->url;

    /** 修正用户提交的url */
    if (!empty($comment['url'])) {
      $urlParams = parse_url($comment['url']);
      if (!isset($urlParams['scheme'])) {
        $comment['url'] = 'http://' . $comment['url'];
      }
    }

    $expire = $options->gmtTime + $options->timezone + 30 * 24 * 3600;
    Typecho_Cookie::set('__typecho_remember_author', $comment['author'], $expire);
    Typecho_Cookie::set('__typecho_remember_mail', $comment['mail'], $expire);
    Typecho_Cookie::set('__typecho_remember_url', $comment['url'], $expire);
  } else {
    $comment['author'] = $user->screenName;
    $comment['mail'] = $user->mail;
    $comment['url'] = $user->url;

    /** 记录登录用户的id */
    $comment['authorId'] = $user->uid;
  }

  /** 评论者之前须有评论通过了审核 */
  if (!$options->commentsRequireModeration && $options->commentsWhitelist) {
    if ($feedback->size($feedback->select()->where('author = ? AND mail = ? AND status = ?', $comment['author'], $comment['mail'], 'approved'))) {
      $comment['status'] = 'approved';
    } else {
      $comment['status'] = 'waiting';
    }
  }

  if ($error = $validator->run($comment)) {
    $archive->response->throwJson(array('status' => 0, 'msg' => implode(';', $error)));
  }

  /** 添加评论 */
  if (preg_match("/[\x{4e00}-\x{9fa5}]/u", $comment['text']) == 0) {
    $archive->response->throwJson(array('status' => 0, 'msg' => _t('评论内容请不少于一个中文汉字')));
  }
  $commentId = $feedback->insert($comment);
  if (!$commentId) {
    $archive->response->throwJson(array('status' => 0, 'msg' => _t('评论失败')));
  }
  Typecho_Cookie::delete('__typecho_remember_text');
  $db->fetchRow($feedback->select()->where('coid = ?', $commentId)
    ->limit(1), array($feedback, 'push'));
  $feedback->pluginHandle()->finishComment($feedback);
  // 返回评论数据
  $data = array(
    'cid' => $feedback->cid,
    'coid' => $feedback->coid,
    'parent' => $feedback->parent,
    'mail' => $feedback->mail,
    'url' => $feedback->url,
    'ip' => $feedback->ip,
    'browser' => getBrowser($feedback->agent),
    'os' => getOs($feedback->agent),
    'author' => $feedback->author,
    'authorId' => $feedback->authorId,
    'permalink' => $feedback->permalink,
    'created' => $feedback->created,
    'datetime' => $feedback->date->format('Y-m-d H:i:s'),
    'status' => $feedback->status,
  );
  // 评论内容
  ob_start();
  $feedback->content();
  $data['content'] = ob_get_clean();
  preg_match("~<p>(.*)</p>~", $data['content'], $newcontent);
  $data['content'] = $newcontent[1];

  $data['avatar'] = Typecho_Common::gravatarUrl($data['mail'], 48, Helper::options()->commentsAvatarRating, NULL, $archive->request->isSecure());
  $archive->response->throwJson(array('status' => 1, 'comment' => $data));
}

function getCommentAt($coid)
{
  $db = Typecho_Db::get();
  $prow = $db->fetchRow($db->select('parent')
    ->from('table.comments')
    ->where('coid = ? AND status = ?', $coid, 'approved'));
  $parent = $prow['parent'];
  if ($parent != "0") {
    $arow = $db->fetchRow($db->select('author')
      ->from('table.comments')
      ->where('coid = ? AND status = ?', $parent, 'approved'));
    $author = $arow['author'];
    $href = '<a href="#comment-' . $parent . '" class="cute atreply">@' . $author . '</a>';
    //$href = '@'.$author;
    return $href;
  } else {
    return '';
  }
}

function ounts($sum, $total)
{
  if ($sum > $total) {
    $sum -= 1;
    return ounts($sum, $total);
  } else {
    return $sum;
  }
}

/**
 * 随机输出文章
 *
 * @access public
 */
function posts($widget)
{
  $db = Typecho_Db::get();
  $sql = $db->select()->from('table.contents')
    ->where('table.contents.status = ?', 'publish')
    ->where('table.contents.type = ?', $widget->type)
    ->where('table.contents.password IS NULL')
    ->order('table.contents.created', Typecho_Db::SORT_ASC);
  $data = $db->fetchALL($sql);
  $total = count($data);
  $nums = ounts(3, $total);
  $temp = array_rand($data, $nums);
  $content = array();
  foreach ($temp as $val) {
    $content[] = $data[$val];
  }
  if ($content) {
    $arr = array();
    foreach ($content as $key => $v) {
      $contents = $widget->filter($content[$key]);
      $arr[$key]['title'] = $contents['title'];
      $arr[$key]['url'] = $contents['permalink'];
      //$arr[$key]['category'] = $contents['categories'][0]['name'];
      //$arr[$key]['timeStamp'] = $contents['date']->timeStamp;
    }
    return $arr;
  } else {
    return false;
  }
}

function excerpt($post_excerpt)
{
  $post_excerpt = strip_tags(htmlspecialchars_decode($post_excerpt));
  $post_excerpt = trim($post_excerpt);

  $patternArr = array('/\s/', '/ /');
  $replaceArr = array('', '');
  $post_excerpt = preg_replace($patternArr, $replaceArr, $post_excerpt);
  $value = mb_strcut($post_excerpt, 0, 400, 'utf-8');
  return $value;
}

/**
 * 显示下一篇
 *
 * @access public
 */
function theNext($widget)
{
  $db = Typecho_Db::get();
  $sql = $db->select()->from('table.contents')
    ->where('table.contents.created > ?', $widget->created)
    ->where('table.contents.status = ?', 'publish')
    ->where('table.contents.type = ?', $widget->type)
    ->where('table.contents.password IS NULL')
    ->order('table.contents.created', Typecho_Db::SORT_ASC)
    ->limit(1);
  $content = $db->fetchRow($sql);
  $arr = array();
  $fields = array();
  $rows = $db->fetchAll($db->select()->from('table.fields')
    ->where('cid = ?', $content['cid']));
  foreach ($rows as $row) {
    $fields[$row['name']] = $row[$row['type'] . '_value'];
  }
  if ($content) {
    $content = $widget->filter($content);
    $arr['url'] = $content['permalink'];
    $arr['title'] = $content['title'];
    $arr['content'] = excerpt($content['text']);
    $arr['thumbnail'] = $fields['thumbnail'];
    $arr['category'] = $content['categories'][0]['name'];
    $arr['rate'] = getRate($content['text']);
    return $arr;
  } else {
    return false;
  }
}

/**
 * 显示上一篇
 *
 * @access public
 */
function thePrev($widget)
{
  $db = Typecho_Db::get();
  $sql = $db->select()->from('table.contents')
    ->where('table.contents.created < ?', $widget->created)
    ->where('table.contents.status = ?', 'publish')
    ->where('table.contents.type = ?', $widget->type)
    ->where('table.contents.password IS NULL')
    ->order('table.contents.created', Typecho_Db::SORT_DESC)
    ->limit(1);
  $content = $db->fetchRow($sql);
  $arr = array();
  $fields = array();
  $rows = $db->fetchAll($db->select()->from('table.fields')
    ->where('cid = ?', $content['cid']));
  foreach ($rows as $row) {
    $fields[$row['name']] = $row[$row['type'] . '_value'];
  }
  if ($content) {
    $content = $widget->filter($content);
    $arr['url'] = $content['permalink'];
    $arr['title'] = $content['title'];
    $arr['content'] = excerpt($content['text']);
    $arr['thumbnail'] = $fields['thumbnail'];
    $arr['category'] = $content['categories'][0]['name'];
    $arr['rate'] = getRate($content['text']);
    return $arr;
  } else {
    return false;
  }
}

function getRate($content)
{
  $speed = 300;
  $nums = preg_replace('/[\x80-\xff]{1,3}/', ' ', $content, -1);
  $nums = strlen($nums);
  $rate = ceil($nums / $speed);
  return $rate;
}

function getCategory($widget)
{
  $db = Typecho_Db::get();
  $sql = $db->select()->from('table.contents')
    ->where('table.contents.cid = ?', $widget->cid);
  $content = $db->fetchRow($sql);
  $arr = array();
  if ($content) {
    $content = $widget->filter($content);
    $arr['category'] = $content['categories'][0]['name'];
    $arr['url'] = $content['categories'][0]['permalink'];
    return $arr;
  } else {
    return false;
  }
}

function spam_protection_math()
{
  $num1 = 1;
  $num2 = rand(1, 9);
  echo "$num1 + $num2 = ";
  echo "<input type=\"text\" name=\"sum\" class=\"vnick vinput\" value=\"\" size=\"25\" tabindex=\"4\" style=\" width:70px;\" placeholder=\"计算结果\">\n";
  echo "<input type=\"hidden\" name=\"num1\" value=\"$num1\">\n";
  echo "<input type=\"hidden\" name=\"num2\" value=\"$num2\">";
}

function getBrowser($agent)
{
  $outputer = false;
  if (preg_match('/MSIE\s([^\s|;]+)/i', $agent, $regs)) {
    $outputer = 'IE Browser';
  } else if (preg_match('/FireFox\/([^\s]+)/i', $agent, $regs)) {
    $str1 = explode('Firefox/', $regs[0]);
    $FireFox_vern = explode('.', $str1[1]);
    $outputer = 'Firefox Browser ' . $FireFox_vern[0];
  } else if (preg_match('/Maxthon([\d]*)\/([^\s]+)/i', $agent, $regs)) {
    $str1 = explode('Maxthon/', $agent);
    $Maxthon_vern = explode('.', $str1[1]);
    $outputer = 'Maxthon Browser ' . $Maxthon_vern[0];
  } else if (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $agent, $regs)) {
    $outputer = 'Sogo Browser';
  } else if (preg_match('#360([a-zA-Z0-9.]+)#i', $agent, $regs)) {
    $outputer = '360 Browser';
  } else if (preg_match('/Edge([\d]*)\/([^\s]+)/i', $agent, $regs)) {
    $str1 = explode('Edge/', $regs[0]);
    $Edge_vern = explode('.', $str1[1]);
    $outputer = 'Edge ' . $Edge_vern[0];
  } else if (preg_match('/EdgiOS([\d]*)\/([^\s]+)/i', $agent, $regs)) {
    $str1 = explode('EdgiOS/', $regs[0]);
    $outputer = 'Edge';
  } else if (preg_match('/UC/i', $agent)) {
    $str1 = explode('rowser/', $agent);
    $UCBrowser_vern = explode('.', $str1[1]);
    $outputer = 'UC Browser ' . $UCBrowser_vern[0];
  } else if (preg_match('/OPR/i', $agent)) {
    $str1 = explode('OPR/', $agent);
    $opr_vern = explode('.', $str1[1]);
    $outputer = 'Open Browser ' . $opr_vern[0];
  } else if (preg_match('/MicroMesseng/i', $agent, $regs)) {
    $outputer = 'Weixin Browser';
  } else if (preg_match('/WeiBo/i', $agent, $regs)) {
    $outputer = 'WeiBo Browser';
  } else if (preg_match('/QQ/i', $agent, $regs) || preg_match('/QQ Browser\/([^\s]+)/i', $agent, $regs)) {
    $str1 = explode('rowser/', $agent);
    $QQ_vern = explode('.', $str1[1]);
    $outputer = 'QQ Browser ' . $QQ_vern[0];
  } else if (preg_match('/MQBHD/i', $agent, $regs)) {
    $str1 = explode('MQBHD/', $agent);
    $QQ_vern = explode('.', $str1[1]);
    $outputer = 'QQ Browser ' . $QQ_vern[0];
  } else if (preg_match('/BIDU/i', $agent, $regs)) {
    $outputer = 'Baidu Browser';
  } else if (preg_match('/LBBROWSER/i', $agent, $regs)) {
    $outputer = 'KS Browser';
  } else if (preg_match('/TheWorld/i', $agent, $regs)) {
    $outputer = 'TheWorld Browser';
  } else if (preg_match('/XiaoMi/i', $agent, $regs)) {
    $outputer = 'XiaoMi Browser';
  } else if (preg_match('/UBrowser/i', $agent, $regs)) {
    $str1 = explode('rowser/', $agent);
    $UCBrowser_vern = explode('.', $str1[1]);
    $outputer = 'UCBrowser ' . $UCBrowser_vern[0];
  } else if (preg_match('/mailapp/i', $agent, $regs)) {
    $outputer = 'Email Browser';
  } else if (preg_match('/2345Explorer/i', $agent, $regs)) {
    $outputer = '2345 Browser';
  } else if (preg_match('/Sleipnir/i', $agent, $regs)) {
    $outputer = 'Sleipnir Browser';
  } else if (preg_match('/YaBrowser/i', $agent, $regs)) {
    $outputer = 'Yandex Browser';
  } else if (preg_match('/Opera[\s|\/]([^\s]+)/i', $agent, $regs)) {
    $outputer = 'Opera Browser';
  } else if (preg_match('/MZBrowser/i', $agent, $regs)) {
    $outputer = 'MZ Browser';
  } else if (preg_match('/VivoBrowser/i', $agent, $regs)) {
    $outputer = 'Vivo Browser';
  } else if (preg_match('/Quark/i', $agent, $regs)) {
    $outputer = 'Quark Browser';
  } else if (preg_match('/mixia/i', $agent, $regs)) {
    $outputer = 'Mixia Browser';
  } else if (preg_match('/fusion/i', $agent, $regs)) {
    $outputer = 'Fusion';
  } else if (preg_match('/CoolMarket/i', $agent, $regs)) {
    $outputer = 'CoolMarket Browser';
  } else if (preg_match('/Thunder/i', $agent, $regs)) {
    $outputer = 'Thunder Browser';
  } else if (preg_match('/Chrome([\d]*)\/([^\s]+)/i', $agent, $regs)) {
    $str1 = explode('Chrome/', $agent);
    $chrome_vern = explode('.', $str1[1]);
    $outputer = 'Chrome ' . $chrome_vern[0];
  } else if (preg_match('/safari\/([^\s]+)/i', $agent, $regs)) {
    $str1 = explode('Version/', $agent);
    $safari_vern = explode('.', $str1[1]);
    $outputer = 'Safari ' . $safari_vern[0];
  } else {
    return false;
  }
  return $outputer;
}

/** 获取操作系统信息 <?php echo getOs($comments->agent); ?>*/
function getOs($agent)
{
  $os = false;

  if (preg_match('/win/i', $agent)) {
    if (preg_match('/nt 6.0/i', $agent)) {
      $os = 'Windows Vista';
    } else if (preg_match('/nt 6.1/i', $agent)) {
      $os = 'Windows 7';
    } else if (preg_match('/nt 6.2/i', $agent)) {
      $os = 'Windows 8';
    } else if (preg_match('/nt 6.3/i', $agent)) {
      $os = 'Windows 8.1';
    } else if (preg_match('/nt 5.1/i', $agent)) {
      $os = 'Windows XP';
    } else if (preg_match('/nt 10.0/i', $agent)) {
      $os = 'Windows 10';
    } else {
      $os = 'Windows';
    }
  } else if (preg_match('/android/i', $agent)) {
    if (preg_match('/android 9/i', $agent)) {
      $os = 'Android P';
    } else if (preg_match('/android 8/i', $agent)) {
      $os = 'Android O';
    } else if (preg_match('/android 7/i', $agent)) {
      $os = 'Android N';
    } else if (preg_match('/android 6/i', $agent)) {
      $os = 'Android M';
    } else if (preg_match('/android 5/i', $agent)) {
      $os = 'Android L';
    } else {
      $os = 'Android';
    }
  } else if (preg_match('/ubuntu/i', $agent)) {
    $os = 'Linux';
  } else if (preg_match('/linux/i', $agent)) {
    $os = 'Linux';
  } else if (preg_match('/iPhone/i', $agent)) {
    $os = 'iPhone';
  } else if (preg_match('/iPad/i', $agent)) {
    $os = 'iPad';
  } else if (preg_match('/mac/i', $agent)) {
    $os = 'OSX';
  } else if (preg_match('/cros/i', $agent)) {
    $os = 'Chrome os';
  } else {
    return false;
  }
  return $os;
}

/**
 * 输出评论回复内容，配合 commentAtContent($coid)一起使用
 * <?php showCommentContent($comments->coid); ?>
 */
function showCommentContent($coid)
{
  $db = Typecho_Db::get();
  $result = $db->fetchRow($db->select('text')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));
  $text = $result['text'];
  $atStr = commentAtContent($coid);
  $_content = Markdown::convert($text);
  //<p>
  if ($atStr !== '') {
    $content = substr_replace($_content, $atStr, 0, 3);
  } else {
    $content = $_content;
  }

  echo $content;
}

/**
 * 评论回复加@
 */
function commentAtContent($coid)
{
  $db = Typecho_Db::get();
  $prow = $db->fetchRow($db->select('parent')->from('table.comments')->where('coid = ? AND status = ?', $coid, 'approved'));
  $parent = $prow['parent'];
  if ($parent != "0") {
    $arow = $db->fetchRow($db->select('author')->from('table.comments')
      ->where('coid = ? AND status = ?', $parent, 'approved'));
    $author = $arow['author'];
    $href = '<p><a  href="#comment-' . $parent . '">@' . $author . '</a> ';
    return $href;
  } else {
    return '';
  }
}