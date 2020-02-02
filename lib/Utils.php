<?php if (!defined('__TYPECHO_ROOT_DIR__')) {
  exit;
}

/**
 * Utils.php
 * 部分工具
 *
 * @author     Jayden
 * @version    since 1.0.3
 */
class Utils
{
  /**
   * 输出博客以及主题部分配置信息为前端提供接口
   *
   * @return void
   */
  public static function JConfig()
  {
    $JConfig = Helper::options()->JConfig;
    $options = Helper::options();
    $enableLazyload = self::isEnabled('enableLazyload', 'JConfig');
    $enableComments = self::isEnabled('enableComments', 'JConfig');
    $enablePJAX = self::isEnabled('enablePJAX', 'JConfig');

    $THEME_CONFIG = json_encode((object)array(
        "THEME_VERSION" => CREAMy_VERSION,
        "SITE_URL" => rtrim($options->siteUrl, "/"),
        "THEME_URL" => $options->themeUrl,
        "ENABLE_Comments" => $enableComments
    ));

    echo "<script>window.THEME_CONFIG = $THEME_CONFIG</script>\n";
  }

  /**
   * 返回主题设置中某项开关的开启/关闭状态
   *
   * @param string $item 项目名
   * @param string $config 设置名
   *
   * @return bool
   */
  public static function isEnabled($item, $config)
  {
    $config = Helper::options()->$config;
    $status = !empty($config) && in_array($item, $config) ? true : false;
    return $status;
  }

  /**
   * 获取背景图片
   *
   * @return void
   */
  public static function getBackground()
  {
    $options = Helper::options();
    if(!null==$options->qiniu){
      $qurl = str_replace($options->siteUrl,$options->qiniu.'/',$options->themeUrl);
    }else{
      $qurl = $options->themeUrl;
    }
    if ($options->bgUrl) {
      echo $options->bgUrl;
    } else {
      echo $qurl.'/assets/img/hero-background.jpg';
    }
  }

  /**
   * 获取默认缩略图
   */
  public static function getThumbnail()
  {
    $options = Helper::options();
    if(!null==$options->qiniu){
      $qurl = str_replace($options->siteUrl,$options->qiniu.'/',$options->themeUrl);
    }else{
      $qurl = $options->themeUrl;
    }
    return $qurl . '/assets/img/post.jpg';
  }

  /**
   * 获取内容
   */
  public static function getContent($content)
  {
    $options = Helper::options();
    if(!null==$options->qiniu){
      $site=$_SERVER['REQUEST_SCHEME'] . '://' .$_SERVER['HTTP_HOST'];
      return str_replace($site,$options->qiniu,$content);
    }else{
      return $content;
    }
  }

  /**
   * 获取分类文章数量
   */
  public static function getCnums($name)
  {
    $db = Typecho_Db::get();
    $cx = $db->fetchRow($db->select()->from('table.metas')->where('table.metas.type = ?', 'category')->where('table.metas.slug = ?', $name))['count'];
    return $cx;
  }

  /**
   * 获取评论者GRAVATAR头像
   */
  public static function gGravatar($author)
  {
    $db = Typecho_Db::get();
    $cx = $db->fetchRow($db->select()->from('table.comments')->where('table.comments.author = ?', $author))['mail'];
    if (defined('__TYPECHO_GRAVATAR_PREFIX__')) {
      $url = __TYPECHO_GRAVATAR_PREFIX__;
    } else {
      if ( !empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
        $http_type='https';
      } elseif ( isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
        $http_type='https';
      } elseif ( !empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
        $http_type='https';
      }
      $http_type='http';
      if($http_type=='https'){
        $url = 'https://secure.gravatar.com';
      }else{
        $url = 'http://www.gravatar.com';
      }
      $url .= '/avatar/';
    }

    if (!empty($cx)) {
      $url .= md5(strtolower(trim($cx)));
    }

    $url .= '?s=60';
    $url .= '&amp;r=G';
    return $url;
  }

  /**
   * 获取头部
   */
  public static function getHeader($csspath){
    $options = Helper::options();
    if(!empty($options->qiniu)){
      $qurl = str_replace($options->siteUrl,$options->qiniu.'/',$options->themeUrl);
    }else{
      $qurl = $options->themeUrl;
    }

    if($csspath=='awesome'){
      echo $qurl.'/assets/fonts/css/font-awesome.css';
    }elseif($csspath=='bootstrap'){
      echo $qurl.'/assets/bootstrap/bootstrap.css';
    } elseif($csspath=='appmin'){
      echo $qurl.'/assets/app/css/app.min.css?ver=1153';
    }
  }

  /**
   * 获取底部
   */
  public static function getFooter($jspath){
    $options = Helper::options();
    if(!empty($options->qiniu)){
      $qurl = str_replace($options->siteUrl,$options->qiniu.'/',$options->themeUrl);
    }else{
      $qurl = $options->themeUrl;
    }

    if($jspath=='jquery'){
      echo $qurl.'/assets/jquery/jquery.js';
    }elseif($jspath=='bootstrapjs'){
      echo $qurl.'/assets/bootstrap/bootstrap.js';
    }elseif($jspath=='pivot'){
      echo $qurl.'/assets/pivot/pivot.js';
    }elseif($jspath=='appminjs'){
      echo $qurl.'/assets/app/js/app.min.js?ver=1153';
    }elseif($jspath=='demo'){
      echo $qurl.'/demo.js';
    }elseif($jspath=='lazyload'){
      echo $qurl.'/assets/app/js/lazyload.js';
    }
  }

}
