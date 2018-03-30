<?php get_header(); ?>


<?php

$image = get_field('post_image');

if( !empty($image) ): ?>

<header class="header" id="home" style="background: url(<?php echo $image; ?>); background-size: cover; background-repeat: no-repeat;">
<?php endif; ?>
  <div class="clearfix"></div>

  <div class="header__content">
    <div class="header__content--in">

      <img src="/wp-content/themes/intermediale/assets/images/Logo-Intermediale.svg" alt="">
      <div class="header__content--in__title">
        <h1><?php the_title(); ?></h1>
      <span>14. Juli 2018</span>
    </div>
  </div>
  </div>
</header>

  <section class="intro" id="intro">
    <div class="intro__text">

      <?php while ( have_posts() ) : the_post(); ?>

        <p><?php the_content(); ?></p>


    </div>
    <div class="intro__img">
      <?php
      $image = get_field('content_image');

      if( !empty($image) ): ?>

        <img src="<?php echo $image; ?>" alt="<?php echo $image['alt']; ?>" />

      <?php endif; ?>
    </div>
  </section>
  <section class="programm" id="program">
    <div class="intro__text">

  			<p><?php the_field('2nd_content'); ?></p>


    </div>
    <div class="intro__img">
      <?php
      $image = get_field('2nd_content_image');

      if( !empty($image) ): ?>

        <img src="<?php echo $image; ?>" alt="<?php echo $image['alt']; ?>" />

      <?php endif; ?>
    </div>
  </section>
  <section class="intro" id="intro">
    <div class="intro__text">



  			<p><?php the_field('3rd_content'); ?></p>


      <?php endwhile; // end of the loop. ?>
    </div>
    <div class="intro__img">
      <?php
      $image = get_field('3rd_content_image');

      if( !empty($image) ): ?>

        <img src="<?php echo $image; ?>" alt="<?php echo $image['alt']; ?>" />

      <?php endif; ?>
    </div>
  </section>
<?php get_footer(); ?>
