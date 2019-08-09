// WSJ EDUCATION 2019
// WSJ EDUCATION 2019

var APP = APP || {};

const HOME_PAGE = document.getElementById('home'),
    STUDENTS_PAGE = document.getElementById('students'),
	PROFESSORS_PAGE = document.getElementById('professors'),
	UNIVERSITIES_PAGE = document.getElementById('universities'),
	SEARCH_PAGE = document.getElementById('search'),
	FAQ_PAGE = document.getElementById('faq'),
	HERO_HEADLINE = document.getElementsByClassName('hero__headline')[0]


// ONLY DOM READY
document.addEventListener('DOMContentLoaded', () => {
	
    new ModalVideo(".js-modal-btn");

    SEARCH_PAGE
    && APP.Global.dropdownToggle('search')

    FAQ_PAGE
    && APP.Global.dropdownToggle('faq')

	HOME_PAGE && HERO_HEADLINE && APP.Animation.heroTextsRising()
    STUDENTS_PAGE && HERO_HEADLINE && APP.Animation.heroTextsRising()
    PROFESSORS_PAGE && HERO_HEADLINE && APP.Animation.heroTextsRising()
    UNIVERSITIES_PAGE && HERO_HEADLINE && APP.Animation.heroTextsRising()
});


function animationStart() {
    // perfect time to start animation

	HOME_PAGE
    && APP.Animation.carousel_height_equalizer()

    UNIVERSITIES_PAGE
    && APP.Animation.carousel_height_equalizer()
}


// WHOLE PAGE READY
document.addEventListener('readystatechange', () => document.readyState === 'complete' && fullyLoaded())





const parent = document.querySelector('.navbar')
const loadingbar = document.querySelector('.loadingbar')

// check see if the bar is reached to full then disappear
const statusChecker = setInterval(() => {
    if(loadingbar.clientWidth >= parent.clientWidth){
    clearInterval(statusChecker);
    loadingbar.style.opacity = 0
    } 
}, 1);


// slowly initiate loader 
let i = 35;
let speed = 1;

let progress = (speed, status) => {
    let si = setInterval(() => {

    // if bar reaches 90% stop 
    i === 90 && status === 'loading' && clearInterval(si) 

    // fully loaded then stop
    i > 99 && clearInterval(si)

    loadingbar.style.width = `${i}%`
    i++
    }, speed);
}
// initiate loading bar
progress(speed, 'loading')







// FULLY LOADED
function fullyLoaded() {
    progress(1, 'complete');
    checkGreensockReady()
}

function checkGreensockReady() {
    window.TweenMax
    ? animationStart() & console.log('window.TweenMax is loaded')
    : setTimeout(checkGreensockReady, 50)
}


