<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
if (!empty($this->options->cdn) && $this->options->cdn) {
  define('__TYPECHO_THEME_URL__', Typecho_Common::url(__TYPECHO_THEME_DIR__ . '/' . basename(dirname(__FILE__)), $this->options->cdn));
}
?>
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
<div class="search-wrapper">
  <div class="container-sm">
    <button type="button" class="close search-close click-search-close" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    <div class="search-content">
      <form id="search" method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
        <div class="search-form">
          <i class="search-icon fas fa-search"></i>
          <label>
            <input type="text" name="s" id="ghost-search-field" class="search-input" placeholder="请输入搜索关键词...">
          </label>
        </div>
      </form>
    </div>
  </div>
</div>

<div class="d-flex justify-content-center align-items-center flex-column animated fixed-to-top click-to-top">
  <i class="fas fa-angle-double-up"></i>
  <?php if ($this->is('post')): ?>
  <span class="animated progress-number"></span>
  <?php endif ?>
</div>

</div>
<div class="toast-wrapper" aria-live="polite" aria-atomic="true">
  <div class="toast-wrapper-list"></div>
</div>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/scrollreveal@4.0.5/dist/scrollreveal.min.js"></script>
<script>
  const appId = "<?php $this->options->APPID()?>";
  const appKey = "<?php $this->options->APPKEY()?>";
  const serverUrls = "<?php $this->options->serverURLs()?>";
  const Title = "<?= $this->options->ititle ?>";
</script>
<script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/bundle.js'); ?>"></script>
<?php $this->footer(); ?>
</body>
</html>
