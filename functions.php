<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
define('Spring_VERSION', '1.0.0');
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
  $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, 'https://ae01.alicdn.com/kf/Hcc6e25cb04934a58838717d25517231fe.jpg', _t('站点 LOGO 地址'), _t('头像Logo'));
  $bgUrl = new Typecho_Widget_Helper_Form_Element_Text('bgUrl', NULL, 'https://www.bing.com/th?id=OHR.Lunarnewyeareve2020_ZH-CN1514309048_1920x1080.jpg&rf=LaDigue_1920x1080.jpg&pid=HpEdgeAn', _t('首页背景图片'), _t('在这里填入一个图片 URL 地址'));
  $Gravatar = new Typecho_Widget_Helper_Form_Element_Text('Gravatar', NULL, NULL, _t('自定义 Gravatar 源'), _t('输入Gravatar源，如https://cdn.v2ex.com/gravatar/'));
  $cdn = new Typecho_Widget_Helper_Form_Element_Text('cdn', NULL, NULL, _t('使用自己的静态存储'), _t('输入静态存储链接(不需要带http/https)'));
  $APPID = new Typecho_Widget_Helper_Form_Element_Text('APPID', NULL, NULL, _t('APP ID'), _t('输入在Valine获取的APP ID'));
  $APPKEY = new Typecho_Widget_Helper_Form_Element_Text('APPKEY', NULL, NULL, _t('APP KEY'), _t('输入在Valine获取的APP KEY'));
  $serverURLs = new Typecho_Widget_Helper_Form_Element_Text('serverURLs', NULL, NULL, _t('Valine安全域名'), _t('输入在Valine设置的安全域名'));
  $weibo = new Typecho_Widget_Helper_Form_Element_Text('weibo', NULL, '#', _t('微博地址'), _t('输入微博地址'));
  $beian = new Typecho_Widget_Helper_Form_Element_Text('beian', NULL, NULL, _t('ICP备案号'), _t(''));
  $Subtitle = new Typecho_Widget_Helper_Form_Element_Text('Subtitle', NULL, NULL, _t('站点副标题'), _t(''));
  $NickName = new Typecho_Widget_Helper_Form_Element_Text('NickName', NULL, '视觉志', _t('首页头像下的名称'), _t(''));
  $bio = new Typecho_Widget_Helper_Form_Element_Text('bio', NULL, '我最不喜欢做选择，但我选择了，就一定不后悔。', _t('首页头像下的谏言'), _t(''));
  $alipay = new Typecho_Widget_Helper_Form_Element_Text('alipay', NULL, NULL, _t('支付宝收款二维码链接'), _t(''));
  $wpay = new Typecho_Widget_Helper_Form_Element_Text('wpay', NULL, NULL, _t('微信收款二维码链接'), _t(''));
  $qiniu = new Typecho_Widget_Helper_Form_Element_Text('qiniu', NULL, NULL, _t('七牛云替换全站镜像'), _t('需要带http/https'));
  $github = new Typecho_Widget_Helper_Form_Element_Text('github', NULL, '#', _t('GITHUB'), _t(''));
  $QQGROUP = new Typecho_Widget_Helper_Form_Element_Text('QQGROUP', NULL, '#', _t('QQ群链接'), _t(''));
  $form->addInput($logoUrl);
  $form->addInput($bgUrl);
  $form->addInput($Subtitle);
  $form->addInput($NickName);
  $form->addInput($bio);
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
  //$showTOC = new Typecho_Widget_Helper_Form_Element_Radio('showTOC', array(true => _t('开启'), false => _t('关闭')), false, _t('文章目录'), _t('仅会解析h2和h3标题，最多解析两层'));
  $previewContent = new Typecho_Widget_Helper_Form_Element_Text('previewContent', NULL, NULL, _t('文章摘要'), _t('设置文章的预览内容，留空自动截取文章前55个字。'));
  $thumbnail = new Typecho_Widget_Helper_Form_Element_Text('thumbnail', NULL, NULL, _t('文章/页面缩略图Url'), _t('需要带上http(s)://'));
  $layout->addItem($thumbnail);
  $layout->addItem($previewContent);
  //$layout->addItem($showTOC);
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
    'agent' => parseUA($feedback->agent),
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

  $data['avatar'] = Typecho_Common::gravatarUrl($data['mail'], 48, Helper::options()->commentsAvatarRating, NULL, $archive->request->isSecure());
  $archive->response->throwJson(array('status' => 1, 'comment' => $data));
}

function parseUA($ua)
{
  // 解析操作系统
  $htmlTag = "";
  $os = null;
  $fontClass = null;
  if (preg_match('/Windows NT 6.0/i', $ua)) {
    $os = "Windows Vista";
  } elseif (preg_match('/Windows NT 6.1/i', $ua)) {
    $os = "Windows 7";
  } elseif (preg_match('/Windows NT 6.2/i', $ua)) {
    $os = "Windows 8";
  } elseif (preg_match('/Windows NT 6.3/i', $ua)) {
    $os = "Windows 8.1";
  } elseif (preg_match('/Windows NT 10.0/i', $ua)) {
    $os = "Windows 10";
  } elseif (preg_match('/Windows NT 5.1/i', $ua)) {
    $os = "Windows XP";
  } elseif (preg_match('/Windows NT 5.2/i', $ua) && preg_match('/Win64/i', $ua)) {
    $os = "Windows XP 64 bit";
  } elseif (preg_match('/Android ([0-9.]+)/i', $ua, $matches)) {
    $os = "Android " . $matches[1];
  } elseif (preg_match('/iPhone OS ([_0-9]+)/i', $ua, $matches)) {
    $os = 'iPhone ' . $matches[1];
  } elseif (preg_match('/iPad/i', $ua)) {
    $os = "iPad";
  } elseif (preg_match('/Mac OS X ([_0-9]+)/i', $ua, $matches)) {
    $os = 'Mac OS X ' . $matches[1];
  } elseif (preg_match('/Gentoo/i', $ua)) {
    $os = 'Gentoo Linux';
  } elseif (preg_match('/Ubuntu/i', $ua)) {
    $os = 'Ubuntu Linux';
  } elseif (preg_match('/Debian/i', $ua)) {
    $os = 'Debian Linux';
  } elseif (preg_match('/X11; FreeBSD/i', $ua)) {
    $os = 'FreeBSD';
  } elseif (preg_match('/X11; Linux/i', $ua)) {
    $os = 'Linux';
  } else {
    $os = 'unknown os';
  }
  $htmlTag = '<span class="vsys">' . $os . '</span>';
  $browser = null;
  //解析浏览器
  if (preg_match('#SE 2([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'Sogou browser';
  } elseif (preg_match('#360([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = '360 browser ';
  } elseif (preg_match('#Maxthon( |\/)([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'Maxthon ';
  } elseif (preg_match('#Edge( |\/)([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'Edge ';
  } elseif (preg_match('#MicroMessenger/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'Wechat ';
  } elseif (preg_match('#QQ/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'QQ Mobile ';
  } elseif (preg_match('#Chrome/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'Chrome ';
  } elseif (preg_match('#CriOS/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'Chrome ';
  } elseif (preg_match('#Chromium/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'Chromium ';
  } elseif (preg_match('#Safari/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'Safari ';
  } elseif (preg_match('#opera mini#i', $ua)) {
    preg_match('#Opera/([a-zA-Z0-9.]+)#i', $ua, $matches);
    $browser = 'Opera Mini ';
  } elseif (preg_match('#Opera.([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'Opera ';
  } elseif (preg_match('#QQBrowser ([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'QQ browser ';
  } elseif (preg_match('#UCWEB([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'UCWEB ';
  } elseif (preg_match('#MSIE ([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'Internet Explorer ';
  } elseif (preg_match('#Trident/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'Internet Explorer 11';
  } elseif (preg_match('#(Firefox|Phoenix|Firebird|BonEcho|GranParadiso|Minefield|Iceweasel)/([a-zA-Z0-9.]+)#i', $ua, $matches)) {
    $browser = 'Firefox ';
  } else {
    $browser = 'unknown br';
  }
  $htmlTag .= "&nbsp;";
  $htmlTag .= '<span class="vsys">' . $browser . '</span>';
  return $htmlTag;
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


