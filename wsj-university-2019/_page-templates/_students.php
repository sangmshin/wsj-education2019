<?php
/**
 * Template Name: Students
 *
 * @package WordPress
 * @subpackage WSJU
 * @since WSJU 1.0
 */

get_header(); ?>

<?php

  // pull in page ID
  $myId = get_the_ID();

  // Query DB for all pages
  $pages = get_posts(array(
    'numberposts' => -1,
    'post_type' => 'page',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'depth' => 1,
    'post_parent' => $myId
  ));

  // Create array of page IDs
  $idArray = array();

  array_push( $idArray, $myId );

  foreach( $pages as $page ) 
  {
    array_push($idArray, $page->ID);
  }

  // set boolean if page equals Students landing page
  $studentsCheck;
  if (is_page('Students'))
    $studentsCheck = true;
  else
    $studentsCheck = false;

  $faqsCheck;
  $aboutCheck;

  if (is_page('FAQs'))
  	$faqsCheck = true;
  else
  	$faqsCheck = false;

  if (is_page('About WSJ'))
  	$aboutCheck = true;
  else
  	$aboutCheck = false;

  // content variables
  $heroColor = get_field('hero_bg_color', $myId);
  $heroImage = get_field('hero_image', $myId)['url'];
  $heroImageAlt = get_field('hero_image_alt', $myId);
  $heroHeadline = get_field('hero_headline', $myId);
  $heroSubheadline = get_field('hero_subheadline', $myId);
  $pageTitle = get_the_title($myId);  

  // misc variables
  // number of pages in array
  $total = count($idArray);
  // students page ID
  $studentsId = get_page_by_title('Students') -> ID;
  // page slug of current page
  $pageSlug = get_post( $myId )->post_name;
  // primary/secondary page color hex values set in WP
  $myHeroColor = get_field('hero_bg_color', $myId);
  $featureNavColor = get_field('secondary_nav_color', $myId);
  $childrenPages = get_page_children($myId, $pages);
  $roundelImage = get_field('roundel_image', $studentsId)['url'];
  $roundelImageAlt = get_field('roundel_image_alt', $studentsId);

  // variables exclusive to Students subpages
  if (!$studentsCheck && !$faqsCheck) 
  {
    $page = get_queried_object();
    $pageParent = strtolower(get_the_title($page->post_parent));

    $section1 = $childrenPages[0];
    $section2 = $childrenPages[1];
    $section3 = $childrenPages[2];

    if (sizeof($childrenPages) > 3)
    	$section4 = $childrenPages[3];

    if (sizeof($childrenPages) > 4)
    	$section5 = $childrenPages[4];

    if (sizeof($childrenPages) > 5)
    	$section6 = $childrenPages[5];

    // Section 1 variables
    $section1Header = get_field('section_name', $section1);
    $section1Copy = get_field('section_copy', $section1);
    $section1Image = get_field('section_image', $section1)['url'];
    $section1ImageAlt = get_field('section_image_alt', $section1);
    $section1CtaOn = get_field('cta_on', $section1);
    $section1CtaUrl = get_field('cta_url', $section1);
    $section1CtaText = get_field('cta_text', $section1);
    $section1QuoteOn = get_field('quote_on', $section1);
    $section1QuoteText = get_field('quote_text', $section1);
    $section1QuoteText = get_field('quote_text', $section1);
    $section1QuoteSource = get_field('quote_source', $section1);

	  if ($aboutCheck)
	  {
	  	$digitalHeader = get_field('digital_header', $section2);
	  	$digitalCopy = get_field('digital_copy', $section2);
	  	$digitalCtaText = get_field('digital_cta_text', $section2);
	  	$digitalCtaUrl = get_field('digital_cta_url', $section2);
	  	$digitalImage = get_field('digital_image', $section2)['url'];

	  	$digitalBullets = get_posts(array(
	      'numberposts' => -1,
	      'post_type' => 'post',
	      'category_name' => 'students-online-bullets',
	      'orderby' => 'menu_order',
	      'order' => 'ASC',
	      'depth' => 1,
	      'post_status' => 'publish',
	      'post_parent' => 0	  		
	  	));

	  	$printHeader = get_field('print_header', $section3);
	  	$printCopy = get_field('print_copy', $section3);
	  	$printCtaText = get_field('print_cta_text', $section3);
	  	$printCtaUrl = get_field('print_cta_url', $section3);
	  	$printImage = get_field('print_image', $section3)['url'];
	  	$printImageAlt = get_field('print_image_alt', $section3);

	  	$videoEmbed = get_field('video_embed', $section1);
	  }

	  if ($pageSlug == "social")
	  {
	  	$facebookEmbed = get_field('social_embed', $section1);	  	
	  	$twitterEmbed = get_field('social_embed', $section2);
			
			$videoTitle1 = get_field('video_title_1', $section2);
			$videoDescription1 = get_field('video_description_1', $section2);
			$videoUrl1 = get_field('video_url_1', $section2);

			$videoTitle2 = get_field('video_title_2', $section2);
			$videoDescription2 = get_field('video_description_2', $section2);
			$videoUrl2 = get_field('video_url_2', $section2);

			$videoTitle3 = get_field('video_title_3', $section2);
			$videoDescription3 = get_field('video_description_3', $section2);
			$videoUrl3 = get_field('video_url_3', $section2);	
	  }

    // Section 2 variables

    $section2Header = get_field('section_name', $section2);
    $section2Copy = get_field('section_copy', $section2);
    $section2Image = get_field('section_image', $section2)['url'];
    $section2ImageAlt = get_field('section_image_alt', $section2);
    $section2CtaOn = get_field('cta_on', $section2);
    $section2CtaUrl = get_field('cta_url', $section2);
    $section2CtaText = get_field('cta_text', $section2);
    $section2QuoteOn = get_field('quote_on', $section2);
    $section2QuoteText = get_field('quote_text', $section2);
    $section2QuoteSource = get_field('quote_source', $section2);    

    // Section 3 variables

    $section3Header = get_field('section_name', $section3);
    $section3Copy = get_field('section_copy', $section3);
    $section3Image = get_field('section_image', $section3)['url'];
    $section3ImageAlt = get_field('section_image_alt', $section3);
    $section3CtaOn = get_field('cta_on', $section3);
    $section3CtaUrl = get_field('cta_url', $section3);
    $section3CtaText = get_field('cta_text', $section3);
    $section3QuoteOn = get_field('quote_on', $section3);
    $section3QuoteText = get_field('quote_text', $section3);
    $section3QuoteSource = get_field('quote_source', $section3);    

    if ($section4) 
    {
      // Section 4 variables
      $section4Header = get_field('section_name', $section4);
      $section4Copy = get_field('section_copy', $section4);
      $section4Image = get_field('section_image', $section4)['url'];
      $section4ImageAlt = get_field('section_image_alt', $section4);
      $section4CtaOn = get_field('cta_on', $section4);
      $section4CtaUrl = get_field('cta_url', $section4);
      $section4CtaText = get_field('cta_text', $section4);
      $section4QuoteOn = get_field('quote_on', $section4);
      $section4QuoteText = get_field('quote_text', $section4);
      $section4QuoteSource = get_field('quote_source', $section4);      
    }

    if ($section5) 
    {
      // Section 4 variables
      $section5Header = get_field('section_name', $section5);
      $section5Copy = get_field('section_copy', $section5);
      $section5Image = get_field('section_image', $section5)['url'];
      $section5ImageAlt = get_field('section_image_alt', $section5);
      $section5CtaOn = get_field('cta_on', $section5);
      $section5CtaUrl = get_field('cta_url', $section5);
      $section5CtaText = get_field('cta_text', $section5);
      $section5QuoteOn = get_field('quote_on', $section5);
      $section5QuoteText = get_field('quote_text', $section5);
      $section5QuoteSource = get_field('quote_source', $section5);      
    }

    if ($section6) 
    {
      // Section 4 variables
      $section6Header = get_field('section_name', $section6);
      $section6Copy = get_field('section_copy', $section6);
      $section6Image = get_field('section_image', $section6)['url'];
      $section6ImageAlt = get_field('section_image_alt', $section6);
      $section6CtaOn = get_field('cta_on', $section6);
      $section6CtaUrl = get_field('cta_url', $section6);
      $section6CtaText = get_field('cta_text', $section6);
      $section6QuoteOn = get_field('quote_on', $section6);
      $section6QuoteText = get_field('quote_text', $section6);
      $section6QuoteSource = get_field('quote_source', $section6);      
    }        
  }

  if ($faqsCheck)
  {
    $section1 = $childrenPages[0];
    $section2 = $childrenPages[1];

  	$faqCopy = get_field('faq_copy', $section1);
  	$faqContact = get_field('faq_contact', $section1);
    $args = array(
      'numberposts' => -1,
      'post_type' => 'post',
      'category_name' => 'faqs-students',
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'depth' => 1,
      'post_status' => 'publish',
      'post_parent' => 0
    );

    $faqs = get_posts($args);

  	$section2Header = get_field('section_name', $section2);
  	$section2Copy = get_field('section_copy', $section2);
  	$section2Image = get_field('section_image', $section2)['url'];
  	$section2CtaOn = get_field('cta_on', $section2);
  	$section2CtaUrl = get_field('cta_url', $section2);
  	$section2CtaText = get_field('cta_text', $section2);

  }
 
?>

<div id="content" <?php if ($pageParent) echo 'class="' . $pageParent . '"'; ?>>
	 <div class="main-wrapper <?php echo $pageSlug; ?>">
 	    <div class="hidden">
 	    	<div id="wp-path"><?php echo get_template_directory_uri(); ?></div>
 	    </div>
		<div id="js-page-check" style="display:none;"><?php echo $studentsCheck; ?></div>
		 <div id="hero-wrapper" class="lp <?php echo $pageSlug; ?>">
			<div class="hero-content">
			 <div class="hero-slide">
				 <div class="heroBg">

					<div id="js-color-info" style="display:none;">
					 <?php echo get_field('hero_bg_color', $myId); ?>
					</div>

					<div id="js-secondary-color-info" style="display:none;">
					 <?php echo get_field('secondary_nav_color', $myId); ?>
					</div>

					<script>
						jQuery('#ordering-info').css('background-color', jQuery('#js-color-info').html());
					</script>
					
					<?php if ($studentsCheck) : ?>

						<?php for ($d = 1; $d < sizeof($idArray); $d++) : ?>

							<div id="js-subpage-main-color-<?php echo $d; ?>" style="display: none;">
								<?php echo get_field('hero_bg_color', $idArray[$d]); ?>
							</div>

							<div id="js-subpage-second-color-<?php echo $d; ?>" style="display: none;">
								<?php echo get_field('secondary_nav_color', $idArray[$d]); ?>
							</div>

						<?php endfor; ?>

					<?php endif; ?>					

					<div class="itemCenter alignNone">

						<div class="img alignL">							
              <img class="alignR" src="<?php echo $heroImage; ?>" alt="<?php echo $heroImageAlt; ?>">
            </div>
            <div class="headline alignR">
							<a href="<?php echo get_field('section4_cta_url', $studentsId); ?>">
								<h2 class="offer-wrapper"><img class="offer desktop" src="<?php echo $roundelImage; ?>" alt="<?php echo $roundelImageAlt; ?>"></h2>
							</a>            	
              <hr>
              <?php
              	if ($studentsCheck)
              		echo '<h2 style="text-align: left;">' . $heroHeadline . '</h2>';
              	else
              		echo '<h1 style="text-align: left;">' . $heroHeadline . '</h1>';
              ?>
              <?php if ($studentsCheck) echo '<hr>'; ?>
              <div class="sub-text">
              	<?php echo $heroSubheadline; ?>
              </div>
            </div>

					</div>
				</div>

			 </div>
			</div>
		 </div>

		 <?php if (!$studentsCheck) : ?>
			<div class="page-nav" id="page-nav" style="background-color: <?php echo $featureNavColor; ?>; <?php if ($pageSlug == basename($idArray[2])) echo "height: 75px;"; ?>">
			 <ul>
				<?php

					$ascend = 0;

					echo '<li><a href="' . get_page_uri($studentsId) . '">HOME</a>';
					echo '<div class="divider vertical"></div></li>';

			 		foreach ($childrenPages as $childPage)
					{
						$childPageSlug = get_post($childPage)->post_name;
						$childPageTitle = strtoupper(get_the_title($childPage));

						$ascend++;
						if ($childPageTitle !== "VIDEO")
						{
							echo '<li><a href="#'. $childPageSlug . '" id="section-' . $ascend . '-button">' . $childPageTitle . '</a>';
							if ($childPage !== end($childrenPages))
								echo '<div class="divider vertical"></div></li>';
							else
								echo '</li>';
						}
					}
				?>
			 </ul>
			</div>
		 <?php endif; ?>

			<div class="body-content" id="body-content">

<!-- 			 <div class="sect section-medium below-hero" <?php if ($studentsCheck) echo 'style="background-color:' . $featureNavColor . '"'; ?>>
				<div class="wrapper">
				 <div class="text-wrapper">
				 </div>
				</div>
				<div class="circle">
				 <?php if ($studentsCheck) : ?>
					<img src="<?php echo wp_upload_dir()['url'] . '/arrow-light.png'; ?>">
				 <?php else : ?>
					<img src="<?php echo wp_upload_dir()['url'] . '/arrow.png'; ?>">
				 <?php endif; ?>
				</div>
			 </div> -->

				<?php if ($studentsCheck) : ?>

			 		<div class="sect section-medium section-1" id="section-1">
					 <div class="wrapper">
						<?php $ascend_2 = 0; ?>
						<?php for ($c = 1; $c < 4; $c++) : ?>
						 <?php $ascend_2++; ?>
							<a href="<?php echo get_permalink($idArray[$c]); ?>" class="dark">						 
							 <div class="subpage-wrapper wrapper-<?php echo $c; ?>">

								<div class="body-wrapper">
									 <div class="subpage-title <?php echo get_post($idArray[$c])->post_name; ?>" style="color: <?php echo get_field('hero_bg_color', $idArray[$c]); ?>">
										<?php echo get_the_title($idArray[$c]); ?>
									 </div>
									 <div class="subpage-text">
										<?php echo get_field('subpage_description_' . $ascend_2, $myId); ?>
									 </div>
									</div>
										<div class="subpage-cta <?php echo get_post($idArray[$c])->post_name; ?> btn" id="js-subpage-button-hover-<?php echo $c; ?>" style="background-color: <?php echo get_field('hero_bg_color', $idArray[$c]); ?>">
										 GO
										</div>
							 </div>
							</a>						 
						<?php endfor; ?>
						<div class="clearBoth"></div>
					 </div>
					</div>

				<?php elseif ($faqsCheck) : ?>

				<div class="sect section-medium section-1" id="section-1">
					<div class="wrapper <?php echo $pageSlug; ?>-1">

						<div class="text-wrapper">
							<h2 style="color:<?php echo $myHeroColor; ?>">
								<?php echo $pageTitle; ?>
							</h2>
							<p>
								<?php echo $faqCopy; ?>
							</p>
							<div class="faq-section accordian-wrapper faqs" id="accordian-wrapper">
								<?php

	                $faqsSize = sizeof($faqs);

	                for ($k = 0; $k < $faqsSize; $k++)
	                {
	                  $faqId = $faqs[$k] -> ID;

	                  echo '<h3 class="accordian-header" data-expand="answer-' . $k . '" style="font-size:1em;"><span class="plus-minus">&#43; </span>' . get_post($faqId)->post_title . '</h3>' ;
	                  echo '<hr style="background-color: ' . $myHeroColor . '">';
	                  echo '<div class="answer" id="answer-' . $k . '">' . get_post($faqId)->post_content . '</div>';
	                }


								?>
							</div>
							<p class="faq-contact" style="color: <?php echo $myHeroColor; ?>;font-weight:600;">
								<?php echo $faqContact; ?>
							</p>
						</div>

					</div>

				</div>

				<div class="sect section-medium section-2" id="section-2" style="background-color:<?php echo $featureNavColor; ?>; color: #fff;">
					<div class="wrapper <?php echo $pageSlug; ?>-2">

						<div class="text-wrapper">
							<h2>
								<?php echo $section2Header; ?>
							</h2>
							
							<p>
								<?php echo $section2Copy; ?>
							</p>
								
							<?php if ($section2CtaOn) : ?>
								<div class="cta-wrapper">
									<a href="<?php echo $section2CtaUrl; ?><?php if ($pageTitle == "FAQs") echo '/?mod=WSJUStudents' . $pageTitle; ?>" target="_blank">
										<div class="greyBoxBtn">
											<?php echo $section2CtaText; ?>
										</div>
									</a>
								</div>
							<?php endif; ?>
						</div>

							<?php if ($section2Image) : ?>
								<img src="<?php echo $section2Image; ?>" alt="<?php echo $section2ImageAlt; ?>">
							<?php endif; ?>

					</div>

				</div>				

				<?php else : ?>

			 	<div class="sect section-1" id="section-1">
					<div class="wrapper <?php echo $pageSlug ;?>-1">
						<div class="text-wrapper <?php echo $pageSlug ;?>-1">
							<h2 class="<?php echo $pageSlug; ?>-1" style="color: <?php echo $myHeroColor; ?>">
								<?php echo $section1Header; ?>
							</h2>
							<p class="<?php echo $pageSlug; ?>-1">
								<?php echo $section1Copy; ?>
							</p>

							<?php if ($facebookEmbed) : ?>
							 	<?php if ($section1CtaOn) : ?>

									<div class="cta-wrapper">
									 	<a href="<?php echo $section1CtaUrl; ?>" target="_blank">
											<div class="darkGreyBoxBtn">
											 <?php echo $section1CtaText; ?>
											</div>
										</a>
									</div>

								<?php endif; ?>
							<?php endif; ?>

						</div>

						<?php if ($section1Image) :?>
							<img class="<?php echo $pageSlug; ?>-1" src="<?php echo $section1Image; ?>" alt="<?php echo $section1ImageAlt; ?>">
						<?php endif; ?>

						<?php if (!$facebookEmbed) : ?>
						 	<?php if ($section1CtaOn) : ?>

								<div class="cta-wrapper">
								 	<a href="<?php echo $section1CtaUrl; ?>" target="_blank">
										<div class="darkGreyBoxBtn">
										 <?php echo $section1CtaText; ?>
										</div>
									</a>
								</div>

							<?php endif; ?>
						<?php endif; ?>

							<?php if ($aboutCheck) : ?>
								<div class="video-embed">
									<?php echo $videoEmbed; ?>
								</div>
							<?php endif; ?>

							<?php if ($facebookEmbed) : ?>
								<div class="feed-wrapper">
									<div class="arrow-up facebook" id="arrow-up-facebook">
										<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-lrg.png">
									</div>

									<div class="arrow-down facebook" id="arrow-down-facebook">
										<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-down-lrg.png">
									</div>
									<div class="social-wrapper facebook" id="social-wrapper-facebook">						
										<?php echo $facebookEmbed; ?>
									</div>
								</div>
							<?php endif; ?>								

<!-- 							<?php if ( (get_field('cta_text2', $childrenPages[0]) == "") == false || (get_field('cta_text2', $childrenPages[0]) == null) == false) : ?>

								<a href="<?php echo get_field('cta_url2', $childrenPages[0]); ?>">
									 <div class="darkGreyBoxBtn">
										<?php echo get_field('cta_text2', $childrenPages[0]); ?>
									 </div>
								</a>
							 <?php endif; ?>
							 <?php if ( (get_field('cta_text3', $childrenPages[0]) == "") == false || (get_field('cta_text3', $childrenPages[0]) == null) == false) : ?>

								<hr style="background-color: <?php echo $myHeroColor; ?>">
								<a href="<?php echo get_field('cta_url3', $childrenPages[0]); ?>" style="color: <?php echo $myHeroColor; ?>"><?php echo get_field('cta_text3', $childrenPages[0]); ?></a>
							 <?php endif; ?> -->

							</div>

					</div>
				<?php endif; ?>

			

			 <?php if (!$studentsCheck && !$faqsCheck && !$aboutCheck) : ?>

					<div class="sect section-2 <?php if ($pageSlug !== "about-wsj") echo "section-medium"; ?>" id="section-2">

						<div class="wrapper <?php echo $pageSlug ;?>-2">
						 <div class="text-wrapper <?php echo $pageSlug ;?>-2">
							<h2 class="<?php echo $pageSlug; ?>-2" style="color: <?php echo $myHeroColor; ?>">
								<?php echo $section2Header; ?>
							</h2>
							<p class="<?php echo $pageSlug; ?>-2">
								<?php echo $section2Copy; ?>
							</p>

							<?php if ($section2CtaOn) : ?>
							 <div class="cta-wrapper">
								<a href="<?php echo $section2CtaUrl; ?>" target="_blank">
								 <div class="darkGreyBoxBtn btn" id="js-button-hover-2" style="background-color: <?php echo $myHeroColor; ?>">
									<?php echo $section2CtaText; ?>
								 </div>
								</a>
							 </div>
							<?php endif; ?>
						
						</div>

						<?php if ($twitterEmbed) : ?>
							<div class="feed-wrapper">
								<div class="arrow-up twitter" id="arrow-up-twitter">
									<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-up-lrg.png">
								</div>

								<div class="arrow-down twitter" id="arrow-down-twitter">
									<img src="<?php echo get_template_directory_uri(); ?>/images/arrow-down-lrg.png">
								</div>

								<div class="social-wrapper twitter" id="social-wrapper-twitter">
									<?php echo $twitterEmbed; ?>
								</div>
							</div>
						<?php endif; ?>

						<?php if ($section2Image) : ?>
						 	<img class="<?php echo $pageSlug; ?>-2" src="<?php echo $section2Image; ?>" alt="<?php echo $section2ImageAlt; ?>">
						<?php endif; ?>

					<?php if ($section2QuoteOn) : ?>
						<div class="quote-wrapper">
						 <hr style="background-color: <?php echo $myHeroColor; ?>">
							<p class="quote">
								<?php echo $section2QuoteText; ?>
							</p>
							<p class="quote-source">
								<?php echo $section2QuoteSource; ?>
							</p>
						 <hr style="background-color: <?php echo $myHeroColor; ?>">
						</div>
					<?php endif; ?>

					</div>
				</div>

			<?php elseif ($aboutCheck) : ?>

					<div class="sect section-medium digital-print" id="section-2">
					
						<div class="wrapper digital" style="border-bottom: 1px solid <?php echo $myHeroColor?>;">

							<div class="text-wrapper">
								<h2 style="color: <?php echo $myHeroColor; ?>">
									<?php echo $digitalHeader; ?>
								</h2>
								<p>
									<?php echo $digitalCopy; ?>
								</p>
								<!-- WSJ.com bullets here -->
								<div class="digital-bullets accordian-wrapper" id="accordian-wrapper">
									<?php for($i = 0; $i < sizeof($digitalBullets); $i++) : ?>
										<?php 

											$bulletId = $digitalBullets[$i]->ID;
											$bulletPost = get_post($bulletId);
											$bulletTitle = $bulletPost->post_title;
											$bulletDesc = $bulletPost->post_content;

										?>
										<p class="accordian-header" data-expand="answer-<?php echo $i; ?>" style="color:<?php echo $myHeroColor; ?>">
											<span class="plus-minus">&#43; </span>
											<?php echo $bulletTitle; ?>
										</p>
										<div class="answer" id="answer-<?php echo $i; ?>">
											<?php echo $bulletDesc; ?>
										</div>
									<?php endfor; ?>
								</div>
							</div>

							<?php if ($digitalImage) : ?>
								<img src="<?php echo $digitalImage; ?>" alt="<?php echo $digitalImageAlt; ?>">
							<?php endif; ?>

						</div>

						<div class="wrapper print" id="section-3">

							<div class="text-wrapper">
								<h2 style="color:<?php echo $myHeroColor; ?>">
									<?php echo $printHeader; ?>
								</h2>

								<p>
									<?php echo $printCopy; ?>
								</p>
							</div>

							<?php if ($printImage) : ?>
								<img src="<?php echo $printImage; ?>" alt="<?php echo $printImageAlt; ?>">
							<?php endif; ?>
						</div>
					</div>

			 <?php endif; ?>

			 <?php if (!$studentsCheck && !$faqsCheck && !$aboutCheck) : ?>

				<div class="sect section-3 section-dark" style="background-color: <?php if ($pageSlug == "social") echo $featureNavColor; else echo $myHeroColor; ?>" id="section-3">

				 <div class="wrapper <?php echo $pageSlug ;?>-3">
					<div class="text-wrapper <?php echo $pageSlug ;?>-3">
					 <h2 class="<?php echo $pageSlug; ?>-3">
					 	<?php echo $section3Header; ?>
					 </h2>
					 <p class="<?php echo $pageSlug; ?>-3">
					 	<?php echo $section3Copy; ?>
					 </p>
					</div>

					<?php if ($section3Image) : ?>
						<img class="<?php echo $pageSlug; ?>-3" src="<?php echo $section3Image; ?>" alt="<?php echo $section3ImageAlt; ?>">
					<?php endif; ?>

					<?php if ($pageSlug == "social") : ?>
					
						<div class="video-section" id="video-section">
							<?php for ($e = 1; $e < 4; $e++) : ?>

								<div class="video-wrapper" id="video-wrapper-<?php echo $e; ?>">

									<div class="video-text alignR">

										<div class="video-title" id="video-title-<?php echo $e; ?>" data-youtube-id="<?php echo get_field('video_embed_' . $e, $section3); ?>"><?php echo get_field('video_title_' . $e, $section3); ?></div>									

										<div class="video-description">
											<?php echo get_field('video_description_' . $e, $section3); ?>
										</div>

									</div>

									<div class="youtube-container" id="youtube-container">
									   <div class="youtube-player" data-id="<?php echo get_field('video_embed_' . $e, $section3); ?>"></div>
									</div>

								</div>

							<?php endfor; ?>
						</div>
					<?php endif; ?>

					 <?php if ($section3CtaOn) : ?>
						<div class="cta-wrapper">
						 <a href="<?php echo $section3CtaUrl; ?>" target="_blank">
							<div class="darkGreyBoxBtn">
							 <?php echo $section3CtaText; ?>
							</div>
						 </a>
						</div>
					 <?php endif; ?>					

				 </div>

				</div>

			 <?php endif; ?>

			 <?php if (sizeof($childrenPages) > 3) : ?>
				<div class="sect section-4 section-light" id="section-4" <?php if ($aboutCheck) echo 'style="background-color:' . $myHeroColor . ';"'; ?>>
					 <div class="wrapper <?php echo $pageSlug ;?>-4">
						<div class="text-wrapper <?php echo $pageSlug ;?>-4">
						 <h2 class="<?php echo $pageSlug; ?>-4" style="color:<?php if ($aboutCheck) echo '#fff'; else echo $myHeroColor; ?>">
						 	<?php echo $section4Header; ?>
						 </h2>
						 <p class="<?php echo $pageSlug; ?>-4" <?php if ($aboutCheck) echo 'style="color:#fff";'; ?>>
						 	<?php echo $section4Copy; ?>
						 </p>

						 <?php if ($section4CtaOn) : ?>
							<div class="cta-wrapper">
							 <a href="<?php echo $section4CtaUrl; ?>" target="_blank">
								<div class="darkGreyBoxBtn btn"
									<?php if ($pageSlug !== "about-wsj") : ?>
										id="js-button-hover-4" style="background-color: <?php echo $myHeroColor; ?>"
									<?php endif; ?>
								>
							 		<?php echo $section4CtaText; ?>

								</div>
							 </a>
							</div>
						 <?php endif; ?>
						</div>

						<?php if ($section4Image) : ?>
							<img class="<?php echo $pageSlug; ?>-4" src="<?php echo $section4Image; ?>" alt="<?php echo $section4ImageAlt; ?>">
						<?php endif; ?>
					 </div>
				</div>
			 <?php endif; ?>

			 <?php if (sizeof($childrenPages) > 4) : ?>

				 <div class="sect section-5" id="section-5" style="background-color:<?php echo $featureNavColor; ?>">

					 <div class="wrapper <?php echo $pageSlug ;?>-5">
						<div class="text-wrapper <?php echo $pageSlug ;?>-5">
						 <h2 class="<?php echo $pageSlug; ?>-5">
						 	<?php echo $section5Header; ?>
						 </h2>
						 <p class="<?php echo $pageSlug; ?>-5" <?php if ($aboutCheck) echo 'style="color:#fff";'; ?>>
						 	<?php echo $section5Copy; ?>
						 </p>

						 <?php if ($section5CtaOn) : ?>
							<div class="cta-wrapper">
							 <a href="<?php echo $section5CtaUrl; ?>" target="_blank">
								<div class="darkGreyBoxBtn">
							 		<?php echo $section5CtaText; ?>
								</div>
							 </a>
							</div>
						 <?php endif; ?>
						</div>

						<?php if ($section5Image) : ?>
							<img class="<?php echo $pageSlug; ?>-5" src="<?php echo $section5Image; ?>" alt="<?php echo $section5ImageAlt; ?>">
						<?php endif; ?>
					 </div>

				 </div>
			 <?php endif; ?>

			 <?php if (sizeof($childrenPages) > 5) : ?>

				 <div class="sect section-6 section-medium" id="section-6">

					 <div class="wrapper <?php echo $pageSlug ;?>-6">
						<div class="text-wrapper <?php echo $pageSlug ;?>-6">
						 <h2 class="<?php echo $pageSlug; ?>-6" style="color:<?php echo $featureNavColor; ?>">
						 	<?php echo $section6Header; ?>
						 </h2>
						 <p class="<?php echo $pageSlug; ?>-6" <?php if ($aboutCheck) echo 'style="color:#fff";'; ?>>
						 	<?php echo $section6Copy; ?>
						 </p>

						 <?php if ($section6CtaOn) : ?>
							<div class="cta-wrapper">
							 <a href="<?php echo $section6CtaUrl; ?>/?mod=WSJUStudents<?php echo $pageTitle; ?>" target="_blank">
								<div class="darkGreyBoxBtn">
							 		<?php echo $section6CtaText; ?>
								</div>
							 </a>
							</div>
						 <?php endif; ?>
						</div>

						<?php if ($section6Image) : ?>
							<img class="<?php echo $pageSlug; ?>-5" src="<?php echo $section6Image; ?>" alt="<?php echo $section6ImageAlt; ?>">
						<?php endif; ?>
					 </div>

				 </div>
			 <?php endif; ?>			 


			 <div class="sect sect3 section-light" id="subscribe-sect">
				<div class="wrapper subscribe">
				 <h2 class="alignC" <?php if ($pageTitle == "Students") echo 'style="color:' . $myHeroColor . ';"'; ?>>
					<?php echo get_field('section4_headline', $studentsId); ?>
				 </h2>
				 <div class="text-wrapper alignC slim">
					<p>
						<?php echo get_field('section4_text', $studentsId); ?>
					</p>         
				 </div>
					 <div class="feature">
						<div class="form">
						 	<a href="<?php echo get_field('section4_cta_url', $studentsId); ?>">
							 	<div class="darkGreyBoxBtn btn" id="js-button-hover-5" style="background-color: <?php echo $myHeroColor ?>">
									<?php echo get_field('section4_cta_button', $studentsId); ?>
								</div>
						 	</a>
						</div>
					 </div>
				</div>
			 </div>    

			
		</div>      
	 </div>

	 <?php if ($pageSlug == "social") : ?>
		 <script>
			(function() {
			    var v = document.getElementsByClassName("youtube-player");
			    for (var n = 0; n < v.length; n++) {
			        var p = document.createElement("div");
			        p.innerHTML = labnolThumb(v[n].dataset.id);
			        p.onclick = labnolIframe;
			        v[n].appendChild(p);
			    }
			})();
			 
			function labnolThumb(id) {
				var wpPathDiv = document.getElementById('wp-path');
				var wpPathText = wpPathDiv.innerHTML;
			    return '<img class="youtube-thumb" src="//i.ytimg.com/vi/' + id + '/hqdefault.jpg"><div class="play-btn" style="background-image:url(\'' + wpPathText + '/images/play-btn.png\')"></div>';
			}
			 
			function labnolIframe() {
			    var iframe = document.createElement("iframe");
			    iframe.setAttribute("src", "//www.youtube.com/embed/" + this.parentNode.dataset.id + "?autoplay=1&autohide=2&border=0&wmode=opaque&enablejsapi=1&controls=0&showinfo=0");
			    iframe.setAttribute("frameborder", "0");
			    iframe.setAttribute("id", "youtube-iframe");
			    this.parentNode.replaceChild(iframe, this);
			}
		</script>
	<?php endif; ?>
<?php get_footer(); ?>