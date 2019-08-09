    <section class="home-video pt-2 pb-5">
        <div class="container">
          <div class="row section-name__wrapper pt-5 pb-1">
            <p class="section-name text-center font__rb mr-auto ml-auto mb-4">
              <?php echo get_field('home_video')['title']; ?>
            </p>
          </div>

          <div class="row video-wrapper mt-4 pb-4">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
              <img src="<?php echo get_field('home_video')['poster_image']; ?>" alt="video cover" width="100%">
              
              <div id="<?php echo wsju_link_id( 'video', 'play button' ); ?>" class="js-modal-btn" data-video-id="nbAIl-1_cWE" onclick="utag.link({'event_name' : 'wsjedu_video start'})">
                <div class="playBtn"></div>
              </div>
            </div>
          </div>
        </div>
      </section>