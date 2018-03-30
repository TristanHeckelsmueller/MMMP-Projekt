<?php get_header(); ?>
<div class="header__background"></div>
<header class="header" id="home" style="background: url('/wp-content/themes/intermediale/assets/images/Campus-fhS.jpg');">
  <div class="clearfix"></div>

  <div class="header__content">
    <div class="header__content--in">

      <img src="/wp-content/themes/intermediale/assets/images/Logo-Intermediale.svg" alt="">
      <div class="header__content--in__title">
        <h1>Intermediale ‘18</h1>
      <span>14. Juli 2018</span>
    </div>

  </div>
  </div>
</header>
<section class="intro" id="intro">
  <div class="intro__text">
    <h2><?php the_title(); ?></h2>
    <p><?php the_content(); ?></p>
  </div>
  <div class="intro__img">
    <img src="/wp-content/themes/intermediale/assets/images/Logo-Intermediale.svg" alt="">
  </div>
</section>
<section class="programm" id="program">
  <div class="programm__text">
    <h2>Programm <span class="yellow">Intermediale</span> 2018</h2>
      <img src="/wp-content/themes/intermediale/assets/images/programm.png" alt="">
  </div>
</section>


<?php get_footer(); ?>
