<?php
/**
 * 文章归档
 *
 * @package custom
 * @author 林尽欢
 * @link https://iobiji.com/
 * @version 1.0.0
 */
$this->need('header.php');
?>
<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
  <body class="page-template page-links spring-body">
  <section class="main-hero">
    <div class="main-hero-bg"
         style="background-image: url('<?= $this->fields->thumbnail ?>')"></div>
    <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
      <div class="text-center main-hero-content-title"><?= $this->title; ?></div>
      <div class="main-hero-waves-area waves-area">
        <svg class="waves-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
          <defs>
            <path id="gentle-wave"
                  d="M -160 44 c 30 0 58 -18 88 -18 s 58 18 88 18 s 58 -18 88 -18 s 58 18 88 18 v 44 h -352 Z"/>
          </defs>
          <g class="parallax">
            <use xlink:href="#gentle-wave" x="48" y="0"/>
            <use xlink:href="#gentle-wave" x="48" y="3"/>
            <use xlink:href="#gentle-wave" x="48" y="5"/>
            <use xlink:href="#gentle-wave" x="48" y="7"/>
          </g>
        </svg>
      </div>
  </section>
  <main class="main-content">
    <div class="container-sm">
      <div class="row post-content-main">
        <article
          class="col-12 col-sm-12 px-0 borderbox post-content article-main custom-archive-template page">
          <div class="archive-page">
            <div class="archive-page-title">截至 <?=date('Y年m月d日')?> 共写了<?php $stat->publishedPostsNum() ?>文章</div>
            <ul class="archive-page-list">
              <?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->parse('<li class="archive-page-list-item"><time datetime="{year}-{month}-{day}">{year}-{month}-{day}</time><a href="{permalink}" class="archive-page-list-item-href" target="_blank">{title}</a></li>'); ?>
            </ul>
          </div>
        </article>
      </div>
  </main>
  </body>
<?php $this->need('footer.php'); ?>