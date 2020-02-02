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

<?php if (!Utils::isEnabled('enableComments', 'JConfig')): ?>
  <script>
    new Valine({
      el: '#vcomments',
      appId: '<?php $this->options->APPID()?>',
      appKey: '<?php $this->options->APPKEY()?>'
    })
  </script>
<?php endif ?>
