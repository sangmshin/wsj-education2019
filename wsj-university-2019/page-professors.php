<?php get_header( '2019' ); ?>




<?php get_template_part( 'tpl-2019/hero' ); ?>


    <!-- MAIN CONTAINER -->
    <div class="main-content">



      <!-- SEARCH BAR -->

      <?php get_template_part( 'tpl-2019/search-bar-stu-pro' ); ?>

      <!-- SEARCH BAR -->



            <!-- MODULE 1 -->
      
            <?php get_template_part( 'tpl-2019/module-1' ); ?>

            <!-- MODULE 1 -->


        <!-- TWO COLUMN MODULES -->

        <?php get_template_part( 'tpl-2019/module-two-column' ); ?>
        
        <!-- TWO COLUMN MODULES -->
        
        
        
        <!-- ONE COLUMN MODULE  -->
        
        <?php get_template_part( 'tpl-2019/module-one-column' ); ?>
      
      <!-- ONE COLUMN MODULE  -->





      <!-- TESTIMONIALS -->
      
      <?php get_template_part( 'tpl-2019/testimonials' ); ?>

      <!-- TESTIMONIALS -->





      <!-- CONTACT A REP -->
      <section class="activate pb-5 bgcolor__lgrey">

        <div class="container">
          <div class="row section-name__wrapper pt-5 pb-1">
            <h2 class="section-name font__rb mr-auto ml-auto mb-5">
              <!-- Contact a Rep -->
              <?php echo the_field('headline');?>
            </h2>
          </div>

          <div class="row">
            <div class="col activate-wrapper ml-auto mr-auto">
              <div class="searchform__wrapper header-text__sub success-text">
                <p class="font__rl bodycopy text-center mb-4">
                  <!-- For more information on using the Journal in class,<span class="d-none d-sm-block"></span> you can contact your dedicated WSJ Education representative by entering your region below.  -->
                  <?php echo the_field('subheadline');?>
                </p>

                <!-- SEARCH BY REGION -->
        
                <?php get_template_part( 'tpl-2019/search-by-region' ); ?>

                <!-- SEARCH BY REGION -->

              </div>
            </div>
          </div>

          </div>
      </section>
      <!-- CONTACT A REP -->


    </div>
    <!-- MAIN-CONTENT -->







    <?php get_footer( '2019' ); ?>




  </div>
  <!-- PROFESSOR -->


</body>

</html>