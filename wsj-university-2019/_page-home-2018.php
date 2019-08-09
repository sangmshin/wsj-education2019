<?php get_header( '2018-home' ); exit; ?>

  <div class="container-fluid">
    <div class="row text-center top-logo">
      <div class="wsj-logo">

        <a id="<?php echo wsju_link_id( 'body', 'wjs-logo' ); ?>" href="#" title="THE FACE OF REAL NEWS – WSJ EDUCATION" rel="home">
          <img width="290" src="<?php echo get_template_directory_uri(); ?>/dist/img/wsj_logo.svg" onerror="this.onerror=null; this.src='<?php echo get_template_directory_uri(); ?>/dist/img/wsj_logo2.png'">
        </a>
      </div>
      <!-- <div class="wsj-logo__sub">
        <h5>WSJ EDUCATION</h5>
      </div> -->
    </div>
  </div>

  <div class="main-content">

    <div class="container-fluid">
      <div class="row">
        <div class="wsj-logo__bottomGradient">
          &nbsp;
        </div>
        <div class="header text-center">
          <p class="header-text">
            Welcome to WSJ&nbsp;Education
          </p>
          <p class="header-text__sub">Choose which best describe you:</p>
        </div>
      </div>
    </div>

    <div class="container three-profiles">
      <div class="row profile-wrapper text-center">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 profile-selector text-center">
          <a href="/students/">
            <!-- <a href="https://education.wsj.com/students/"> -->
            <div class="profile text-center">
              <p>STUDENT</p>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 profile-selector text-center">
          <a href="/professors/">
            <div class=" profile text-center">
              <p>PROFESSOR</p>
            </div>
          </a>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 profile-selector text-center">
          <a href="/universities/">
            <div class="profile text-center">
              <p>UNIVERSITY</p>
            </div>
          </a>
        </div>

      </div>

      <div class="lp-hero-bg text-center">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/img/landingPage_stippled_bg.jpg" class="img-responsive" alt="WSJ Education">
      </div>
    </div>
  </div>

  
  <div class="footer-wrapper text-center">
    <div class="hr"></div>

    <div class="container">
      <div class="row footer">
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12 empty-col"></div>
        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 footer__legal">
          <p>&copy; Copyright 2018
            <a href="https://dowjones.com" target="_blank" style="text-decoration: none!important; color:#333;">Dow Jones &amp; Company</a>, Inc. All&nbsp;Rights&nbsp;Reserved
            <br/>
            <a href="https://www.dowjones.com/privacy-policy/" target="_blank">Privacy Policy</a> |
            <a href="https://www.dowjones.com/cookies-policy/" target="_blank">Cookie Policy</a>
          </p>
        </div>
        <div class="col-lg-4 col-md-3 col-sm-3 col-xs-12 footer__social">
          <a class="facebook text-left" href="https://www.facebook.com/WSJ" target="_blank">
            <div class="">
              <svg style="border-radius: 50% 50%; background-color: #fff;" width="40" height="40" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 20c0 11.045 8.955 20 20 20s20-8.955 20-20S31.045 0 20 0 0 8.955 0 20zm24.04.004h-2.518V29H17.78v-8.996H16V16.83h1.78v-2.06c0-1.47.703-3.77 3.77-3.77h2.77v3.095h-2.025c-.418-.023-.777.297-.8.715-.004.05 0 .1.006.15v1.87h2.85l-.31 3.174z"
                  fill="#888" fill-rule="evenodd"></path>
              </svg>
            </div>
          </a>
          <a class="twitter text-left" href="https://twitter.com/WSJ" target="_blank">
            <div class="">
              <svg style="border-radius: 50% 50%; background-color: #fff;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">
                <path fill="#888" d="M20 0C9 0 0 9 0 20s9 20 20 20 20-9 20-20S31 0 20 0zm6.6 16.5v.5c0 4.7-3.4 10.1-9.7 10.1-1.9 0-3.7-.6-5.2-1.6h.8c1.5 0 3-.5 4.2-1.5-1.5-.1-2.7-1-3.1-2.5.2 0 .4.1.6.1.3 0 .6 0 .9-.1-1.6-.3-2.7-1.8-2.7-3.5.5.3 1 .4 1.5.4-1.5-1.1-2-3.1-1.1-4.7 1.7 2.2 4.3 3.5 7 3.7-.1-.3-.1-.5-.1-.8 0-1.9 1.5-3.5 3.4-3.5.9 0 1.8.4 2.5 1.1.8-.2 1.5-.4 2.2-.9-.3.8-.8 1.5-1.5 2 .7-.1 1.3-.3 2-.6-.5.7-1 1.3-1.7 1.8z"></path>
              </svg>
            </div>
          </a>
          <a class="linkedin text-left" href="https://www.linkedin.com/groups/4093806" target="_blank">
            <div class="">
              <svg width="40" height="auto" id="Linkedin" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 758 758">
                <defs>
                  <style>
                    .cls-1 {
                      fill: #888;
                    }

                    .cls-2 {
                      fill: #fff;
                    }
                  </style>
                </defs>
                <title>linkedin_logo_grey</title>
                <g id="linkedin-back">
                  <circle class="cls-1" cx="379" cy="379" r="379" />
                </g>
                <g id="linkedin-linkedin">
                  <path class="cls-2" d="M242.6,331.1h58.1V517.8H242.6Zm29-92.8a33.6,33.6,0,1,1-33.7,33.6,33.61,33.61,0,0,1,33.7-33.6" />
                  <path class="cls-2" d="M337.1,331.1h55.6v25.5h.8c7.7-14.7,26.7-30.2,54.9-30.2,58.7,0,69.6,38.7,69.6,88.9V517.7H460V427c0-21.6-.4-49.5-30.2-49.5-30.2,0-34.8,23.6-34.8,48v92.3H337V331.1Z"
                  />
                </g>
              </svg>
            </div>
          </a>
          <a class="youtube" href="https://www.youtube.com/wsj" target="_blank">
            <div class="" style="background-color: #888;width: 40px; height: 40px;border-radius: 50% 50%;">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48" style="transform: translateY(8px)">
                <g id="surface1">
                  <path style=" fill:#fff;" d="M 43.199219 33.898438 C 42.800781 36 41.101563 37.601563 39 37.898438 C 35.699219 38.398438 30.199219 39 24 39 C 17.898438 39 12.398438 38.398438 9 37.898438 C 6.898438 37.601563 5.199219 36 4.800781 33.898438 C 4.398438 31.601563 4 28.199219 4 24 C 4 19.800781 4.398438 16.398438 4.800781 14.101563 C 5.199219 12 6.898438 10.398438 9 10.101563 C 12.300781 9.601563 17.800781 9 24 9 C 30.199219 9 35.601563 9.601563 39 10.101563 C 41.101563 10.398438 42.800781 12 43.199219 14.101563 C 43.601563 16.398438 44.101563 19.800781 44.101563 24 C 44 28.199219 43.601563 31.601563 43.199219 33.898438 Z "></path>
                  <path style=" fill:#888;" d="M 20 31 L 20 17 L 32 24 Z "></path>
                </g>
              </svg>
            </div>
          </a>
          <a class="snapchat" href="https://www.snapchat.com/discover/Wall-Street-Journal/4806310285" target="_blank">
            <!-- <div class="social__sc"></div> -->
            <div class="" style="background-color: #888;width: 40px; height: 40px;border-radius: 50% 50%;">
              <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="20" height="20" viewBox="0 0 50 50" style="fill:#fff;transform: translateY(10px)">
                <g id="surface1">
                  <path d="M 46.773438 35.078125 C 40.96875 34.121094 38.316406 28.109375 38.230469 27.914063 C 38.21875 27.878906 38.191406 27.816406 38.175781 27.78125 C 38 27.429688 37.824219 26.933594 37.972656 26.582031 C 38.226563 25.980469 39.433594 25.597656 40.15625 25.367188 C 40.410156 25.285156 40.652344 25.210938 40.839844 25.136719 C 42.59375 24.441406 43.46875 23.535156 43.449219 22.433594 C 43.433594 21.546875 42.753906 20.734375 41.753906 20.382813 C 41.40625 20.234375 41.007813 20.160156 40.605469 20.160156 C 40.332031 20.160156 39.917969 20.199219 39.519531 20.382813 C 38.851563 20.695313 38.265625 20.863281 37.847656 20.882813 C 37.757813 20.878906 37.679688 20.871094 37.613281 20.859375 L 37.65625 20.171875 C 37.851563 17.0625 38.097656 13.1875 37.046875 10.832031 C 33.945313 3.890625 27.375 3.351563 25.433594 3.351563 L 24.550781 3.359375 C 22.613281 3.359375 16.054688 3.898438 12.960938 10.835938 C 11.910156 13.191406 12.152344 17.0625 12.351563 20.175781 L 12.359375 20.292969 C 12.371094 20.484375 12.382813 20.675781 12.394531 20.859375 C 11.960938 20.9375 11.113281 20.792969 10.234375 20.382813 C 9.039063 19.824219 6.886719 20.5625 6.589844 22.125 C 6.457031 22.816406 6.617188 24.128906 9.164063 25.132813 C 9.355469 25.210938 9.59375 25.285156 9.851563 25.367188 C 10.570313 25.597656 11.777344 25.976563 12.03125 26.582031 C 12.179688 26.933594 12.003906 27.429688 11.796875 27.855469 C 11.6875 28.109375 9.050781 34.121094 3.234375 35.078125 C 2.492188 35.199219 1.964844 35.855469 2.003906 36.613281 C 2.015625 36.8125 2.066406 37.011719 2.148438 37.207031 C 2.675781 38.445313 4.59375 39.296875 8.171875 39.878906 C 8.234375 40.089844 8.304688 40.402344 8.34375 40.574219 C 8.417969 40.929688 8.5 41.289063 8.609375 41.664063 C 8.714844 42.019531 9.078125 42.84375 10.210938 42.84375 C 10.554688 42.84375 10.929688 42.769531 11.332031 42.691406 C 11.925781 42.574219 12.667969 42.429688 13.621094 42.429688 C 14.152344 42.429688 14.699219 42.476563 15.25 42.566406 C 16.265625 42.734375 17.183594 43.386719 18.25 44.136719 C 19.914063 45.316406 21.800781 46.648438 24.726563 46.648438 C 24.804688 46.648438 24.882813 46.644531 24.957031 46.640625 C 25.0625 46.644531 25.171875 46.648438 25.28125 46.648438 C 28.207031 46.648438 30.09375 45.3125 31.761719 44.136719 C 32.777344 43.414063 33.738281 42.738281 34.757813 42.566406 C 35.308594 42.476563 35.855469 42.429688 36.386719 42.429688 C 37.304688 42.429688 38.03125 42.546875 38.679688 42.675781 C 39.140625 42.765625 39.507813 42.808594 39.847656 42.808594 C 40.605469 42.808594 41.1875 42.375 41.398438 41.648438 C 41.507813 41.28125 41.585938 40.925781 41.664063 40.566406 C 41.695313 40.433594 41.769531 40.097656 41.835938 39.875 C 45.414063 39.292969 47.332031 38.441406 47.855469 37.214844 C 47.941406 37.019531 47.988281 36.816406 48.003906 36.605469 C 48.042969 35.859375 47.515625 35.203125 46.773438 35.078125 Z "></path>
                </g>
              </svg>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- footer-wrapper -->

  <script src="<?php echo get_template_directory_uri(); ?>/dist/js/custom.min.js"></script>
</body>

</html>