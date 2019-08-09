WSJU.namespace( 'main.nav' );

WSJU.main.nav = (function($) {
	var OBJ_MAIN,
        OBJ_SECT;

    var photoCur = 0,
        photoTotal;

  	var init = function init() {
        OBJ_MAIN = WSJU.main;
		OBJ_SECT = WSJU.main.landing;
        photoTotal = jQuery('#media-wrapper .photobox .data').length;
  		handlers();
	};

    var setCurPhotoID = function setCurPhotoID(n) {
        photoCur = n
    };

    var animPhoto = function animCurPhoto(dir) {
        jQuery('#media-wrapper .photobox ul').append('<li></li>');

        if (dir == 'left')
        {
            if (photoCur <= 0) photoCur = (photoTotal-1);
            else photoCur -= 1;
        }
        else
        {
            if (photoCur >= (photoTotal-1)) photoCur = 0;
            else photoCur += 1;
        }
        jQuery('#media-wrapper .photobox ul li').append('<img src="' + jQuery('#media-wrapper .photobox .data').eq(photoCur).html() + '" />').fadeOut(0);
        OBJ_MAIN.setPhotoRatio();
        jQuery('#media-wrapper .photobox ul li').eq(0).stop().fadeOut(500, 'easeInCubic');
        jQuery('#media-wrapper .photobox ul li').eq(1).stop().fadeIn(500, 'easeOutCubic', function() {
            jQuery('#media-wrapper .photobox ul li').eq(0).remove();
        });
    };

    function handlers() {
		jQuery('#speakers-modal a.closeBtn').click(function(e){
    		e.preventDefault();
    		e.stopPropagation();
    		jQuery('#speakers-modal').fadeOut(300, 'easeInCubic', function(){
                // jQuery('body').stop().css('overflow-y', 'auto');
                jQuery('body').removeAttr('style');
            });
    	});

        jQuery('#video-modal a.closeBtn').click(function(e){
            e.preventDefault();
            e.stopPropagation();
            jQuery('#video-modal').fadeOut(300, 'easeInCubic', function(){
                jQuery('body').removeAttr('style');
                jQuery('#video-modal .container').html('');
            });
        });

    	jQuery('#media-wrapper a.closeBtn').click(function(e){
    		e.preventDefault();
    		e.stopPropagation();
    		OBJ_SECT.slideInfoLayer(OBJ_MAIN.getIntroPlayed());
            OBJ_MAIN.slickOff();
    	});

        jQuery('#media-wrapper a.photoNavBtn.left').click(function(e){
            e.preventDefault();
            e.stopPropagation();
            jQuery('#media-wrapper a.photoNavBtn.left').animate({
                'marginLeft': '5px'
            },75,'easeOutCubic').animate({
                'marginLeft': '10px'
            },300,'easeInCubic');

            animPhoto('left');
        });
        jQuery('#media-wrapper a.photoNavBtn.right').click(function(e){
            e.preventDefault();
            e.stopPropagation();
            jQuery('#media-wrapper a.photoNavBtn.right').animate({
                'marginRight': '5px'
            },75,'easeOutCubic').animate({
                'marginRight': '10px'
            },300,'easeInCubic');

            animPhoto('right');
        });

        jQuery('#section-1-button').click(function(e){
            e.preventDefault();
            e.stopPropagation();

            var navBuffer;

            if ( jQuery('html').hasClass('breakpoint-tablet') ) {
                navBuffer = 70;
                console.log('tablet');
            } else {
                navBuffer = 35;
                console.log('desktop');
            }

            jQuery('body, html').animate({ scrollTop: jQuery('#section-1').offset().top-navBuffer}, 500, 'easeOutCubic');
        });

        jQuery('#section-2-button').click(function(e){
            e.preventDefault();
            e.stopPropagation();

            var navBuffer;

            if ( jQuery('html').hasClass('breakpoint-tablet') ) {
                navBuffer = 70;
            } else {
                navBuffer = 35;
            }

            jQuery('body, html').animate({ scrollTop: jQuery('#section-2').offset().top-navBuffer}, 500, 'easeOutCubic');
        });

        jQuery('#section-3-button').click(function(e){
            e.preventDefault();
            e.stopPropagation();

            var navBuffer;

            if ( jQuery('html').hasClass('breakpoint-tablet') ) 
            {
                navBuffer = 70;
            } 
            else if (jQuery('#section-3').hasClass('print')) 
            {
                navBuffer = 60;
            }
            else 
            {
                navBuffer = 35;
            }

            jQuery('body, html').animate({ scrollTop: jQuery('#section-3').offset().top-navBuffer}, 500, 'easeOutCubic');
        });

        jQuery('#section-4-button').click(function(e){
            e.preventDefault();
            e.stopPropagation();

            var navBuffer;

            if ( jQuery('html').hasClass('breakpoint-tablet') ) {
                navBuffer = 70;
            } else {
                navBuffer = 35;
            }

            jQuery('body, html').animate({ scrollTop: jQuery('#section-4').offset().top-navBuffer}, 500, 'easeOutCubic');
        });

        jQuery('#section-5-button').click(function(e){
            e.preventDefault();
            e.stopPropagation();

            var navBuffer;

            if ( jQuery('html').hasClass('breakpoint-tablet') ) {
                navBuffer = 70;
            } else {
                navBuffer = 35;
            }

            jQuery('body, html').animate({ scrollTop: jQuery('#section-5').offset().top-navBuffer}, 500, 'easeOutCubic');
        });

        jQuery('#section-6-button').click(function(e){
            e.preventDefault();
            e.stopPropagation();

            var navBuffer;

            if ( jQuery('html').hasClass('breakpoint-tablet') ) {
                navBuffer = 70;
            } else {
                navBuffer = 35;
            }

            jQuery('body, html').animate({ scrollTop: jQuery('#section-6').offset().top-navBuffer}, 500, 'easeOutCubic');
        });                         

        jQuery('#link-faculty-benefits').click(function(e){
            e.preventDefault;
            e.stopPropagation;

            if ( jQuery('html').hasClass('breakpoint-tablet') ) {
                navBuffer = 70;
            } else {
                navBuffer = 35;
            }            

            jQuery('body, html').animate({scrollTop: jQuery('#faculty-benefits').offset().top-navBuffer}, 500, 'easeOutCubic');
        });

        jQuery('.masthead.professors #ordering-info .cta-1, #link-ordering-info, #ordering-info-mobile').click(function(e){
            e.preventDefault;
            e.stopPropagation;

            var _this = jQuery(this);

            if ( jQuery('html').hasClass('breakpoint-tablet') ) {
                navBuffer = 70;
            } else {
                navBuffer = 35;
            }

            if (_this.is('#ordering-info-mobile')) {
                jQuery('#nav-toggle').click();
            }

            jQuery('body, html').animate({scrollTop: jQuery('#order-information-sect').offset().top-navBuffer}, 500, 'easeOutCubic');
        });

        jQuery('.masthead.professors #ordering-info .cta-2, #link-contact-rep, #contact-rep-mobile, #contact-rep-faculty').click(function(e){
            e.preventDefault;
            e.stopPropagation;

            var _this = jQuery(this);

            if ( jQuery('html').hasClass('breakpoint-tablet') ) {
                navBuffer = 70;
            } else {
                navBuffer = 35;
            }

            if (_this.is('#contact-rep-mobile')) {
                jQuery('#nav-toggle').click();
            }            

            jQuery('body, html').animate({scrollTop: jQuery('#contact-sect').offset().top-navBuffer}, 500, 'easeOutCubic');
        });      

        if(!(jQuery('#hero-wrapper.lp .hero-content .hero-slide').hasClass('slick-initialized')))
        {
            jQuery('#hero-wrapper.lp .hero-content .hero-slide').slick({
                dots: true,
                infinite: true,
                speed: 500,
                slidesToShow: 1,
                adaptiveHeight: false,
                arrows: false,
                swipe: true,
                centerPadding: '0'
            });

            jQuery('#hero-wrapper.lp .hero-content .hero-slide').on('beforeChange', function(event, slick, currentSlide, nextSlide){
                newBgColor = jQuery('#hero-wrapper.lp .hero-content .hero-slide').find("[data-slick-index='" +nextSlide+ "']").find('#js-color-info').html();
                jQuery('#hero-wrapper.lp').css('background-color', newBgColor);
            }).on('afterChange', function(event, slick, currentSlide, nextSlide){
            });

            newBgColor = jQuery('#hero-wrapper.lp .hero-content .hero-slide').find("[data-slick-index='0']").find('#js-color-info').html();
            jQuery('#hero-wrapper.lp').css('background-color', newBgColor);
        }

        for (var i = 0; i < jQuery('#page-nav li a').length; i++)
        {   
            if (window.location.hash == jQuery(jQuery('#page-nav li a')[i]).attr('href'))
            {
                jQuery('#page-nav li a')[i].click();
            };
        }
    };

	return {
		init: init
	};

})(jQuery);

//-----------------------------------------------------------------------------------------------
