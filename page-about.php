<?php
/**
 * 名片
 *
 * @package custom
 * @author 林尽欢
 * @link https://iobiji.com/
 * @version 1.0.0
 */
$this->need('header.php');
?>
<section class="main-hero template-about-me">
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
<main class="main-content custom-about-template">
  <div class="d-flex justify-content-center align-items-center flex-column about-me-home">
    <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5 about-me">
      <div class="about-me__side about-me__side--front">
        <div class="about-me__cont">
          <span class="blue">alert</span><span>(<span class="green">'Hello World!'</span>)</span>
        </div>
      </div>
      <div class="about-me__side about-me__side--back">
        <!-- Back Content -->
        <div class="about-me__cta">
          <p>
            <span class="purple">const</span> aboutMe <span class="cyan">=</span> {
            <br />
            <span class="space red">name</span><span class="cyan">:</span> <span class="green">'Carlos Lin'</span>,
            <br/>
            <span class="space red">email</span><span class="cyan">:</span> <span class="green">'i@iobiji.com</span>',
            <br/>
            <span class="space red">position</span><span class="cyan">:</span> <span class="green">'Web Front-End Developer'</span>,
            <br/>
            <span class="space red">website</span><span class="cyan">:</span> <span class="green">'https://iobiji.com'</span>
            <br/> };
          </p>
        </div>
      </div>
    </div>
  </div>
  <div class="container-sm">
    <div class="row">
      <article class="col-12 col-sm-12 px-0 post-content article-main borderbox">
        <?php echo Utils::getContent($this->content) ?>
      </article>
    </div>
  </div>
</main>
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
<?php $this->need('footer.php'); ?>
