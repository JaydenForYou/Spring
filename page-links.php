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
<style>
  .page.custom-links-template ul {
    margin-left: 0;
    list-style: none;
    display: flex;
    flex-wrap: wrap;
    flex-direction: row;
    justify-content: center;
    align-items: center;
    position: relative;
    width: 100%;
  }

  .page.custom-links-template ul li .links-item-wrapper {
    padding: 1.5rem;
  }

  .shadow {
    box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
  }

  .page.custom-links-template ul li {
    display: block;
    width: 30%;
    text-align: center;
    margin: 1rem;
    flex-grow: 1;
  }

  .page.custom-links-template ul li .links-item-wrapper-header-avatar {
    border-radius: 50%;
    width: 5rem;
  }

  .border {
    border: 1px solid #dee2e6 !important;
  }
</style>
<body class="page-template page-links">
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
        <h2 id="Links">友链</h2>
        <ul>
          <?php foreach (Utils::praseLink($this->content) as $v) { ?>
            <li class="shadow">
              <div class="links-item-wrapper">
                <div class="links-item-wrapper-header">
                  <img src="<?= $v[2] ?>" class="border links-item-wrapper-header-avatar" alt="<?= $v[0] ?>">
                </div>
                <div class="links-item-wrapper-content">
                  <div class="links-item-wrapper-content-name">
                    <a target="_blank" href="<?= $v[1] ?>"><?= $v[0] ?></a>
                  </div>
                  <div class="links-item-wrapper-content-desc"><?= $v[3] ?></div>
                  <div>
                  </div>
                </div>
              </div>
            </li>
          <?php } ?>
        </ul>
        <?php echo Utils::praseContent($this->content) ?>
      </article>
    </div>
</main>
</body>
<?php $this->need('footer.php'); ?>
