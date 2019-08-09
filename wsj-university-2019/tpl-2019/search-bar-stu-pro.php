<section class="search-bar 
    <?php if( wsju_page_slug() == 'students' ) {
            echo "bgcolor__stu";
        } else if (wsju_page_slug() == 'professors'){
            echo "bgcolor__pro";
        }
    ?>">
    <div class="container text-white text-center">
        <div class="row">
        <div class="col wrapper pt-3 pb-3 pt-sm-4 pb-sm-4">
            <p class="font__rl mb-0 mb-sm-0 mb-md-0 mr-sm-0 mr-md-4 mr-lg-4">
                <?php the_field( 'search_bar_copy' ); ?>
            </p>
            <form role="search" method="get" id="searchform" onsubmit="" class="searchform" action="../">
                <div class="input-group input-group-md search-box__wrapper">
                <input type="text" name="s" id="s" placeholder="Enter University Name" class="search-box form-control mr-3 search-autocomplete input" aria-label="Search" autocomplete="off">
                <input type="hidden" name="user_type" id="user_type" value="<?php echo wsju_page_slug(); ?>">
                <input type="hidden" name="cat" id="cat" value="2">
                <input type="hidden" name="page_type" id="page_type" value="searchresults">
                <input type="hidden" name="search_type" id="search_type" value="b">
                <button id="searchsubmit" class="search cta btn font__rm 
                <?php if( wsju_page_slug() == 'students' ) {
                        echo "bgcolor__btn__stu";
                    } else if (wsju_page_slug() == 'professors'){
                        echo "bgcolor__btn__pro";
                    }
                ?> text-white text-center" onclick="fbtrack2();utag.link({'event_name' : 'wsjedu_search'})">
                    <p>Search</p>
                    <div class="js-button-hover-bg"></div>
                </button>
                </div>
            </form>
        </div>
        </div>
    </div>
</section>