<?php 
    $pagename = explode("-", wsju_page_slug());
?>
        
        <div class="row">
            <div class="col activate-wrapper ml-auto mr-auto">
              <div class="">

                <form role="search" method="get" id="searchform" onsubmit="" class="searchform" action="../">
                  <div class="input-group input-group-md mb-3 search-box__wrapper"> 
                    <input type="text" name="s" id="s" placeholder="Enter University Name" class="search-box form-control font__rl mr-3 search-autocomplete input" aria-label="Search">
                    <input type="hidden" name="user_type" id="user_type" value="<?php echo $pagename[1]; ?>">
                    <input type="hidden" name="cat" id="cat" value="2">
                    <input type="hidden" name="page_type" id="page_type" value="searchresults">
                    <input type="hidden" name="search_type" id="search_type" value="b">
                    <button id="searchsubmit" class="search cta btn font__rm 
                    <?php if( wsju_page_slug() == 'search-students' ) {
                        echo "bgcolor__stu";
                    } else if (wsju_page_slug() == 'search-professors'){
                        echo "bgcolor__pro";
                    }
                    ?> text-white text-center mb-4" onclick="utag.link({'event_name' : 'wsjedu_search'})">
                      <p>Search</p>
                      <div class="js-button-hover-bg"></div>
                    </button>
                  </div>
                </form>

              </div>
              <p class="text-center font__rl extra-note">
                <i>
                    <?php the_field('extra_note');?>
                </i>
              </p>
            </div>
          </div>


        </div>
      </section>