<?php
/**
 * 响应式TYPECHO主题
 *
 * @package Spring
 * @author 林尽欢
 * @version 1.0.0
 * @link https://iobiji.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php
$this->need('header.php');
$hiddens = '';
$hidden = '';
$prev = $this->_currentPage - 1;
$next = $this->_currentPage + 1;
if ($this->_currentPage == 0 || $this->_currentPage == 1) {
  $hidden = 'hidden';
  $cpage = 1;
} else {
  $cpage = $this->_currentPage;
}
if ($this->_currentPage == ceil($this->getTotal() / $this->parameter->pageSize)) {
  $hiddens = 'hidden';
} elseif (ceil($this->getTotal() / $this->parameter->pageSize) == 1) {
  $hiddens = 'hidden';
  $hidden = 'hidden';
}
?>
<section class="main-hero">
  <div class="main-hero-bg"
       style="background-image: url('<?php if (null != $this->getDescription() && !$this->is('index')) {
         echo $this->getDescription();
       } else {
         Utils::getBackground();
       } ?>')"></div>
  <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
    <div class="text-center main-hero-content-avatar">
      <img class="main-hero-content-avatar-img"
           src="<?= $this->options->logoUrl ?>" alt="头像"/>
    </div>
    <div class="text-center main-hero-content-title"><?php $this->options->title(); ?></div>
    <div class="text-center main-hero-content-description"><?=$this->options->Subtitle?></div>
    <div class="text-center main-hero-content-social">
      <a class="site-tooltip main-hero-content-social-links" target="_blank" rel="noreferrer noopener nofollow" href="<?=$this->options->QQGROUP?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="加入QQ群">
        <i class="fab fa-qq"></i>
      </a>
      <a class="site-tooltip main-hero-content-social-links" href="#" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="暂无信息">
        <i class="fab fa-weixin"></i>
      </a>
      <a class="site-tooltip main-hero-content-social-links" target="_blank" rel="noreferrer noopener nofollow" href="<?=$this->options->weibo?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="访问微博">
        <i class="fab fa-weibo"></i>
      </a>
      <a class="site-tooltip main-hero-content-social-links" target="_blank" rel="noreferrer noopener nofollow" href="<?=$this->options->github?>" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="访问Github">
        <i class="fab fa-github"></i>
      </a>
    </div>
  </div>
</section>

<main class="main-content">
  <div class="container-sm">
<?php while ($this->next()): ?>
    <article class="row mb-3 mb-md-5 post-card" data-aos="fade-up">
      <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-6 px-0">
        <div class="post-card-image">
          <div class="post-card-image-shadow"></div>
  <?php if ($this->sequence % 2 == 0): ?>
          <a href="<?php $this->permalink() ?>" class="post-card-image-link odd">
            <?php else: ?>
            <a href="<?php $this->permalink() ?>" class="post-card-image-link even">
            <?php endif ?>
            <div class="post-card-image-link-background"
                 style="background-image: url('<?php
                 if ($this->fields->thumbnail) {
                   echo $this->fields->thumbnail;
                 } else {
                   echo Utils::getThumbnail();
                 }
                 ?>')"></div>
          </a>
        </div>
      </div>
      <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-6">
        <div class="d-flex flex-column justify-content-center post-card-content">
          <div class="text-center text-md-left mt-3 mt-md-0 post-card-content-tag">
            <i class="fas fa-bookmark"></i>
            <?php $this->category('/',false); ?>
          </div>
          <h3 class="post-card-content-title">
            <a href="<?php $this->permalink() ?>" class="post-card-content-title-link"><?php $this->title() ?></a>
          </h3>
          <p class="mb-3 mb-md-5 post-card-content-excerpt">
            <?php
            if ($this->fields->previewContent)
              $this->fields->previewContent();
            else
              $this->excerpt(55, '...');
            ?>
          </p>
          <div class="d-flex align-items-center post-card-content-meta">
            <div class="d-flex align-items-center mr-1 post-card-content-meta-authors">
              <a href="<?php $this->permalink() ?>" class="post-card-content-meta-authors-link site-tooltip" data-toggle="tooltip"
                 data-placement="top" title="<?php $this->author(); ?>">
                <?php echo $this->author->gravatar(320, 'G', NULL, 'img-thumbnail rounded-circle post-card-content-meta-authors-link-avatar') ?>
              </a>
            </div>
            <div class="d-flex flex-column align-items-start ml-1 post-card-content-meta-other">
              <div class="post-card-content-meta-other-date">
                <?= date('Y年m月d日', $this->created) ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </article>
<?php endwhile; ?>
  </div>
  <div class="container-sm">
    <div class="py-3 py-md-5 site-pagination">
      <nav aria-label="文章分页">
        <ul class="mb-0 pagination">
          <li class="page-item" <?php echo $hidden ?>>
            <a class="page-link" href="/page/<?php echo $prev ?>" aria-label="上一页">
          <span aria-hidden="true">
            <i class="fas fa-angle-left"></i>
          </span>
            </a>
          </li>
          <li class="page-item"><a class="page-link">第<?= $cpage ?>
              页，共<?php echo ceil($this->getTotal() / $this->parameter->pageSize); ?>页</a></li>
          <li class="page-item" <?php echo $hiddens ?>>
            <a class="page-link" href="/page/<?php echo $next ?>" aria-label="下一页">
          <span aria-hidden="true">
            <i class="fas fa-angle-right"></i>
          </span>
            </a>
          </li>
        </ul>
      </nav>
    </div>

  </div>
</main>
<?php $this->need('footer.php'); ?>