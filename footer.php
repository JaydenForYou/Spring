<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
if (!empty($this->options->cdn) && $this->options->cdn) {
  define('__TYPECHO_THEME_URL__', Typecho_Common::url(__TYPECHO_THEME_DIR__ . '/' . basename(dirname(__FILE__)), $this->options->cdn));
}
?>
<section class="main-footer-waves-area waves-area">
  <svg class="waves-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
    <defs>
      <path id="gentle-wave" d="M -160 44 c 30 0 58 -18 88 -18 s 58 18 88 18 s 58 -18 88 -18 s 58 18 88 18 v 44 h -352 Z" />
    </defs>
    <g class="parallax">
      <use xlink:href="#gentle-wave" x="48" y="0" />
      <use xlink:href="#gentle-wave" x="48" y="3" />
      <use xlink:href="#gentle-wave" x="48" y="5" />
      <use xlink:href="#gentle-wave" x="48" y="7" />
    </g>
  </svg>
</section>
<section class="py-5 main-footer-info">
  <div class="container-sm">
    <div class="row">
      <div class="d-none d-lg-block col main-footer-info-tags">
        <h3 class="mb-3 main-footer-info-title main-footer-info-tags-title">标签</h3>
        <div class="d-flex flex-row flex-wrap align-items-start w-100 h-100 main-footer-info-tags-list">
          <?php $this->widget('Widget_Metas_Tag_Cloud')
->to($taglist); ?><?php while($taglist->next()): ?>
<a href="<?php $taglist->permalink(); ?>" title="<?php $taglist->name(); ?>" class="tag-item"><?php $taglist->name(); ?></a>
<?php endwhile; ?>
        </div>
      </div>
      <div class="d-none d-lg-block col main-footer-info-navigation">
        <h3 class="mb-3 main-footer-info-title main-footer-info-navigation-title">导航</h3>
        <div class="w-100 h-100 main-footer-info-navigation-list">
          <div class="side-navbar-nav list-group list-group-flush">
            暂无导航
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
<script id="jquery-js" type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery@3.4.1/dist/jquery.min.js"></script>
<script type="text/javascript"
        src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<?php if (Utils::isEnabled('enableComments', 'JConfig')): ?>
  <script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/commentAjax.js'); ?>"></script>
<?php endif ?>
<script>
  const appId = "<?php $this->options->APPID()?>";
  const appKey = "<?php $this->options->APPKEY()?>";
  const serverUrls = "<?php $this->options->serverURLs()?>";
</script>
<script type="text/javascript">
  window.Spring = {
    name: "<?= $this->options->ititle ?>"
  }
</script>
<script type="text/javascript" src="<?php $this->options->themeUrl('assets/js/bundle.js'); ?>"></script>
<?php $this->footer(); ?>
</body>
</html>
