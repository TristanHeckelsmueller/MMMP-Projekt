<?php get_header(); ?>


<header class="header" id="home" style="background: url('/wp-content/themes/intermediale/assets/images/360.jpg'); background-size: cover; background-repeat: no-repeat;">
  <div class="clearfix"></div>

  <div class="header__content">
    <div class="header__content--in">

      <img src="/wp-content/themes/intermediale/assets/images/Logo-Intermediale.svg" alt="">
      <div class="header__content--in__title">
        <h1>Interaktive Medien</h1>
      <span>14. Juli 2018</span>
    </div>

  </div>
  </div>
</header>

<?php
while (have_posts()) {
  the_post(); ?>

  <section class="intro" id="intro">
    <div class="intro__text">
      <h2> <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <p>
        <?php the_excerpt(); ?>
      </p>
    </div>
      <div class="intro__img">
        <?php
        $image = get_field('post_img');
        if( !empty($image) ): ?>
        	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
        <?php endif; ?>
      </div>
    </section>


<?php } ?>


<div class="clearfix"></div>

<?php get_footer(); ?>
