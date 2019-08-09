<?php 
  $university_logos = get_field( 'university_logos' );
?>

<?php if( $university_logos ) : ?>

    <section class="partners module__1 pb-5 pt-2">

        <div class="container">
          <div class="row section-name__wrapper pt-5 pb-1">
            <div class="col text-center">
              <h2 class="section-name secName font__rb mr-auto ml-auto mb-1">
                University Partners
              </h2>
            </div>
          </div>

          <div class="row">
            <p class="section-name__description text-center font__rl mt-5 pr-3 pl-3 pr-sm-4 pl-sm-4 pr-lg-5 pl-lg-5">
                <?php the_field( 'university_partners_bodycopy' ); ?>
            </p>
          </div>


          <!-- University Logo Slider -->
          <div class="row text-center center-block slider pt-5 pb-5">
            <div class="carousel" data-num="0" data-flickity='{"groupCells": true,"wrapAround": true,"fullscreen":false}'>
              
              
              <?php foreach( $university_logos as $university_logo ) { ?>

                <div class="carousel-cell text-center pl-1 pr-1">
                  <img src="<?php echo $university_logo['logo_top']; ?>" alt="<?php echo $university_logo['logo_top_alt_tag']; ?>" width="100%" title="<?php echo $university_logo['logo_top_alt_tag']; ?>">
                  <img src="<?php echo $university_logo['logo_bottom']; ?>" alt="<?php echo $university_logo['logo_bottom_alt_tag']; ?>" width="100%" title="<?php echo $university_logo['logo_bottom_alt_tag']; ?>">
                </div>


              <?php } ?>

              
            </div>
          </div>

        </div>

      </section>

<?php endif; ?>
