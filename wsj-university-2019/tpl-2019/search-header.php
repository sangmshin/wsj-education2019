<div class="container-fluid hero"></div>


    <!-- MAIN CONTAINER -->
    <div class="main-content">


    <!-- CONTACT A REP -->
      <section class="activate pb-5 pt-0 pt-xs-5 pt-sm-5">

        <div class="container">
          <div class="row pt-5 pb-1">
            <div class="title__wrapper ml-auto mr-auto text-center">
              <div class="headline mb-3">
                <h1 class="font__rb pt-5">
                    <?php echo the_field('headline');?>
                </h1>
              </div>
              <div class="subheadline pb-4 pb-xs-5 pb-sm-5">
                
                <?php if( wsju_page_slug() == 'search-students' || wsju_page_slug() == 'search-professors' ): ?>
                <h3 class="font__rl">
                    <?php echo the_field('subheadline');?>
                </h3>
                <?php endif; ?>
                
                <?php if( wsju_page_slug() == 'search-universities' ): ?>
                <p>
                  <?php echo the_field('subheadline');?>
                </p>
                <?php endif; ?>

              </div>
            </div>
          </div>

          <div class="row d-none d-sm-flex text-center search-option ml-auto mr-auto mb-4 mb-xs-5 mb-sm-5 pb-3">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
              <a href="search-students/?mod=wsjedu&user_type=students" target="_self" onClick="utag.link({'event_name' : 'wsjedu_search school here'})"  id="<?php echo wsju_link_id( 'search-university', 'students' ); ?>">
                <button class="btn font__rl <?php if( wsju_page_slug() == 'search-students' ){ echo "active"; } ?>">
                  STUDENTS
                </button>
              </a>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
              <a href="search-professors/?mod=wsjedu&user_type=professors" target="_self" onClick="utag.link({'event_name' : 'wsjedu_search school here'})"  id="<?php echo wsju_link_id( 'search-university', 'professors' ); ?>">
                <button class="btn font__rl <?php if( wsju_page_slug() == 'search-professors' ){ echo "active"; } ?>" >
                  PROFESSORS
                </button>
              </a>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 col-xl-4 mt-2 mb-2">
              <a href="search-universities/?mod=wsjedu&user_type=university" target="_self" id="<?php echo wsju_link_id( 'search-rep', 'universities' ); ?>">
                <button class="btn font__rl <?php if( wsju_page_slug() == 'search-universities' ){ echo "active"; } ?>">
                  UNIVERSITIES
                </button>
              </a>
            </div>
          </div>


          <div class="row d-sm-none">
            <div class="col font__rm text-center mt-2 mb-5">
              <select id="themes-select" class="text-center">
                <option value="students" <?php if( wsju_page_slug() == 'search-students' ){ echo "selected"; } ?> id="<?php echo wsju_link_id( 'search-university-drop', 'students' ); ?>" >
                  STUDENTS
                </option>
                <option value="professors" <?php if( wsju_page_slug() == 'search-professors' ){ echo "selected"; } ?> id="<?php echo wsju_link_id( 'search-university-drop', 'professors' ); ?>" >
                  PROFESSORS
                </option>
                <option value="universities" <?php if( wsju_page_slug() == 'search-universities' ){ echo "selected"; } ?>  id="<?php echo wsju_link_id( 'search-rep-drop', 'universities' ); ?>">
                  UNIVERSITIES
                </option>
              </select>
            </div>
          </div>