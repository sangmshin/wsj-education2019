<!-- header.php --><?php
/**
 * The Header template for the WSJU
 *
 * Displays all of the <head> section and everything up till <div id="content">.
 *
 * @package WSJU
 */
  $pages;
  $id;
  $is_home;

  global $post; 

  $home = get_page_by_title('Home');
$homeId = $home->ID;

$facebookLink = get_field('social_link_fb', $homeId);
$twitterLink = get_field('social_link_tw', $homeId);
$linkedinLink = get_field('social_link_in', $homeId);
$youtubeLink = get_field('social_link_yt', $homeId);
$snapchatLink = get_field('social_link_sc', $homeId);

  if ( is_page_template('page-templates/home.php') )
  {
    $id = get_the_ID();

    $pages = get_posts(array(
      'numberposts' => -1,
      'post_type' => 'page',
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'depth' => 0,
      'post__not_in' => array($id),
      'post_parent' => 0
    ));

    $is_home = 1;
  }
  else
  {
    if ($post -> post_parent) $id = $post -> post_parent;
    else $id = get_the_ID();

    $pages = get_posts(array(
      'numberposts' => -1,
      'post_type' => 'page',
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'depth' => 1,
      'post_parent' => $id
    ));

    $is_home = 0;
  }

$home = get_page_by_title('Home');
$homeId = $home->ID;

  $tPage = count($pages);
  $curTitle = get_the_title($post -> ID);
  $curSlug = $post -> post_name;
  $prodTitle = get_the_title($id);
  $studentsPage = get_page_by_title('Students');
  $studentsId = $studentsPage -> ID;
  $professorsPage = get_page_by_title('Professors');
  $professorsId = $professorsPage -> ID;
  $snapchatLink = get_field('social_link_sc', $homeId);
  $tealium = get_field('tealium_url', 982);
  $searchQuery = get_search_query();


?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <!-- <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width">

  <meta name="breakpoint" content="phone" media="(max-width: 479px)">
  <meta name="breakpoint" content="small-tablet" media="(min-width: 480px) and (max-width: 639px)">
  <meta name="breakpoint" content="tablet" media="(min-width: 640px) and (max-width: 1023px)">
  <meta name="breakpoint" content="desktop" media="(min-width: 1024px)">
  <meta name="breakpoint" content="widescreen" media="(min-width: 1280px)">
  <meta name="breakpoint" content="retina" media="only screen and (-webkit-min-device-pixel-ratio : 2)">

  <title><?php wp_title(); ?></title>
  <link rel="profile" href="#">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <link rel="stylesheet" href="https://fonts.wsj.net/HCo_Whitney/font_HCo_Whitney.css">
  <link rel="stylesheet" href="https://fonts.wsj.net/HCo_Chronicle/font_HCo_Chronicle.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" type="text/css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/scripts/vendor/slick.css" type="text/css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/scripts/vendor/slick-theme.css" type="text/css">
  <script src="//cdn.optimizely.com/js/5090114122.js"></script> 
  <script type="text/javascript" src="https://dcdd29eaa743c493e732-7dc0216bc6cc2f4ed239035dfc17235b.ssl.cf3.rackcdn.com/tags/wsj/hoktop.js"></script>
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <![endif]-->
  <?php wp_head(); ?>

</head>

<body id="top" <?php body_class(); ?>>
  <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107960199-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag()
{dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-107960199-1');
</script>
 <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '115654585788144'); 
fbq('track', 'PageView');
</script>
<noscript>
 <img height="1" width="1" src="https://www.facebook.com/tr?id=115654585788144&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->


 <div id="current_slug" style="display: none"><?php echo $curSlug; ?></div>
 <div id="current_title" style="display: none"><?php echo $curTitle; ?></div>
<div id="current_query" style="display: none"><?php echo $searchQuery; ?></div>

<script type="text/javascript">
(function(a,b,c,d){
a='<?php echo $tealium; ?>';
b=document;c='script';d=b.createElement(c);d.src=a;d.type='text/java'+c;d.async=true;
a=b.getElementsByTagName(c)[0];a.parentNode.insertBefore(d,a);
})();
</script> 


<?php if ($curTitle == "Home") : ?>
    <script type="text/javascript">
      var utag_data = {
        'user_ref':        "V2-Y2IwMzdjNDItYjY.",
        'user_type':        "nonsubscriber",
        'user_tags':        "",
        'user_exp':          "default",
        'page_site_product':     "WSJEDU",
        'page_site':         "WSJ Education",
        
        'page_content_type':  "Home",
        'page_content_type_detail':  "",
        'page_content_region' : "North_America_USA",
        'page_content_language' : "en-US",
        'page_content_source':   "WSJ Education",
        'page_section':         document.getElementById('current_title').textContent,
        'page_id':            document.getElementById('current_slug').textContent, 
        'page_access' : "free",
        'cms_name' : "Wordpress"
      }

     
</script>  

<?php endif; ?>
         

 <?php if ($curTitle == "Search") : ?>
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
          'page_section' : "search",
          'page_id' : document.getElementById('current_slug').textContent,
          'page_access' : "Free",
          'search_keyword' : document.getElementById('current_query').textContent,
          'cms_name' : "Wordpress"
          }
          console.log(utag_data);
</script>             

<?php endif; ?>



<?php if ($curTitle == "Students") : ?>
<script type="text/javascript">
      var utag_data = {
        'user_ref':        "V2-Y2IwMzdjNDItYjY.",
        'user_type':        "nonsubscriber",
        'user_tags':        "WSJ_SUB",
        'user_exp':          "default",
        'page_site_product':     "WSJEDU",
        'page_site':         "WSJ Education",
        
        'page_content_type':  "Summaries",
        'page_content_type_detail':  "",
        'page_content_region' : "North_America_USA",
        'page_content_language' : "en-US",
        'page_content_source':   "WSJ Education",
        'page_section':         document.getElementById('current_title').textContent,
        'page_subsection' : "",
        'page_id':            document.getElementById('current_slug').textContent, 
        'page_access' : "free",
        'cms_name' : "Wordpress"
      }

     
</script>  

<?php endif; ?>

<?php if ($curTitle == "Professors") : ?>
<script type="text/javascript">
      var utag_data = {
        'user_ref':        "V2-Y2IwMzdjNDItYjY.",
        'user_type':        "nonsubscriber",
        'user_tags':        "WSJ_SUB",
        'user_exp':          "default",
        'page_site_product':     "WSJEDU",
        'page_site':         "WSJ Education",
        
        'page_content_type':  "Summaries",
        'page_content_type_detail':  "",
        'page_content_region' : "North_America_USA",
        'page_content_language' : "en-US",
        'page_content_source':   "WSJ Education",
        'page_section':         document.getElementById('current_title').textContent,
        'page_subsection' : "",
        'page_id':            document.getElementById('current_slug').textContent, 
        'page_access' : "free",
        'cms_name' : "Wordpress"
      }

     
</script>  

<?php endif; ?>

<?php if ($curTitle == "University") : ?>
<script type="text/javascript">
      var utag_data = {
        'user_ref':        "V2-Y2IwMzdjNDItYjY.",
        'user_type':        "nonsubscriber",
        'user_tags':        "WSJ_SUB",
        'user_exp':          "default",
        'page_site_product':     "WSJEDU",
        'page_site':         "WSJ Education",
        
        'page_content_type':  "Summaries",
        'page_content_type_detail':  "",
        'page_content_region' : "North_America_USA",
        'page_content_language' : "en-US",
        'page_content_source':   "WSJ Education",
        'page_section':         document.getElementById('current_title').textContent,
        'page_subsection' : "",
        'page_id':            document.getElementById('current_slug').textContent,
        'page_access' : "free",
        'cms_name' : "Wordpress"
      }

     
</script>  

<?php endif; ?>

  
  <script src="" type="text/javascript" async="true"></script>
  <?php

    echo '<div id="header"><div class="masthead ';
    if (strtoupper($prodTitle) == 'PROFESSORS')
    {
      echo 'professors wrapper">';
      if ($curTitle == "Professors")
        echo '<h1>';
      else
        echo '<h2>';
      
      echo '<a href="' . esc_url(home_url( '/' )) . '" title="';
    }
    
    else echo 'wrapper"><h1><a href="' . esc_url(home_url( '/' )) . '" title="';
    echo strtoupper(esc_attr(get_bloginfo('name', 'display'))) . '" rel="home">' . strtoupper(get_bloginfo('name', 'display')) . '</a>';

    if ($curTitle == "Professors" || $curTitle == "Students")
      echo '</h1>';
    else
      echo '</h2>';

    if ($id != get_option('page_on_front'))
    {
      echo '<a id="back-to-top" class="anchor" href="#top">Back to top</a>';
      if ( $curTitle == 'Professors' || $curTitle == 'Students')
      {
        echo '<a class="button desktop" id="wsj-dotcom" href="http://www.wsj.com">WSJ.COM</a>';
      }
      else
      {
        echo '<a class="button desktop" id="wsj-dotcom" href="http://www.wsj.com">WSJ.COM</a>';
      }
              echo '<div class="prodTitle" style="display:none;">' . $prodTitle . '</div>';

      
      echo '<a id="nav-toggle" href="#">Menu</a></div>';
      echo '<nav class="navigation wrapper"><ul>';

      $i = 0;

      while($i < $tPage)
      {
        if (!$is_home && $i == 0)
        {
          echo '<li><a class="main-nav prod-home';
          if ($prodTitle == $curTitle) echo ' selected';
          echo '" href="' . esc_url( get_permalink($id) ) . '">' . strtoupper($prodTitle) . '</a></li>';
          //echo '" href="' . esc_url( get_permalink($id) ) . '">HOME</a></li>';
        }

        $pageID = $pages[$i++] -> ID;
        $title = get_the_title($pageID);
        
        echo '<li><a class="main-nav';
        if ($title == $curTitle) echo ' selected';
        echo '" href="' . esc_url( get_permalink($pageID) ) . '"';
        if ($title == $curTitle) echo 'style="color: ' . get_field('hero_bg_color', $pageId) . '"';
        echo '>' . strtoupper($title) . '</a></li>';
      }

      if (strtoupper($prodTitle) == 'PROFESSORS') echo '<li class="student-main"><a class="main-nav" href="' . esc_url(home_url( '/students' )) . '">STUDENTS</a></li>';

      if ( $curTitle == 'Professors' || $curTitle == 'Students')
      {
        echo '<li class="mobile"><a href="http://www.wsj.com">WSJ.COM</a></li>';
      }
      else
      {
        echo '<li class="mobile"><a href="http://www.wsj.com">WSJ.COM</a></li>';
      }

      
      if (strtoupper($prodTitle) == 'PROFESSORS')
      {
        echo '<li class="mobile"><a href="#" id="ordering-info-mobile">' . strtoupper(get_field('nav_cta_text_1', $professorsId)) . '</a></li>';
        echo '<li class="mobile"><a href="#" id="contact-rep-mobile">' . strtoupper(get_field('nav_cta_text_2', $professorsId)) . '</a></li>';
      }
      else 
      {
        echo '<li class="mobile"><a href="' . get_field('section4_cta_url', $studentsId) . '">' . strtoupper(get_field('nav_cta_text_1', $studentsId)) . '</a></li>';
      }

      echo '<div class="mobile-share"><a class="social facebook" id="facebook" href="">Facebook</a><a class="social twitter" id="twitter" href="">Twitter</a><a class="social linkedin" id="linkedin" href="">LinkedIn</a><a class="social youtube" id="youtube" href="">Youtube</a></div>';
      echo '</ul></nav><nav class="sitemap wrapper"><ul>';

      $j = 0;

      while($j < $tPage)
      {

        $pageIDSiteMap = $pages[$j++] -> ID;
        $titleSiteMap = get_the_title($pageIDSiteMap);
        
        

        

        if ($subPage)
        {
          $subPageCount = count($subPage);
          $k = 0;

          while($k < $subPageCount)
          {
            $subIDSiteMap = $subPage[$k++] -> ID;
            $subTitleSiteMap = strtoupper(get_the_title($subIDSiteMap));
            echo '<div class="sitemap-subnav"><a href="' . esc_url( get_permalink($pageIDSiteMap) );
            echo '#' . $subTitleSiteMap . '">' . $subTitleSiteMap . '</a></div>';
          }
        }
        echo '</li>';
      }
      
      $home = get_page_by_title('Home') -> ID;
      $students = get_page_by_title('Students') -> ID;
      $professors = get_page_by_title('Professors') -> ID;
      $sls = get_page_by_title('University') -> ID;

      

      $bottomLinks = array();

      array_push($bottomLinks, $students, $professors, $sls);
      
      echo '<div class="clearBoth"></div></ul><ul class="bottom-links">';

      foreach ($bottomLinks as $pageId) {
        echo '<li class="bottom-link"><a href="' . get_permalink($pageId) . '">' . strtoupper(get_the_title($pageId)) . '</a></li>';
      }
      echo '</ul><div class="share">';
      echo '<a class="facebook" href="https://www.facebook.com/WSJ" target="_blank">FB</a><a class="twitter" href="https://twitter.com/WSJ" target="_blank">Tw</a><a class="linkedin" href="https://www.linkedin.com/groups/4093806" target="_blank">In</a><a class="youtube" href="https://www.youtube.com/wsj" target="_blank">YT</a><a class="snapchat" href="https://www.snapchat.com/discover/Wall-Street-Journal/4806310285" target="_blank">SC</a>';
      echo '</div></nav></div>';
    }
    else
    {
      echo '</div></div>';
    }

  ?>

  <!-- <div id="wp-template-path"><?php echo get_template_directory_uri(); ?></div>
  <div id="js-rep-list"><?php echo get_template_directory_uri() . '/xml/rep-lookup.xml'; ?></div> -->
