<?php
/**
 * 友链
 *
 * @package custom
 * @author 林尽欢
 * @link https://iobiji.com/
 * @version 1.0.0
 */
$this->need('header.php');
?>
<body class="page-template page-links spring-body">
<section class="main-hero">
  <div class="main-hero-bg"
       style="background-image: url('<?= $this->fields->thumbnail ?>')"></div>
  <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
    <div class="text-center main-hero-content-title"><?= $this->title; ?></div>
    <div class="text-center main-hero-content-description"><?php $this->author(); ?>
      / <?= date('Y-m-d', $this->created) ?></div>
  </div>
  <div class="main-hero-header"></div>
</section>
<main class="main-content">
  <div class="container-sm">
    <div class="row post-content-main">
      <article
        class="col-12 col-sm-12 px-0 borderbox post-content article-main custom-links-template page">
        <?php echo Utils::getContent($this->content) ?>
      </article>
    </div>
</main>
</body>
<?php $this->need('footer.php'); ?>
