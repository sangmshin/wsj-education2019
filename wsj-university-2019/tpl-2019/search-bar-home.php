<section class="search-bar bgcolor__home">
    <div class="container text-white text-center">
        <div class="row">
        <div class="col wrapper pt-3 pb-3 ">
            <p class="font__rl mb-0 mb-sm-2 mb-md-0 mr-sm-0 mr-md-4 mr-lg-4">
                <?php the_field( 'search_bar_copy' ); ?>
            </p>
            <a href="search-students/?mod=wsjedu&user_type=students" class="font__rl ml-1 mr-1 ml-sm-3 mr-sm-3 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4  p-2 mt-xs-2 mb-xs-2" onclick="utag.link({'event_name' : 'wsjedu_search school here'})"  id="<?php echo wsju_link_id( 'search-bar', 'students' ); ?>">
                Students
            </a>
            <a href="search-professors/?mod=wsjedu&user_type=professors" class="font__rl ml-1 mr-1 ml-sm-3 mr-sm-3 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4  p-2 mt-xs-2 mb-xs-2" onclick="utag.link({'event_name' : 'wsjedu_search school here'})"  id="<?php echo wsju_link_id( 'search-bar', 'professors' ); ?>">
                Professors
            </a>
            <a href="search-universities/?mod=wsjedu&user_type=university" class="font__rl ml-1 mr-1 ml-sm-3 mr-sm-3 ml-md-2 mr-md-2 ml-lg-3 mr-lg-3 ml-xl-4 mr-xl-4  p-2 mt-xs-2 mb-xs-2" onclick="utag.link({'event_name' : 'wsjedu_search school here'})"  id="<?php echo wsju_link_id( 'search-bar', 'universities' ); ?>">
                Universities
            </a>
        </div>
        </div>
    </div>
</section>