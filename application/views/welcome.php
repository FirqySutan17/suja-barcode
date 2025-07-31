<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="UTF-8">
  <title>PT. Super Unggas Jaya</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="CJ Feed and Care">
  <meta name="keywords" content="CJ Feed and Care">
  <meta name="author" content="Cheiljedang Indonesia ">
  <link rel="icon" href="<?= base_url('assets/img/cj-logo.png') ?>" type="image/x-icon">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/particlesjs/2.2.3/particles.min.js">

  </script>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }


    @font-face {
      font-family: cjfont;
      src: url('<?= asset("font/cjfont.ttf") ?>');
    }

    .nav,
    .slider {
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 100vh;
      position: relative;
      background-color: #ffffff;
      text-align: center;
      padding: 0 2em;
    }

    .nav h1,
    .slider h1 {
      font-family: cjfont;
      font-size: 5vw;
      margin: 0;
      padding-bottom: 0.5rem;
      letter-spacing: 0.5rem;
      color: #04302c;
      transition: all 0.3s ease;
      z-index: 3;
      margin-bottom: 20px
    }

    h1:hover {
      transform: translate3d(0, -10px, 22px);
      color: #ee141e;
    }

    .nav h2,
    .slider h2 {
      font-size: 2vw;
      letter-spacing: 0.5rem;
      font-family: "ROBOTO", sans-serif;
      font-weight: 300;
      color: #ff9600;
      z-index: 4;
    }

    a {
      text-decoration: none;
      z-index: 10;
      background: #000;
      border: 1px solid transparent;
      color: #fff;
      font-size: 18px;
      padding: 10px 70px;
      border-radius: 10px;
      font-family: cjfont;
      transition: all 0.5s ease;
    }

    a:hover {
      background: transparent;
      border: 1px solid #000;
      color: #000;
    }

    .nav-container {
      display: flex;
      flex-direction: row;
      position: absolute;
      bottom: 0;
      width: 100%;
      height: 75px;
      box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
      background: #1e1f26;
      z-index: 10;
      transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
    }

    .nav-container--top-first {
      position: fixed;
      top: 75px;
      transition: all 0.3s cubic-bezier(0.19, 1, 0.22, 1);
    }

    .nav-container--top-second {
      position: fixed;
      top: 0;
    }

    .nav-container--top-second {
      position: fixed;
      top: 0;
    }

    .nav-tab {
      display: flex;
      justify-content: center;
      align-items: center;
      flex: 1;
      color: #03dac6;
      letter-spacing: 0.1rem;
      transition: all 0.5s ease;
      font-size: 2vw;
    }

    .nav-tab:hover {
      color: #1e1f26;
      background: #03dac6;
      transition: all 0.5s ease;
    }

    .nav-tab-slider {
      position: absolute;
      bottom: 0;
      width: 0;
      height: 5px;
      background: #03dac6;
      transition: left 0.3s ease;
    }

    .background {
      position: absolute;
      height: 100vh;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: auto;
    }

    @media (min-width: 800px) {

      .nav h1,
      .slider h1 {
        font-size: 5vw;
      }

      .nav h2,
      .slider h2 {
        font-size: 3vw;
      }

      .nav-tab {
        font-size: 3vw;
      }
    }

    @media screen only (min-width: 360px) {

      .nav h1,
      .slider h1 {
        font-size: 8vw;
      }

      .nav h2,
      .slider h2 {
        font-size: 2vw;
        letter-spacing: 0.2vw;
      }

      .nav-tab {
        font-size: 1.2vw;
      }
    }

    .background {
      position: absolute;
      height: 100vh;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      z-index: 0;
    }
  </style>
</head>

<body oncontextmenu="return false;">
  <section class="nav">

    <center><img src="<?= base_url('assets/img/logo.png') ?>" style="width: 100%; object-fit: cover;z-index: 100"></center>
    <h1>
      <font face="cjfont">DAILY SALES RPA</font>
    </h1>

    <?php if ($is_login): ?>
      <a href="<?= base_url('dashboard') ?>" class="text-sm text-gray-700 dark:text-gray-500 underline">DASHBOARD</a>
    <?php else: ?>
      <a href="<?= base_url('login') ?>">LOG IN</a>
    <?php endif ?>

  </section>

</body>
<!-- partial -->
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'>

</script>
<script>
  window.onload = function () {
  Particles.init({
    selector: ".background"
  });
};
var particles = Particles.init({
  selector: ".background",
  color: ["#03dac6", "#ff0266", "#000000"],
  connectParticles: true,
  responsive: [
    {
      breakpoint: 768,
      options: {
        color: ["#faebd7", "#03dac6", "#ff0266"],
        maxParticles: 43,
        connectParticles: false
      }
    }
  ]
});

class NavigationPage {
  constructor() {
    this.currentId = null;
    this.currentTab = null;
    this.tabContainerHeight = 70;
    this.lastScroll = 0;
    let self = this;
    $(".nav-tab").click(function () {
      self.onTabClick(event, $(this));
    });
    $(window).scroll(() => {
      this.onScroll();
    });
    $(window).resize(() => {
      this.onResize();
    });
  }

  onTabClick(event, element) {
    event.preventDefault();
    let scrollTop =
      $(element.attr("href")).offset().top - this.tabContainerHeight + 1;
    $("html, body").animate({ scrollTop: scrollTop }, 600);
  }

  onScroll() {
    this.checkHeaderPosition();
    this.findCurrentTabSelector();
    this.lastScroll = $(window).scrollTop();
  }

  onResize() {
    if (this.currentId) {
      this.setSliderCss();
    }
  }

  checkHeaderPosition() {
    const headerHeight = 75;
    if ($(window).scrollTop() > headerHeight) {
      $(".header").addClass("header--scrolled");
    } else {
      $(".header").removeClass("header--scrolled");
    }
    let offset =
      $(".nav").offset().top +
      $(".nav").height() -
      this.tabContainerHeight -
      headerHeight;
    if (
      $(window).scrollTop() > this.lastScroll &&
      $(window).scrollTop() > offset
    ) {
      $(".header").addClass("et-header--move-up");
      $(".nav-container").removeClass("nav-container--top-first");
      $(".nav-container").addClass("nav-container--top-second");
    } else if (
      $(window).scrollTop() < this.lastScroll &&
      $(window).scrollTop() > offset
    ) {
      $(".header").removeClass("et-header--move-up");
      $(".nav-container").removeClass("nav-container--top-second");
      $(".et-hero-tabs-container").addClass(
        "et-hero-tabs-container--top-first"
      );
    } else {
      $(".header").removeClass("header--move-up");
      $(".nav-container").removeClass("nav-container--top-first");
      $(".nav-container").removeClass("nav-container--top-second");
    }
  }

  findCurrentTabSelector(element) {
    let newCurrentId;
    let newCurrentTab;
    let self = this;
    $(".nav-tab").each(function () {
      let id = $(this).attr("href");
      let offsetTop = $(id).offset().top - self.tabContainerHeight;
      let offsetBottom =
        $(id).offset().top + $(id).height() - self.tabContainerHeight;
      if (
        $(window).scrollTop() > offsetTop &&
        $(window).scrollTop() < offsetBottom
      ) {
        newCurrentId = id;
        newCurrentTab = $(this);
      }
    });
    if (this.currentId != newCurrentId || this.currentId === null) {
      this.currentId = newCurrentId;
      this.currentTab = newCurrentTab;
      this.setSliderCss();
    }
  }

  setSliderCss() {
    let width = 0;
    let left = 0;
    if (this.currentTab) {
      width = this.currentTab.css("width");
      left = this.currentTab.offset().left;
    }
    $(".nav-tab-slider").css("width", width);
    $(".nav-tab-slider").css("left", left);
  }
}

new NavigationPage();

/* Credit:
Matrix - Particles.js;
Slider - Ettrics;
Fonts - Google Fonts
*/
</script>

</body>

</html>