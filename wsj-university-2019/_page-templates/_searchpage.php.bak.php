<!-- search page bak --><?php
	/**
	 * Template Name: Search Page
	 *
	 * @package WordPress
	 * @subpackage WSJU
	 * @since WSJU 1.0
	 */

	get_header();

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

<div id="content" class="landing">

	


<div class="section1 aboutWSJ" style="min-height: 75px !important">
    
    </div>



			
		
<div class="profile_selector_holder">
  <p style="max-width: 600px; margin: 0 auto; display: block; overflow: hidden; text-align: left;"><strong style="font-size: 25px; font-family: 'Chronicle Display'">Activate your school-sponsored WSJ membership</strong><br><br>
  <p style="border-top: 1px #000 solid; max-width: 600px; margin: 0 auto;"></p><br><br><p></p>
  </p>
     <p style="font-family: 'Whitney SSm'; text-align: left; max-width: 600px; margin: 0 auto;">Look up your school below:
  </p>
  <br><br>
<div class="profile_selector" style="max-width: 600px; margin: 0 auto;">
<form role="search" method="get" id="searchform" onsubmit="return validate();" class="searchform" action="../">
				<div>
					<label class="screen-reader-text" for="s">Search for:</label>
					<input type="text" value="" name="s" id="s">
					<input type="hidden" name="cat" id="cat" value="<?php echo $activationLinksId; ?>" />
					<input type="submit" id="searchsubmit" value="Search" onClick="fbtrack2()">
				</div>
			</form>


</div>
</div>
  
<div class="section1 aboutWSJ" style="">
    
    </div>


	<div class="body-content">

		
	</div>

<div style="position: absolute; bottom: 0 !important; left: 0; width: 100%; display: block;"><?php get_footer(); ?></div>		

	</div>	

</div>

	
<script>
	

	function validate() {
 // check if input is bigger than 3
 var value = document.getElementById('s').value;
 if (value.length < 3) {
   window.alert('Please enter more than 2 letters.');
   return false; // keep form from submitting

 }

 // else form is good let it submit, of course you will 
 // probably want to alert the user WHAT went wrong.

 return true;
}
</script>


