<?php
/**
 * Template Name: SLS
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

 
  $headline = get_field('univ_headline', 1532);
  $headline2 = get_field('univ_copy', 1532);
  $aboutheadline = get_field('about_headline', 1532);
  $aboutheadline2 = get_field('about_copy', 1532);
  $contactURL = get_field('contactURL', 1532);

 
  // content variables
  $heroColor = get_field('hero_bg_color', $myId);
  $heroImage = get_field('hero_image', $myId)['url'];
  $heroImageAlt = get_field('hero_image_alt', $myId);
  $heroHeadline = get_field('hero_headline', $myId);
  $heroSubheadline = get_field('hero_subheadline', $myId);
  $orderInfoCopy = get_field('orderInfo_Copy', $myId);
  
  

  // misc variables
  $total = count($idArray);
  $professorsId = get_page_by_title('Professors') -> ID;
  $homeId = get_page_by_title('Home') -> ID;
  $pageSlug = get_post( $myId )->post_name;
  $featureNavColor = get_field('secondary_nav_color', $myId);
  $pageTitle = get_the_title($myId);
  $activation = get_field('site_activation_link', 1532);
  $participatingSchools = get_field('participating_schools_image', 1532);

  
  $faqsCheck = True;

  

  if ($faqsCheck)
  {

    $ids = get_field('faq_selector', false, false);

    $args = array(
      'numberposts' => -1,
      'post_type' => 'post',
      'category_name' => 'faqs-university',
      'post__in' => $ids,
      'depth' => 1,
      'post_status' => 'publish',
      'post_parent' => 0,
      'orderby'     => 'date',
    );

    $faqs = get_posts($args);

  } 


  $formShortcode = get_field("form_shortcode", $myId);



?>

<div id="content">
        
  <div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
    



<?php echo do_shortcode( $formShortcode ); ?>


  </div>

</div>
      <div class="sect schools" style="">
    <div class="headlineHolder">
    <div class="wrapper" style="z-index: 10000;"> 
        <h1 style="text-align: left;"><?php echo $headline; ?></h1>
        </div>
        
        <div id="stipple-bg-headline" style=""></div>
      
      </div>
      <div class="break"></div>
      <div class="storyHolder">
        <div class="wrapper">
        <p><?php echo $headline2; ?></p>
        </div>
    <div id="color-bg-copy" style="background-color:#004F6D"></div>
        <div id="stipple-bg-copy" style=""></div>
        
      </div>
    
  </div>
<div class="section1 aboutWSJ" style="">
    <br /><br />
    <div class="wrapper">

    <div class="welcome" style="">
        Welcome to <span style="color: #004F6D">WSJ Education.</span> <br />
        As a <span style="color: #004F6D;">University,</span> you can provide school-sponsored WSJ memberships for <br /> your students.

    </div>

    <div class="bodyCopy" style="margin-top: 40px;">

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

    
     
<!--Register your interest-->
<div class="sect section-7 section" id="registerInterest" style="padding: 200px 0px 200px 0px; text-align: center; background-color: #ccc; color: #000;">
  
  <div class="wrapper">
   <div style="max-width: 500px; text-align: left !important;">



      <h1><?php echo get_the_title(1277); ?></h1>
        <p>&nbsp;</p>
        <p style="border-top: 2px solid #fff;"></p>
        <p>&nbsp;</p>
        <p><?php $id3 = 1277; $p = get_page($id3); echo apply_filters('the_content', $p->post_content); ?></p>
       
        <p>&nbsp;</p>
        <p style="border-top: 1px solid #fff;"></p>


<!-- <?php $id2 = 1277; $p = get_page($id2); echo apply_filters('the_content', $p->post_content); ?> -->
     
      <a class="btn" onClick="fbtrack3()" href="<?php echo $contactURL; ?>">CONTACT A REP</a>
       <p>&nbsp;</p><br />
       <p>&nbsp;</p>
        <p style="max-width: 400px;">Already participating? Your students can activate their WSJ membership here:<br />
<a id="university_activate" class="btn" href="<?php echo $activation ?>">ACTIVATE</a></p>
   </div>
     </div>
</div><!--register your interest ENDS-->
     
     



<!--About SLS -->
<!-- <div class="sect section-5 section" style="padding: 100px 0px 100px 0px; text-align: center;">
  
  <div style="max-width: 600px; margin: 0 auto;"><?php $id2 = 1235; $p = get_page($id2); echo apply_filters('the_content', $p->post_content); ?></div>
     
</div> -->
<!--About SLS ENDS-->


      <!--Participating schools -->
<div class="sect section-6 section section-medium" style="padding: 50px 0px 100px 0px; text-align: center; background-color: #fff;">
  <div class="wrapper">
  <div style="max-width: 500px; text-align: left; float: left; padding-top: 100px;">

  <h1><?php echo get_the_title(1353); ?></h1>
        <p>&nbsp;</p>
        <p style="border-top: 2px solid #000;"></p>
        <p>&nbsp;</p>
        <p><?php $id3 = 1353; $p = get_page($id3); echo apply_filters('the_content', $p->post_content); ?></p>
        <p>&nbsp;</p>
        <p style="border-top: 1px solid #000;"></p>
 </div>

<div class="schoolsHolder" style="float: right; max-width: 50%; padding-top: 50px;">
        
   <img class="schoolsImg" src="<?php echo $participatingSchools ?>">
        
        <?php if( have_rows('participating_schools') ): ?>

  

  <?php while( have_rows('participating_schools') ): the_row(); 

    // vars
    $image = get_sub_field('schoollogo');
    $link = get_sub_field('schoolurl');

    ?>


      <?php if( $link ): ?>
        <a href="<?php echo $link; ?>">
      <?php endif; ?>

        <img class="part-school" src="<?php echo $image; ?>" />

      <?php if( $link ): ?>
        </a>
      <?php endif; ?>

        


  <?php endwhile; ?>

 

<?php endif; ?>
</div>
    
  </div>
     
</div>




         
     

<!--FAQ -->
<div class="sect section-8 section" id="schoolsFAQ" style="padding: 100px 0px 100px 0px; text-align: center;">
  
  <div style="max-width: 1000px; margin: 0 auto;">
  <?php $id6 = 800; $p = get_page($id6); ?>

  <h1><?php the_field('section_name', 800); ?></h1><br /><br />
  <p style="width: 700px; text-align: center; margin: 0 auto;">
  <!-- <?php the_field('section_copy', 800); ?> -->
  <div class="accordian-wrapper faqs" id="accordian-wrapper" style="text-align:left; max-width: 600px; margin: 0 auto;">

                 <?php if ($faqsCheck) : ?>

                <div class="accordian-wrapper faqs" id="accordian-wrapper" style="text-align:left">

                  <?php

                    $faqsSize = sizeof($faqs);

                    for ($k = 0; $k < $faqsSize; $k++)
                    {
                      $faqId = $faqs[$k] -> ID;

                      echo '<h3 class="accordian-header" data-expand="answer-' . $k . '" style="font-size:1em;"><span class="plus-minus">&#43; </span>' . get_post($faqId)->post_title . '</h3>' ;
                      echo '<hr style="background-color:#fff; ' . $heroColor . '">';
                      echo '<div class="answer" id="answer-' . $k . '">' . get_post($faqId)->post_content . '</div>';
                    }

                  ?>

                </div>

              <?php endif; ?>

                </div>  
  </p>
    
  </div>
     
</div>

      
      <!--FAQ ENDS-->


       <div class="body-content">

  
  </div>


<?php get_footer(); ?>
    
  </div>



 