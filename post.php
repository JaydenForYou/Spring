<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

<section class="main-hero">
  <div class="main-hero-bg"
       style="background-image: url('<?php echo $this->fields->thumbnail ?>')"></div>
  <div class="d-flex flex-column align-content-center justify-content-center main-hero-content">
    <div class="text-center main-hero-content-title"><?php $this->title() ?></div>
    <div class="text-center main-hero-content-description"><?php $this->author() ?>
      / <?= date('Y年m月d日', $this->created) ?> / <?php $this->category(' / '); ?> /
      阅读量：<?php get_post_view($this) ?></div>
  </div>
</section>

<main class="main-content">
  <div class="container-sm">
    <div class="row">
      <article class="borderbox post-content" data-aos="fade-up">
        <?php echo Utils::getContent($this->content); ?>
      </article>
      <section class="post-donation text-center w-100">
        <button type="button" class="btn btn-donation" data-toggle="collapse" data-target="#collapseDonation"
                aria-expanded="false" aria-controls="collapseDonation" title="捐赠">
          <i class="fas fa-coffee"></i>
        </button>
        <div class="collapse collapse-donation" id="collapseDonation">
          <div class="card card-body card-collapse">
            <div class="row">
              <?php if ($this->options->alipay != null): ?>
                <div class="col-sm">
                  <figure class="figure">
                    <img src="<?php $this->options->alipay; ?>" alt="支付宝捐赠" title="请使用支付宝扫一扫进行捐赠">
                    <figcaption class="figure-caption">请使用支付宝扫一扫进行捐赠</figcaption>
                  </figure>
                </div>
              <?php endif ?>
              <?php if ($this->options->wpay != null): ?>
                <div class="col-sm">
                  <figure class="figure">
                    <img src="<?php $this->options->wpay; ?>" alt="微信捐赠" title="请使用微信扫一扫进行赞赏">
                    <figcaption class="figure-caption">请使用微信扫一扫进行赞赏</figcaption>
                  </figure>
                </div>
              <?php endif ?>
            </div>
          </div>
        </div>
      </section>
      <ul class="post-copyright">
        <li class="post-copyright-author">
          <strong>文章作者： </strong>
          <?php $this->author(); ?>
        </li>
        <li class="post-copyright-link">
          <strong>文章链接：</strong>
          <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><?php $this->permalink() ?></a>
        </li>
        <li class="post-copyright-license">
          <strong>版权声明： </strong>本博客所有文章除特别声明外，均采用 <a href="https://creativecommons.org/licenses/by-nc-sa/4.0/"
                                                      rel="external nofollow" target="_blank">CC BY-NC-SA 4.0</a>
          许可协议。转载请注明出处！
        </li>
      </ul>
      <section class="d-flex justify-content-between align-items-center mx-3 mx-sm-0 post-author-footer">
        <section class="author-card d-flex justify-content-between align-items-center">
          <?php echo $this->author->gravatar(320, 'G', NULL, 'author-profile-image') ?>
          <section class="author-card-content">
            <h4 class="author-card-name">
              <a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
            </h4>
            <p><?php echo $this->options->description; ?></p>
          </section>
        </section>
        <div class="post-footer-right">
          <a class="author-card-button" href="<?php $this->author->permalink(); ?>">更多文章</a>
        </div>
      </section>
      <?php if (posts($this) != false || thePrev($this) != false || theNext($this) != false): ?>
        <aside class="post-read-more mx-3 mx-sm-0">
          <div class="row read-next-feed">
            <div class="col-lg px-0 px-sm-3 d-flex min-h-300">
              <article class="read-next-card"
                       style="background-image: url(https://demo.ghost.io/content/images/size/w600/2017/07/blog-cover.jpg)">
                <header class="read-next-card-header">
                  <small class="read-next-card-header-sitetitle">&mdash; <?php $this->author(); ?> &mdash;</small>
                  <h3 class="read-next-card-header-title">
                    <?php $this->category(' '); ?>
                  </h3>
                </header>
                <div class="read-next-divider">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path
                      d="M13 14.5s2 3 5 3 5.5-2.463 5.5-5.5S21 6.5 18 6.5c-5 0-7 11-12 11C2.962 17.5.5 15.037.5 12S3 6.5 6 6.5s4.5 3.5 4.5 3.5"></path>
                  </svg>
                </div>
                <div class="read-next-card-content">
                  <ul>
                    <?php if (posts($this) != false): ?>
                      <?php foreach (posts($this) as $v) { ?>
                        <li><a href="<?= $v['url'] ?>"><?= $v['title'] ?></a></li>
                      <?php } ?>
                    <?php endif; ?>
                  </ul>
                </div>
                <footer class="read-next-card-footer">
                  <a href="<?php $this->author->permalink(); ?>">查看更多文章 →</a>
                </footer>
              </article>
            </div>
            <?php if (thePrev($this) != false): ?>
              <div class="col-lg px-0 px-sm-3 d-flex min-h-300">
                <article class="post-read-next">
                  <a class="post-read-next-image-link" href="<?php echo thePrev($this)['url']; ?>">
                    <img class="post-read-next-image" src="<?php if (!empty(thePrev($this)['thumbnail'])) {
                      echo thePrev($this)['thumbnail'];
                    } else {
                      echo 'https://casper.ghost.org/v2.0.0/images/welcome-to-ghost.jpg';
                    } ?>" alt="#">
                  </a>
                  <div class="post-read-next-content">
                    <a class="post-read-next-content-link" href="<?php echo thePrev($this)['url']; ?>">
                      <header class="post-read-next-header">
                        <h2 class="post-read-next-title"><?php echo thePrev($this)['title']; ?></h2>
                      </header>
                      <section class="post-read-next-excerpt">
                        <p><?php echo thePrev($this)['content']; ?></p>
                      </section>
                    </a>
                    <footer class="post-read-next-meta">
                      <ul class="author-list">
                        <li class="author-list-item">
                          <a href="<?php echo thePrev($this)['url']; ?>" class="static-avatar">
                            <?php echo $this->author->gravatar(320, 'G', NULL, 'author-profile-image') ?>
                            <span class="author-profile-name"><?php $this->author(); ?></span>
                          </a>
                        </li>
                      </ul>
                    </footer>
                  </div>
                </article>
              </div>
            <?php endif; ?>
            <?php if (theNext($this) != false): ?>
              <div class="col-xl px-0 px-sm-3 d-flex min-h-300">
                <article class="post-read-next">
                  <a class="post-read-next-image-link" href="<?php echo theNext($this)['url']; ?>">
                    <img class="post-read-next-image" src="<?php if (!empty(theNext($this)['thumbnail'])) {
                      echo theNext($this)['thumbnail'];
                    } else {
                      echo 'https://casper.ghost.org/v2.0.0/images/welcome-to-ghost.jpg';
                    } ?>" alt="#">
                  </a>
                  <div class="post-read-next-content">
                    <a class="post-read-next-content-link" href="<?php echo theNext($this)['url']; ?>">
                      <header class="post-read-next-header">
                        <h2 class="post-read-next-title"><?php echo theNext($this)['title']; ?></h2>
                      </header>
                      <section class="post-read-next-excerpt">
                        <p><?php echo theNext($this)['content']; ?></p>
                      </section>
                    </a>
                    <footer class="post-read-next-meta">
                      <ul class="author-list">
                        <li class="author-list-item">
                          <a href="<?php echo theNext($this)['url']; ?>" class="static-avatar">
                            <?php echo $this->author->gravatar(320, 'G', NULL, 'author-profile-image') ?>
                            <span class="author-profile-name"><?php $this->author(); ?></span>
                          </a>
                        </li>
                      </ul>
                    </footer>
                  </div>
                </article>
              </div>
            <?php endif; ?>
          </div>
        </aside>
      <?php endif; ?>
      <div id="comments" class="mx-3 mx-sm-0 w-100 post-comments">
        <?php if (Utils::isEnabled('enableComments', 'JConfig')): ?>
          <?php $this->need('comments.php'); ?>
        <?php else: ?>
          <div id="vcomments" class="v">
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</main>
<?php $this->need('footer.php'); ?>
