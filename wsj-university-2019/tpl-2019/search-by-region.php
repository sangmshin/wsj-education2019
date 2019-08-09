<div class="form-inner search-box__wrapper__region">
    <div id="formElement8" class="region__wrapper mr-0 mr-sm-3 
    <?php if(wsju_page_slug() == 'professors' || wsju_page_slug() == 'search-universities') {
            echo "mb-4";
        } else if (wsju_page_slug() == 'universities'){
            echo "mb-0";
        }
    ?>" >
    <select id="state" name="state" class="inputfield">
        <option value="" selected="selected">Region</option>
        <option value="Alabama">Alabama</option>
        <option value="Alaska">Alaska</option>
        <option value="Arizona">Arizona</option>
        <option value="Arkansas">Arkansas</option>
        <option value="California">California</option>
        <option value="Colorado">Colorado</option>
        <option value="Connecticut">Connecticut</option>
        <option value="Delaware">Delaware</option>
        <option value="District of Columbia">District of Columbia</option>
        <option value="Florida">Florida</option>
        <option value="Georgia">Georgia</option>
        <option value="Hawaii">Hawaii</option>
        <option value="Idaho">Idaho</option>
        <option value="Illinois">Illinois</option>
        <option value="Indiana">Indiana</option>
        <option value="Iowa">Iowa</option>
        <option value="Kansas">Kansas</option>
        <option value="Kentucky">Kentucky</option>
        <option value="Louisiana">Louisiana</option>
        <option value="Maine">Maine</option>
        <option value="Maryland">Maryland</option>
        <option value="Massachusetts">Massachusetts</option>
        <option value="Michigan">Michigan</option>
        <option value="Minnesota">Minnesota</option>
        <option value="Mississippi">Mississippi</option>
        <option value="Missouri">Missouri</option>
        <option value="Montana">Montana</option>
        <option value="Nebraska">Nebraska</option>
        <option value="Nevada">Nevada</option>
        <option value="New Hampshire">New Hampshire</option>
        <option value="New Jersey">New Jersey</option>
        <option value="New Mexico">New Mexico</option>
        <option value="New York">New York</option>
        <option value="North Carolina">North Carolina</option>
        <option value="North Dakota">North Dakota</option>
        <option value="Ohio">Ohio</option>
        <option value="Oklahoma">Oklahoma</option>
        <option value="Oregon">Oregon</option>
        <option value="Pennsylvania">Pennsylvania</option>
        <option value="Rhode Island">Rhode Island</option>
        <option value="South Carolina">South Carolina</option>
        <option value="South Dakota">South Dakota</option>
        <option value="Tennessee">Tennessee</option>
        <option value="Texas">Texas</option>
        <option value="Utah">Utah</option>
        <option value="Vermont">Vermont</option>
        <option value="Virginia">Virginia</option>
        <option value="Washington">Washington</option>
        <option value="West Virginia">West Virginia</option>
        <option value="Wisconsin">Wisconsin</option>
        <option value="Wyoming">Wyoming</option>
        <option value=""></option>
        <option value="Africa">Africa</option>
        <option value="Asia">Asia</option>
        <option value="Europe">Europe</option>
        <option value="Middle East">Middle East</option>
        <option value="South America">South America</option>
    </select>
    </div>
    <input type="hidden" name="rep_type" id="rep_type" value="<?php if( wsju_page_slug() == 'professors' ) {
            echo "professor";
        } else if (wsju_page_slug() == 'universities' || wsju_page_slug() == 'search-universities'){
            echo "university";
        }
    ?>">
    <input type="hidden" name="state_cat_id" id="state_cat_id" value="76">
    <button type="submit" class="cta btn font__rm search-button search text-white <?php if( wsju_page_slug() == 'professors' ) {
            echo "mb-4 bgcolor__pro";
        } else if (wsju_page_slug() == 'universities'){
            echo "mb-0 bgcolor__btn__uni";
        } else if (wsju_page_slug() == 'search-universities'){
            echo "mb-4 bgcolor__uni";
        }
    ?> text-center" id="searchsubmit" value="SEARCH" onclick="fetch();utag.link({'event_name' : 'wsjedu_search state'});">
    <p>Search</p>
    <div class="js-button-hover-bg"></div>
    </button>

</div>
<!-- <div class="header-text__sub success-text">
    <p></p>
</div> -->
<div id="datafetch" class="text-center font__rl"></div>