function fbtrack1() {
    
fbq('trackCustom', 'UniversityClick');
};

function fbtrack2() {
    
fbq('trackCustom', 'StudentSearch');
};

function fbtrack3() {
    
fbq('trackCustom', 'ContactRep');
};


WSJU.namespace( 'main' );

WSJU.main = (function($) {
	var OBJ_NAV,
		OBJ_SECT,
		$WIN = $(window),
		$HTML = $('html'),
    repArray = [];
	
	var winW,
		winH;

  	var init = function init() {
  		OBJ_NAV = WSJU.main.nav;
  		OBJ_SECT = WSJU.main.landing;

  		getWinD();
  		styleSet();
  		
  		$WIN.resize(function(){
  			getWinD();
  			styleSet();
        });

        $WIN.on('scroll', function(){
    		pageNavSet();
		});
        pageNavSet();
        descResize('#description-1', '#description-2', '#cta-section');
        loadRepXml();
        youtubeAltTags('#video-title-1');
        youtubeAltTags('#video-title-2');
        youtubeAltTags('#video-title-3');
        handlers();
	};
	
	var getWinD = function getWinD() {
		winW = getWinW();
		winH = getWinH();
	}

	var styleSet = function styleSet() {
		if ($HTML.hasClass('breakpoint-phone') || $HTML.hasClass('breakpoint-small-tablet') || $HTML.hasClass('breakpoint-tablet'))
		{
			
			slickOn();
		}
		else
		{

			slickOff();
		}
	};

	var pageNavSet = function pageNavSet() {

		var pageCheck = jQuery('#js-page-check').html();

		if (!$HTML.hasClass('breakpoint-phone') && !$HTML.hasClass('breakpoint-small-tablet') && !$HTML.hasClass('breakpoint-tablet'))
		{

			if ($WIN.scrollTop() >= 80) {
				$('#header').addClass('strip');
			} else {
				$('#header').removeClass('strip');
			}
		}

		// disable for Professor & Student landing pages
		if (pageCheck !== "1"){

			var desktopPos = jQuery('#hero-wrapper').height() + 90;

			if ($WIN.scrollTop() >= desktopPos){
				$('#page-nav').addClass('strip');
				$('#body-content').addClass('strip');
			} else {
				$('#page-nav').removeClass('strip');
				$('#body-content').removeClass('strip');
			}

			if ($HTML.hasClass('breakpoint-tablet')){

				var tabletPos = jQuery('#hero-wrapper').height() + 10;

				if ($WIN.scrollTop() >= tabletPos){
					$('#page-nav').addClass('strip');
					$('#body-content').addClass('strip');
				} else {
					$('#page-nav').removeClass('strip');
					$('#body-content').removeClass('strip');
				}
			}
		}
	};

	var getWinW = function getWinW() {
		return $WIN.width();
	};
	
	var getWinH = function getWinH() {
		return $WIN.height();
	};
	
	var rNumGenerator = function rNumGenerator(num) {
		return Math.floor(Math.random()*num);
    };

	var slickOn = function slickOn() {
		if(!$('#highlights .thumb-container').hasClass('slick-initialized'))
		{
			$('#highlights .thumb-container').slick({
				dots: true,
				infinite: true,
				speed: 300,
				slidesToShow: 1,
				adaptiveHeight: true,
				centerMode: true,
				arrows: false,
				swipe: true,
				centerPadding: '0'
			});
		}
	};

	var slickOff = function slickOff() {
		if($('#highlights .thumb-container').hasClass('slick-initialized'))
		{
			$('#highlights .thumb-container').slick("unslick");
		}
	};

  var descResize = function descResize(desc1, desc2, wrapper) {
  	var html = jQuery('html');

  	if (!html.hasClass('breakpoint-small-tablet') || !html.hasClass('breakpoint-phone')){
        var descHeight1 = jQuery(desc1).height(),
            descHeight2 = jQuery(desc2).height(),
            heightIncrease = 175;

        if (descHeight1 > descHeight2) {
            heightDiff = descHeight1 + heightIncrease;
        } else {
            heightDiff = descHeight2 + heightIncrease;
        }

        jQuery(wrapper).css('height', heightDiff + 'px');
  	}
  }

  // function for button hover w/ colors set in WP
  var hoverColor = function hoverColor(selector) {
  	
  	var primaryColor = jQuery('#js-color-info').html(),
  			secondaryColor = jQuery('#js-secondary-color-info').html();

  	if (jQuery(selector).hasClass('btn')){
	  	jQuery(selector).hover(function(e){
        e.preventDefault();
        e.stopPropagation();

	  		jQuery(selector).css('background-color', secondaryColor);
	  	}, function(e){
	        e.preventDefault();
	        e.stopPropagation();

	  		jQuery(selector).css('background-color', primaryColor);
	  	});
  	} else {
  		jQuery(selector).hover(function(e){
        e.preventDefault();
        e.stopPropagation();  		
        	
  			jQuery(selector).css('color', secondaryColor);
  		}, function(e){
	        e.preventDefault();
	        e.stopPropagation();

  			jQuery(selector).css('color', primaryColor);
  		});
  	}
  }

  var subpageHoverColor = function subpageHoverColor(selector1, selector2, selector3) {

  	var subpageSecondary1 = jQuery('#js-subpage-second-color-1').html(),
  			subpageSecondary2 = jQuery('#js-subpage-second-color-2').html(),
  			subpageSecondary3 = jQuery('#js-subpage-second-color-3').html();

  }

  var scrimReveal = function scrimReveal(link, scrimEl) {
        var scrim = scrimEl,
            iframe = scrim.children('iframe'),
            scrimUrl = link.attr('href'),
            overlay = jQuery('#scrim-overlay'),
            closeBtn = jQuery('#close-scrim');

        setTimeout(function(){
          iframe.attr('src', scrimUrl)
        }, 250);

        closeBtn.addClass('active');
        scrim.addClass('active');
        overlay.addClass('active');  
  }

  var loadRepXml = function loadRepXml() {

    var xmlPath = jQuery('#js-rep-list').text().trim();

    console.log(xmlPath);

    jQuery.get(xmlPath, function(data) {
      var _xml = jQuery(data);

      _xml.find('Data').each(function(){
        var _this = jQuery(this);

        rep = {
          schoolName: jQuery(_this).attr('school_name'),
          zipCode: jQuery(_this).attr('zip_code'),
          threeDigitZip: jQuery(_this).attr('three_digit_zip'),
          repName: jQuery(_this).attr('rep_name'),
          repEmail: jQuery(_this).attr('rep_email')
        }

        repArray.push(rep);
      });

    });
  }

  var searchRep = function searchRep(lookup) {

    var repsSection = jQuery('#reps'),
        schoolName = '<div class="accordian-wrapper" id="accordian-wrapper-2"><div class="accordian-header school-name"',
        plusMinus = '<span class="plus-minus">&#43; </span>',
        zipCode = '<div class="zip-code">',
        repInfo = '<div class="rep-info answer"',
        repName = '<div class="rep-name">',
        repEmail = '<div class="rep-email">';


    jQuery(repsSection).empty();

      for (i = 0; i < repArray.length; i++) {
        if (repArray[i].threeDigitZip == lookup) {
          jQuery(repsSection).append('<div class="rep">' + schoolName + 'data-expand="answer-' + i + '">' + plusMinus + repArray[i].schoolName +' (' + repArray[i].zipCode + ')</div>' + repInfo + 'id="answer-' + i + '">' + repName + repArray[i].repName + '</div>' + repEmail + '<a href="mailto:' + repArray[i].repEmail + '">' + repArray[i].repEmail + '</a></div></div></div></div>');
        }
      }

      if ( jQuery('#reps').html() == "") {
        jQuery(repsSection).append('<p class="no-reps">Sorry, there are no reps near this zip code.<br>Please try another zip code.</p>');
      }

      jQuery('#accordian-wrapper-2 .accordian-header').click(function(e){
        e.stopPropagation();
        e.preventDefault();

        var link = jQuery(this);
        var expandSection = link.data('expand');
        var plusMinus = link.find('.plus-minus');

        if (link.hasClass('active')){
          jQuery('#accordian-wrapper .accordian-header .plus-minus, #reps .accordian-wrapper .accordian-header .plus-minus').html('&#43; ');
          plusMinus.html('&#43; ');
          link.removeClass('active');
          jQuery('#' + expandSection).removeClass('active');
          jQuery('#accordian-wrapper .active, #reps .accordian-wrapper .active').removeClass('active');         
        } else {
          jQuery('#accordian-wrapper .accordian-header .plus-minus, #reps .accordian-wrapper .accordian-header .plus-minus').html('&#43; ');
          plusMinus.html('&#8722; ');
          jQuery('#accordian-wrapper .active, #reps .accordian-wrapper .active').removeClass('active');
          link.addClass('active');
          jQuery('#' + expandSection).addClass('active');
        }

      });    
  }

  var youtubeAltTags = function youtubeAltTags(titleElId){
    var titleEl = jQuery(titleElId),
        videoId = titleEl.attr('data-youtube-id'),
        youtubePlayerArr = jQuery('#youtube-container .youtube-player');

    for (var i = 0; i < youtubePlayerArr.length; i++) {
      if (jQuery(youtubePlayerArr[i]).attr('data-id') == videoId) {
        jQuery(youtubePlayerArr[i]).children('div').children('.youtube-thumb').attr('alt', 'Screenshot of WSJ University\'s YouTube video "' + titleEl.html() + '"');
      }
    }

  }

    function handlers() {

  	var subpageSecondary1 = jQuery('#js-subpage-second-color-1').html(),
  			subpageSecondary2 = jQuery('#js-subpage-second-color-2').html(),
  			subpageSecondary3 = jQuery('#js-subpage-second-color-3').html(),
        studentScrimCount = 0;

	    $('#nav-toggle').click(function (e) {
	        e.preventDefault();
	        e.stopPropagation();

	        $(this).toggleClass('open');
	        $('#header .navigation').slideToggle();
	        $('body').toggleClass('navigation-open');
	        return false;
	    });

	    $('#back-to-top').click(function (e) {
	        e.preventDefault();
	        e.stopPropagation();

            $('html,body').animate({
                scrollTop: 0
            }, 800, 'easeInOutCubic');
            return false;
	    });

	    $(window).on('resize', function(e){
        e.preventDefault();
        e.stopPropagation();

				descResize('#description-1', '#description-2', '#cta-section');

	    });

    	jQuery('#subpage-wrapper-1').hover(function(){
    		jQuery(this).addClass('hover');
    		jQuery(this).children('#js-subpage-btn-hover-1').css('background-color', jQuery('#js-subpage-second-color-1').html());
    	}, function(){
    		jQuery(this).removeClass('hover');
    		jQuery(this).children('#js-subpage-btn-hover-1').css('background-color', jQuery('#js-subpage-main-color-1').html());
    	});

    	jQuery('#subpage-wrapper-2').hover(function(){
    		jQuery(this).addClass('hover');
    		jQuery(this).children('#js-subpage-btn-hover-2').css('background-color', jQuery('#js-subpage-second-color-2').html());
    	}, function(){
    		jQuery(this).removeClass('hover');
    		jQuery(this).children('#js-subpage-btn-hover-2').css('background-color', jQuery('#js-subpage-main-color-2').html());
    	});
    	
    	jQuery('#subpage-wrapper-3').hover(function(){
    		jQuery(this).addClass('hover');
    		jQuery(this).children('#js-subpage-btn-hover-3').css('background-color', jQuery('#js-subpage-second-color-3').html());
    	}, function(){
    		jQuery(this).removeClass('hover');
    		jQuery(this).children('#js-subpage-btn-hover-3').css('background-color', jQuery('#js-subpage-main-color-3').html());
    	});

    	jQuery('#js-button-hover-other').hover(function(){
    		jQuery(this).css('background-color', jQuery('#js-third-color-hover').html());
    	}, function(){
    		jQuery(this).css('background-color', jQuery('#js-third-color-info').html());
    	});

    	jQuery('#js-blue-btn-hover-2').hover(function(){
    		jQuery(this).css('background-color', jQuery('#js-blue-color-hover').html());
    	}, function(){
    		jQuery(this).css('background-color', jQuery('#js-blue-color-info').html());
    	});

    	jQuery('#js-blue-btn-hover-3').hover(function(){
    		jQuery(this).css('background-color', jQuery('#js-blue-color-hover').html());
    	}, function(){
    		jQuery(this).css('background-color', jQuery('#js-blue-color-info').html());
    	});

    	jQuery('#accordian-wrapper .accordian-header, #accordian-wrapper-2 .accordian-header').click(function(e){
    		e.stopPropagation();
    		e.preventDefault();

    		var link = jQuery(this);
    		var expandSection = link.data('expand');
    		var plusMinus = link.find('.plus-minus');

    		if (link.hasClass('active')){
    			jQuery('#accordian-wrapper .accordian-header .plus-minus').html('&#43; ');
    			plusMinus.html('&#43; ');
    			link.removeClass('active');
    			jQuery('#' + expandSection).removeClass('active');
	    		jQuery('#accordian-wrapper .active').removeClass('active');    			
    		} else {
    			jQuery('#accordian-wrapper .accordian-header .plus-minus').html('&#43; ');
    			plusMinus.html('&#8722; ');
	    		jQuery('#accordian-wrapper .active').removeClass('active');
    			link.addClass('active');
	    		jQuery('#' + expandSection).addClass('active');
    		}

    	});

		

			jQuery('#accordian-wrapper.digital-bullets .accordian-header').hover(function(e) {
    		e.stopPropagation();
    		e.preventDefault();

    		var header = jQuery(this);

    		header.css('color', '#3C3C3C');
			}, function(e) {
    		e.stopPropagation();
    		e.preventDefault();

    		var header = jQuery(this),
    				hoverColor = jQuery('#js-color-info').html();;

    		header.css('color', hoverColor);
			});			

  		jQuery('#arrow-down-facebook').click(function(e){
  			e.preventDefault;
  			e.stopPropagation;

  			var currentScrollPos = jQuery('#social-wrapper-facebook').scrollTop();

  			var newScrollPos = currentScrollPos + 200;

  			jQuery('#social-wrapper-facebook').stop().animate({scrollTop: newScrollPos});
  		});

  		jQuery('#arrow-up-facebook').click(function(e){
  			e.preventDefault;
  			e.stopPropagation;

  			var currentScrollPos = jQuery('#social-wrapper-facebook').scrollTop();

  			var newScrollPos = currentScrollPos - 200;    			

  			jQuery('#social-wrapper-facebook').stop().animate({scrollTop: newScrollPos});
  		});

  		jQuery('#arrow-down-facebook')
	  		.mousedown(function(e){
	  			e.preventDefault;
	  			e.stopPropagation;

	  			jQuery('#social-wrapper-facebook').stop().animate({
	  				scrollTop: jQuery('#social-wrapper-facebook .fts-simple-fb-wrapper').height()
	  			}, 4000);
	  		})
	  		.mouseup(function(e){
	  			e.preventDefault;
	  			e.stopPropagation;

			    jQuery('#social-wrapper-facebook').stop();
			});

  		jQuery('#arrow-up-facebook')
	  		.mousedown(function(e){
	  			e.preventDefault;
	  			e.stopPropagation;

	  			jQuery('#social-wrapper-facebook').animate({
	  				scrollTop: -(jQuery('#social-wrapper-facebook .fts-simple-fb-wrapper').height())
	  			}, 4000);
	  		})
	  		.mouseup(function(e){
	  			e.preventDefault;
	  			e.stopPropagation;

			    jQuery('#social-wrapper-facebook').stop();
			});

  		jQuery('#arrow-down-twitter').click(function(e){
  			e.preventDefault;
  			e.stopPropagation;  			

  			var currentScrollPos = jQuery('#social-wrapper-twitter').scrollTop();

  			var newScrollPos = currentScrollPos + 200;

  			jQuery('#social-wrapper-twitter').stop().animate({scrollTop: newScrollPos});
  		});

  		jQuery('#arrow-up-twitter').click(function(e){
  			e.preventDefault;
  			e.stopPropagation;

  			var currentScrollPos = jQuery('#social-wrapper-twitter').scrollTop();

  			var newScrollPos = currentScrollPos - 200;    			

  			jQuery('#social-wrapper-twitter').stop().animate({scrollTop: newScrollPos});
  		});

  		jQuery('#arrow-down-twitter')
	  		.mousedown(function(e){
	  			e.preventDefault;
	  			e.stopPropagation;

	  			jQuery('#social-wrapper-twitter').stop().animate({
	  				scrollTop: jQuery('#social-wrapper-twitter .fts-twitter-div').height()
	  			}, 4000);
	  		})
	  		.mouseup(function(e){
					e.preventDefault;
					e.stopPropagation;

			    jQuery('#social-wrapper-twitter').stop();
			});

  		jQuery('#arrow-up-twitter')
	  		.mousedown(function(e){
	  			e.preventDefault;
	  			e.stopPropagation;

	  			jQuery('#social-wrapper-twitter').stop().animate({
	  				scrollTop: -(jQuery('#social-wrapper-twitter .fts-twitter-div').height())
	  			}, 4000);
	  		})
	  		.mouseup(function(e){
	  			e.preventDefault;
	  			e.stopPropagation;

			    jQuery('#social-wrapper-twitter').stop();
			});

			jQuery('#cta-section .section').hover(function(e){
  			e.preventDefault;
  			e.stopPropagation;

  			jQuery(this).addClass('hover');
			}, function(e){
  			e.preventDefault;
  			e.stopPropagation;

  			jQuery(this).removeClass('hover');
			});

			jQuery('#content .main-wrapper.students #body-content #section-1 .subpage-wrapper').hover(function(e) {
  			e.preventDefault;
  			e.stopPropagation;				

  			jQuery(this).addClass('hover');
			}, function(e) {
  			e.preventDefault;
  			e.stopPropagation;

  			jQuery(this).removeClass('hover');
			});

			jQuery('#content .main-wrapper.professors #body-content #section-2 .feature').hover(function(e){
  			e.preventDefault;
  			e.stopPropagation;

  			jQuery(this).addClass('hover');
			}, function(e){
  			e.preventDefault;
  			e.stopPropagation;

  			jQuery(this).removeClass('hover');
			});			

			jQuery('#content .main-wrapper #ordering-info-section .feature.third').hover(function(e){
  			e.preventDefault;
  			e.stopPropagation;

				jQuery(this).addClass('hover');
			}, function(e) {
				e.preventDefault;
  			e.stopPropagation;

				jQuery(this).removeClass('hover');
			});

    	// jQuery('.weekly-review-item').click(function(e){
  			// e.preventDefault;
  			// e.stopPropagation;

    	// 	window.open(jQuery(this).attr('data-url'));
    	// });

    	jQuery('#close-scrim').click(function(e){
  			e.preventDefault;
  			e.stopPropagation;

  			var scrim = jQuery('#scrims .scrim.active'),
  					overlay = jQuery('#scrim-overlay'),
            activeIframe = jQuery('#scrims .scrim.active iframe'),
            _this = jQuery(this);

        activeIframe.attr('src', '');
        _this.removeClass('active');
  			scrim.removeClass('active');
  			overlay.removeClass('active');

        studentScrimCount = 0;

  			return false;  			

    	});

    	jQuery('#scrim-overlay').click(function(e){
  			e.preventDefault;
  			e.stopPropagation;

  				var overlay = jQuery(this),
  						allScrims = jQuery('#scrims .scrim'),
              activeIframe = jQuery('#scrims .scrim.active iframe'),
              closeBtn = jQuery('#close-scrim');

        activeIframe.attr('src', '');
        closeBtn.removeClass('active');
  			allScrims.removeClass('active');
  			overlay.removeClass('active');

  			return false;
    	});

    	jQuery('#scrim-signup-on').click(function(e){
  			e.preventDefault;
  			e.stopPropagation;

        scrimReveal(jQuery(this), jQuery('.scrim#sign-up'));

        jQuery(window).scrollTop('.scrim#sign-up');        
        
        return false;
    	});

    	jQuery('#scrim-emailpref-on').click(function(e){
  			e.preventDefault;
  			e.stopPropagation;

        scrimReveal(jQuery(this), jQuery('.scrim#email-pref'))

        jQuery(window).scrollTop('.scrim#email-pref');

  			return false;  			
    	});

    	jQuery('#scrim-searcharchive-on').click(function(e){
  			e.preventDefault;
  			e.stopPropagation;

        scrimReveal(jQuery(this), jQuery('.scrim#search-archive'));

        jQuery(window).scrollTop('.scrim#search-archive');

  			return false;
    	});

      jQuery('#scrim-engagevideo-on').click(function(e){
        e.preventDefault();
        e.stopPropagation();

        scrimReveal(jQuery(this), jQuery('.scrim#engage-video'));     

        return false;
      });

      jQuery('#scrim-studentsub-on').click(function(e){
        e.preventDefault();
        e.stopPropagation();

        scrimReveal(jQuery(this), jQuery('.scrim#student-sub'));

        jQuery(window).scrollTop('.scrim#student-sub');

        studentScrimCount = 0;
        
        return false;
      });

      jQuery('#scrims .scrim#student-sub iframe').load(function(){
        studentScrimCount++;
        if (studentScrimCount == 2) {
          jQuery(this).parent('.scrim#student-sub').addClass('large');
          studentScrimCount = 0;
        } else {
          jQuery(this).parent('.scrim#student-sub').removeClass('large');
        }
      });

      jQuery('#scrim-bookstore-on').click(function(e){
        e.preventDefault();
        e.stopPropagation();

        var scrim = jQuery('.scrim#bookstore'),
            overlay = jQuery('#scrim-overlay'),
            closeBtn = jQuery('#close-scrim');

        closeBtn.addClass('active');
        scrim.addClass('active');
        overlay.addClass('active');        

        return false;
      });       

      jQuery('#rep-contact-form a.btn').click(function(e){
        e.preventDefault();
        e.stopPropagation();

        var scrim = jQuery('.scrim#contact-your-rep'),
            overlay = jQuery('#scrim-overlay'),
            appendScrim = jQuery('#rep-contact-form #error'),
            formVal = jQuery('#rep-contact-form input').val(),
            closeBtn = jQuery('#close-scrim');

        closeBtn.addClass('active');
        if (formVal.length == 5) {
          formVal = jQuery('#rep-contact-form input').val().slice(0,-2)
        }

        if (formVal.length >= 3) {
          appendScrim.empty();          
          searchRep(formVal);
          scrim.addClass('active');
          overlay.addClass('active');
        } else {
          appendScrim.empty();
          appendScrim.append('Please enter a valid zip code');
        }


      });

      jQuery('#rep-contact-form input').bind('keypress', function(e){
        e.preventDefault();
        e.stopPropagation();

        if ( (e.keyCode || e.which) == 13) {
          jQuery('#rep-contact-form a.btn').click();
        }

      });

      jQuery('#membershipPDF').on("click", function(e){
          e.preventDefault();
          e.stopPropagation();

          var buttonLink = jQuery(this),
              linkHref = jQuery(buttonLink).attr('href');

          var utag_link_data = utag.data;
              utag_link_data.event_name = 'download';
              utag_link_data.request_topic = 'Professors Download';
              utag.link(utag_link_data);

          window.location.href = linkHref;


      });

       jQuery('#student_pricing1').on("click", function(e){
          e.preventDefault();
          e.stopPropagation();

          var buttonLink = jQuery(this),
              linkHref = jQuery(buttonLink).attr('href');

          var utag_link_data = utag.data;
              utag_link_data.event_name = 'Act_Now';
              utag_link_data.request_topic = 'Students Pricing 1';
              utag.link(utag_link_data);

          window.open(linkHref);


      });

       jQuery('#student_pricing2').on("click", function(e){
          e.preventDefault();
          e.stopPropagation();

          var buttonLink = jQuery(this),
              linkHref = jQuery(buttonLink).attr('href');

          var utag_link_data = utag.data;
              utag_link_data.event_name = 'Act_Now';
              utag_link_data.request_topic = 'Students Pricing 2';
              utag.link(utag_link_data);

          window.open(linkHref);


      });

       jQuery('#students_search').on("click", function(e){
          e.preventDefault();
          e.stopPropagation();

          var buttonLink = jQuery(this),
              linkHref = jQuery(buttonLink).attr('href');

          var utag_link_data = utag.data;
              utag_link_data.event_name = 'learn_more';
              utag_link_data.request_topic = 'Students Activation Search Link';
              utag.link(utag_link_data);

          window.location.href = linkHref;


      });

         jQuery('#professors_referral').on("click", function(e){
          e.preventDefault();
          e.stopPropagation();

          var buttonLink = jQuery(this),
              linkHref = jQuery(buttonLink).attr('href');

          var utag_link_data = utag.data;
              utag_link_data.event_name = 'learn_more';
              utag_link_data.request_topic = 'Professors Referral Program learn more';
              utag.link(utag_link_data);

          
          window.open(linkHref);






      });

             jQuery('#accordian-header').on("click", function(e){
          e.preventDefault();
          e.stopPropagation();

          

          var utag_link_data = utag.data;
              utag_link_data.event_name = 'FAQ';
              utag_link_data.request_topic = 'Professors FAQ';
              utag.link(utag_link_data);

         




      });

               jQuery('#myBtn').on("click", function(e){
          e.preventDefault();
          e.stopPropagation();

          
          var utag_link_data = utag.data;
              utag_link_data.event_name = 'learn_more';
              utag_link_data.request_topic = 'University contact form';
              utag.link(utag_link_data);

          




      });
         
                  jQuery('#university_activate').on("click", function(e){
          e.preventDefault();
          e.stopPropagation();

          var buttonLink = jQuery(this),
              linkHref = jQuery(buttonLink).attr('href');

          var utag_link_data = utag.data;
              utag_link_data.event_name = 'learn_more';
              utag_link_data.request_topic = 'University Activation Search Link';
              utag.link(utag_link_data);

          window.location.href = linkHref;




      });

         


	    $('.social-share').sharrre({
		    share: {
		      twitter: true,
		      facebook: true
		    },
		    template: '<a class="social facebook" id="facebook" href="">Facebook</a><a class="social twitter" id="twitter" href="">Twitter</a>',
		    enableHover: false,
		    enableTracking: false,
		    render: function(api, options) {
		        $(api.element).on('click', '.twitter', function() {
		        	api.openPopup('twitter');
		        });
		        $(api.element).on('click', '.facebook', function() {
		        	api.openPopup('facebook');
		        });
			    }
			});

	    // calling button hover function
	    for (var i = 1; i < 6; i++) {
	    	hoverColor('#js-button-hover-' + i);
	    }

      // check for custom form hash

      var _form = jQuery("#myModal").find("form");

      if (_form.hasClass("invalid")) {
        jQuery("#myModal").css("display", "block");
      }


    };

	return {
		init: init,
		getWinW: getWinW,
		getWinH: getWinH,
		rNumGenerator: rNumGenerator,
		slickOn: slickOn,
		slickOff: slickOff,
		descResize: descResize
	};

})(jQuery);

// Lightbox JS

!function(t,i){"function"==typeof define&&define.amd?define(["jquery"],i):"object"==typeof exports?module.exports=i(require("jquery")):t.lightbox=i(t.jQuery)}(this,function(t){function i(i){this.album=[],this.currentImageIndex=void 0,this.init(),this.options=t.extend({},this.constructor.defaults),this.option(i)}return i.defaults={albumLabel:"Image %1 of %2",alwaysShowNavOnTouchDevices:!1,fadeDuration:500,fitImagesInViewport:!0,positionFromTop:50,resizeDuration:700,showImageNumberLabel:!0,wrapAround:!1},i.prototype.option=function(i){t.extend(this.options,i)},i.prototype.imageCountLabel=function(t,i){return this.options.albumLabel.replace(/%1/g,t).replace(/%2/g,i)},i.prototype.init=function(){this.enable(),this.build()},i.prototype.enable=function(){var i=this;t("body").on("click","a[rel^=lightbox], area[rel^=lightbox], a[data-lightbox], area[data-lightbox]",function(e){return i.start(t(e.currentTarget)),!1})},i.prototype.build=function(){var i=this;t('<div id="lightboxOverlay" class="lightboxOverlay"></div><div id="lightbox" class="lightbox"><div class="lb-outerContainer"><div class="lb-container"><img class="lb-image" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==" /><div class="lb-nav"><a class="lb-prev" href="" ></a><a class="lb-next" href="" ></a></div><div class="lb-loader"><a class="lb-cancel"></a></div></div></div><div class="lb-dataContainer"><div class="lb-data"><div class="lb-details"><span class="lb-caption"></span><span class="lb-number"></span></div><div class="lb-closeContainer"><a class="lb-close"></a></div></div></div></div>').appendTo(t("body")),this.$lightbox=t("#lightbox"),this.$overlay=t("#lightboxOverlay"),this.$outerContainer=this.$lightbox.find(".lb-outerContainer"),this.$container=this.$lightbox.find(".lb-container"),this.containerTopPadding=parseInt(this.$container.css("padding-top"),10),this.containerRightPadding=parseInt(this.$container.css("padding-right"),10),this.containerBottomPadding=parseInt(this.$container.css("padding-bottom"),10),this.containerLeftPadding=parseInt(this.$container.css("padding-left"),10),this.$overlay.hide().on("click",function(){return i.end(),!1}),this.$lightbox.hide().on("click",function(e){return"lightbox"===t(e.target).attr("id")&&i.end(),!1}),this.$outerContainer.on("click",function(e){return"lightbox"===t(e.target).attr("id")&&i.end(),!1}),this.$lightbox.find(".lb-prev").on("click",function(){return 0===i.currentImageIndex?i.changeImage(i.album.length-1):i.changeImage(i.currentImageIndex-1),!1}),this.$lightbox.find(".lb-next").on("click",function(){return i.currentImageIndex===i.album.length-1?i.changeImage(0):i.changeImage(i.currentImageIndex+1),!1}),this.$lightbox.find(".lb-loader, .lb-close").on("click",function(){return i.end(),!1})},i.prototype.start=function(i){function e(t){n.album.push({link:t.attr("href"),title:t.attr("data-title")||t.attr("title")})}var n=this,a=t(window);a.on("resize",t.proxy(this.sizeOverlay,this)),t("select, object, embed").css({visibility:"hidden"}),this.sizeOverlay(),this.album=[];var o,s=0,h=i.attr("data-lightbox");if(h){o=t(i.prop("tagName")+'[data-lightbox="'+h+'"]');for(var r=0;r<o.length;r=++r)e(t(o[r])),o[r]===i[0]&&(s=r)}else if("lightbox"===i.attr("rel"))e(i);else{o=t(i.prop("tagName")+'[rel="'+i.attr("rel")+'"]');for(var l=0;l<o.length;l=++l)e(t(o[l])),o[l]===i[0]&&(s=l)}var d=a.scrollTop()+this.options.positionFromTop,g=a.scrollLeft();this.$lightbox.css({top:d+"px",left:g+"px"}).fadeIn(this.options.fadeDuration),this.changeImage(s)},i.prototype.changeImage=function(i){var e=this;this.disableKeyboardNav();var n=this.$lightbox.find(".lb-image");this.$overlay.fadeIn(this.options.fadeDuration),t(".lb-loader").fadeIn("slow"),this.$lightbox.find(".lb-image, .lb-nav, .lb-prev, .lb-next, .lb-dataContainer, .lb-numbers, .lb-caption").hide(),this.$outerContainer.addClass("animating");var a=new Image;a.onload=function(){var o,s,h,r,l,d,g;n.attr("src",e.album[i].link),o=t(a),n.width(a.width),n.height(a.height),e.options.fitImagesInViewport&&(g=t(window).width(),d=t(window).height(),l=g-e.containerLeftPadding-e.containerRightPadding-20,r=d-e.containerTopPadding-e.containerBottomPadding-120,e.options.maxWidth&&e.options.maxWidth<l&&(l=e.options.maxWidth),e.options.maxHeight&&e.options.maxHeight<l&&(r=e.options.maxHeight),(a.width>l||a.height>r)&&(a.width/l>a.height/r?(h=l,s=parseInt(a.height/(a.width/h),10),n.width(h),n.height(s)):(s=r,h=parseInt(a.width/(a.height/s),10),n.width(h),n.height(s)))),e.sizeContainer(n.width(),n.height())},a.src=this.album[i].link,this.currentImageIndex=i},i.prototype.sizeOverlay=function(){this.$overlay.width(t(window).width()).height(t(document).height())},i.prototype.sizeContainer=function(t,i){function e(){n.$lightbox.find(".lb-dataContainer").width(s),n.$lightbox.find(".lb-prevLink").height(h),n.$lightbox.find(".lb-nextLink").height(h),n.showImage()}var n=this,a=this.$outerContainer.outerWidth(),o=this.$outerContainer.outerHeight(),s=t+this.containerLeftPadding+this.containerRightPadding,h=i+this.containerTopPadding+this.containerBottomPadding;a!==s||o!==h?this.$outerContainer.animate({width:s,height:h},this.options.resizeDuration,"swing",function(){e()}):e()},i.prototype.showImage=function(){this.$lightbox.find(".lb-loader").stop(!0).hide(),this.$lightbox.find(".lb-image").fadeIn("slow"),this.updateNav(),this.updateDetails(),this.preloadNeighboringImages(),this.enableKeyboardNav()},i.prototype.updateNav=function(){var t=!1;try{document.createEvent("TouchEvent"),t=this.options.alwaysShowNavOnTouchDevices?!0:!1}catch(i){}this.$lightbox.find(".lb-nav").show(),this.album.length>1&&(this.options.wrapAround?(t&&this.$lightbox.find(".lb-prev, .lb-next").css("opacity","1"),this.$lightbox.find(".lb-prev, .lb-next").show()):(this.currentImageIndex>0&&(this.$lightbox.find(".lb-prev").show(),t&&this.$lightbox.find(".lb-prev").css("opacity","1")),this.currentImageIndex<this.album.length-1&&(this.$lightbox.find(".lb-next").show(),t&&this.$lightbox.find(".lb-next").css("opacity","1"))))},i.prototype.updateDetails=function(){var i=this;if("undefined"!=typeof this.album[this.currentImageIndex].title&&""!==this.album[this.currentImageIndex].title&&this.$lightbox.find(".lb-caption").html(this.album[this.currentImageIndex].title).fadeIn("fast").find("a").on("click",function(i){void 0!==t(this).attr("target")?window.open(t(this).attr("href"),t(this).attr("target")):location.href=t(this).attr("href")}),this.album.length>1&&this.options.showImageNumberLabel){var e=this.imageCountLabel(this.currentImageIndex+1,this.album.length);this.$lightbox.find(".lb-number").text(e).fadeIn("fast")}else this.$lightbox.find(".lb-number").hide();this.$outerContainer.removeClass("animating"),this.$lightbox.find(".lb-dataContainer").fadeIn(this.options.resizeDuration,function(){return i.sizeOverlay()})},i.prototype.preloadNeighboringImages=function(){if(this.album.length>this.currentImageIndex+1){var t=new Image;t.src=this.album[this.currentImageIndex+1].link}if(this.currentImageIndex>0){var i=new Image;i.src=this.album[this.currentImageIndex-1].link}},i.prototype.enableKeyboardNav=function(){t(document).on("keyup.keyboard",t.proxy(this.keyboardAction,this))},i.prototype.disableKeyboardNav=function(){t(document).off(".keyboard")},i.prototype.keyboardAction=function(t){var i=27,e=37,n=39,a=t.keyCode,o=String.fromCharCode(a).toLowerCase();a===i||o.match(/x|o|c/)?this.end():"p"===o||a===e?0!==this.currentImageIndex?this.changeImage(this.currentImageIndex-1):this.options.wrapAround&&this.album.length>1&&this.changeImage(this.album.length-1):("n"===o||a===n)&&(this.currentImageIndex!==this.album.length-1?this.changeImage(this.currentImageIndex+1):this.options.wrapAround&&this.album.length>1&&this.changeImage(0))},i.prototype.end=function(){this.disableKeyboardNav(),t(window).off("resize",this.sizeOverlay),this.$lightbox.fadeOut(this.options.fadeDuration),this.$overlay.fadeOut(this.options.fadeDuration),t("select, object, embed").css({visibility:"visible"})},new i});

/*!
 *  Sharrre.com - Make your sharing widget!
 *  Version: beta 1.3.5
 *  Author: Julien Hany
 *  License: MIT http://en.wikipedia.org/wiki/MIT_License or GPLv2 http://en.wikipedia.org/wiki/GNU_General_Public_License
 */
;(function(g,i,j,b){var h="sharrre",f={className:"sharrre",share:{googlePlus:false,facebook:false,twitter:false,digg:false,delicious:false,stumbleupon:false,linkedin:false,pinterest:false},shareTotal:0,template:"",title:"",url:j.location.href,text:j.title,urlCurl:"sharrre.php",count:{},total:0,shorterTotal:true,enableHover:true,enableCounter:true,enableTracking:false,hover:function(){},hide:function(){},click:function(){},render:function(){},buttons:{googlePlus:{url:"",urlCount:false,size:"medium",lang:"en-US",annotation:""},facebook:{url:"",urlCount:false,action:"like",layout:"button_count",width:"",send:"false",faces:"false",colorscheme:"",font:"",lang:"en_US"},twitter:{url:"",urlCount:false,count:"horizontal",hashtags:"",via:"",related:"",lang:"en"},digg:{url:"",urlCount:false,type:"DiggCompact"},delicious:{url:"",urlCount:false,size:"medium"},stumbleupon:{url:"",urlCount:false,layout:"1"},linkedin:{url:"",urlCount:false,counter:""},pinterest:{url:"",media:"",description:"",layout:"horizontal"}}},c={googlePlus:"",facebook:"https://graph.facebook.com/fql?q=SELECT%20url,%20normalized_url,%20share_count,%20like_count,%20comment_count,%20total_count,commentsbox_count,%20comments_fbid,%20click_count%20FROM%20link_stat%20WHERE%20url=%27{url}%27&callback=?",twitter:"http://cdn.api.twitter.com/1/urls/count.json?url={url}&callback=?",digg:"http://services.digg.com/2.0/story.getInfo?links={url}&type=javascript&callback=?",delicious:"http://feeds.delicious.com/v2/json/urlinfo/data?url={url}&callback=?",stumbleupon:"",linkedin:"http://www.linkedin.com/countserv/count/share?format=jsonp&url={url}&callback=?",pinterest:"http://api.pinterest.com/v1/urls/count.json?url={url}&callback=?"},l={googlePlus:function(m){var n=m.options.buttons.googlePlus;g(m.element).find(".buttons").append('<div class="button googleplus"><div class="g-plusone" data-size="'+n.size+'" data-href="'+(n.url!==""?n.url:m.options.url)+'" data-annotation="'+n.annotation+'"></div></div>');i.___gcfg={lang:m.options.buttons.googlePlus.lang};var o=0;if(typeof gapi==="undefined"&&o==0){o=1;(function(){var p=j.createElement("script");p.type="text/javascript";p.async=true;p.src="//apis.google.com/js/plusone.js";var q=j.getElementsByTagName("script")[0];q.parentNode.insertBefore(p,q)})()}else{gapi.plusone.go()}},facebook:function(m){var n=m.options.buttons.facebook;g(m.element).find(".buttons").append('<div class="button facebook"><div id="fb-root"></div><div class="fb-like" data-href="'+(n.url!==""?n.url:m.options.url)+'" data-send="'+n.send+'" data-layout="'+n.layout+'" data-width="'+n.width+'" data-show-faces="'+n.faces+'" data-action="'+n.action+'" data-colorscheme="'+n.colorscheme+'" data-font="'+n.font+'" data-via="'+n.via+'"></div></div>');var o=0;if(typeof FB==="undefined"&&o==0){o=1;(function(t,p,u){var r,q=t.getElementsByTagName(p)[0];if(t.getElementById(u)){return}r=t.createElement(p);r.id=u;r.src="//connect.facebook.net/"+n.lang+"/all.js#xfbml=1";q.parentNode.insertBefore(r,q)}(j,"script","facebook-jssdk"))}else{FB.XFBML.parse()}},twitter:function(m){var n=m.options.buttons.twitter;g(m.element).find(".buttons").append('<div class="button twitter"><a href="https://twitter.com/share" class="twitter-share-button" data-url="'+(n.url!==""?n.url:m.options.url)+'" data-count="'+n.count+'" data-text="'+m.options.text+'" data-via="'+n.via+'" data-hashtags="'+n.hashtags+'" data-related="'+n.related+'" data-lang="'+n.lang+'">Tweet</a></div>');var o=0;if(typeof twttr==="undefined"&&o==0){o=1;(function(){var q=j.createElement("script");q.type="text/javascript";q.async=true;q.src="//platform.twitter.com/widgets.js";var p=j.getElementsByTagName("script")[0];p.parentNode.insertBefore(q,p)})()}else{g.ajax({url:"//platform.twitter.com/widgets.js",dataType:"script",cache:true})}},digg:function(m){var n=m.options.buttons.digg;g(m.element).find(".buttons").append('<div class="button digg"><a class="DiggThisButton '+n.type+'" rel="nofollow external" href="http://digg.com/submit?url='+encodeURIComponent((n.url!==""?n.url:m.options.url))+'"></a></div>');var o=0;if(typeof __DBW==="undefined"&&o==0){o=1;(function(){var q=j.createElement("SCRIPT"),p=j.getElementsByTagName("SCRIPT")[0];q.type="text/javascript";q.async=true;q.src="//widgets.digg.com/buttons.js";p.parentNode.insertBefore(q,p)})()}},delicious:function(o){if(o.options.buttons.delicious.size=="tall"){var p="width:50px;",n="height:35px;width:50px;font-size:15px;line-height:35px;",m="height:18px;line-height:18px;margin-top:3px;"}else{var p="width:93px;",n="float:right;padding:0 3px;height:20px;width:26px;line-height:20px;",m="float:left;height:20px;line-height:20px;"}var q=o.shorterTotal(o.options.count.delicious);if(typeof q==="undefined"){q=0}g(o.element).find(".buttons").append('<div class="button delicious"><div style="'+p+'font:12px Arial,Helvetica,sans-serif;cursor:pointer;color:#666666;display:inline-block;float:none;height:20px;line-height:normal;margin:0;padding:0;text-indent:0;vertical-align:baseline;"><div style="'+n+'background-color:#fff;margin-bottom:5px;overflow:hidden;text-align:center;border:1px solid #ccc;border-radius:3px;">'+q+'</div><div style="'+m+'display:block;padding:0;text-align:center;text-decoration:none;width:50px;background-color:#7EACEE;border:1px solid #40679C;border-radius:3px;color:#fff;"><img src="http://www.delicious.com/static/img/delicious.small.gif" height="10" width="10" alt="Delicious" /> Add</div></div></div>');g(o.element).find(".delicious").on("click",function(){o.openPopup("delicious")})},stumbleupon:function(m){var n=m.options.buttons.stumbleupon;g(m.element).find(".buttons").append('<div class="button stumbleupon"><su:badge layout="'+n.layout+'" location="'+(n.url!==""?n.url:m.options.url)+'"></su:badge></div>');var o=0;if(typeof STMBLPN==="undefined"&&o==0){o=1;(function(){var p=j.createElement("script");p.type="text/javascript";p.async=true;p.src="//platform.stumbleupon.com/1/widgets.js";var q=j.getElementsByTagName("script")[0];q.parentNode.insertBefore(p,q)})();s=i.setTimeout(function(){if(typeof STMBLPN!=="undefined"){STMBLPN.processWidgets();clearInterval(s)}},500)}else{STMBLPN.processWidgets()}},linkedin:function(m){var n=m.options.buttons.linkedin;g(m.element).find(".buttons").append('<div class="button linkedin"><script type="in/share" data-url="'+(n.url!==""?n.url:m.options.url)+'" data-counter="'+n.counter+'"><\/script></div>');var o=0;if(typeof i.IN==="undefined"&&o==0){o=1;(function(){var p=j.createElement("script");p.type="text/javascript";p.async=true;p.src="//platform.linkedin.com/in.js";var q=j.getElementsByTagName("script")[0];q.parentNode.insertBefore(p,q)})()}else{i.IN.init()}},pinterest:function(m){var n=m.options.buttons.pinterest;g(m.element).find(".buttons").append('<div class="button pinterest"><a href="http://pinterest.com/pin/create/button/?url='+(n.url!==""?n.url:m.options.url)+"&media="+n.media+"&description="+n.description+'" class="pin-it-button" count-layout="'+n.layout+'">Pin It</a></div>');(function(){var o=j.createElement("script");o.type="text/javascript";o.async=true;o.src="//assets.pinterest.com/js/pinit.js";var p=j.getElementsByTagName("script")[0];p.parentNode.insertBefore(o,p)})()}},d={googlePlus:function(){},facebook:function(){fb=i.setInterval(function(){if(typeof FB!=="undefined"){FB.Event.subscribe("edge.create",function(m){_gaq.push(["_trackSocial","facebook","like",m])});FB.Event.subscribe("edge.remove",function(m){_gaq.push(["_trackSocial","facebook","unlike",m])});FB.Event.subscribe("message.send",function(m){_gaq.push(["_trackSocial","facebook","send",m])});clearInterval(fb)}},1000)},twitter:function(){tw=i.setInterval(function(){if(typeof twttr!=="undefined"){twttr.events.bind("tweet",function(m){if(m){_gaq.push(["_trackSocial","twitter","tweet"])}});clearInterval(tw)}},1000)},digg:function(){},delicious:function(){},stumbleupon:function(){},linkedin:function(){function m(){_gaq.push(["_trackSocial","linkedin","share"])}},pinterest:function(){}},a={googlePlus:function(m){i.open("https://plus.google.com/share?hl="+m.buttons.googlePlus.lang+"&url="+encodeURIComponent((m.buttons.googlePlus.url!==""?m.buttons.googlePlus.url:m.url)),"","toolbar=0, status=0, width=900, height=500")},facebook:function(m){i.open("http://www.facebook.com/sharer/sharer.php?u="+encodeURIComponent((m.buttons.facebook.url!==""?m.buttons.facebook.url:m.url))+"&t="+m.text+"","","toolbar=0, status=0, width=900, height=500")},twitter:function(m){i.open("https://twitter.com/intent/tweet?text="+encodeURIComponent(m.text)+"&url="+encodeURIComponent((m.buttons.twitter.url!==""?m.buttons.twitter.url:m.url))+(m.buttons.twitter.via!==""?"&via="+m.buttons.twitter.via:""),"","toolbar=0, status=0, width=650, height=360")},digg:function(m){i.open("http://digg.com/tools/diggthis/submit?url="+encodeURIComponent((m.buttons.digg.url!==""?m.buttons.digg.url:m.url))+"&title="+m.text+"&related=true&style=true","","toolbar=0, status=0, width=650, height=360")},delicious:function(m){i.open("http://www.delicious.com/save?v=5&noui&jump=close&url="+encodeURIComponent((m.buttons.delicious.url!==""?m.buttons.delicious.url:m.url))+"&title="+m.text,"delicious","toolbar=no,width=550,height=550")},stumbleupon:function(m){i.open("http://www.stumbleupon.com/badge/?url="+encodeURIComponent((m.buttons.delicious.url!==""?m.buttons.delicious.url:m.url)),"stumbleupon","toolbar=no,width=550,height=550")},linkedin:function(m){i.open("https://www.linkedin.com/cws/share?url="+encodeURIComponent((m.buttons.delicious.url!==""?m.buttons.delicious.url:m.url))+"&token=&isFramed=true","linkedin","toolbar=no,width=550,height=550")},pinterest:function(m){i.open("http://pinterest.com/pin/create/button/?url="+encodeURIComponent((m.buttons.pinterest.url!==""?m.buttons.pinterest.url:m.url))+"&media="+encodeURIComponent(m.buttons.pinterest.media)+"&description="+m.buttons.pinterest.description,"pinterest","toolbar=no,width=700,height=300")}};function k(n,m){this.element=n;this.options=g.extend(true,{},f,m);this.options.share=m.share;this._defaults=f;this._name=h;this.init()}k.prototype.init=function(){var m=this;if(this.options.urlCurl!==""){c.googlePlus=this.options.urlCurl+"?url={url}&type=googlePlus";c.stumbleupon=this.options.urlCurl+"?url={url}&type=stumbleupon"}g(this.element).addClass(this.options.className);if(typeof g(this.element).data("title")!=="undefined"){this.options.title=g(this.element).attr("data-title")}if(typeof g(this.element).data("url")!=="undefined"){this.options.url=g(this.element).data("url")}if(typeof g(this.element).data("text")!=="undefined"){this.options.text=g(this.element).data("text")}g.each(this.options.share,function(n,o){if(o===true){m.options.shareTotal++}});if(m.options.enableCounter===true){g.each(this.options.share,function(n,p){if(p===true){try{m.getSocialJson(n)}catch(o){}}})}else{if(m.options.template!==""){this.options.render(this,this.options)}else{this.loadButtons()}}g(this.element).hover(function(){if(g(this).find(".buttons").length===0&&m.options.enableHover===true){m.loadButtons()}m.options.hover(m,m.options)},function(){m.options.hide(m,m.options)});g(this.element).click(function(){m.options.click(m,m.options);return false})};k.prototype.loadButtons=function(){var m=this;g(this.element).append('<div class="buttons"></div>');g.each(m.options.share,function(n,o){if(o==true){l[n](m);if(m.options.enableTracking===true){d[n]()}}})};k.prototype.getSocialJson=function(o){var m=this,p=0,n=c[o].replace("{url}",encodeURIComponent(this.options.url));if(this.options.buttons[o].urlCount===true&&this.options.buttons[o].url!==""){n=c[o].replace("{url}",this.options.buttons[o].url)}if(n!=""&&m.options.urlCurl!==""){g.getJSON(n,function(r){if(typeof r.count!=="undefined"){var q=r.count+"";q=q.replace("\u00c2\u00a0","");p+=parseInt(q,10)}else{if(r.data&&r.data.length>0&&typeof r.data[0].total_count!=="undefined"){p+=parseInt(r.data[0].total_count,10)}else{if(typeof r[0]!=="undefined"){p+=parseInt(r[0].total_posts,10)}else{if(typeof r[0]!=="undefined"){}}}}m.options.count[o]=p;m.options.total+=p;m.renderer();m.rendererPerso()}).error(function(){m.options.count[o]=0;m.rendererPerso()})}else{m.renderer();m.options.count[o]=0;m.rendererPerso()}};k.prototype.rendererPerso=function(){var m=0;for(e in this.options.count){m++}if(m===this.options.shareTotal){this.options.render(this,this.options)}};k.prototype.renderer=function(){var n=this.options.total,m=this.options.template;if(this.options.shorterTotal===true){n=this.shorterTotal(n)}if(m!==""){m=m.replace("{total}",n);g(this.element).html(m)}else{g(this.element).html('<div class="box"><a class="count" href="#">'+n+"</a>"+(this.options.title!==""?'<a class="share" href="#">'+this.options.title+"</a>":"")+"</div>")}};k.prototype.shorterTotal=function(m){if(m>=1000000){m=(m/1000000).toFixed(2)+"M"}else{if(m>=1000){m=(m/1000).toFixed(1)+"k"}}return m};k.prototype.openPopup=function(m){a[m](this.options);if(this.options.enableTracking===true){var n={googlePlus:{site:"Google",action:"+1"},facebook:{site:"facebook",action:"like"},twitter:{site:"twitter",action:"tweet"},digg:{site:"digg",action:"add"},delicious:{site:"delicious",action:"add"},stumbleupon:{site:"stumbleupon",action:"add"},linkedin:{site:"linkedin",action:"share"},pinterest:{site:"pinterest",action:"pin"}};_gaq.push(["_trackSocial",n[m].site,n[m].action])}};k.prototype.simulateClick=function(){var m=g(this.element).html();g(this.element).html(m.replace(this.options.total,this.options.total+1))};k.prototype.update=function(m,n){if(m!==""){this.options.url=m}if(n!==""){this.options.text=n}};g.fn[h]=function(n){var m=arguments;if(n===b||typeof n==="object"){return this.each(function(){if(!g.data(this,"plugin_"+h)){g.data(this,"plugin_"+h,new k(this,n))}})}else{if(typeof n==="string"&&n[0]!=="_"&&n!=="init"){return this.each(function(){var o=g.data(this,"plugin_"+h);if(o instanceof k&&typeof o[n]==="function"){o[n].apply(o,Array.prototype.slice.call(m,1))}})}}}})(jQuery,window,document);

