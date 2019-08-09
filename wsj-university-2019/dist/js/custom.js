'use strict';

var _createClass = function () { function defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } } return function (Constructor, protoProps, staticProps) { if (protoProps) defineProperties(Constructor.prototype, protoProps); if (staticProps) defineProperties(Constructor, staticProps); return Constructor; }; }();

var _slicedToArray = function () { function sliceIterator(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"]) _i["return"](); } finally { if (_d) throw _e; } } return _arr; } return function (arr, i) { if (Array.isArray(arr)) { return arr; } else if (Symbol.iterator in Object(arr)) { return sliceIterator(arr, i); } else { throw new TypeError("Invalid attempt to destructure non-iterable instance"); } }; }();

function _possibleConstructorReturn(self, call) { if (!self) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return call && (typeof call === "object" || typeof call === "function") ? call : self; }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function, not " + typeof superClass); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, enumerable: false, writable: true, configurable: true } }); if (superClass) Object.setPrototypeOf ? Object.setPrototypeOf(subClass, superClass) : subClass.__proto__ = superClass; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _toConsumableArray(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } else { return Array.from(arr); } }

var APP = APP || {};

APP.Animation = function () {

	var t = TweenMax,
	    rZ = 'rotationZ',
	    a = '0.1',
	    b = '0.01deg';

	var heroTextsRising = function heroTextsRising() {

		var hero_headline = document.querySelector('.hero .hero__headline'),
		    hero_subheadline = document.querySelector('.hero .hero__subheadline'),
		    hero_bodycopy = document.querySelector('.hero .hero__bodycopy');

		t.set([hero_headline, hero_subheadline, hero_bodycopy], { perspective: 1000, transformPerspective: 1000, willChange: 'transform' });

		t.fromTo(hero_headline, 1.5, { opacity: 0, y: 20 }, { z: a, rZ: b, css: { zIndex: 1, y: 0, opacity: 1 }, delay: .5 });
		t.fromTo(hero_subheadline, 1.9, { opacity: 0, y: 20 }, { z: a, rZ: b, css: { zIndex: 1, y: 0, opacity: 1 }, delay: .9 });
		t.fromTo(hero_bodycopy, 1.9, { opacity: 0, y: 20 }, { z: a, rZ: b, css: { zIndex: 1, y: 0, opacity: 1 }, delay: .9 });
	};

	// CAROUSEL Height equalizer
	var carousel_height_equalizer = function carousel_height_equalizer() {

		var partners_carousels = document.querySelectorAll('.partners .slider .carousel-cell'),
		    carousel_wrapper = document.querySelector('.partners .flickity-viewport');

		var maxHeight = Array.from(partners_carousels).map(function (carousel) {
			return carousel.clientHeight;
		}).reduce(function (acc, height) {
			return acc > height ? acc : height;
		});

		var _iteratorNormalCompletion = true;
		var _didIteratorError = false;
		var _iteratorError = undefined;

		try {
			for (var _iterator = partners_carousels[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
				var carousel = _step.value;

				t.set([carousel, carousel_wrapper], { height: maxHeight });
			}
		} catch (err) {
			_didIteratorError = true;
			_iteratorError = err;
		} finally {
			try {
				if (!_iteratorNormalCompletion && _iterator.return) {
					_iterator.return();
				}
			} finally {
				if (_didIteratorError) {
					throw _iteratorError;
				}
			}
		}
	};

	return {
		heroTextsRising: heroTextsRising,
		carousel_height_equalizer: carousel_height_equalizer
	};
}();
// WSJ EDUCATION 2019
// WSJ EDUCATION 2019

var APP = APP || {};

var HOME_PAGE = document.getElementById('home'),
    STUDENTS_PAGE = document.getElementById('students'),
    PROFESSORS_PAGE = document.getElementById('professors'),
    UNIVERSITIES_PAGE = document.getElementById('universities'),
    SEARCH_PAGE = document.getElementById('search'),
    FAQ_PAGE = document.getElementById('faq'),
    HERO_HEADLINE = document.getElementsByClassName('hero__headline')[0];

// ONLY DOM READY
document.addEventListener('DOMContentLoaded', function () {

	new ModalVideo(".js-modal-btn");

	SEARCH_PAGE && APP.Global.dropdownToggle('search');

	FAQ_PAGE && APP.Global.dropdownToggle('faq');

	HOME_PAGE && HERO_HEADLINE && APP.Animation.heroTextsRising();
	STUDENTS_PAGE && HERO_HEADLINE && APP.Animation.heroTextsRising();
	PROFESSORS_PAGE && HERO_HEADLINE && APP.Animation.heroTextsRising();
	UNIVERSITIES_PAGE && HERO_HEADLINE && APP.Animation.heroTextsRising();
});

function animationStart() {
	// perfect time to start animation

	HOME_PAGE && APP.Animation.carousel_height_equalizer();

	UNIVERSITIES_PAGE && APP.Animation.carousel_height_equalizer();
}

// WHOLE PAGE READY
document.addEventListener('readystatechange', function () {
	return document.readyState === 'complete' && fullyLoaded();
});

var parent = document.querySelector('.navbar');
var loadingbar = document.querySelector('.loadingbar');

// check see if the bar is reached to full then disappear
var statusChecker = setInterval(function () {
	if (loadingbar.clientWidth >= parent.clientWidth) {
		clearInterval(statusChecker);
		loadingbar.style.opacity = 0;
	}
}, 1);

// slowly initiate loader 
var i = 35;
var speed = 1;

var progress = function progress(speed, status) {
	var si = setInterval(function () {

		// if bar reaches 90% stop 
		i === 90 && status === 'loading' && clearInterval(si);

		// fully loaded then stop
		i > 99 && clearInterval(si);

		loadingbar.style.width = i + '%';
		i++;
	}, speed);
};
// initiate loading bar
progress(speed, 'loading');

// FULLY LOADED
function fullyLoaded() {
	progress(1, 'complete');
	checkGreensockReady();
}

function checkGreensockReady() {
	window.TweenMax ? animationStart() & console.log('window.TweenMax is loaded') : setTimeout(checkGreensockReady, 50);
}

var APP = APP || {};

// GLOBAL 
APP.Global = function () {

	var isMobile = {
		Android: function Android() {
			return navigator.userAgent.match(/Android/i);
		},
		BlackBerry: function BlackBerry() {
			return navigator.userAgent.match(/BlackBerry/i);
		},
		iOS: function iOS() {
			return navigator.userAgent.match(/iPhone|iPad|iPod/i);
		},
		Opera: function Opera() {
			return navigator.userAgent.match(/Opera Mini/i);
		},
		Windows: function Windows() {
			return navigator.userAgent.match(/IEMobile/i);
		},
		any: function any() {
			return isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows();
		}
	};

	// console.log('Mobile Status :::> ', isMobile.any() === null ? 'DESKTOP' : isMobile.any())

	window.navigator.vendor.includes('Apple') ? console.log('Safari') : window.navigator.vendor.includes('Google') ? console.log('Chrome') : console.log('Firefox');

	var t = TweenMax,
	    rZ = 'rotationZ',
	    a = '0.1',
	    b = '0.01deg';

	var navbar = document.querySelector('.navbar'),
	    top_wsj_logo_wrapper = document.querySelector('.wsj__logo'),
	    top_wsj_logo = top_wsj_logo_wrapper.querySelector('.logo-full'),
	    nav_items = document.querySelector('.nav-items'),
	    search_bar = document.querySelector('.search-bar'),
	    hero = document.querySelector('.hero'),
	    hero_wrapper = document.querySelector('.hero__wrapper'),
	    hamburger = document.querySelector('.hamburger'),
	    line_1 = document.getElementById('line_1'),
	    line_2 = document.getElementById('line_2'),
	    line_3 = document.getElementById('line_3'),
	    mobile_nav = document.querySelector('.mobile-nav');

	// register smooth animation
	t.set([top_wsj_logo_wrapper, top_wsj_logo, hamburger, mobile_nav, line_1, line_2, line_3], { perspective: 1000, transformPerspective: 1000 });

	t.set([top_wsj_logo_wrapper, hamburger], { css: { zIndex: 5 } });

	var global_colors = {
		home: "#71614e",
		stu: "#497a65",
		pro: "#395269",
		uni: "#bd6649",
		btn_stu: "#6fc496",
		btn_pro: "#60c5bc",
		btn_uni: "#fbb374"
	};

	// GLOBAL STATE
	var state = {
		lessThan575: null,
		isHamburgerOpen: false,
		footerCollapse: true

		// Initial Setup - Less Than 575px width?
	};state.lessThan575 = window.matchMedia("(max-width: 575px)").matches ? true : false;
	window.addEventListener('resize', function (e) {
		return state.lessThan575 = window.matchMedia("(max-width: 575px)").matches ? true : false;
	});

	// set nav shrink or unshrink

	var shrink_fixed = function shrink_fixed() {
		return nav_items.classList.add('fixed');
	};
	var unshrink_unfixed = function unshrink_unfixed() {
		return nav_items.classList.remove('fixed');
	};

	var fixed_bottom = function fixed_bottom() {
		return search_bar && !search_bar.className.includes('fixed') && search_bar.classList.add('fixed') & t.fromTo(search_bar, .7, { opacity: 0 }, { opacity: 1, ease: Power1.easeOut,
			onStart: function onStart() {
				return t.set(search_bar.parentElement, { paddingTop: search_bar.clientHeight + 'px' });
			}
		});
	};

	var unfixed_bottom = function unfixed_bottom() {
		if (search_bar && search_bar.className.includes('fixed')) {
			t.set(search_bar, { opacity: 0 });
			search_bar.classList.remove('fixed');
			t.set(search_bar.parentElement, { paddingTop: '0px' });
			t.to(search_bar, .5, { opacity: 1, ease: Power1.easeOut });
		}
	};

	var hideNav = function hideNav() {
		return t.to(navbar, .02, { opacity: 0 });
	};
	var showNav = function showNav() {
		return t.to(navbar, .02, { opacity: 1 });
	};

	// page onload initial setup -- TOP NAVBAR
	pageYOffset > 0 && shrink_fixed();

	// page onload initial setup -- SEARCH BAR
	hero.getBoundingClientRect().bottom < 80 ? fixed_bottom() : unfixed_bottom();

	var lastScrollTop = 0;
	var scroll_direction = '';

	// checks if current page is main (Home, Stu, Pro, Uni) or not
	var isMainPage = function isMainPage() {
		return document.getElementById('home') || document.getElementById('students') || document.getElementById('professors') || document.getElementById('universities') ? true : false;
	};

	var scrollHandler = function scrollHandler(e) {

		var currentScroll = window.pageYOffset || document.documentElement.scrollTop;

		if (currentScroll > lastScrollTop) {
			// console.log('up', pageYOffset)
			scroll_direction = 'down';
			shrink_fixed();
			isMobile.any() && pageYOffset > 80 && !isMainPage() && screen.width < 575 && hideNav();
			isMobile.any() && pageYOffset > screen.availHeight && screen.width < 575 && hideNav();
			hero.getBoundingClientRect().bottom < 80 && fixed_bottom();
		} else {
			// console.log('up', pageYOffset, window.innerHeight)
			scroll_direction = 'up';
			pageYOffset === 0 && unshrink_unfixed();
			isMobile.any() && screen.width < 575 && showNav();
			hero.getBoundingClientRect().bottom > 80 && unfixed_bottom();
		}

		// For Mobile or negative scrolling
		lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
	};

	window.addEventListener("scroll", scrollHandler, false);

	// HAMBURGER CONTROLLER


	var toggleHamburger = function toggleHamburger() {
		t.to(line_1, .2, {
			z: a, rZ: b,
			rotation: state.isHamburgerOpen ? 0 : 45,
			y: state.isHamburgerOpen ? 0 : 6,
			ease: Power1.easeOut,
			onComplete: function onComplete() {
				return state.isHamburgerOpen = !state.isHamburgerOpen;
			}
		});

		t.to(line_2, .2, {
			z: a, rZ: b,
			scaleX: state.isHamburgerOpen ? 1 : .01,
			opacity: state.isHamburgerOpen ? 1 : 0,
			ease: Power1.easeOut
		});

		t.to(line_3, .2, {
			z: a, rZ: b,
			rotation: state.isHamburgerOpen ? 0 : -45,
			y: state.isHamburgerOpen ? 0 : -6,
			ease: Power1.easeOut
		});

		t.to(mobile_nav, .3, {
			z: a, rZ: b,
			left: state.isHamburgerOpen ? '-120%' : 0,
			ease: Power1.easeOut,
			transform: 'none'
		});

		var _iteratorNormalCompletion2 = true;
		var _didIteratorError2 = false;
		var _iteratorError2 = undefined;

		try {
			for (var _iterator2 = [].concat(_toConsumableArray(mobile_nav.querySelector('.button-wrapper').children)).entries()[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
				var _ref = _step2.value;

				var _ref2 = _slicedToArray(_ref, 2);

				var _i = _ref2[0];
				var btn = _ref2[1];

				t.set([btn.firstElementChild], { perspective: 1000, transformPerspective: 1000 });

				!state.isHamburgerOpen && t.fromTo(btn.firstElementChild, .4, { x: -50, opacity: 0 }, { z: a, rZ: b, x: 0, opacity: 1, ease: Power1.easeOut, delay: 0.15 * _i });
			}
		} catch (err) {
			_didIteratorError2 = true;
			_iteratorError2 = err;
		} finally {
			try {
				if (!_iteratorNormalCompletion2 && _iterator2.return) {
					_iterator2.return();
				}
			} finally {
				if (_didIteratorError2) {
					throw _iteratorError2;
				}
			}
		}

		t.set(document.body, { css: { overflowY: state.isHamburgerOpen ? 'visible' : 'hidden' } });
	};

	// Click Event on hamburger icon
	hamburger.addEventListener('click', toggleHamburger);

	// remove or add vertical scrollbar on resize
	window.addEventListener('resize', function (e) {

		window.matchMedia("(max-width: 575px)").matches ? state.isHamburgerOpen && !document.body.className.includes('is-locked') && document.body.classList.add('is-locked') : state.isHamburgerOpen && document.body.className.includes('is-locked') && document.body.classList.remove('is-locked');
	});
	// HAMBURGER CONTROLLER


	// MOBILE - full height HERO page with searchbar at the bottom

	isMobile.any() && search_bar && t.set(hero_wrapper, { height: '-=' + search_bar.clientHeight });

	// MOBILE - full height HERO page with searchbar at the bottom


	// TOP NAV ITEMS HOVER STATE

	var _loop = function _loop(_nav) {

		var two_bars = _nav.parentElement.querySelectorAll('span');
		var setColor = function setColor() {
			return t.set(two_bars, {
				backgroundColor: _nav.innerText === 'HOME' ? global_colors.home : _nav.innerText === 'STUDENTS' ? global_colors.stu : _nav.innerText === 'PROFESSORS' ? global_colors.pro : _nav.innerText === 'UNIVERSITIES' && global_colors.uni
			});
		};

		_nav.addEventListener('mouseenter', function (e) {
			setColor();

			nav_items.className.includes('fixed') ? t.to(_nav, .051, { color: '#fff', transform: "none", onStart: function onStart() {
					return two_bars.forEach(function (span) {
						return span.classList.add('fillup');
					});
				} }) : t.to(_nav, .051, { color: '#000', transform: "none", onStart: function onStart() {
					return two_bars.forEach(function (span) {
						return span.classList.remove('fillup');
					});
				} });

			nav_items.className.includes('fixed') ? t.to(two_bars, .5, { z: a, rZ: b, transform: 'none', css: { zIndex: 9, height: '100%' }, ease: Power2.easeOut }) : t.to(two_bars, .5, { z: a, rZ: b, transform: 'none', height: '4px', ease: Power1.easeOut });
		});

		_nav.addEventListener('mouseleave', function (e) {

			nav_items.className.includes('fixed') ? t.to(_nav, .1, { color: '#000', transform: 'none', onStart: function onStart() {
					return two_bars.forEach(function (span) {
						return span.classList.add('fillup');
					});
				} }) : t.to(_nav, .1, { color: '#000', transform: 'none', onStart: function onStart() {
					return two_bars.forEach(function (span) {
						return span.classList.remove('fillup');
					});
				} });

			nav_items.className.includes('fixed') ? t.to(two_bars, .2, { z: a, rZ: b, transform: 'none', css: { zIndex: 9, height: '0%' }, ease: Power3.easeOut }) : t.to(two_bars, .2, { z: a, rZ: b, transform: 'none', height: '0px', ease: Power3.easeOut });
		});
	};

	var _iteratorNormalCompletion3 = true;
	var _didIteratorError3 = false;
	var _iteratorError3 = undefined;

	try {
		for (var _iterator3 = nav_items.querySelectorAll('li a')[Symbol.iterator](), _step3; !(_iteratorNormalCompletion3 = (_step3 = _iterator3.next()).done); _iteratorNormalCompletion3 = true) {
			var _nav = _step3.value;

			_loop(_nav);
		}

		// HOME - VIDEO MODAL - Disable scroll on video
	} catch (err) {
		_didIteratorError3 = true;
		_iteratorError3 = err;
	} finally {
		try {
			if (!_iteratorNormalCompletion3 && _iterator3.return) {
				_iterator3.return();
			}
		} finally {
			if (_didIteratorError3) {
				throw _iteratorError3;
			}
		}
	}

	var videoChecker = setInterval(function () {
		var modal_video = document.getElementsByClassName('modal-video')[0];

		modal_video ? document.body.classList.add('is-locked') : document.body.classList.remove('is-locked');
	}, 100);

	// TESTIMONIALS - adding border-right 
	var testis = document.querySelectorAll('.testimonials .carousel-cell');
	testis && testis.forEach(function (test, i) {
		return i % 2 === 0 && test.classList.add('border__right');
	});

	// ALL CTAs BUTTONS
	var buttons = document.querySelectorAll('button.cta');

	var _loop2 = function _loop2(btn) {
		btn.addEventListener('mouseover', function (e) {

			t.to(btn.firstElementChild, .2, { z: a, rZ: b,
				color: btn.className.includes("bgcolor__stu") ? global_colors.stu : btn.className.includes("bgcolor__pro") ? global_colors.pro : btn.className.includes("bgcolor__uni") ? global_colors.uni : btn.className.includes("bgcolor__btn__stu") ? global_colors.btn_stu : btn.className.includes("bgcolor__btn__pro") ? global_colors.btn_pro : btn.className.includes("bgcolor__btn__uni") && global_colors.btn_uni
			});

			t.to(btn.lastElementChild, .2, { z: a, rZ: b, top: -1, ease: Power1.easeOut });
		});

		btn.addEventListener('mouseout', function (e) {
			t.to(btn.firstElementChild, .1, { z: a, rZ: b, color: "#fff" });
			t.to(btn.lastElementChild, .1, { z: a, rZ: b, top: 50, ease: Power2.easeIn });
		});
	};

	var _iteratorNormalCompletion4 = true;
	var _didIteratorError4 = false;
	var _iteratorError4 = undefined;

	try {
		for (var _iterator4 = buttons[Symbol.iterator](), _step4; !(_iteratorNormalCompletion4 = (_step4 = _iterator4.next()).done); _iteratorNormalCompletion4 = true) {
			var btn = _step4.value;

			_loop2(btn);
		}
		// ALL CTAs BUTTONS


		// FAQ -- SUBMENUs hover effect
	} catch (err) {
		_didIteratorError4 = true;
		_iteratorError4 = err;
	} finally {
		try {
			if (!_iteratorNormalCompletion4 && _iterator4.return) {
				_iterator4.return();
			}
		} finally {
			if (_didIteratorError4) {
				throw _iteratorError4;
			}
		}
	}

	var threeButtons = document.querySelectorAll('.activate .search-option button');

	threeButtons && threeButtons.forEach(function (btn, i) {
		btn.addEventListener('mouseover', function (e) {
			return t.to(btn, .2, {
				backgroundColor: e.target.innerText === 'STUDENTS' ? global_colors.stu : e.target.innerText === 'PROFESSORS' ? global_colors.pro : e.target.innerText === 'UNIVERSITIES' && global_colors.uni
			});
		});

		btn.addEventListener('mouseleave', function (e) {
			return t.to(btn, .1, { backgroundColor: '#fff' });
		});
	});

	// SEARCH PAGE - toggle THEMEs on Mobile

	var themes_select = document.getElementById('themes-select');

	// SEARCH PAGE - toggle THEMEs on Mobile


	// onToggle to goto pages
	var dropdownToggle = function dropdownToggle(page_name) {
		return themes_select && themes_select.addEventListener('change', function (e) {

			if (page_name === 'search') {
				e.target.value !== 'universities' && utag.link({ 'event_name': 'wsjedu_search school here' });
				window.open('./' + page_name + '-' + e.target.value + '/?mod=wsjedu&user_type=' + e.target.value, "_self");
			} else {
				window.open('./' + page_name + '-' + e.target.value, "_self");
			}
		});
	};

	// FOOTER and FAQ page Accordion Class

	var Accordion = function () {
		function Accordion(_text, _doms, _toggleDom) {
			_classCallCheck(this, Accordion);

			this._text = _text;
			this._doms = _doms;
			this._toggleDom = _toggleDom;
			this.DOMs = document.querySelectorAll(_doms);
			this._height = [];
		}

		_createClass(Accordion, [{
			key: 'init',
			value: function init() {
				var _this = this;

				var _loop3 = function _loop3(DOM, _i2) {
					var toggle_text = DOM.querySelector(_this._text);
					var toggle_btn = DOM.querySelector('.toggleBtn');
					var sub_nav = DOM.querySelector(_this._toggleDom);
					var clickable_area = sub_nav.previousElementSibling;
					_this._height[_i2] = sub_nav.firstElementChild.clientHeight;

					t.set([sub_nav, toggle_btn, clickable_area], { perspective: 1000, transformPerspective: 1000, willChange: 'transform' });

					sub_nav.offsetHeight > 0 && t.set(sub_nav, { height: _this._height[_i2], transform: 'none' });

					var _toggle = function _toggle() {

						t.to(toggle_btn, .2, {
							z: a, rZ: b,
							rotation: sub_nav.clientHeight > 0 ? 0 : '-135',
							ease: Power3.easeOut
						});

						t.to(sub_nav, .4, {
							z: a, rZ: b,
							height: sub_nav.clientHeight === 0 ? _this._height[_i2] : 0,
							ease: Power3.easeOut,
							transform: 'none'
						});
					};

					clickable_area.nodeName !== 'SPAN' && clickable_area.addEventListener('click', _toggle);
					toggle_text.addEventListener('click', _toggle);
					toggle_btn.addEventListener('click', _toggle);
				};

				var _iteratorNormalCompletion5 = true;
				var _didIteratorError5 = false;
				var _iteratorError5 = undefined;

				try {

					for (var _iterator5 = this.DOMs.entries()[Symbol.iterator](), _step5; !(_iteratorNormalCompletion5 = (_step5 = _iterator5.next()).done); _iteratorNormalCompletion5 = true) {
						var _ref3 = _step5.value;

						var _ref4 = _slicedToArray(_ref3, 2);

						var _i2 = _ref4[0];
						var DOM = _ref4[1];

						_loop3(DOM, _i2);
					}
				} catch (err) {
					_didIteratorError5 = true;
					_iteratorError5 = err;
				} finally {
					try {
						if (!_iteratorNormalCompletion5 && _iterator5.return) {
							_iterator5.return();
						}
					} finally {
						if (_didIteratorError5) {
							throw _iteratorError5;
						}
					}
				}
			}
		}, {
			key: 'adjustHeight',
			value: function adjustHeight() {
				var _iteratorNormalCompletion6 = true;
				var _didIteratorError6 = false;
				var _iteratorError6 = undefined;

				try {
					for (var _iterator6 = this.DOMs.entries()[Symbol.iterator](), _step6; !(_iteratorNormalCompletion6 = (_step6 = _iterator6.next()).done); _iteratorNormalCompletion6 = true) {
						var _ref5 = _step6.value;

						var _ref6 = _slicedToArray(_ref5, 2);

						var _i3 = _ref6[0];
						var DOM = _ref6[1];

						var _sub_nav = DOM.querySelector(this._toggleDom);
						this._height[_i3] = _sub_nav.firstElementChild.clientHeight;

						_sub_nav.offsetHeight > 0 && t.set(_sub_nav, { height: this._height[_i3] });
					}
				} catch (err) {
					_didIteratorError6 = true;
					_iteratorError6 = err;
				} finally {
					try {
						if (!_iteratorNormalCompletion6 && _iterator6.return) {
							_iterator6.return();
						}
					} finally {
						if (_didIteratorError6) {
							throw _iteratorError6;
						}
					}
				}
			}
		}]);

		return Accordion;
	}();

	var Accordion2 = function (_Accordion) {
		_inherits(Accordion2, _Accordion);

		function Accordion2() {
			_classCallCheck(this, Accordion2);

			return _possibleConstructorReturn(this, (Accordion2.__proto__ || Object.getPrototypeOf(Accordion2)).apply(this, arguments));
		}

		_createClass(Accordion2, [{
			key: 'init',
			value: function init() {
				var _this3 = this;

				var _loop4 = function _loop4(DOM, _i4) {
					var toggle_text = DOM.querySelector(_this3._text);
					var toggle_btn = DOM.querySelector('.toggleBtn');
					var sub_nav = DOM.querySelector(_this3._toggleDom);
					_this3._height[_i4] = sub_nav.firstElementChild.clientHeight;

					t.set([sub_nav, toggle_btn], { perspective: 1000, transformPerspective: 1000, willChange: 'transform' });

					sub_nav.offsetHeight > 0 && t.set(sub_nav, { height: _this3._height[_i4], transform: 'none' });

					var _toggle = function _toggle() {

						toggle_text.textContent = toggle_text.textContent.includes('Less') ? 'See More' : 'See Less';

						t.to(toggle_btn, .2, {
							z: a, rZ: b,
							css: { transform: toggle_text.textContent.includes('Less') ? "scaleY(1)" : "scaleY(-1)" },
							ease: Power3.easeOut, delay: .051,
							transform: 'none'
						});

						t.to(sub_nav, .4, {
							z: a, rZ: b,
							height: sub_nav.clientHeight === 0 ? _this3._height[_i4] : 0,
							ease: Power3.easeOut, delay: .051,
							transform: 'none'
						});
					};

					var _rollOver = function _rollOver() {
						return t.to(toggle_btn, .5, {
							z: a, rZ: b,
							yoyo: true,
							y: toggle_text.textContent.includes('Less') ? -10 : 10,
							repeat: -1
						});
					};

					var _rollOut = function _rollOut() {
						return t.to(toggle_btn, .1, {
							z: a, rZ: b,
							y: 0
						});
					};

					toggle_text.addEventListener('click', _toggle);
					toggle_text.addEventListener('mouseover', _rollOver);
					toggle_text.addEventListener('mouseleave', _rollOut);

					toggle_btn.addEventListener('click', _toggle);
					toggle_btn.addEventListener('mouseover', _rollOver);
					toggle_btn.addEventListener('mouseleave', _rollOut);
				};

				var _iteratorNormalCompletion7 = true;
				var _didIteratorError7 = false;
				var _iteratorError7 = undefined;

				try {

					for (var _iterator7 = this.DOMs.entries()[Symbol.iterator](), _step7; !(_iteratorNormalCompletion7 = (_step7 = _iterator7.next()).done); _iteratorNormalCompletion7 = true) {
						var _ref7 = _step7.value;

						var _ref8 = _slicedToArray(_ref7, 2);

						var _i4 = _ref8[0];
						var DOM = _ref8[1];

						_loop4(DOM, _i4);
					}
				} catch (err) {
					_didIteratorError7 = true;
					_iteratorError7 = err;
				} finally {
					try {
						if (!_iteratorNormalCompletion7 && _iterator7.return) {
							_iterator7.return();
						}
					} finally {
						if (_didIteratorError7) {
							throw _iteratorError7;
						}
					}
				}
			}
		}]);

		return Accordion2;
	}(Accordion);

	// Initiate Accordion Class for FOOTER + FAQ


	var faq_accordion = new Accordion('h3', '.faqs .faq__wrapper', '.answer__wrapper');
	var footer_accordion = new Accordion('h5', 'footer .footer-nav__col', '.footer-nav__sub');

	// Initiate Accordion Class for PROFESSORS CONTEXT SECTION
	var context_accordion = new Accordion2('h5', '.one-col-mod .wrapper', '.moreOrLess__wrapper');

	faq_accordion.init();
	footer_accordion.init();
	context_accordion.init();

	window.addEventListener('resize', function () {
		faq_accordion.adjustHeight();
		footer_accordion.adjustHeight();
		context_accordion.adjustHeight();
	});

	var clickables = document.querySelectorAll('#faq .faq__wrapper .clickable-area');

	(function clickablearea() {

		clickables && clickables.forEach(function (clk) {

			var _height = clk.previousElementSibling.clientHeight + 48;
			t.set(clk, { height: _height });
		});

		window.addEventListener('resize', clickablearea);
	})();

	// FOOTER - Hide and Show sub menus of footer
	var toggle_btns_footer = document.getElementsByTagName('footer')[0].getElementsByClassName('toggleBtn');

	state.footerCollapse = window.matchMedia("(min-width: 576px)").matches ? false : true;
	window.addEventListener('resize', function (e) {
		return window.matchMedia("(min-width: 576px)").matches ? enable() : disable();
	});
	window.addEventListener('resize', function (e) {
		return state.footerCollapse = window.matchMedia("(min-width: 576px)").matches ? false : true;
	});

	function enable() {
		window.addEventListener('resize', collapse);
	}

	function disable() {
		!state.footerCollapse && Array.from(toggle_btns_footer).forEach(function (btn) {
			t.set(btn, { rotation: 0 });
			t.set(btn.previousElementSibling, {
				height: 0
			});
		});
	}

	function collapse() {
		window.matchMedia("(min-width: 576px)").matches && Array.from(toggle_btns_footer).forEach(function (btn) {
			t.set(btn, { rotation: 0 });
			t.set(btn.previousElementSibling, {
				height: btn.previousElementSibling.firstElementChild.clientHeight
			});
		});
	}
	// FOOTER Toggle button


	return {
		isMobile: isMobile,
		dropdownToggle: dropdownToggle
	};
}();