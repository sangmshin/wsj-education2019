
<footer>
    <div class="container pt-5 pb-5">
    <div class="row">
        
        <div class="col-md-12 col-lg-12 col-xl-4 text-center mb-4">
            <img src="<?php echo get_template_directory_uri(); ?>/dist/img/djlogo.png" alt="Dow Jones | Wall Street Journal" >
        </div>

        <div class="col-md-12 col-lg-12 col-xl-8 text-white">
        <div class="row">
            <div class="footer-nav__col col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
            <div class="footer-nav__main">
                <h5 class="font__rl d-sm-none">
                WSJ Education
                </h5>
                <h4 class="font__rl d-none d-sm-block">
                WSJ Education
                </h4>
            </div>
            <span></span>
            <div class="footer-nav__sub">
                <div>
                <p class="font__rl">
                    <a href="home" target="_self" id="<?php echo wsju_link_id( 'footer', 'home' ); ?>">
                        Home
                    </a>
                </p>
                <p class="font__rl">
                    <a href="students" target="_self" id="<?php echo wsju_link_id( 'footer', 'students' ); ?>">
                        Students
                    </a>
                </p>
                <p class="font__rl">
                    <a href="professors" target="_self" id="<?php echo wsju_link_id( 'footer', 'professors' ); ?>">
                        Professors
                    </a>
                </p>
                <p class="font__rl">
                    <a href="universities" target="_self" id="<?php echo wsju_link_id( 'footer', 'universities' ); ?>">
                        Universities
                    </a>
                </p>

                <?php 
                    if( wsju_page_slug() == 'home' || wsju_page_slug() == 'students' || explode("-", wsju_page_slug())[1] == 'students' || wsju_user_type( $_GET["user_type"] ) == 'students' ) {
                        $becomeMemberURL = "search-students/?mod=wsjedu&user_type=students";

                    }else if( wsju_page_slug() == 'professors' || explode("-", wsju_page_slug())[1] == 'professors' || wsju_user_type( $_GET["user_type"] ) == 'professors' ) {
                        $becomeMemberURL = "search-professors/?mod=wsjedu&user_type=professors";

                    }else if( wsju_page_slug() == 'universities' || explode("-", wsju_page_slug())[1] == 'universities' ) {
                        $becomeMemberURL = "search-universities/?mod=wsjedu&user_type=university";
                    }
                ?>


                <p class="font__rl">
                    <a href="<?php echo $becomeMemberURL; ?>" target="_self" id="<?php echo wsju_link_id( 'footer', 'become a member' ); ?>">
                        Become a Member
                    </a>
                </p>
                </div>
            </div>
            <img width="26" class="toggleBtn  d-sm-none" src="<?php echo get_template_directory_uri(); ?>/dist/img/footer-toggle.svg" alt="open and close"/>
            </div>
            <div class="footer-nav__col col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
            <div class="footer-nav__main">
                <h4 class="font__rl d-none d-sm-block">
                FAQ
                </h4>
                <h5 class="font__rl d-sm-none">
                FAQ
                </h5>
            </div>
            <span></span>
            <div class="footer-nav__sub">
                <div>
                <p class="font__rl">
                    <a href="faq-students" target="_self" id="<?php echo wsju_link_id( 'footer', 'faq students' ); ?>">
                    Students
                    </a>
                </p>
                <p class="font__rl">
                    <a href="faq-professors" target="_self" id="<?php echo wsju_link_id( 'footer', 'faq professors' ); ?>">
                    Professors
                    </a>
                </p>
                <p class="font__rl">
                    <a href="faq-universities" target="_self" id="<?php echo wsju_link_id( 'footer', 'faq universities' ); ?>">
                    Universities
                    </a>
                </p>
                </div>
            </div>
            <img width="26" class="toggleBtn  d-sm-none" src="<?php echo get_template_directory_uri(); ?>/dist/img/footer-toggle.svg" alt="open and close"/>
            </div>
            <div class="footer-nav__col col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
            <div class="footer-nav__main">
                <h4 class="font__rl d-none d-sm-block">
                Contact Us
                </h4>
                <h5 class="font__rl d-sm-none">
                Contact Us
                </h5>
            </div>
            <span></span>
            <div class="footer-nav__sub">
            <div>
                <p class="font__rl">
                    1-800-JOURNAL<br/>
                    (1-800-568-7625)
                </p>
                
            </div>
            </div>
                <img width="26" class="toggleBtn  d-sm-none" src="<?php echo get_template_directory_uri(); ?>/dist/img/footer-toggle.svg" alt="open and close"/>
            </div>
            <div class="footer-nav__col col-xs-12 col-sm-6 col-md-3 col-lg-3 col-xl-3">
            <div class="footer-nav__main">
                <h4 class="font__rl d-none d-sm-block">
                    Follow Us
                </h4>
                <h5 class="font__rl d-sm-none">
                    Follow Us
                </h5>
            </div>
            <span></span>
            <div class="footer-nav__sub">
                <div>
                <p class="font__rl">
                    <a href="https://www.facebook.com/wsj?mod=wsjeducation" target="_blank" onclick="utag.link({'event_name' : 'wsjedu_linkto_facebook'})" id="<?php echo wsju_link_id( 'footer', 'facebook' ); ?>">
                        Facebook
                    </a>
                </p>
                <p class="font__rl">
                    <a href="https://www.twitter.com/wsj?mod=wsjeducation" target="_blank" onclick="utag.link({'event_name' : 'wsjedu_linkto_twitter'})" id="<?php echo wsju_link_id( 'footer', 'twitter' ); ?>">
                    Twitter
                    </a>
                </p>
                <p class="font__rl">
                    <a href="https://www.linkedin.com/company/the-wall-street-journal/?mod=wsjeducation" target="_blank" onclick="utag.link({'event_name' : 'wsjedu_linkto_linkedin'})" id="<?php echo wsju_link_id( 'footer', 'linkedin' ); ?>">
                    LinkedIn
                    </a>
                </p>
                </div>
            </div>
            <img width="26" class="toggleBtn  d-sm-none" src="<?php echo get_template_directory_uri(); ?>/dist/img/footer-toggle.svg" alt="open and close"/>
            </div>
        </div>
        </div>

    </div>

    <?php 
    if( wsju_page_slug() == 'home' || wsju_page_slug() == 'students' || wsju_page_slug() == 'professors' || wsju_page_slug() == 'universities' ) {
      $extraBottom = "mb-5 pb-2";
    } ?>

    <div class="row text-center mt-5 <?php echo $extraBottom; ?>">
        <div class="col text-white font__rl">
        <p class="disclaimer">@Copyright 2019 Dow Jones & Company, Inc. All Rights Reserved</p>
        <a href="https://www.dowjones.com?mod=wsjeducation" target="_blank" id="<?php echo wsju_link_id( 'footer', 'dow jones' ); ?>" class="text-white">
            <p class="disclaimer">www.dowjones.com</p>
        </a>
        </div>
    </div>
    </div>
</footer>
  <script src="<?php echo get_template_directory_uri(); ?>/dist/js/modal-video.js"></script>
  <!-- <script type="text/javascript" src="https://education.wsj.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=4.8"></script> -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-autocomplete/1.0.7/jquery.auto-complete.min.js?ver=1.0.7"></script>



<script type="text/javascript">
    var global = { "ajax" : "<?php echo admin_url('admin-ajax.php'); ?>" };
</script>

  <script type="text/javascript">
  function fetch(){
      jQuery.ajax({
          url: '<?php echo admin_url('admin-ajax.php'); ?>',
        //   url: global.ajax,
          type: 'post',
          headers: {'Access-Control-Allow-Origin': "*"},
          data: { 
            action: 'data_fetch', 
            rep_type: jQuery('#rep_type').val(), 
            state: jQuery('#state').val(), 
          },
          success: function(data) {
              jQuery('.form-inner').remove();
              jQuery('.header-text__sub.success-text p').html( 'Please contact the rep below for more information.' );
              jQuery('#datafetch').html( data );
          }
      });
  }
  </script>

<script type="text/javascript">
var wpcf7 = {"apiSettings":{"root":"https:\/\/education.wsj.com\/wp-json\/","namespace":"contact-form-7\/v1"},"recaptcha":{"messages":{"empty":"Please verify that you are not a robot."}},"cached":"1"};
</script>






  
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/dist/js/typeahead.js"></script>
<!-- <script type="text/javascript" src="https://education.wsj.com/wp-includes/js/jquery/suggest.min.js?ver=1.1-20110113"></script> -->
<!-- <script type="text/javascript" src="https://education.wsj.com/wp-content/themes/wsj-university-2018/dist/js/modal-video.js"></script> -->
<!-- <script type="text/javascript" src="https://education.wsj.com/wp-includes/js/wp-embed.min.js?ver=4.9.8"></script> -->
<!-- <script src="https://education.wsj.com/wp-content/themes/wsj-university-2018/partials/validator.js"></script> -->
<!-- <script src="https://education.wsj.com/wp-content/themes/wsj-university-2018/partials/contact-2.js"></script> -->




<!-- Twitter universal website tag code -->
<script>
!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='//static.ads-twitter.com/uwt.js',
a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
// Insert Twitter Pixel ID and Standard Event data below
twq('init','ntys2');
twq('track','PageView');
</script>
<!-- Twitter universal website tag code -->




<!-- LinkedIn tag code -->
<script type="text/javascript">
_linkedin_partner_id = "65162";
window._linkedin_data_partner_ids = window._linkedin_data_partner_ids || [];
window._linkedin_data_partner_ids.push(_linkedin_partner_id);
</script><script type="text/javascript">
(function(){var s = document.getElementsByTagName("script")[0];
var b = document.createElement("script");
b.type = "text/javascript";b.async = true;
b.src = "https://snap.licdn.com/li.lms-analytics/insight.min.js";
s.parentNode.insertBefore(b, s);})();
</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://dc.ads.linkedin.com/collect/?pid=65162&fmt=gif" />
</noscript>
<!-- LinkedIn tag code -->



<script type="text/javascript" src="https://dcdd29eaa743c493e732-7dc0216bc6cc2f4ed239035dfc17235b.ssl.cf3.rackcdn.com/tags/wsj/hokbottom.js"></script>

<!-- 
<iframe id="kx-proxy-sfmavwkc3" src="https://cdn.krxd.net/partnerjs/xdi/proxy.3d2100fd7107262ecb55ce6847f01fa5.html#!kxcid=sfmavwkc3&amp;kxt=https%3A%2F%2Feducation.wsj.com&amp;kxcl=cdn&amp;kxp=" style="display: none; visibility: hidden; height: 0; width: 0;"></iframe> -->

  <script src="<?php echo get_template_directory_uri(); ?>/dist/js/custom.js?ver=<?php echo the_field( 'js_version_number', get_option( 'page_on_front' ) ); ?>"></script>
