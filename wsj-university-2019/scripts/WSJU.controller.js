
'use strict';

var WSJU = WSJU || {};

(function() {

	WSJU.namespace = function(nsString) {

	    var parts 	= nsString.split( '.' ),
	        parent 	= WSJU,
	        i;

	    if ( parts[0] === 'WSJU' ) {
	    	parts = parts.slice(1);
	    }

	    for ( i = 0; i < parts.length; i += 1 ) {
	    	if ( typeof parent[ parts[i] ] === 'undefined' ) {
	        	parent[ parts[i] ] = {};
	      	}
	      	parent = parent[ parts[i] ];
	    }

	    return parent;

	};
}());

//-----------------------------------------------------------------------------------------------
WSJU.namespace( 'controller' );

WSJU.controller = (function($) {

  	var init = function init() {
  		handlers();
  		
    	var doc = document.documentElement;
    	doc.setAttribute('data-useragent', navigator.userAgent);
	};

    function handlers() {
    	$(window).load(function() {
    		WSJU.main.nav.init();
    		WSJU.main.landing.init();
    		WSJU.main.init();
    	});
    };

	return {
		init: init
	};

})(jQuery);

//-----------------------------------------------------------------------------------------------
jQuery(document).ready(function() {
	WSJU.controller.init();
});
