<?php
	/**
	 * Template Name: student selected
	 *
	 * @package WordPress
	 * @subpackage WSJU
	 * @since WSJU 1.0
	 */

	get_header();

	$page = get_page_by_title('student_selected');

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
	$headline = get_field('student_headline', 1522);
	$headline2 = get_field('student_copy', 1522);
	$aboutheadline = get_field('about_headline', 1522);
	$aboutheadline2 = get_field('about_copy', 1522);
	$price1 = get_field('price1', 1522);
	$price2 = get_field('price2', 1522);
	$price1url = get_field('price1url', 1522);
	$price2url = get_field('price2url', 1522);
	$activation = get_field('site_activation_link', 1522);
	
?>



<div id="content" class="landing">

	<div class="sect home" style="">
		
			<div class="headlineHolder">
		<div class="wrapper" style="z-index: 10000;">	
        <h1 style=""><?php echo $headline; ?></h1>
        </div>
        
      	<div id="stipple-bg-headline" style=""></div>
      
      </div>
      <div class="break"></div>
      <div class="storyHolder">
      	<div class="wrapper">
        <p><?php echo $headline2; ?> </p>
        </div>
		<div id="color-bg-copy" style=""></div>
      	<div id="stipple-bg-copy" style=""></div>
        
      </div>
		
	</div>
	<div class="section1 aboutWSJ" style="">
		<br /><br />
		<div class="wrapper">

		<div class="welcome" style="">
				Welcome to <span style="color: #0CBCB1">WSJ Education.</span> <br />
				As a <span style="color: #0CBCB1;">Student,</span> you can access special offers.

		</div>

		<div class="bodyCopy" style="margin-top: 20px;">

			<h1><?php echo $aboutheadline; ?></h1>
				<p>&nbsp;</p>
				<p style="border-top: 2px solid #000;"></p>
				<p>&nbsp;</p>
				<p><?php echo $aboutheadline2; ?></p>
				<p>&nbsp;</p>
				<p style="border-top: 1px solid #000;"></p>

		
			
		</div>
			</div>
		</div>

		<div class="section2 eduPricing">
		<br /><br />
		<div class="wrapper">
		
		<div class="section2Left">
				<h1><?php echo get_the_title(1242); ?></h1>
				<p>&nbsp;</p>
				<p style="border-top: 2px solid #fff;"></p>
				<p>&nbsp;</p>
				<p><?php $id3 = 1242; $p = get_page($id3); echo apply_filters('the_content', $p->post_content); ?></p>
				
				<p>&nbsp;</p>
				<p style="border-top: 1px solid #fff;"></p>
				
				<!-- <a class="btn">LEARN MORE</a> -->
			</div>
		


		<div class="section2Right">
			
			<div class="pricingHolder">
        
          <!-- <div class="pricingLeft">
            <a href="#" class="pricingButton">Student</a>
            <br />
            <a  class="pricingButton grayed">Professor</a>
            <br />
            <a  class="pricingButton grayed" style="">University</a>
          </div> -->
          
          <div class="pricingRight">
	          
	          		<div style="border: 1px solid #0CBCB1; padding: 0px 20px 20px 20px;">
		          	<p class="pricing_name" style="max-width: 230px; margin: 0 auto; font-weight: 600;">Find out if your school offers complimentary WSJ membership</p><br /><br />
		          	
		          	<a id="students_search" class="pricing_btn" href="<?php echo $activation ?>">SEARCH</a>
		          </div>
	          
		          <div style="border: 1px solid #0CBCB1; padding: 0px 20px 20px 20px;">
		          	<p class="pricing_name">Student Flash Sale</p>
		          	<h2 class="pricing_offer"><?php echo $price1; ?></h2>
		          	<a id="students_pricing1" class="pricing_btn" target="_blank" href="<?php echo $price1url; ?>">ACT NOW</a>
		          </div>
	        
	           <!-- <div class="pricingRight" style="float: none; padding-left: 0; padding-top: 20px;">
	          
	          <div class="bestoffer" style="width:100%;background-color:#0CBCB1;color:#fff;height: 30px; text-align:center; padding: 10px 0px 0px 0px; font-family: 'Whitney SSm' ">BEST OFFER</div>
		          <div style="border: 1px solid #0CBCB1; padding: 0px 20px 20px 20px;">
		          	<h2 class="pricing_offer"><?php echo $price2; ?></h2>
		          	<p class="pricing_name">Annual Student Rate</p>
		          	<a id="students_pricing2" class="pricing_btn" target="_blank" href="<?php echo $price2url; ?>">ACT NOW</a>
		          </div>
	        
          </div> -->
          </div>


        
        </div>
      
      </div>
</div>




		</div>
			<?php if (get_field('students_legal', 1522)) : ?>
			<div class="sect section-8 section" id="legal" style="padding: 100px 0px 100px 0px; text-align: center; color: #000 !important; background-color: #ccc;  font-size: 13px;">
  <div class="wrapper">

   <p>*Amazon.com is not a sponsor of this promotion. Except as required by law, Amazon.com Gift Cards ("GCs") cannot be transferred for value or redeemed for cash. GCs may be used only for purchases of eligible goods on Amazon.com or certain of its affiliated websites. GCs cannot be redeemed for purchases of gift cards. Purchases are deducted from the GC balance. To redeem or view a GC balance, visit "Your Account" on Amazon.com. Amazon is not responsible if a GC is lost, stolen, destroyed or used without permission. For complete terms and conditions, see www.amazon.com/gc-legal. GCs are issued by ACI Gift Cards, Inc., a Washington corporation. All Amazon ™ & © are IP of Amazon.com, Inc. or its affiliates. No expiration date or service fees.</p> 

  </div>
  </div>
		
	<?php endif; ?>	

	<div class="body-content">

	
	</div>

	<?php get_footer(); ?>

	</div>	

</div>

<?php

	echo "<style>#header .masthead.wrapper h1 { display: block !important; }</style>";

?>


