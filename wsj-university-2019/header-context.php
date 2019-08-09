<!-- header-context.php --><?php
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

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" type="text/css">



<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/scripts/vendor/slick.css" type="text/css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/scripts/vendor/slick-theme.css" type="text/css">
<link rel="stylesheet" href="https://npmcdn.com/flickity@1.2/dist/flickity.min.css">
  <!-- CUSTOM STYLES -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/style.css">

<script src="//cdn.optimizely.com/js/5090114122.js"></script> 
<script type="text/javascript" src="https://dcdd29eaa743c493e732-7dc0216bc6cc2f4ed239035dfc17235b.ssl.cf3.rackcdn.com/tags/wsj/hoktop.js"></script>
<script type='text/javascript' src='https://dlive.wsj.com/wp-content/themes/wsj-dlive-2017/dist/js/jquery-3.3.1.min.js'></script>
<script src="https://npmcdn.com/flickity@1.2/dist/flickity.pkgd.min.js"></script>


<!-- Magnific Popup core CSS file -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

<!-- jQuery 1.7.2+ or Zepto.js 1.0+ -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

<!-- Magnific Popup core JS file -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>


<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
<![endif]-->
<?php wp_head(); ?>
<link rel='shortcut icon' type='image/x-icon' href='<?php echo get_template_directory_uri(); ?>/dist/img/favicon.ico' />

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

<div class="context container-fluid video-header-wrapper" style="background: url(<?php the_field( 'vh_image' ); ?>) no-repeat top center; background-size: cover;">	
<header>
		<div class="header_holder">
      <img src="https://images.dowjones.com/wp-content/uploads/sites/35/2019/01/14161749/context-logo.png">
      <?php $nav_link = get_field( 'nav_link' ); ?>
      <a href="<?php echo $nav_link['url']; ?>"><?php echo $nav_link['title']; ?></a>
		</div>
</header>
<div class="video-header text-center">

  <?php 
    $check = get_field( 'play_btn_display' );
    if ($check[0]) { ?>
      <a id="<?php echo wsju_link_id( 'video here', 'wsjedu_video start' ); ?>" class="popup-youtube" href="<?php the_field( 'video_url' ); ?>" data-video-id="<?php the_field( 'vh_video' ); ?>" onClick="utag.link({'event_name' : 'wsjedu_video start'})">
        <div class="playBtn"></div>
      </a>
  <?php } ?>


		<div class="header-text">
			<h1><?php the_field( 'vh_title' ); ?></h1>
		</div>
		<div class="header-text__subline">
			<p><?php the_field( 'vh_copy' ); ?></p>
    </div>
    <?php $cta = get_field( 'btn' ); ?>
    <a href="<?php echo $cta['url']; ?>">
    <button class="context-btn">
      <!-- RUB fix this -->
      

      <?php echo $cta['title']; ?>
    </button>
    </a>

	</div>
</div>


