<?php get_header( '2019' ); ?>





    <div class="container-fluid hero"></div>
    <!-- video-header-wrapper -->









    <!-- MAIN CONTAINER -->
    <div class="main-content">




      <!-- FAQ -->
      <section class="activate pb-1 pt-0 pt-xs-5 pt-sm-5">

        <div class="container">
          <div class="row pt-5 pb-1">
            <div class="title__wrapper ml-auto mr-auto text-center">
              <div class="headline mb-3">
                <h1 class="font__rb pt-5">
                  FAQ
                </h1>
              </div>
            </div>
          </div>

          <div class="row search-option d-none d-sm-flex text-center ml-auto mr-auto mb-4 mb-xs-5 mb-sm-5 pb-3">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
              <a href="faq-students" target="_self">
                <button class="btn font__rl active">
                  STUDENTS
                </button>
              </a>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
              <a href="faq-professors" target="_self">
                <button class="btn font__rl">
                  PROFESSORS
                </button>
              </a>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
              <a href="faq-universities" target="_self">
                <button class="btn font__rl">
                  UNIVERSITIES
                </button>
              </a>
            </div>
          </div>

          

          <div class="row d-sm-none">
            <div class="col font__rm text-center mt-2 mb-5">
              <select id="themes-select" class="text-center">
                <option value="students" selected>
                  STUDENTS
                </option>
                <option value="professors">
                  PROFESSORS
                </option>
                <option value="universities">
                  UNIVERSITIES
                </option>
              </select>
            </div>
          </div>

        </div>
      </section>
      <!-- FAQ -->




      <!-- FAQs  -->

      <?php get_template_part( 'tpl-2019/faq' ); ?>
      
      <!-- FAQs  -->




    </div>
    <!-- MAIN-CONTENT -->







    <?php get_footer( '2019' ); ?>




  </div>
  <!-- PROFESSOR -->


</body>

</html>