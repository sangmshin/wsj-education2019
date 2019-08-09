<?php
/**
 * The template for displaying search results pages.
 *
 * @package WSJU
 */

	get_header();





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
  $url = the_content();
  remove_filter( 'the_content', 'wpautop' );
  $searchQuery = get_search_query();
  $modCode = get_field('mod_code', $id);

  	
?>

<div id="content" class="landing">
<div id="current_query" style="display: none"><?php echo $searchQuery; ?></div>
	


<div class="section1 aboutWSJ" style="min-height: 5px !important">
    
    </div>



			
		
<div class="profile_selector_holder">
  
    
  <br><br>
<div class="profile_selector">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <p style="max-width: 600px; margin: 0 auto; display: block; overflow: hidden; text-align: center;">
    <strong style="font-size: 25px; font-family: 'Chronicle Display';">You have a school-sponsored WSJ membership</strong><br><br>
    <p style="border-top: 1px #000 solid; max-width: 600px; margin: 0 auto;"></p>
    <p></p>
  </p>
  <br />
   <p style="font-family: 'Whitney SSm'; text-align: center; max-width: 600px; margin: 0 auto;">Click the link below to activate:</p>
  <br />
	   <div style="max-width: 600px; margin: 0 auto; padding: 20px; background-color: #0CBCB1; color: #fff; ">

        <?php if (!$modCode) : ?>
          <h1 style="text-align: center"><a href="<?php echo the_content(); ?>" target="_blank"><?php the_title(); ?></a></h1>
          <?php else : ?> 
          <h1 style="text-align: center"><a href="<?php echo the_content().$modCode; ?>" target="_blank"><?php the_title(); ?></a></h1>
        <?php endif; ?>
 
     

     </div>
  <?php endwhile; else: ?>

  <p style="max-width: 500px; margin: 0 auto; display: block; overflow: hidden; text-align: center;"><strong style="font-size: 25px; font-family: 'Chronicle Display';">
  It looks like your school does not offer a sponsored WSJ Membership.</strong><br><br>
      <p style="border-top: 1px #000 solid; max-width: 600px; margin: 0 auto;"></p>
      <p></p>
  </p>
   <!-- <p style="font-family: 'Whitney'; text-align: left; max-width: 600px; margin: 0 auto;">Sorry!</p> -->
  <br /><br />
    <p style="font-size: 18px;"><?php _e('To take advantage of our exclusive student offer for only <br />$1 a week, click <a target="_blank" href="https://store.wsj.com/shop/US/US/wsjstudenteos19/" style="color:#0CBCB1; font-weight:600;">here.</a>'); ?></p>
  <?php endif; ?>
</div>
</div>
  
<div class="section1 aboutWSJ" style="">
    
    </div>


	<div class="body-content">

		
	</div>

<div style="position: absolute; bottom: 0 !important; left: 0; width: 100%; display: block;"><?php get_footer(); ?></div>		

	</div>	

</div>


 
    <script type="text/javascript">
          var utag_data = {
          'user_ref' : "V2-Y2IwMzdjNDItYjY",
          'user_type' : "nonsubscriber",
          'user_tags': "WSJ_SUB",
          'user_exp' : "default",
          'page_site_product' : "WSJEDU",
          'page_site' : "WSJ Education",
          'page_content_type' : "Research and Tools",
          'page_content_type_detail' : "School Search",
          'page_content_region' : "North_America_USA",
          'page_content_language' : "en-US",
          'page_content_source' : "WSJ Education",
          'page_section' : "Search results",
          'page_id' : document.getElementById('current_slug').textContent,
          'page_access' : "free",
          'search_keyword' : document.getElementById('current_query').textContent,
          'cms_name' : "Wordpress"
          }
          console.log(utag_data);
</script>             










  