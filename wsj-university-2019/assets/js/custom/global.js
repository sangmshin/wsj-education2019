var APP = APP || {};


// GLOBAL 
APP.Global = (()=> {

	const isMobile = {
		Android: ()=> navigator.userAgent.match(/Android/i),
		BlackBerry: ()=> navigator.userAgent.match(/BlackBerry/i),
		iOS: ()=> navigator.userAgent.match(/iPhone|iPad|iPod/i),
		Opera: ()=> navigator.userAgent.match(/Opera Mini/i),
		Windows: ()=> navigator.userAgent.match(/IEMobile/i),
		any: ()=> isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()
	};

	// console.log('Mobile Status :::> ', isMobile.any() === null ? 'DESKTOP' : isMobile.any())

	window.navigator.vendor.includes('Apple') ? console.log('Safari')
	: window.navigator.vendor.includes('Google') ? console.log('Chrome')
	: console.log('Firefox')
	
	
	const t = TweenMax,
			rZ = 'rotationZ',
			a = '0.1',
			b = '0.01deg'

	const navbar = document.querySelector('.navbar'),
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
		mobile_nav = document.querySelector('.mobile-nav')


	
	
	// register smooth animation
	t.set([
		top_wsj_logo_wrapper, 
		top_wsj_logo,
		hamburger,
		mobile_nav,
		line_1,
		line_2,
		line_3,
	], {perspective: 1000, transformPerspective: 1000});

	t.set([top_wsj_logo_wrapper, hamburger], {css: {zIndex: 5}})

	const global_colors = {
		home: "#71614e",
		stu: "#497a65",
		pro: "#395269",
		uni: "#bd6649",
		btn_stu: "#6fc496",
		btn_pro: "#60c5bc",
		btn_uni: "#fbb374",
	};

	// GLOBAL STATE
	const state = {
		lessThan575: null,
		isHamburgerOpen: false,
		footerCollapse : true
	}


	// Initial Setup - Less Than 575px width?
	state.lessThan575 = window.matchMedia("(max-width: 575px)").matches ? true : false; 
	window.addEventListener('resize', e => state.lessThan575 = window.matchMedia("(max-width: 575px)").matches ? true : false)

	// set nav shrink or unshrink

	const shrink_fixed = () => nav_items.classList.add('fixed')
	const unshrink_unfixed = () => nav_items.classList.remove('fixed')

	const fixed_bottom = () => 
		search_bar && !search_bar.className.includes('fixed') 
		&& search_bar.classList.add('fixed')
		& t.fromTo(search_bar, .7, {opacity:0}, {opacity:1, ease:Power1.easeOut, 
			onStart: ()=> t.set(search_bar.parentElement, {paddingTop:`${search_bar.clientHeight}px`}) 
			});
	

	const unfixed_bottom = () => {
		if (search_bar && search_bar.className.includes('fixed') ){
			t.set(search_bar, {opacity:0});
			search_bar.classList.remove('fixed') ;
			t.set(search_bar.parentElement, { paddingTop:`0px`})
			t.to(search_bar, .5, {opacity:1, ease:Power1.easeOut})
		}
	}

	const hideNav = () => t.to(navbar, .02, {opacity:0})
	const showNav = () => t.to(navbar, .02, {opacity:1})


	// page onload initial setup -- TOP NAVBAR
	pageYOffset > 0 && shrink_fixed()

	// page onload initial setup -- SEARCH BAR
	hero.getBoundingClientRect().bottom < 80
	? fixed_bottom() 
	: unfixed_bottom()


	let lastScrollTop = 0;
	let scroll_direction = '';

	// checks if current page is main (Home, Stu, Pro, Uni) or not
	const isMainPage = () => document.getElementById('home') || document.getElementById('students') || document.getElementById('professors') || document.getElementById('universities')
	? true : false

	const scrollHandler = e => {

		var currentScroll = window.pageYOffset || document.documentElement.scrollTop;

		if (currentScroll > lastScrollTop) {
			// console.log('up', pageYOffset)
			scroll_direction = 'down';
			shrink_fixed()
			isMobile.any() && pageYOffset > 80 && !isMainPage() && screen.width < 575 && hideNav()
			isMobile.any() && pageYOffset > screen.availHeight && screen.width < 575 && hideNav()
			hero.getBoundingClientRect().bottom < 80 && fixed_bottom()

		} else {
			// console.log('up', pageYOffset, window.innerHeight)
			scroll_direction = 'up';
			pageYOffset === 0	&& unshrink_unfixed()
			isMobile.any() && screen.width < 575 && showNav()
			hero.getBoundingClientRect().bottom > 80 && unfixed_bottom()
		}

		// For Mobile or negative scrolling
		lastScrollTop = currentScroll <= 0 ? 0 : currentScroll; 

	}

	window.addEventListener("scroll", scrollHandler, false);
	








	// HAMBURGER CONTROLLER
	

	const toggleHamburger = () => {
		t.to(line_1, .2, {
			z:a, rZ:b,
			rotation: state.isHamburgerOpen ? 0 : 45,
		 	y: state.isHamburgerOpen ? 0 : 6,
		  ease:Power1.easeOut,
			onComplete: () => state.isHamburgerOpen = !state.isHamburgerOpen
		})

		t.to(line_2, .2, {
			z:a, rZ:b,
			scaleX: state.isHamburgerOpen ? 1 : .01, 
			opacity: state.isHamburgerOpen ? 1 : 0,
			ease:Power1.easeOut
		})

		t.to(line_3, .2, {
			z:a, rZ:b,
			rotation: state.isHamburgerOpen ? 0 : -45, 
			y: state.isHamburgerOpen ? 0: -6, 
			ease:Power1.easeOut
		})

		t.to(mobile_nav, .3, {
			z:a, rZ:b,
			left: state.isHamburgerOpen ? '-120%' : 0,
			ease:Power1.easeOut,
			transform: 'none',
		})

		for( let [i, btn] of [...mobile_nav.querySelector('.button-wrapper').children].entries() ){
			t.set([	btn.firstElementChild ], { perspective: 1000, transformPerspective: 1000 });
			
			!state.isHamburgerOpen
			&& t.fromTo(btn.firstElementChild, .4, {x:-50, opacity:0}, { z:a, rZ:b, x:0, opacity:1, ease:Power1.easeOut, delay:0.15*(i) })
			
		}

		t.set(document.body, {css:{overflowY: state.isHamburgerOpen ? 'visible' : 'hidden'}})
	}



	// Click Event on hamburger icon
	hamburger.addEventListener('click', toggleHamburger)

	// remove or add vertical scrollbar on resize
	window.addEventListener('resize', e => {

		window.matchMedia("(max-width: 575px)").matches
		
		? state.isHamburgerOpen && !document.body.className.includes('is-locked')
			&& document.body.classList.add('is-locked')
		
		: state.isHamburgerOpen && document.body.className.includes('is-locked') 
			&& document.body.classList.remove('is-locked') 
	})
	// HAMBURGER CONTROLLER










	// MOBILE - full height HERO page with searchbar at the bottom

	isMobile.any() && search_bar && t.set(hero_wrapper, {height:`-=${search_bar.clientHeight}`})

	// MOBILE - full height HERO page with searchbar at the bottom












	// TOP NAV ITEMS HOVER STATE
	
	for(let _nav of nav_items.querySelectorAll('li a')){

		const two_bars = _nav.parentElement.querySelectorAll('span');
		const setColor = () => t.set(two_bars, {
			backgroundColor: 
			_nav.innerText === 'HOME' ? global_colors.home 
			: _nav.innerText === 'STUDENTS' ? global_colors.stu 
			: _nav.innerText === 'PROFESSORS' ? global_colors.pro 
			: _nav.innerText === 'UNIVERSITIES' && global_colors.uni
		})

		
		_nav.addEventListener('mouseenter', e => {
			setColor()
			
			nav_items.className.includes('fixed')
			? t.to(_nav, .051, {color:'#fff', transform:"none", onStart: ()=> two_bars.forEach(span => span.classList.add('fillup')) })
			: t.to(_nav, .051, {color:'#000', transform:"none", onStart: ()=> two_bars.forEach(span => span.classList.remove('fillup')) })

			nav_items.className.includes('fixed')
			? t.to(two_bars, .5, { z:a, rZ:b, transform:'none', css:{zIndex:9, height:'100%'}, ease:Power2.easeOut })
			: t.to(two_bars, .5, { z:a, rZ:b, transform:'none', height:'4px', ease:Power1.easeOut })
		})

		_nav.addEventListener('mouseleave', e => {
			
			nav_items.className.includes('fixed')
			? t.to(_nav, .1, {color:'#000', transform:'none', onStart: ()=> two_bars.forEach(span => span.classList.add('fillup'))})
			: t.to(_nav, .1, {color:'#000', transform:'none', onStart: ()=> two_bars.forEach(span => span.classList.remove('fillup'))})
			
			nav_items.className.includes('fixed')
			? t.to(two_bars, .2, { z:a, rZ:b, transform:'none', css:{zIndex:9, height:'0%'}, ease:Power3.easeOut })
			: t.to(two_bars, .2, { z:a, rZ:b, transform:'none', height:'0px', ease:Power3.easeOut })
		})
	}













	// HOME - VIDEO MODAL - Disable scroll on video
	let videoChecker = setInterval(()=>{
		let modal_video = document.getElementsByClassName('modal-video')[0];
		
		modal_video
		? document.body.classList.add('is-locked')
		: document.body.classList.remove('is-locked') 
	},100)






	// TESTIMONIALS - adding border-right 
	const testis = document.querySelectorAll('.testimonials .carousel-cell')
	testis && testis.forEach((test, i)=> i % 2 === 0 && test.classList.add('border__right') );
	





	


	// ALL CTAs BUTTONS
	const buttons = document.querySelectorAll('button.cta');
		
	for( let btn of buttons ){
		btn.addEventListener('mouseover', e => {
					
			t.to(btn.firstElementChild, .2, { z:a, rZ:b, 
				color: 
				btn.className.includes("bgcolor__stu") ? global_colors.stu
				: btn.className.includes("bgcolor__pro") ? global_colors.pro
				: btn.className.includes("bgcolor__uni") ? global_colors.uni
				: btn.className.includes("bgcolor__btn__stu") ? global_colors.btn_stu
				: btn.className.includes("bgcolor__btn__pro") ? global_colors.btn_pro
				: btn.className.includes("bgcolor__btn__uni") && global_colors.btn_uni
			});

			t.to(btn.lastElementChild, .2, { z:a, rZ:b, top: -1, ease: Power1.easeOut});
		})

		btn.addEventListener('mouseout', e => {
				t.to(btn.firstElementChild, .1, { z:a, rZ:b, color: "#fff"});
				t.to(btn.lastElementChild, .1, { z:a, rZ:b, top: 50, ease: Power2.easeIn});
		})
	}
	// ALL CTAs BUTTONS










	// FAQ -- SUBMENUs hover effect
	const threeButtons = document.querySelectorAll('.activate .search-option button')

	threeButtons && threeButtons.forEach((btn, i)=> {
		btn.addEventListener('mouseover', e => 
			t.to(btn, .2, {
				backgroundColor: 
				e.target.innerText === 'STUDENTS' ? global_colors.stu 
				: e.target.innerText === 'PROFESSORS' ? global_colors.pro 
				: e.target.innerText === 'UNIVERSITIES' && global_colors.uni
			}))
		
		btn.addEventListener('mouseleave', e => t.to(btn, .1, {backgroundColor: '#fff'}))
	})









	// SEARCH PAGE - toggle THEMEs on Mobile

	const themes_select = document.getElementById('themes-select');
	
	// SEARCH PAGE - toggle THEMEs on Mobile


	// onToggle to goto pages
	const dropdownToggle = page_name => themes_select && themes_select.addEventListener('change', e => {
		
		if(page_name === 'search'){
			e.target.value !== 'universities' && utag.link({'event_name' : 'wsjedu_search school here'})
			window.open(`./${page_name}-${e.target.value}/?mod=wsjedu&user_type=${e.target.value}`, "_self")

		} else {
			window.open(`./${page_name}-${e.target.value}`, "_self")
		}
		
	}) 








	// FOOTER and FAQ page Accordion Class
	class Accordion {
		constructor(_text, _doms, _toggleDom){
			this._text = _text;
			this._doms = _doms;
			this._toggleDom = _toggleDom;
			this.DOMs = document.querySelectorAll(_doms)
			this._height = []
		}

		init(){

			for( let [i, DOM] of this.DOMs.entries()) {
				let toggle_text = DOM.querySelector(this._text);
				let toggle_btn = DOM.querySelector('.toggleBtn');
				let sub_nav = DOM.querySelector(this._toggleDom);
				let clickable_area = sub_nav.previousElementSibling
				this._height[i] = sub_nav.firstElementChild.clientHeight;
				
				t.set([
					sub_nav,
					toggle_btn, 
					clickable_area
				], {perspective: 1000, transformPerspective: 1000, willChange:'transform'});



        sub_nav.offsetHeight > 0
			  && t.set(sub_nav, {height: this._height[i], transform: 'none'})

				const _toggle = () => {

					t.to( toggle_btn, .2, {
						z:a, rZ:b,
						rotation: sub_nav.clientHeight > 0 ? 0 : '-135', 
						ease:Power3.easeOut,
					})

					t.to( sub_nav, .4, {
						z:a, rZ:b,
						height: sub_nav.clientHeight === 0 ? this._height[i] : 0,
						ease:Power3.easeOut,
						transform: 'none'
					})
				}

				clickable_area.nodeName !== 'SPAN' && clickable_area.addEventListener('click', _toggle)
				toggle_text.addEventListener('click', _toggle)
				toggle_btn.addEventListener('click', _toggle)
			}
		}

    adjustHeight(){
      for( let [i, DOM] of this.DOMs.entries()) {
				let sub_nav = DOM.querySelector(this._toggleDom);
				this._height[i] = sub_nav.firstElementChild.clientHeight;

        sub_nav.offsetHeight > 0
			  && t.set(sub_nav, {height: this._height[i]})
      }
    }

	}


	class Accordion2 extends Accordion {
		
		init(){

			for( let [i, DOM] of this.DOMs.entries()) {
				let toggle_text = DOM.querySelector(this._text);
				let toggle_btn = DOM.querySelector('.toggleBtn');
				let sub_nav = DOM.querySelector(this._toggleDom);
				this._height[i] = sub_nav.firstElementChild.clientHeight;
				
				t.set([
					sub_nav,
					toggle_btn, 
				], {perspective: 1000, transformPerspective: 1000, willChange:'transform'});

        sub_nav.offsetHeight > 0
			  && t.set(sub_nav, {height: this._height[i], transform: 'none'})

				const _toggle = () => {

					toggle_text.textContent = toggle_text.textContent.includes('Less') ? 'See More' : 'See Less'

					t.to(toggle_btn, .2, {
						z:a, rZ:b, 
						css: { transform: toggle_text.textContent.includes('Less') ? "scaleY(1)" : "scaleY(-1)" }, 
						ease:Power3.easeOut, delay:.051,
						transform: 'none'
					})

					t.to(sub_nav, .4, { 
						z:a, rZ:b, 
						height: sub_nav.clientHeight === 0 ? this._height[i] : 0,
						ease:Power3.easeOut, delay:.051,
						transform: 'none'
					})
					
				}

				const _rollOver = () => t.to(toggle_btn, .5, { 
					z:a, rZ:b, 
					yoyo:true, 
					y: toggle_text.textContent.includes('Less') ? -10 : 10, 
					repeat:-1 
				})

				const _rollOut = () => t.to(toggle_btn, .1, { 
					z:a, rZ:b, 
					y:0 
				})

				toggle_text.addEventListener('click', _toggle)
				toggle_text.addEventListener('mouseover', _rollOver)
				toggle_text.addEventListener('mouseleave', _rollOut)

				toggle_btn.addEventListener('click', _toggle)
				toggle_btn.addEventListener('mouseover', _rollOver)
				toggle_btn.addEventListener('mouseleave', _rollOut)
			}
		}
	}

	
	// Initiate Accordion Class for FOOTER + FAQ
	let faq_accordion = new Accordion('h3', '.faqs .faq__wrapper', '.answer__wrapper')
	let footer_accordion = new Accordion('h5', 'footer .footer-nav__col', '.footer-nav__sub')

	// Initiate Accordion Class for PROFESSORS CONTEXT SECTION
	let context_accordion = new Accordion2('h5', '.one-col-mod .wrapper', '.moreOrLess__wrapper')

	faq_accordion.init()
	footer_accordion.init()
	context_accordion.init()

  window.addEventListener('resize', ()=> {
    faq_accordion.adjustHeight()
    footer_accordion.adjustHeight()
    context_accordion.adjustHeight()
  })



  	const clickables = document.querySelectorAll('#faq .faq__wrapper .clickable-area');
	
	(function clickablearea(){

		clickables && clickables.forEach(clk => {

			let _height = clk.previousElementSibling.clientHeight + 48;
			t.set(clk, {height:_height})
		})

		window.addEventListener('resize', clickablearea)
	})();
  	



	// FOOTER - Hide and Show sub menus of footer
	const toggle_btns_footer = document.getElementsByTagName('footer')[0].getElementsByClassName('toggleBtn');

	state.footerCollapse = window.matchMedia("(min-width: 576px)").matches ? false : true;
	window.addEventListener('resize', e => window.matchMedia("(min-width: 576px)").matches ? enable() : disable())
	window.addEventListener('resize', e => state.footerCollapse = window.matchMedia("(min-width: 576px)").matches ? false : true)

	function enable(){
		window.addEventListener('resize', collapse)
	}

	function disable(){
		!state.footerCollapse && Array.from(toggle_btns_footer).forEach( btn => {
			t.set( btn, {rotation: 0})
			t.set( btn.previousElementSibling, {
				height: 0
			})
		})
	}

	function collapse(){
		window.matchMedia("(min-width: 576px)").matches
		&& Array.from(toggle_btns_footer).forEach( btn => {
				t.set( btn, {rotation: 0})
				t.set( btn.previousElementSibling, {
					height: btn.previousElementSibling.firstElementChild.clientHeight
				})
			})
	}
	// FOOTER Toggle button



	return {
		isMobile,
		dropdownToggle
	}

})()