<?php
/**
 * The Header template for the WSJU
 *
 * @package WSJU
 */
  // $pages;
  $id;
  $is_home;

  global $post; 

  $home = get_page_by_title('Home');
  $homeId = $home->ID;

  

$home = get_page_by_title('Home');
$homeId = $home->ID;

  // $tPage = count($pages);
  $curTitle = get_the_title($post -> ID);
  $curSlug = $post -> post_name;
  $prodTitle = get_the_title($id);
  $studentsPage = get_page_by_title('Students Old');
  $studentsId = $studentsPage -> ID;
  $professorsPage = get_page_by_title('Professors Old');
  $professorsId = $professorsPage -> ID;
  $snapchatLink = get_field('social_link_sc', $homeId);
  $tealium = get_field('tealium_url', 982);
  $searchQuery = get_search_query();


?>












<?php 
    if( wsju_page_slug() == 'home' ) {
        $id_name = "home";
        $class_name = "";
        $loadingbar_color = '#71614e';
    } else if (wsju_page_slug() == 'students'){
        $id_name = "students";
        $class_name = "";
        $loadingbar_color = '#6fc496';
      } else if (wsju_page_slug() == 'professors'){
        $id_name = "professors";
        $class_name = "";
        $loadingbar_color = '#60c5bc';
      } else if (wsju_page_slug() == 'universities'){
        $id_name = "universities";
        $class_name = "";
        $loadingbar_color = '#bd6649';
      } else if (wsju_page_slug() == 'search-students'){
        $id_name = "search";
        $class_name = "students";
        $loadingbar_color = '#6fc496';
      } else if (wsju_page_slug() == 'search-professors'){
        $id_name = "search";
        $class_name = "professors";
        $loadingbar_color = '#60c5bc';
      } else if (wsju_page_slug() == 'search-universities'){
        $id_name = "search";
        $class_name = "universities";
        $loadingbar_color = '#bd6649';
      } else if (wsju_page_slug() == 'faq-students'){
        $id_name = "faq";
        $class_name = "students";
        $loadingbar_color = '#6fc496';
      } else if (wsju_page_slug() == 'faq-professors'){
        $id_name = "faq";
        $class_name = "professors";
        $loadingbar_color = '#60c5bc';
      } else if (wsju_page_slug() == 'faq-universities'){
        $id_name = "faq";
        $class_name = "universities";
        $loadingbar_color = '#bd6649';
      } else if (wsju_page_slug() == 'searchresults' && wsju_user_type( $_GET["user_type"] ) == 'students' ){
        $id_name = wsju_user_type( $_GET["user_type"] );
        $class_name = "searchresults";
        $loadingbar_color = '#6fc496';
      } else if (wsju_page_slug() == 'searchresults' && wsju_user_type( $_GET["user_type"] ) == 'professors'){
        $id_name = wsju_user_type( $_GET["user_type"] );
        $class_name = "searchresults";        
        $loadingbar_color = '#60c5bc';
      }
?>


<!DOCTYPE html>
<html lang="en">

<head>


<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'}
);var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-W7LT3LF');</script>
<!-- End Google Tag Manager -->
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-107960199-1"></script>
<script>
window.dataLayer = window.dataLayer || [];
function gtag()
{dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'UA-107960199-1');
</script> 

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <script src="//cdn.optimizely.com/js/5090114122.js"></script> 
<script type="text/javascript" src="https://dcdd29eaa743c493e732-7dc0216bc6cc2f4ed239035dfc17235b.ssl.cf3.rackcdn.com/tags/wsj/hoktop.js"></script>
<!-- ?php wp_head(); ? -->

  <title>The Wall Street Journal - <?php echo strtoupper(wsju_page_slug()); ?></title>

  <!-- favicons -->
  <link rel="shortcut icon" href="https://s.wsj.net/media/wsj_favicon-16x16.png" type="image/x-icon" sizes="16x16">
  <link rel="shortcut icon" href="https://s.wsj.net/media/wsj_favicon-32x32.png" type="image/x-icon" sizes="32x32">
  <!-- Mobile icons for iOS 7 or prior (legacy) -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>
    <link rel="apple-touch-icon" sizes="114x114" href="https://s.wsj.net/media/wsj_apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://s.wsj.net/media/wsj_apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="57x57" href="https://s.wsj.net/media/wsj_apple-touch-icon-57x57.png">
<!-- Mobile icons for iOS 8 and later -->
<link rel="apple-touch-icon" sizes="180x180" href="https://s.wsj.net/media/wsj_apple-touch-icon-180x180.png">
<link rel="apple-touch-icon" sizes="152x152" href="https://s.wsj.net/media/wsj_apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="120x120" href="https://s.wsj.net/media/wsj_apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="76x76" href="https://s.wsj.net/media/wsj_apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="60x60" href="https://s.wsj.net/media/wsj_apple-touch-icon-60x60.png">
<!-- launcher icons (Android/Chrome) -->
<!-- <link rel="manifest" href="https://www.wsj.com/manifest.json"> -->





    <!-- <script type="text/javascript" src="https://education.wsj.com/wp-content/themes/wsj-university-2018/scripts/vendor/jquery.easing.1.3.js"></script> -->
    <!-- <script type="text/javascript" src="https://education.wsj.com/wp-content/themes/wsj-university-2018/scripts/vendor/metaquery.min-min.js"></script> -->
    
    <!-- <script type="text/javascript" src="https://education.wsj.com/wp-content/themes/wsj-university-2018/scripts/vendor/modernizr-2.8.3.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://education.wsj.com/wp-content/themes/wsj-university-2018/scripts/vendor/slick.min.js"></script> -->
    <!-- <script type="text/javascript" src="https://education.wsj.com/wp-content/themes/wsj-university-2018/scripts/WSJU.controller.js"></script> -->

    <!-- <script type="text/javascript" src="https://education.wsj.com/wp-content/themes/wsj-university-2018/scripts/WSJU.main.js"></script> -->
    <!-- <script type="text/javascript" src="https://education.wsj.com/wp-content/themes/wsj-university-2018/scripts/WSJU.main.nav.js"></script> -->
    <!-- <script type="text/javascript" src="https://education.wsj.com/wp-content/themes/wsj-university-2018/scripts/WSJU.main.landing.js"></script> -->
    <link rel="https://api.w.org/" href="https://education.wsj.com/wp-json/">
    <link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://education.wsj.com/xmlrpc.php?rsd">
    <link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://education.wsj.com/wp-includes/wlwmanifest.xml">
      <link rel="shortlink" href="https://education.wsj.com/?p=1471">

      <link rel="alternate" type="application/json+oembed" href="https://education.wsj.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Feducation.wsj.com%2Fsearch%2F">

      <link rel="alternate" type="text/xml+oembed" href="https://education.wsj.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Feducation.wsj.com%2Fsearch%2F&amp;format=xml">




<!-- BOOTSTRAP 4 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- BOOTSTRAP 4 -->



<link rel="stylesheet" id="contact-form-7-css" href="https://education.wsj.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=4.8" type="text/css" media="all">


  <!-- AUTO-COMPLETE CSS -->
<link rel="stylesheet" id="jquery-auto-complete-css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.css?ver=1.0.7" type="text/css" media="all">
  <!-- AUTO-COMPLETE CSS -->




  <!-- Greensock GSAP TweenMax -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.17.0/TweenMax.min.js"></script>

    
  <!-- 2019 EDUCATION STYLES -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/style.css?ver=<?php echo the_field( 'css_version_number', get_option( 'page_on_front' ) ); ?>">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/modal-video.css">

  <!-- Flickity JS & CSS -->
  <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
  <link rel="stylesheet" href="https://unpkg.com/flickity-fullscreen@1/fullscreen.css">
  <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
  <script src="https://unpkg.com/flickity-fullscreen@1/fullscreen.js"></script>



  <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '977006455762590');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=977006455762590&ev=PageView&noscript=1"
/></noscript>

  <!-- End Facebook Pixel Code -->


  <!-- Snap Pixel Code -->
<script type='text/javascript'>
(function(e,t,n){if(e.snaptr)return;var a=e.snaptr=function()
{a.handleRequest?a.handleRequest.apply(a,arguments):a.queue.push(arguments)};
a.queue=[];var s='script';r=t.createElement(s);r.async=!0;
r.src=n;var u=t.getElementsByTagName(s)[0];
u.parentNode.insertBefore(r,u);})(window,document,
'https://sc-static.net/scevent.min.js');

snaptr('init', '6b380d79-15aa-45ea-8729-dbf6db837997', {
'user_email': '__INSERT_USER_EMAIL__'
});

snaptr('track', 'PAGE_VIEW');

</script>
<!-- End Snap Pixel Code -->



</head>

<body>

<div style="background-color: #000; color: #fff; display: inline-block; position: absolute; top: 0; right: 0; padding: 20px; z-index: 2000;opacity:0">
  2019
</div>

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W7LT3LF"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->





<div id="current_slug" style="display: none"><?php echo $curSlug; ?></div>
<div id="current_title" style="display: none"><?php echo $curTitle; ?></div>
<div id="current_query" style="display: none"><?php echo $searchQuery; ?></div>







<!-- Loading script asynchronously -->

 <?php if (wsju_page_slug() == "searchresults") : ?>
    <script type="text/javascript">
          
          var utag_data = {
          'user_ref' : "",
          'user_type' : "nonsubscriber",
          'user_tags': "WSJ_SUB",
          'user_exp' : "default",
          'page_site_product' : "WSJEDU",
          'page_site' : "WSJ Education",
          'page_content_type' : "CustomerResource",
          'page_content_type_detail' : "searchresults",
          'page_content_region' : "North_America_USA",
          'page_content_language' : "en-US",
          'page_content_source' : "WSJ Online",
          'page_section' : "<?php echo ucwords(wsju_user_type( $_GET["user_type"] )); ?>",
          'page_subsection' : "Search Result",
          'search_keywords' : "<?php echo get_search_query(); ?>",
          'search_statement_type' : "typed",
          'search_results' : "<?php echo $wp_query->post_count; ?>",
          'page_id' : "wsjedu_<?php echo wsju_page_slug(); ?>",
          'page_ad_zone' : "",
          'page_access' : "free",
          'cms_name' : "Wordpress",
          }
          // console.log(utag_data);
</script>             

<?php endif; ?>
         

 <?php if (wsju_page_slug() == "search-students" || wsju_page_slug() == "search-professors" || wsju_page_slug() == "search-universities" ) : ?>
    <script type="text/javascript">
          var utag_data = {
            'user_ref' : "",
            'user_type' : "nonsubscriber",
            'user_tags': "WSJ_SUB",
            'user_exp' : "default",
            'page_site_product' : "WSJEDU",
            'page_site' : "WSJ Education",
            'page_content_type' : "CustomerResource",
            'page_content_type_detail' : "marketing",
            'page_content_region' : "North_America_USA",
            'page_content_language' : "en-US",
            'page_content_source' : "WSJ Online",
            'page_section' : "<?php echo ucwords(explode("-", wsju_page_slug() )[1]); ?>",
            'page_subsection' : "Search",
            'page_id' : "wsjedu_search",
            'page_ad_zone' : "",
            'page_access' : "free",
            'cms_name' : "Wordpress"
          }
          // console.log(utag_data);
</script>             

<?php endif; ?>




 <?php if (wsju_page_slug() == "faq-students" || wsju_page_slug() == "faq-professors" || wsju_page_slug() == "faq-universities" ) : ?>
    <script type="text/javascript">
          var utag_data = {
            'user_ref' : "",
            'user_type' : "nonsubscriber",
            'user_tags': "WSJ_SUB",
            'user_exp' : "default",
            'page_site_product' : "WSJEDU",
            'page_site' : "WSJ Education",
            'page_content_type' : "CustomerResource",
            'page_content_type_detail' : "marketing",
            'page_content_region' : "North_America_USA",
            'page_content_language' : "en-US",
            'page_content_source' : "WSJ Online",
            'page_section' : "FAQ",
            'page_subsection' : "<?php echo ucwords(explode("-", wsju_page_slug() )[1]); ?>",
            'page_id' : "wsjedu_home",
            'page_ad_zone' : "",
            'page_access' : "free",
            'cms_name' : "Wordpress"
          }
          // console.log(utag_data);
</script>             

<?php endif; ?>




 <?php if (wsju_page_slug() == "home") : ?>
    <script type="text/javascript">
          var utag_data = {
          'user_ref' : "",
          'user_type' : "nonsubscriber",
          'user_tags': "",
          'user_exp' : "default",
          'page_site_product' : "WSJEDU",
          'page_site' : "WSJ Education",
          'page_content_type' : "CustomerResource",
          'page_content_type_detail' : "marketing",
          'page_content_region' : "North_America_USA",
          'page_content_language' : "en-US",
          'page_content_source' : "WSJ Online",
          'page_section' : "Home",
          'page_subsection' : "",
          'page_id' : "wsjedu_<?php echo wsju_page_slug(); ?>",
          'page_ad_zone' : "",
          'page_access' : "free",
          'cms_name' : "Wordpress"
          }
          // console.log(utag_data);
</script>             

<?php endif; ?>



<?php if (wsju_page_slug() == "students") : ?>
<script type="text/javascript">
      var utag_data = {
        'user_ref': "",
        'user_type': "nonsubscriber",
        'user_tags': "WSJ_SUB",
        'user_exp': "default",
        'page_site_product': "WSJEDU",
        'page_site': "WSJ Education",
        'page_content_type': "Summaries",
        'page_content_type_detail': "marketing",
        'page_content_region' : "North_America_USA",
        'page_content_language' : "en-US",
        'page_content_source': "WSJ Online",
        'page_section': "<?php the_title(); ?>",
        'page_subsection' : "",
        'page_id' : "wsjedu_<?php echo wsju_page_slug(); ?>", 
        'page_ad_zone' : "",
        'page_access' : "free",
        'cms_name' : "Wordpress"
      }
      // console.log(utag_data);

     
</script>  

<?php endif; ?>

<?php if (wsju_page_slug() == "professors") : ?>
<script type="text/javascript">
      var utag_data = {
        'user_ref': "",
        'user_type': "nonsubscriber",
        'user_tags': "WSJ_SUB",
        'user_exp': "default",
        'page_site_product': "WSJEDU",
        'page_site': "WSJ Education",
        'page_content_type':  "Summaries",
        'page_content_type_detail':  "marketing",
        'page_content_region' : "North_America_USA",
        'page_content_language' : "en-US",
        'page_content_source':   "WSJ Online",
        'page_section':         "<?php the_title(); ?>",
        'page_subsection' : "",
        'page_id':      "wsjedu_<?php echo wsju_page_slug(); ?>", 
        'page_ad_zone' : "",
        'page_access' : "free",
        'cms_name' : "Wordpress"
      }
      // console.log(utag_data);
     
</script>  

<?php endif; ?>

<?php if (wsju_page_slug() == "universities") : ?>
<script type="text/javascript">
      var utag_data = {
        'user_ref':        "",
        'user_type':        "nonsubscriber",
        'user_tags':        "WSJ_SUB",
        'user_exp':          "default",
        'page_site_product':     "WSJEDU",
        'page_site':         "WSJ Education",
        'page_content_type':  "Summaries",
        'page_content_type_detail':  "marketing",
        'page_content_region' : "North_America_USA",
        'page_content_language' : "en-US",
        'page_content_source':   "WSJ Online",
        'page_section':         "<?php the_title(); ?>",
        'page_subsection' : "",
        'page_id':           "wsjedu_<?php echo wsju_page_slug(); ?>",
        'page_ad_zone' : "",
        'page_access' : "free",
        'cms_name' : "Wordpress"
      }
      // console.log(utag_data);


     
</script>

<?php endif; ?>

<script type="text/javascript">
(function(a,b,c,d){
a='//tags.tiqcdn.com/utag/wsjdn/wsjeducation/prod/utag.js';
b=document;c='script';d=b.createElement(c);d.src=a;d.type='text/java'+c;d.async=true;
a=b.getElementsByTagName(c)[0];a.parentNode.insertBefore(d,a);
})();
</script> 



  <div id="<?php echo $id_name; ?>" class="<?php echo $class_name; ?>">
  
  <header>
    <nav class="navbar navbar-default fixed-top" role="navigation">
        <div class="loadingbar" style="background-color:<?php echo $loadingbar_color; ?>"></div>
        <div class="container-fluid">

          <div class="row wsj__logo" style="margin-left: 0px!important;margin-right: 0px!important;">
            <div>
              <a href="home" title="THE FACE OF REAL NEWS – WSJ EDUCATION" rel="home" id="<?php echo wsju_link_id( 'header', 'wsj logo' ); ?>">
                <img width="260" src="<?php echo get_template_directory_uri(); ?>/dist/img/wsj_logo.svg" class="logo-full" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/dist/img/wsj_logo2.png'" alt="WSJ logo top">
                <img src="<?php echo get_template_directory_uri(); ?>/dist/img/wsj_logo_short.svg" class="logo-short text-center center-block" alt="WSJ logo alternative" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/dist/img/wsj_logo_short.png'">
              </a>
            </div>
          </div>

          <div class="hamburger d-sm-none">
            <img id="line_1" class="hamburger_line img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/img/hamburger_line.svg" alt="hamburger line 1" width="40">
            <img id="line_2" class="hamburger_line img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/img/hamburger_line.svg" alt="hamburger line 2" width="40">
            <img id="line_3" class="hamburger_line img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/img/hamburger_line.svg" alt="hamburger line 3" width="40">
          </div>

          <div class="mobile-nav d-sm-none">
            <div class="button-wrapper">
              <a href="home" target="_self" class="color__blk" id="<?php echo wsju_link_id( 'mobileNav', 'home' ); ?>">
                <button type="button" class="cta btn font__rm bgcolor__home text-center mb-4">
                  <p>HOME</p>
                  <div class="js-button-hover-bg"></div>
                </button>
              </a>

              <a href="students" target="_self" class="color__blk" id="<?php echo wsju_link_id( 'mobileNav', 'students' ); ?>">
                <button type="button" class="cta btn font__rm bgcolor__stu text-center mb-4">
                  <p>STUDENTS</p>
                  <div class="js-button-hover-bg"></div>
                </button>
              </a>

              <a href="professors" target="_self" class="color__blk" id="<?php echo wsju_link_id( 'mobileNav', 'professors' ); ?>">
                <button type="button" class="cta btn font__rm bgcolor__pro text-center mb-4">
                  <p>PROFESSORS</p>
                  <div class="js-button-hover-bg"></div>
                </button>
              </a>

              <a href="universities" target="_self" class="color__blk" id="<?php echo wsju_link_id( 'mobileNav', 'universities' ); ?>">
                <button type="button" class="cta btn font__rm bgcolor__uni text-center mb-4">
                  <p>UNIVERSITIES</p>
                  <div class="js-button-hover-bg"></div>
                </button>
              </a>
            </div>
          </div>

        </div>
        <!-- container -->
      </nav>

      <nav class="nav-items">
        <div class="row">
          <ul class="d-none d-sm-flex">
            <li class="font__rl <?php if( wsju_page_slug() == 'home' ){ echo "active"; } ?>">
              <a href="home" target="_self" class="color__blk" id="<?php echo wsju_link_id( 'header-nav', 'home' ); ?>">
                HOME
              </a>
              <span class="top"></span>
              <span class="bottom"></span>
            </li>
            <li class="font__rl <?php if( wsju_page_slug() == 'students' ){ echo "active"; } ?>">
              <a href="students" target="_self" class="color__blk" id="<?php echo wsju_link_id( 'header-nav', 'students' ); ?>">
               STUDENTS
              </a>
              <span class="top"></span>
              <span class="bottom"></span>
            </li>
            <li class="font__rl <?php if( wsju_page_slug() == 'professors' ){ echo "active"; } ?>">
              <a href="professors" target="_self" class="color__blk" id="<?php echo wsju_link_id( 'header-nav', 'professors' ); ?>">
               PROFESSORS
              </a>
              <span class="top"></span>
              <span class="bottom"></span>
            </li>
            <li class="font__rl <?php if( wsju_page_slug() == 'universities' ){ echo "active"; } ?>">
              <a href="universities" target="_self" class="color__blk" id="<?php echo wsju_link_id( 'header-nav', 'universities' ); ?>">
                UNIVERSITIES
              </a>
              <span class="top"></span>
              <span class="bottom"></span>
            </li>
          </ul>
        </div>
      </nav>
      <!-- NAV -->
    </header>




