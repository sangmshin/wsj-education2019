<?php
/**
 * Template Name: Context
 
 * @package WordPress
 * @subpackage WSJ Context
 * @since WSJ Context 1.0
 */
?>


<?php get_header( 'context' ); ?>

  <!-- HEADER -->

<div class="context container-fluid context-wrapper">
  <div class="context-image">
    <img class="context-image__img" src="<?php the_field( 'context_image' ); ?>">
  </div>

  <!-- slide code start -->
  <div class="carousel-section">
    <h2><?php the_field( 'testimonial_title' ); ?></h2>

    <div class="carousel js-flickity custom-carousel" data-flickity-options='{ "imagesLoaded":"true", "autoPlay": "true", "watchCSS":"true" }'>
      
      <?php 
        $testimonials = get_field( 'testimonials' );
        foreach( $testimonials as $testimonial ) { ?>

          <div class="carousel-cell">
          <p class="headline">
            "<?php echo $testimonial['headline']; ?>"
          </p>
          <p class="note">
            - <?php echo $testimonial['byline']; ?>
          </p>
        </div>

        <?php } ?>
      
    </div>  
  </div>
  <!-- slider code end -->

  <!-- features code start -->


  <?php 
    $features = get_field( 'key_features' );
  ?>


  <div class="features-section">
    <h1><?php echo $features['title']; ?></h1>
    <p>
      <?php echo $features['copy']; ?>
    </p>
    <div class="features-section-lists">

      <?php 
        foreach( $features['feature_list'] as $feature ) { ?>


      <div class="feature-list">
        <img src="<?php echo $feature['image']; ?>">
        <h1> <?php echo $feature['title']; ?></h1>
        <p><?php echo $feature['copy']; ?></p>
      </div>

      <?php } ?>
      
    </div>
  </div>
  <!-- features code end -->

<!-- btn code start -->
  <div class="context-cta">
  <?php $cta = get_field( 'cta' ); ?>
    <a href="<?php echo $cta['url']; ?>">
    <button class="context-btn">


      <?php echo $cta['title']; ?>

    </button>
    </a>
  </div>
  <!-- btn code end -->


</div>







<?php include(locate_template('footer-context.php')); ?>
