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
<style>
  .about-me-home {
    width: 100%;
    height: 100vh;
    background: linear-gradient(45deg, #9fa2a6, #2c3e50);
  }
  .about-me-home .blue {
    color: #29b6f6;
  }
  .about-me-home .green {
    color: #9ccc65;
  }
  .about-me-home .purple {
    color: #ba68c8;
  }
  .about-me-home .cyan {
    color: #4dd0e1;
  }
  .about-me-home .red {
    color: #ef5350;
  }
  .about-me-home .about-me {
    position: relative;
    height: 15rem;
    perspective: 150rem;
    cursor: auto;
    flex: initial;
  }
  .about-me-home .about-me__side {
    height: 15rem;
    transition: all 0.8s ease;
    position: absolute;
    top: 0;
    left: 0;
    margin: auto;
    width: 100%;
    backface-visibility: hidden;
    border-radius: 3px;
    overflow: hidden;
    box-shadow: 0 1.5rem 4rem rgba(0, 0, 0, 0.4);
  }
  .about-me-home .about-me__side--front {
    background-color: #1c1c1c;
    z-index: 1;
  }
  .about-me-home .about-me__side--back {
    transform: rotateY(180deg);
    background-color: #1c1c1c;
    z-index: 0;
  }
  .about-me-home .about-me__cont {
    height: 15rem;
    background: linear-gradient(45deg, #101010, #2c3e50);
    font-family: Consolas, "Lucida Console", monospace;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  .about-me-home .about-me__cta {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 90%;
    color: white;
  }
  .about-me-home .about-me__cta p {
    margin: 0;
    font-family: Consolas, "Lucida Console", monospace;
  }
  .about-me-home .about-me__cta p > .space {
    margin-left: 2rem;
  }
  .about-me-home .about-me:hover .about-me__side--front {
    transform: rotateY(-180deg);
    z-index: 0;
  }
  .about-me-home .about-me:hover .about-me__side--back {
    transform: rotateY(0deg);
    z-index: 1;
  }
</style>
<body class="page-template page-card" style="height: 100%;">
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
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
</body>
<?php $this->need('footer.php'); ?>
