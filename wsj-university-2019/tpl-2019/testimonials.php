<?php if( have_rows('testimonials') ): ?>

      <section class="testimonials pb-5 pt-2">

        <div class="container">
          <div class="row section-name__wrapper pt-5 pb-1">
            <h2 class="section-name font__rb mr-auto ml-auto mb-5">
              Testimonials
            </h2>
          </div>
          
          <div class="row text-center center-block slider pb-5">
            <div class="carousel" data-num="0" data-flickity='{"groupCells": true,"wrapAround": false,"fullscreen":false, "draggable": true}'>

              <?php while( have_rows('testimonials') ): the_row(); 
                $quote = get_sub_field('quote');
                $name = get_sub_field('name');
              ?>

              <div class="carousel-cell text-left">
                <blockquote>
                  <p class="font__rl">
                    <?php echo $quote; ?>
                  </p>
                </blockquote>

                <cite class="font__rl">
                  – <?php echo $name; ?>
                </cite>
              </div>
              
              <?php endwhile; ?>


              
            </div>
          </div>
        </div>

      </section>
<?php endif; ?>