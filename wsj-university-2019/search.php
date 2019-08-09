<!-- search.php -->
<?php
/**
 * The template for displaying search results pages.
 *
 * @package WSJU
 */

//$url = strtok($url, '?');


$search_type  = sanitize_text_field( $_GET['search_type'] );
$mod          = sanitize_text_field( $_GET['mod_code'] );

// New search (b) redirect code
if( $search_type === 'b' ) {

  $s      = sanitize_text_field( $_GET['s'] );
  $post   = get_page_by_title( $s, OBJECT, 'post' );
  //
  
  if ( $post != null ) {

    $val = esc_url( $post->post_content );
    $mod  = get_field( 'mod_code', $post->ID );
    //exit;
    
    if ( wp_http_validate_url( $val ) ) {

      //header('Location: ' . $val . '?mod=' . $mod );
      header('Location: ' . $val . $mod );
      exit;
    } else {

        // echo 'invalid, keep going';
    }
  } else {

    // echo 'no post keep going';
  }
}

  //exit;
  
  // get_header( '2018' );

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
  
  $studentsPage = get_page_by_title('Students') -> ID;
  $professorsPage = get_page_by_title('Professors') -> ID;
  $SLSPage = get_page_by_title('Schools') -> ID;
  //$url = the_content();
  remove_filter( 'the_content', 'wpautop' );
  $searchQuery = get_search_query();
  $modCode = get_field('mod_code', $id);
  //$state_cat_id = get_field('state_cat_id', $id);
  $user_type = wsju_user_type( $_GET["user_type"] );
    
?>


<?php get_header( '2019' ); ?>


    <!-- SEARCH TOP PART -->
      
    <!-- <?php 
    // get_template_part( 'tpl-2019/search-header' ); 
    ?> -->


    <!-- SEARCH TOP PART -->


      <!-- SEARCH  -->

      <!-- <?php 
    //   get_template_part( 'tpl-2019/search-stu-pro' )
      ; ?> -->

      <!-- SEARCH  -->



<div class="container-fluid hero"></div>



    <!-- MAIN CONTAINER -->
    <div class="main-content">




    <!-- CONTACT A REP -->
      <section class="activate pb-5 pt-0 pt-xs-5 pt-sm-5">

        <div class="container">
          <div class="row pt-5 pb-1">
            <div class="title__wrapper ml-auto mr-auto text-center">

            <?php if ( have_posts() ) : ?>
              <!-- SUCCESS start -->
              
              <div class="headline mb-3">
                <h1 class="font__rb pt-5">
                  YOU HAVE A UNIVERSITY-SPONSORED
                  <br/>
                  WSJ MEMBERSHIP
                </h1>
              </div>
              <div class="subheadline results ml-auto mr-auto">
                <h3 class="font__rl">
                  Click your school below to activate.
                </h3>
              </div>

              <!-- SUCCESS end -->
            <?php else : ?>
              <!-- FAILURE start-->

              <div class="headline mb-3">
                <h1 class="font__rb pt-5">
                  UNFORTUNATELY, YOUR UNIVERSITY DOES NOT PROVIDE SPONSORED WSJ&nbsp;MEMBERSHIPS
                </h1>
              </div>
              <div class="subheadline results ml-auto mr-auto">
                <h3 class="font__rl mt-5">
                  
                  <?php 

                    if( $user_type === 'professors' ) { 
                      echo 'Enroll in our referral program to earn a complimentary <span style="white-space:nowrap;">6-month</span> membership when you refer your students or view our <a href="http://subscribe.wsj.com/professor" target="_blank" id="search-wsjedu_click_professorsoffer">discounted membership offer.</a>';               
                    }
                    else { 
                      echo 'Explore the tools you need to turn what you love into a career.<br/><br/>Become a WSJ memeber for just <span class="font__rm" style="white-space:nowrap">$1 per week.</span>';
                    }
                  ?>
                  
                </h3>
              </div>
              <div class="mt-5">
                <?php 
                    $click_here = 'https://store.wsj.com/shop/US/US/wsjstudenteos19/';

                    if( $user_type === 'professors' ) {

                        $click_here = 'https://refer.wsj.net/?mod=wsjedu';
                    }
                ?>
                <a href="<?php echo $click_here; ?>" target="_blank" id="<?php echo wsju_link_id( 'search', 'wsjedu_click_offer' ); ?>">
                  <button type="button" class="cta results btn font__rm <?php if( $user_type === 'professors' ) { echo 'bgcolor__pro'; } else { echo 'bgcolor__stu'; } ?> text-center mb-4 ml-auto mr-auto text-white">
                    <p>
                      <?php if( $user_type === 'professors' ) { 
                          echo 'Join Referral Program'; 
                        } else {
                          echo 'View Membership Options' ;
                        } 
                      ?>
                    </p>
                    <div class="js-button-hover-bg"></div>
                  </button>
                </a>
              </div>

              <div class="mt-5">
                <a target="_self" href="<?php if( $user_type === 'professors' ) { echo 'search-professors/?mod=wsjedu&user_type=professors'; } else { echo 'search-students/?mod=wsjedu&user_type=students'; } ?>">
                  <button type="button" class="back-to-search btn font__rm text-center mb-4 ml-auto mr-auto text-white">
                    <p>
                      <span id="arrow">&#x2190;</span> &nbsp;BACK TO SEARCH
                    </p>
                    <div class="js-button-hover-bg"></div>
                  </button>
                </a>
              </div>

              <!-- FAILURE end-->
            <?php endif; ?>

            </div>
          </div>



          <div class="row">
            <div class="col activate-wrapper ml-auto mr-auto">
              
              <?php if ( have_posts() ) : ?>
                
                <ul class="list-unstyled">
                  
                  <?php while ( have_posts() ) : the_post(); ?>
                  
                  <li class="school-result">
                    <a id="search-results-<?php echo strtolower( str_replace( ' ', '-', get_the_title() ) ); ?>" href="<?php echo get_the_content() . get_field('mod_code' ); ?>" onclick="utag.link({'event_name' : 'wsjedu_click to activate_<?php the_title(); ?>'})">
                      <?php the_title(); ?>
                    </a>
                  </li>
                  
                  <?php endwhile;  ?>
                
                </ul>

                <?php 
                    $click_here = 'https://store.wsj.com/shop/US/US/wsjstudenteos19/';

                    if( $user_type === 'professors' ) {

                        $click_here = 'https://buy.wsj.com/offers/pages/jieStudents?trackCode=aaqonp31&page=jieprof2#details';
                    }
                ?>

              <p class="text-center font__rl extra-note mt-5">
                <i>
                  Don’t see your university? <span class="d-md-none"><br/></span>
                  <a href="<?php echo $click_here; ?>" target="_blank" 
                  id="<?php echo wsju_link_id( 'search not found', 'wsjedu_click_studentoffer' ); ?>">
                  Click here
                  </a> for more membership options.
                </i>
              </p>

              <?php else: ?>

            <?php endif; ?>
              
            </div>
          </div>
        </div>
      </section>




      <!-- MODULE 1 -->
      
      <!-- <?php 
      // get_template_part( 'tpl-2019/module-1' ); 
      ?> -->

      <!-- MODULE 1 -->



    </div>
    <!-- MAIN-CONTENT -->


    <?php get_footer( '2019' ); ?>





  </div>
  <!-- PROFESSOR -->

</body>

</html>