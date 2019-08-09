<?php
/**
 * Template Name: Professors
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

  // set boolean if page equals Professors landing page
  $professorsCheck;

  if (is_page('Professors'))
    $professorsCheck = true;
  else
    $professorsCheck = false;

  // content variables
  $heroColor = get_field('hero_bg_color', $myId);
  $heroImage = get_field('hero_image', $myId)['url'];
  $heroImageAlt = get_field('hero_image_alt', $myId);
  $heroHeadline = get_field('hero_headline', $myId);
  $heroSubheadline = get_field('hero_subheadline', $myId);
  $orderInfoCopy = get_field('orderInfo_Copy', $myId);
  $headline = get_field('prof_headline', 1527);
  $headline2 = get_field('prof_copy', 1527);
  $aboutheadline = get_field('about_headline', 1527);
  $aboutheadline2 = get_field('about_copy', 1527);
  $referralButton = get_field('referralButton', 1527);
  $weekly_review = get_field('weekly_review', 1527);
  $weekly_review_url = get_field('weekly_review_url', 1527);
  $assessment_tool = get_field('assessment_tool', 1527);
  $assessment_tool_url = get_field('assessment_tool_url', 1527);
  $assessment_tool_button = get_field('assessment_tool_button', 1527);
  $member_url = get_field('member_url', 1527);
  $member_title = get_field('member_title', 1527);
 
  
  

  // misc variables
  $total = count($idArray);
  $professorsId = get_page_by_title('Professors') -> ID;
  $homeId = get_page_by_title('Home') -> ID;
  $pageSlug = get_post( $myId )->post_name;
  $featureNavColor = get_field('secondary_nav_color', $myId);
  $pageTitle = get_the_title($myId);

  $faqsCheck = True;

  

  if ($faqsCheck)
  {

    $ids = get_field('faq_selector', false, false);

    $args = array(
      'numberposts' => -1,
      'post_type' => 'post',
      'category_name' => 'faqs-professors',
      'post__in' => $ids,
      'depth' => 1,
      'post_status' => 'publish',
      'post_parent' => 0,
      'orderby'     => 'date',
    );

    $faqs = get_posts($args);

  }

 

  // Contact section

 

?>

<script>
  
  function showUser(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","../wp-content/themes/wsju/page-templates/getuser.php?q="+str,true);
  xmlhttp.send();
}
</script>

<script>
  jQuery(document).ready(function($)
{
  setTimeout(function(){ $("#alert").fadeIn(1000); }, 2000);

  $(".closeAlert, .closeAlert2").click(function(){
    $("#alert").fadeOut(1000);


  });
  
  $("#author_bio_wrap_toggle").click(function()
  {
    
    $("#author_bio_wrap").slideToggle( "slow");
    
    if ($("#author_bio_wrap_toggle").text() == "LEARN MORE")
      {     
        $("#author_bio_wrap_toggle").html("CLOSE")
      }
    else 
      {   
        $("#author_bio_wrap_toggle").text("LEARN MORE")
      }
    
  });  
  
});
</script>
<div class="author_bio_toggle_wrapper" id="alert" style="">
    <div class="holder" style="">
    <div class="closeAlert2" style=""><img src="https://images.dowjones.com/wp-content/uploads/sites/35/2018/03/01165706/close.png" style="width: 40px;"></div>
      <h2 style="">Find Out If Your School Sponsors <span style="white-space: nowrap;">WSJ Memberships</span></h2>
      <div id="spacer1"></div>
      <a id="students_pricing2" style="display: inline-block;" class="pricing_btn" target="_blank" href="../search/">SEARCH SCHOOL HERE</a>
      <div id="spacer" style="width: 30px; display: inline-block;"></div>
      <a id="author_bio_wrap_toggle" style="display: inline-block; background: none; border: 2px #fff solid;" class="pricing_btn">LEARN MORE</a>
       <div id="spacer" style="width: 50px; display: inline-block;"></div>
       <div class="closeAlert" style=""><img src="https://images.dowjones.com/wp-content/uploads/sites/35/2018/03/01165706/close.png" style="width: 40px;"></div>
      <div id="author_bio_wrap" style="display: none; max-width: 420px;">
    We have partnered with schools across the United States to offer students and professors sponsored subscriptions to <span style="white-space: nowrap;">The Wall Street Journal</span>.
  </div>
    </div>
    
  
</div>

<div id="content" <?php if ($pageParent) echo 'class="' . $pageParent . '"'; ?>>

<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close2">&times;</span>
    

<?php echo do_shortcode( '[contact-form-7 id="1534" title="Contact form 1"]' ); ?><br /><br />
<p style="margin: 0 auto; max-width: 355px; font-size: 13px">By clicking Submit, you agree to our <a href="https://www.wsj.com/policy/privacy-policy" target="_blank">Privacy Policy</a>.</p>
  </div>

</div>


<div id="myModal2" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
   <?php echo do_shortcode( '[contact-form-7 id="1536" title="Professors_context_form1"]' ); ?>
   <br /><br />
<p style="margin: 0 auto; max-width: 355px; font-size: 13px">By clicking Submit, you agree to our <a href="https://www.wsj.com/policy/privacy-policy" target="_blank">Privacy Policy</a>.</p>
  </div>

</div>
  <div class="close-scrim" id="close-scrim">Close</div>

  <!-- HEADER -->      
  <div class="main-wrapper <?php if ($pageParent) echo $pageParent . " "; echo $pageSlug; ?>">
    <div class="hidden">
      <div id="js-page-check">
        <?php echo $professorsCheck; ?>
      </div>
      <div id="js-color-info">
        <?php echo get_field('hero_bg_color', $myId); ?>
      </div>
      <div id="js-secondary-color-info">
        <?php echo get_field('secondary_nav_color', $myId); ?>
      </div>
     
      <div id="js-blue-color-info">
        <?php echo get_field('hero_bg_color', $idArray[2]); ?>
      </div>
     
      <div id="js-blue-color-hover">
        <?php echo get_field('secondary_nav_color', $idArray[2]); ?>
      </div>
    </div>
<div class="sect professors" style="">
    <div class="headlineHolder">
    <div class="wrapper" style="z-index: 100000;"> 
        <h1><?php echo $headline; ?></h1>
        </div>
        
        <div id="stipple-bg-headline" style=""></div>
      
      </div>
      <div class="break"></div>
      <div class="storyHolder">
        <div class="wrapper">
        <p><?php echo $headline2; ?></p>
        </div>
    <div id="color-bg-copy" style="position: absolute; width: 100%; min-height:160px; left: 0; right: 0; top: 0; bottom: 0; background-color:#EE5536; mix-blend-mode: multiply; background-repeat: no-repeat; z-index: 20"></div>
        <div id="stipple-bg-copy"></div>
        
      </div>
    
  </div>

  <!-- HEADER--> 

  <!--INTRO-->
<div class="section1 aboutWSJ" style="">
    <br /><br />
    <div class="wrapper">

    <div class="welcome" style="">
        Welcome to <span style="color: #EE5536">WSJ Education.</span> <br />
        As a <span style="color: #EE5536;">Professor,</span> you can enjoy incentives and special offers.
      
    </div>

    <div class="bodyCopy" style="">

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

    <!-- INTRO -->

    <div class="body-content" id="body-content">


  <!--Testimonials -->
<div class="sect section-9 section" id="testimonial" style="padding: 65px 0px 165px 0px; text-align: center; color:#000;">
   
       <div class="wrapper">

       <h1>How Professors Use the Journal in Class</h1><br /><br /><br /> <br />       
             <div style="float: left; max-width: 400px; text-align: left">
             <div style="font-size: 1.1em !important;"><?php echo $value = get_field( "testimonial_1", 1434 ); ?></div>
             <div style="font-weight: 800 !important;"><?php echo $value = get_field( "testimonial_1_label", 1434 ); ?></div>
             </div>
              
             <div style="float: right; max-width: 400px; text-align: left">
             <div style="font-size: 1.1em !important;"><?php echo $value = get_field( "testimonial_2", 1434 ); ?></div>
             <div style="font-weight: 800 !important;"><?php echo $value = get_field( "testimonial_2_label", 1434 ); ?></div>
             </div>
             
             <div style="width: 100px; height: 300px;"></div>

             
        </div>       

      


</div>

<!--Testimonials -->       

<!--Teaching Tools -->
<div class="sect section-6 section" id="teachingTools" style="padding: 100px 0px 100px 0px; background:#fff !important; text-align: left;">
  
<div class="wrapper">
      <div class="left_float" style="margin: 0 auto; max-width: 750px; text-align: center;">
      <h1>Teaching Resources</h1>
        
        
        <p>&nbsp;</p>    
      <p>The Journal offers a set of teaching guides so you can seamlessly integrate relevant WSJ articles into your class.</p><br /><br />
      <strong>Utilize the following tools for your classes:</strong>
        <br />
      <br /><br />
      <div style="float: left; margin-right: 20px; margin-left: 25px;">
      <div style="max-width: 300px; min-height: 150px; max-height: 150px; border: 1px solid #EE5536; padding: 60px 20px 0px 20px; ">
      <p style="font-size: 20px; color:#EE5536;">Case Studies</p>
     
      <p style="max-width: 350px;"><?php echo $weekly_review; ?></p>
      </div>
      <br />
      <?php if (get_field('weekly_review_button', 1527)) : ?>
     <a style="float: left" href="<?php echo $weekly_review_url; ?>" class="tt" target="_blank">DOWNLOAD PDF</a>
     <?php endif; ?>

      </div>
     
      <div style="float: left;">
      <div style="max-width: 300px; min-height: 150px; max-height: 150px; border: 1px solid #EE5536; padding: 60px 20px 0px 20px; float: left; margin-right: 0px;">
      <p style="font-size: 20px; color:#EE5536;">How-to Guides</p>
      
      <p style="max-width: 350px;"><?php echo $assessment_tool; ?></p>
      </div>
      <br /><br /><br />
      <?php if (get_field('assessment_tool_button', 1527)) : ?>
      <a style="float: left; margin-top: 15px;" href="<?php echo $assessment_tool_url; ?>" target="_blank" class="tt">DOWNLOAD PDF</a>
      <?php endif; ?>
      </div>
      
      <br /><br />
       <?php if (get_field('wsj_membership_guide', 1527)) : ?>
      <p style="font-size: 20px; color:#EE5536;">WSJ Membership Guide</p>
      <a id="membershipPDF" href="<?php echo $value = get_field( "guideURL", 1527 ); ?>" class="btn tt" target="_blank">DOWNLOAD NOW</a>
      <div style="max-width: 350px;"><?php $id3 = 1385; $p = get_page($id3); echo apply_filters('the_content', $p->post_content); ?></div>
 <?php endif; ?>
      </div>

      <!-- <div class="right_float" style="float: right; padding-right: 0%; max-width: 380px;">
         <div id="instafeed"></div> 
         <img src="/WSJU-April2017/wp-content/themes/wsju/images/professors_teachingtools.jpg">
      </div> -->
</div>


  
     
</div>
<!--Teaching Tools ENDS-->

<!-- WSJ REFERRAL PROGRAM-->

      <div class="sect section-2 section-medium" style="background-image: url('https://images.dowjones.com/wp-content/uploads/sites/35/2018/04/18162045/prof_bg1.jpg') !important;" <?php if ($professorsCheck) echo 'id="faculty-benefits"'; else echo 'id="section-2"'; ?>>

        <?php if ($professorsCheck) : ?>

          <h2 class="alignC">
           WSJ Referral Program
          </h2>
          <div class="features features-2 wrapper">
            <?php for ($d = 1; $d < 3; $d++) : ?>
              <?php
                $image_url = get_field('section2_feature' . $d . '_image')['url'];
                $image_alt = get_field('section2_feature' . $d . '_image_alt');
                $headline = get_field('section2_feature' . $d . '_headline');
                $text = get_field('section2_feature' . $d . '_text');
                $url = get_field('section2_feature' . $d . '_url');
                $cta = get_field('section2_feature1_cta');
              ?>
              <!-- <a href="<?php echo $url; ?>" target="_blank" class="dark"> -->
                <div class="feature half feature-<?php echo $d; ?>">
                  <div class="image image-<?php echo $d; ?>">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>">
                  </div>
                  <div class="clearBoth"></div>
                  <div class="text-wrapper">
                    <div class="headline">
                      <?php echo $headline; ?>
                    </div>
                    <div class="text" style="line-height: 20px; text-align: center;">
                      <?php echo $text; ?>
                    </div>
                    <!-- <div class="darkGreyBoxBtn btn">
                      <?php echo $cta; ?>
                    </div> -->
                  </div>
                  <div class="clearBoth"></div>
                </div>

              <!-- </a> -->
             <!--  <?php if ($d == 1) echo '<div class="divider vertical"></div>'; ?>-->
            <?php endfor; ?>
            <div class="clearBoth"></div>
            
            <a id="professors_referral" href="<?php echo $referralButton; ?>" target="_blank">
              <div class="darkGreyBoxBtn">
                <?php echo $cta; ?>
              </div>
            </a>

          </div>

        <?php else : ?>
          <div class="wrapper <?php echo $pageSlug ;?>-2">
            <div class="text-wrapper <?php echo $pageSlug ;?>-2">
              <h2 class="<?php echo $pageSlug; ?>-2" <?php if ($myId == get_the_ID($childrenPages[1])) echo 'style="color:' . $thirdColor . '"'; ?>>
                <?php echo $section2Header; ?>
              </h2>
              <p class="<?php echo $pageSlug; ?>-2">
                <?php echo $section2Copy; ?>
              </p>

              <?php if ($pageSlug == "integrate") : ?>
                <?php echo get_field('assessment_bullet_points', $childrenPages[1]); ?>
              <?php endif; ?>

              <?php if ($faqsCheck) : ?>

                <div class="accordian-wrapper faqs" id="accordian-wrapper" style="text-align:left">

                  <?php

                    $faqsSize = sizeof($faqs);

                    for ($k = 0; $k < $faqsSize; $k++)
                    {
                      $faqId = $faqs[$k] -> ID;

                      echo '<h3 class="accordian-header" data-expand="answer-' . $k . '" style="font-size:1em;color:#fff !important;"><span class="plus-minus">&#43; </span>' . get_post($faqId)->post_title . '</h3>' ;
                      echo '<hr style="background-color: ' . $heroColor . '">';
                      echo '<div class="answer" id="answer-' . $k . '">' . get_post($faqId)->post_content . '</div>';
                    }

                  ?>

                </div>

              <?php endif; ?>

              <?php if ($section2CtaOn) : ?>
                <div class="cta-wrapper">
                  <?php if ($pageSlug == 'integrate') : ?>
                  <a href="<?php echo $scrimUrl3; ?>" id="scrim-searcharchive-on">
                  <?php else : ?>
                  <a id="professors_referral" href="<?php echo $section2CtaUrl; ?>" target="_blank">
                  <?php endif; ?>
                    <div class="darkGreyBoxBtn btn" <?php if ($pageTitle !== "Manage") echo 'id="js-button-hover-3" style="background-color:' . $heroColor. ';"'; ?>>
                      <?php echo $section2CtaText; ?>
                    </div>
                  </a>
                </div>
              <?php endif; ?>
            </div>
            <?php if ($section2Image) : ?>
              <img class="<?php echo $pageSlug; ?>-2" src="<?php echo $section2Image; ?>" alt="<?php echo $section2ImageAlt; ?>">
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
      <!-- WSJ REFERRAL PROGRAM-->





<!--WSJ FOR PROFESSORS -->
<div class="sect section-10 section" id="purchase" style="padding: 105px 0px 55px 0px; text-align: center; color:#000;">
   
       <div class="wrapper" style="max-width: 980px !important;">
       <div class="profMember" style="float: left; margin-right: 20px; text-align: right !important; ">
       <h1 style="max-width: 450px; margin:0 auto;">Find Out If Your School Has a Membership</h1><br /><br />
       <p style="max-width: 450px; margin: 0 auto;">We have partnered with schools across the United States to offer students and professors sponsored memberships to the Wall Street Journal.
       <br /><br /><br />
       <a id="students_pricing2" class="pricing_btn" style="float: right;" target="_blank" href="../search/">SEARCH SCHOOL HERE</a>
       </p><br /> <br /> 
       </div>
       <div class="dividerBlack" style="float: left; border-right: 2px #000 solid; width: 20px; height: 300px; margin-right:40px; "></div>
       <div class="profnotmember" style="float: left; margin-right: 0px; text-align: left !important;">
       <h1>Not a <br />WSJ Member?</h1><br /><br />
       <p style="max-width: 440px; margin: 0 auto;">Stay informed with the unrivaled coverage of America’s most trusted newspaper. Get the in-depth insights and critical analysis you need to stay ahead in and out of the classroom with our complete suite of products.
       <br /><br />
       <a id="students_pricing2" class="pricing_btn" style="float: left;" target="_blank" href="<?php echo $member_url; ?>">JOIN NOW</a>
       </p><br /> <br />       
     </div>
       </div>       

      


</div>



<br>
<div id="txtHint"><b></b></div>
<!--WSJ FOR PROFESSORS -->


<!--FAQ -->
<div class="sect section-8 section" id="faq" style="padding: 100px 0px 100px 0px; text-align: center; color: #000 !important;">
  
  <div style="max-width: 1000px; margin: 0 auto;">

  <h1 style="color: #fff;"><?php echo get_the_title(1544); ?></h1><br /><br />
  <p style="max-width: 700px; text-align: center; margin: 0 auto; color: #000 !important;">
  <!-- <?php $id3 = 1544; $p = get_page($id3); echo apply_filters('the_content', $p->post_content); ?> -->
   <div class="accordian-wrapper faqs" id="accordian-wrapper" style="text-align:left; max-width: 600px; margin: 0 auto;">

                 <?php if ($faqsCheck) : ?>

                <div class="accordian-wrapper faqs" id="accordian-wrapper" style="text-align:left">

                  <?php

                    $faqsSize = sizeof($faqs);

                    for ($k = 0; $k < $faqsSize; $k++)
                    {
                      $faqId = $faqs[$k] -> ID;

                      echo '<h3 id="accordian-header" class="accordian-header" data-expand="answer-' . $k . '" style="font-size:1em;"><span class="plus-minus">&#43; </span>' . get_post($faqId)->post_title . '</h3>' ;
                      echo '<hr style="background-color: #fff;">';
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

<!-- LEGAL -->
   
<div class="sect section-8 section" id="legal" style="padding: 100px 0px 100px 0px; text-align: center; color: #000 !important; background-color: #ccc;  font-size: 13px;">
  <div class="wrapper">

   <!-- <p>*Amazon.com is not a sponsor of this promotion. Except as required by law, Amazon.com Gift Cards ("GCs") cannot be transferred for value or redeemed for cash. GCs may be used only for purchases of eligible goods on Amazon.com or certain affiliated websites. GCs cannot be redeemed for purchases of gift cards. Purchases are deducted from the GC balance. To redeem or view a GC balance, visit "Your Account" on Amazon.com. Amazon is not responsible if a GC is lost, stolen, destroyed or used without permission. For complete terms and conditions, see www.amazon.com/gc-legal. GCs are issued by ACI Gift Cards, Inc., a Washington corporation. All Amazon ™ &amp; © are IP of Amazon.com, Inc. or its affiliates. No expiration date or service fees.</p>  -->

  </div>
  </div>


     
        
     

    </div>
  </div>
<?php get_footer(); ?>



