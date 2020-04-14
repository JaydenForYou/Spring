<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
if (!empty($this->options->cdn) && $this->options->cdn) {
  define('__TYPECHO_THEME_URL__', Typecho_Common::url(__TYPECHO_THEME_DIR__ . '/' . basename(dirname(__FILE__)), $this->options->cdn));
}
?>
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
  <link id="fontawesome-css" type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.0/css/all.min.css">
  <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/styles.css'); ?>">
  <?php if ($this->is('post') || $this->is('page')): ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('assets/css/comments.css'); ?>">
  <?php endif; ?>
  <?php if($this->options->Logo != null): ?>
  <link rel="shortcut icon" href="<?= $this->options->Logo; ?>" type="image/png" />
  <?php endif ?>
  <?php $this->header(); ?>
  <?php if (!Utils::isEnabled('enableComments', 'JConfig') && $this->is('post')): ?>
    <script src='//unpkg.com/valine/dist/Valine.min.js'></script>
  <?php endif ?>
</head>
<body class="spring-body">
<div class="d-flex site-wrapper">
  <div class="d-block d-lg-none d-xl-none sidebar-wrapper">
    <div class="sidebar-container">
      <div class="d-flex justify-content-between sidebar-header">
        <div class="sidebar-title"><?= $this->options->title; ?></div>
        <div class="d-flex sidebar-right">
          <div class="d-flex align-items-center justify-content-center sidebar-search click-search">
            <i class="fas fa-search"></i>
          </div>
          <div class="d-flex align-items-center justify-content-center sidebar-close">
            <i class="fas fa-times"></i>
          </div>
        </div>
      </div>
      <div class="list-group list-group-flush">
        <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
        <?php while ($category->next()): ?>
          <a class="list-group-item list-group-item-action menu-item <?php if ($this->is('category', $category->slug)) {
            echo 'active';
          } ?>" href="<?php $category->permalink(); ?>"><?php $category->name(); ?></a>
        <?php endwhile; ?>
        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
        <?php while ($pages->next()): ?>
          <a class="list-group-item list-group-item-action menu-item <?php if ($this->is('page', $pages->slug)) {
            echo 'active';
          } ?>" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a>
        <?php endwhile; ?>
      </div>
      <div class="mt-2 text-center sidebar-footer">
        <button type="button" class="btn site-tooltip btn-footer btn-dark-mode click-dark" data-toggle="tooltip"
                data-placement="bottom" title="切换风格">
          🌓
        </button>
      </div>
    </div>

  </div>
  <div class="main-wrapper">
    <?php if ($this->is('post')): ?>
      <div class="progress site-progress">
        <div class="progress-bar reading-progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
      </div>
    <?php endif ?>
    <header class="fixed-top shadow-sm main-header scroll-reveal-header">
      <nav class="navbar navbar-expand-lg header-navbar">
        <div class="container">
          <a class="navbar-brand" href="/">
            <img src="https://getbootstrap.com/docs/4.4/assets/brand/bootstrap-solid.svg" width="30" height="30"
                 class="d-inline-block align-top navbar-brand-logo" alt="">
            <?= $this->options->title; ?>
          </a>

          <button class="navbar-toggler sidebar-toggler" type="button" data-toggle="collapse"
                  aria-controls="sidebar-wrapper" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
              <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
              <?php while ($category->next()): ?>
                <li class="nav-item<?php if ($this->is('category', $category->slug)) {
                  echo ' nav-current active';
                } ?>"><a class="nav-link" href="<?php $category->permalink(); ?>"><?php $category->name(); ?></a></li>
              <?php endwhile; ?>
              <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
              <?php while ($pages->next()): ?>
                <li class="nav-item<?php if ($this->is('page', $pages->slug)) {
                  echo ' nav-current active';
                } ?>"><a class="nav-link" href="<?php $pages->permalink(); ?>"><?php $pages->title(); ?></a></li>
              <?php endwhile; ?>
            </ul>
            <div class="ml-auto nav-left">
              <button type="button" class="btn site-tooltip btn-nav-left btn-dark-mode click-dark" data-toggle="tooltip"
                      data-placement="bottom" title="切换风格">
                🌓
              </button>
              <button type="button" class="btn site-tooltip btn-nav-left btn-search click-search" data-toggle="tooltip"
                      data-placement="bottom" title="搜索文章">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </div>
      </nav>
    </header>
