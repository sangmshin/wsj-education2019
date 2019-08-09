<?php
	/**
	 * Template Name: Home
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
	$SLSPage = get_page_by_title('University') -> ID;
	
?>

<div id="content" class="landing">

	


<div class="section1 aboutWSJ" style="min-height: 75px !important">
    
    </div>



			
		
<div class="profile_selector_holder">
  <p><strong style="font-size: 25px;">Welcome to WSJ Education</strong><br />
     Choose which best describes you:<br /><br />
  </p>
<div class="profile_selector">
<a href="<?php echo get_permalink($SLSPage); ?>" class="btn university">UNIVERSITY</a>
<a href="<?php echo get_permalink($professorsPage); ?>" class="btn professors">PROFESSOR</a>
<a href="<?php echo get_permalink($studentsPage); ?>" class="btn students">STUDENT</a>
</div>
</div>
  
<div class="section1 aboutWSJ" style="">
    
    </div>


	<div class="body-content">

		
	</div>

<div style="position: absolute; bottom: 0 !important; left: 0; width: 100%; display: block;"><?php get_footer(); ?></div>		

	</div>	

</div>


