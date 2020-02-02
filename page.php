<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<section class="main-hero">
  <div class="main-hero-bg"
       style="background-image: url('<?php echo $this->fields->thumbnail ?>')"></div>
  <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
    <div class="text-center main-hero-content-title"><?php $this->title() ?></div>
    <div class="text-center main-hero-content-description"><?php $this->author() ?> / <?= date('Y年m月d日', $this->created) ?> / 阅读量：<?php get_post_view($this) ?></div>
  </div>
</section>

<main class="main-content">
  <div class="container-sm">
    <div class="row">
      <article class="borderbox post-content" data-aos="fade-up">
        <?php echo Utils::getContent($this->content); ?>
      </article>
    </div>
  </div>
</main>
<?php $this->need('footer.php'); ?>