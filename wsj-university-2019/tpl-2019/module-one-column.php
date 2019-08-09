<?php if( have_rows('steps') ): ?>

    <section class="one-col-mod">
      <div class="anchor-point" id="wsj-context"></div>
        <div class="container">
          <div class="row">
            <div class="col wrapper text-center pt-5 pb-5" style="background-image: url(<?php the_field( 'background_image' ); ?>)">
              <img src="<?php the_field( 'wsj_context_logo' ); ?>" width="250" alt="WSJ Context">
              <p class="font__rl mod__bodycopy ml-auto mr-auto">
                <?php the_field( 'title_top' ); ?>
              </p>

              <h5 class="btn moreOrLess__btn font__rm ">
                See Less
              </h5>

              <div class="mt-3 mb-4">
                <img class="moreOrLess__arrow toggleBtn" src="<?php echo get_template_directory_uri(); ?>/dist/img/pro-context-arrow.svg" width="50" alt="more or less arrow">
              </div>
              
              <div class="moreOrLess__wrapper">
                <div class="moreOrLess__content ml-auto mr-auto text-center">
                  <p class="font__rl mod__bodycopy ml-auto mr-auto">
                    <?php the_field( 'title_bottom' ); ?>
                  </p>
                  <div class="steps__wrapper">


                    <?php while( have_rows('steps') ) : the_row(); 
                        $order = get_sub_field('order');
                        $step_text = get_sub_field('step_text');
                    ?>

                    <div class="step__wrapper">
                      <p class="font__rm mr-2">
                          <?php echo $order; ?>
                      </p>
                      <p class="font__rl text-left">
                          <?php echo $step_text; ?>
                      </p>
                    </div>
                    
                    <?php endwhile; ?>


                  </div>
                </div>
              </div>
              <a href="https://context.wsj.com/?mod=wsjeducation" id="<?php echo wsju_link_id( 'wsj-context', 'button' ); ?>"  target="_blank" rel="noopener noreferrer">
              <button type="button" class="cta btn mt-4 mb-4 font__rm bgcolor__pro text-center text-white">
                <p>Get Started</p>
                <div class="js-button-hover-bg"></div>
              </button>
              </a>
            </div>
          </div>
        </div>
      </section>


<?php endif; ?>
