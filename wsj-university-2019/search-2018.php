<!-- search.php --><?php
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
    } 
    else {

        //echo 'invalid, keep going';
    }
  }
  else {

    //echo 'no post keep going';
  }
}

  //exit;
  
  get_header( '2018' );

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

<style>
body .main-content .header {

  margin: 40px auto 0;
}
.footer__social, .pre-footer.container-fluid {
  
  display: none !important;
}
@media (max-width:700px){
  .header.header__initial.fallback{
    width:100% !important;
  }
}
.main-content > p:first-child{
  display:none !important;
}
</style>

<div class="container-fluid main-inner">
        <div class="row">


          <?php if ( have_posts() ) : ?>


          <div class="header header__initial text-center">
            <p class="header-text"> 
              You have a
              <span class="nowrap">school-sponsored</span>
              <br>WSJ membership
            </p>
            <p class="header-text__sub">Click your school below to activate.</p>
          </div>


          <?php else : ?>


          <div class="header header__initial text-center fallback" style="width:690px;">
            <p class="header-text">
              Unfortunately, your school does not provide sponsored <span class="nowrap">WSJ memberships.</span>
            </p>
            <p class="header-text__sub" style="max-width: none;">

              <?php 

                if( $user_type === 'professors' ) { 
                  echo '<b>Enjoy a discounted membership rate for professors.</b><br>Or alternatively, you can earn a complimentary 6-month membership when you refer your students through the<br><a href="https://refer.wsj.net/?mod=wsjedu">WSJ Referral Program</a>.<br>&nbsp;';               
                }
                else { 
                  echo 'Be prepared with career advice, tips and daily scoops, whatever your major. Become a WSJ member for just $1 per week.<br>&nbsp;';
                }
              ?>
          </div>

          <div class="text-center search__form-wrapper">

            <?php if( $user_type === 'professors' ) { ?>
              <a id="<?php echo wsju_link_id( 'search', 'wsjedu_click_studentoffer' ); ?>" href="http://subscribe.wsj.com/professor" onClick="utag.link({'event_name' : 'wsjedu_click_professoroffer'});">
                <input type="button" class="btn school-search-button search-button universities__color" value="JOIN NOW" style="color: #fff;padding: 10px 30px;border-radius: 0px;">
              </a>
            <?php }

            else { ?>
              <a id="<?php echo wsju_link_id( 'search', 'wsjedu_click_professoroffer' ); ?>" href="https://store.wsj.com/shop/US/US/wsjstudenteos19/" onClick="utag.link({'event_name' : 'wsjedu_click_studentoffer'});">
                <input type="button" class="btn school-search-button search-button universities__color" value="VIEW MEMBERSHIP OPTIONS" style="color: #fff;padding: 10px 30px;border-radius: 0px;">
              </a>
            <?php } ?>

          </div>




          <?php endif; ?>


        </div>
        
    <div class="row school-results text-center center-block">
        <div class="col-lg-12 col-md-12  col-sm-12 col-xs-12">

            <?php if ( have_posts() ) : ?>

                <ul class="list-unstyled">

                    <?php while ( have_posts() ) : the_post(); ?>

                        <li class="school-result">
                            <a id="search-results-<?php echo strtolower( str_replace( ' ', '-', get_the_title() ) ); ?>" href="<?php echo get_the_content() . get_field('mod_code' ); ?>" style="text-decoration: none; color: white;"><?php the_title(); ?></a>
                            <!-- <a id="search-results-<?php echo strtolower( str_replace( ' ', '-', get_the_title() ) ); ?>" href="<?php echo get_the_content() . '?mod=' . $mod; ?>" style="text-decoration: none; color: white;"><?php the_title(); ?></a> -->
                        </li>
                    <?php endwhile;  ?>
                </ul>

                <?php 
                    $click_here = 'https://store.wsj.com/shop/US/US/wsjstudenteos19/';

                    if( $user_type === 'professors' ) {

                        $click_here = 'https://buy.wsj.com/offers/pages/jieStudents?trackCode=aaqonp31&page=jieprof2#details';
                    }

                ?>
               <p class="search-note"><span class="mobile-block">Don’t see your school?</span> <span class="mobile-block"><a id="<?php echo wsju_link_id( 'search not found', 'wsjedu_click_studentoffer' ); ?>" href="<?php echo $click_here; ?>">Click here</a> for more membership options.</a></p>
        
            <?php else: ?>

            <?php endif; ?>
        </div>
    </div>
</div>


<?php get_footer( '2018' ); ?>           










  