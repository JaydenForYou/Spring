<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
  <!DOCTYPE html>
  <html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no"/>
  <title><?php $this->archiveTitle(array(
      'category' => _t('%s'),
      'search' => _t('%s'),
      'tag' => _t('%s'),
      'author' => _t('%s')
    ), '', ' - '); ?><?php $this->options->title(); ?><?php if ($this->is('index') && $this->options->Subtitle != null) {
      echo ' - ' . $this->options->Subtitle;
    } ?></title>
  <link rel="dns-prefetch" href="<?php $this->options->siteUrl(); ?>">
  <?php if (!empty($this->options->qiniu)): ?>
    <link rel="dns-prefetch" href="<?php echo $this->options->qiniu; ?>">
  <?php endif; ?>
  <?php if ($this->options->logoUrl): ?>
    <link rel="shortcut icon" href="<?= $this->options->logoUrl ?>" type="image/png"/>
  <?php endif; ?>
  <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.12.0/css/all.min.css">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/styles.css'); ?>">
  <?php if ($this->is('post')): ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/style.css'); ?>">
  <?php endif; ?>
  <?php if($this->options->Logo != null): ?>
    <link rel="shortcut icon" href="<?= $this->options->Logo; ?>" type="image/png" />
  <?php endif ?>
  <?php $this->header(); ?>
  <?php if (!Utils::isEnabled('enableComments', 'JConfig') && $this->is('post')): ?>
    <script src='//unpkg.com/valine/dist/Valine.min.js'></script>
  <?php endif ?>
</head>
  <main class="main-content template-error-404">
    <div class="container-sm">
      <div class="row">
        <section class="d-flex flex-column justify-content-center align-items-center w-100 error-message">
          <h1 class="error-code">Error 404</h1>
          <p class="error-description">Page not found</p>
          <a class="error-link" href="/">返回首页</a>
        </section>
      </div>
    </div>
  </main>
<footer class="main-footer">
  <div class="container d-flex justify-content-md-between justify-content-center">
    <div class="text-center main-footer-copyright">
      <p>Powered by <a href="https://typecho.org/" rel="noopener nofollow" target="_blank">TYPECHO</a>. Copyright &copy;
        2020. Crafted with <a href="https://github.com/JaydenForYou/Spring" target="_blank" rel="noopener nofollow">Spring</a>.
      </p>
    </div>
    <div class="d-none d-md-block main-footer-meta">只争朝夕，不负韶华。</div>
  </div>
  <div
    class="container d-flex flex-wrap-reverse justify-content-md-between justify-content-center text-center main-footer-audit">
    <p>
      <?php if (!null == $this->options->beian): ?><a href="http://www.beian.miit.gov.cn/" target="_blank"
                                                      rel="nofollow noopener"><?php echo $this->options->beian ?></a><?php endif ?>
    </p>
  </div>
</footer>
</div>

</div>
<div class="toast-wrapper" aria-live="polite" aria-atomic="true">
  <div class="toast-wrapper-list"></div>
</div>


<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/scrollreveal@4.0.5/dist/scrollreveal.min.js"></script>
<script>
  const bundle = "<?php $this->options->themeUrl('assets/js/bundle.js'); ?>";
  const styleCss = "<?php $this->options->themeUrl('assets/css/style.css'); ?>";
  const stylesCss = "<?php $this->options->themeUrl('assets/css/styles.css'); ?>";
  const appId = "<?php $this->options->APPID()?>";
  const appKey = "<?php $this->options->APPKEY()?>";
  const serverUrls = "<?php $this->options->serverURLs()?>";
  const Title = "<?= $this->options->ititle ?>";
</script>
<script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/bundle.js'); ?>"></script>
<?php $this->footer(); ?>
</body>
</html>