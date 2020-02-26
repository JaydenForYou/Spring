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
<body class="page-template page-card spring-body" style="height: 100%;">
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
          <br>
          <span class="space red">name</span><span class="cyan">:</span> <span class="green">'Carlos'</span>,
          <br>
          <span class="space red">email</span><span class="cyan">:</span> <span class="green">'i@iobiji.com</span>',
          <br>
          <span class="space red">position</span><span class="cyan">:</span> <span class="green">'Web Front-End Developer'</span>,
          <br>
          <span class="space red">website</span><span class="cyan">:</span> <span class="green">'https://iobiji.com'</span>
          <br> };
        </p>
      </div>
    </div>
  </div>
</div>
<!-- partial -->
</body>
<?php $this->need('footer.php'); ?>
