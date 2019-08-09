<!-- search page new --><?php
  /**
   * Template Name: Search Page New
   *
   * @package WordPress
   * @subpackage WSJU
   * @since WSJU 1.0
   */

  get_header('2018');

  $page = get_page_by_title('Home');

  if ($page)
  {

    $id = $page -> ID;

  }

  // content variables
  $heroColor = get_field('hero_bg_color', $id);
  $heroImage = get_field('hero_image', $id)['url'];
  $heroImageAlt = get_field('hero_image_alt', $id);
  $heroHeadline = get_field('hero_headline', $id);
  $heroSubheadline = get_field('hero_subheadline', $id);
  $heroDisclaimer = get_field('hero_disclaimer', $id);
  $studentsPage = get_page_by_title('Students') -> ID;
  $professorsPage = get_page_by_title('Professors') -> ID;
  $SLSPage = get_page_by_title('Schools') -> ID;
  //$school_search_category_id = get_field('school_search_category_id', $id);
  $user_type = wsju_user_type( $_GET["user_type"] );

  add_action( 'pre_get_posts', function ( $q )
{
   
        // Get the search terms
        $search_terms = $q->get( 's' );

        // Set a 404 if s is empty
        if ( !$search_terms ) {
            add_action( 'wp', function () use ( $q )
            {
                $q->set_404();
                status_header(404);
                nocache_headers();
            });
        }
    
});

  $activationLinks = get_category_by_slug("activation-links");
  $activationLinksId = $activationLinks->term_id;
  
?>

<style>
.footer__social, .pre-footer.container-fluid {
  
  display: none !important;
}
</style>
  
  <div class="container-fluid main-inner">
        <div class="row">
          <div class="search__graphic text-center center-block">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/activate_graphic.png" title="Activate!" alt="Activate." width="250">
          </div>
          <div class="header header__initial text-center">
            <p class="header-text">
              Activate your
              <span class="nowrap">school-sponsored</span>
              <br>WSJ membership
            </p>
            <p class="header-text__sub">Look up your school below:</p>
          </div>
          <!-- 
          <div class="header header__hidden text-center">
            <p class="header-text">
              You have a
              <span class="nowrap">school-sponsored</span>
              <br/>WSJ membership
            </p>
            <p class="header-text__sub">Click the button below to activate:</p>
          </div>
          -->
        </div>
        <div class="row text-center search__form-wrapper">
          <form role="search" method="get" id="searchform" onsubmit="" class="searchform" action="../">
            <div>
              <input type="text" name="s" id="s" class="inputfield text-center input search-autocomplete" placeholder="Enter School Name">
              <input type="hidden" name="user_type" id="user_type" value="<?php echo $user_type; ?>">
              <input type="hidden" name="cat" id="cat" value="<?php echo $activationLinksId; ?>">
              <input type="hidden" name="page_type" id="page_type" value="searchresults">
              <input type="hidden" name="search_type" id="search_type" value="b">
              <!-- <input type="hidden" name="mod_code" id="mod_code" value="search-b"> -->
              <input type="submit" class="btn school-search-button search-button universities__color" id="searchsubmit" value="SEARCH" onclick="fbtrack2()">
            </div>
          </form>

          <?php 
            $click_here = 'https://store.wsj.com/shop/US/US/wsjstudenteos19/';

            if( $user_type === 'professors' ) {

                $click_here = 'https://buy.wsj.com/offers/pages/jieStudents?trackCode=aaqonp31&page=jieprof2#details';
            }

        ?>

        <p class="search-note"><span class="mobile-block">Don’t see your school?</span> <span class="mobile-block"><a href="<?php echo $click_here; ?>">Click here</a> for more membership options.</a></p>



        </div>


        <!-- 
        <div class="row school-results text-center center-block">
          <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">
              
            <ul class="list-unstyled">
              <li class="school-result">
                <a href="" style="text-decoration: none; color: white;">Indiana University - Bloomington</a>
              </li>
              <li class="school-result">
                <a href="" style="text-decoration: none; color: white;">Yale</a>
              </li>
              <li class="school-result">
                <a href="" style="text-decoration: none; color: white;">Dartmouth</a>
              </li>
            </ul>
          </div>
        </div>
        -->

      </div>

<?php get_footer( '2018' ); ?>