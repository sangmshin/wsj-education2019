var APP = APP || {};

APP.Animation = (()=> { 

    const t = TweenMax,
          rZ = 'rotationZ',
          a = '0.1',
          b = '0.01deg';

    const heroTextsRising = () => {

        const hero_headline = document.querySelector('.hero .hero__headline'),
            hero_subheadline = document.querySelector('.hero .hero__subheadline'),
            hero_bodycopy = document.querySelector('.hero .hero__bodycopy')

        t.set([	hero_headline, hero_subheadline, hero_bodycopy ], { perspective: 1000, transformPerspective: 1000, willChange: 'transform' });
        
        t.fromTo(hero_headline, 1.5, {opacity:0, y:20}, { z:a, rZ:b,  css: {zIndex:1, y:0, opacity:1},  delay:.5})
        t.fromTo(hero_subheadline, 1.9, {opacity:0, y:20}, { z:a, rZ:b,  css: {zIndex:1, y:0, opacity:1},  delay:.9})
        t.fromTo(hero_bodycopy, 1.9, {opacity:0, y:20}, { z:a, rZ:b,  css: {zIndex:1, y:0, opacity:1},  delay:.9})
    }




    // CAROUSEL Height equalizer
	const carousel_height_equalizer = () => {

		const partners_carousels = document.querySelectorAll('.partners .slider .carousel-cell'),
            carousel_wrapper = document.querySelector('.partners .flickity-viewport')

		let maxHeight = Array.from(partners_carousels)
                             .map(carousel => carousel.clientHeight)
                             .reduce((acc, height) => acc > height ? acc : height)
		
		for( let carousel of partners_carousels){
			t.set([carousel, carousel_wrapper], {height: maxHeight})
		}
	}

    return {
        heroTextsRising,
        carousel_height_equalizer
    }

})()