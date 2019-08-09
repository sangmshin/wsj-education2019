<?php if( have_rows('faqs') ): ?>
    <section class="faqs">
        <div class="container pt-2 pb-5">

        <?php while( have_rows('faqs') ): the_row(); 
          
            $question = get_sub_field('question');
            $answer = get_sub_field('answer');
           
        ?>

          <div class="faq__wrapper row mt-4 mb-4 p-4 bgcolor__lgrey">
            <div class="question__wrapper">
              <h3 class="font__rm">
                 <?php echo $question; ?>
              </h3>
            </div>
            <div class="clickable-area"></div>
            <div class="answer__wrapper">
              <p class="font__rl">
                    <?php echo $answer; ?>
              </p>
            </div>
            <img width="26" class="toggleBtn" src="<?php echo get_template_directory_uri(); ?>/dist/img/faq-toggle.svg" alt="open and close"/>
          </div>

        <?php endwhile; ?>

         
        </div>
      </section>

<?php endif; ?>
