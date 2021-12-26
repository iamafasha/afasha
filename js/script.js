/*jshint jquery:true */
/*global $:true */

var $ = jQuery.noConflict();

$(document).ready(function($) {
	"use strict";

	
	
	var macy;
	var winDow = $(window);

	// .blog-box change, recalculate macy
	$('.blog-box').on('change', function() {
		macy.recalculate(true);
	})

	/*-------------------------------------------------*/
	/* = Grid  
	/*-------------------------------------------------*/

	//If .blog-box or .portfolio-box has fully loaded
	$('.grid').imagesLoaded( function() {
		macy = Macy({
			container: '.blog-box,.portfolio-box',
			trueOrder: false,
			waitForImages: false,
			margin: 2,
			columns: 4,
			breakAt: {
				1367: 3,
				767: 2,
				520: 2,
				400: 1
			}
		});

		console.log("fully loaded");
	})

	/*-------------------------------------------------*/
	/* =  flexslider
	/*-------------------------------------------------*/
	try {

		var SliderPost = $('.flexslider');

		SliderPost.flexslider({
			animation: "fade",
			slideshowSpeed: 4000,
		});
	} catch(err) {

	}

  	/*-------------------------------------------------*/
	/* =  Tabs
	/*-------------------------------------------------*/
	$('.tab-links li a').live('click', function(e){
		e.preventDefault();
		if (!$(this).parent('li').hasClass('active')){
			var link = $(this).attr('href');

			$(this).parents('ul').children('li').removeClass('active');
			$(this).parent().addClass('active');

			$('.tabs-widget > div').hide();

			$(link).fadeIn();
		}
	});

	/*-------------------------------------------------*/
	/* = mobile  Minify header is not at the top
	/*-------------------------------------------------*/
	var lastKnownScrollPosition = 0;
	var ticking = false;
	
	document.addEventListener('scroll', function() {
	  lastKnownScrollPosition = window.scrollY;
	  if (!ticking) {
		window.requestAnimationFrame(function() {
			var menuBrandHeight = $('.menu-brand-wrapper').outerHeight();
			if (lastKnownScrollPosition > menuBrandHeight) {
				$('header').addClass('minify');
				var current_height = $('.menu-brand-wrapper').outerHeight();
				$('#content').css('padding-top',current_height*2 +5);
			}else{
				$('header').removeClass('minify');
				$('#content').css('padding-top','unset');
			}
		  ticking = false;
		});
		ticking = true;
	  }
	});

	/*-------------------------------------------------*/
	/* =  header height fix
	/*-------------------------------------------------*/
	var content = $('#content');
	content.imagesLoaded( function(){
		var bodyHeight = $(window).outerHeight(),
		containerHeight = $('.inner-content').outerHeight(),
		headerHeight = $('header');

		if( bodyHeight > containerHeight ) {
			headerHeight.css('height',bodyHeight);
		} else {
			headerHeight.css('height',containerHeight);	
		}
	});

	winDow.bind('resize', function(){
		var bodyHeight = $(window).outerHeight(),
		containerHeight = $('.inner-content').outerHeight(),
		headerHeight = $('header');

		if( bodyHeight > containerHeight ) {
			headerHeight.css('height',bodyHeight);
		} else {
			headerHeight.css('height',containerHeight);	
		}
	});

	/* ---------------------------------------------------------------------- */
	/*	nice scroll
	/* ---------------------------------------------------------------------- */

	try {
		var HTMLcontainer = $("html");
		HTMLcontainer.niceScroll({
			cursorcolor:"#27bbff"
		});
	} catch(err) {

	}

	/* ---------------------------------------------------------------------- */
	/*	info box toggle
	/* ---------------------------------------------------------------------- */

	var toggleInfo = $('.info-toggle'),
		toggleContent = $('.info-content');

		toggleInfo.on('click', function(e){
			e.preventDefault();

			if ( !$(this).hasClass('active') ) {
				$(this).addClass('active');
				toggleContent.addClass('active');
			} else {
				$(this).removeClass('active');
				toggleContent.removeClass('active');				
			}
		});

	/* ---------------------------------------------------------------------- */
	/*	magnific-popup
	/* ---------------------------------------------------------------------- */

	try {
		// Example with multiple objects
		var ZoomImage = $('.zoom, .zoom-image');
		ZoomImage.magnificPopup({
			type: 'image'
		});
	} catch(err) {

	}

	/*-------------------------------------------------*/
	/* =  Testimonial
	/*-------------------------------------------------*/
	try{
		var testimUl = $('.testimonial ul');

		testimUl.quovolver({
			transitionSpeed:300,
			autoPlay:true
		});
	}catch(err){
	}

	/*-------------------------------------------------*/
	/* = skills animate
	/*-------------------------------------------------*/

	try {
		var animateElement = $(".meter > span");
		animateElement.each(function() {
			$(this)
				.data("origWidth", $(this).width())
				.width(0)
				.animate({
					width: $(this).data("origWidth")
				}, 1200);
		});
	} catch(err) {

	}

	/* ---------------------------------------------------------------------- */
	/*	pagination
	/* ---------------------------------------------------------------------- */

	var pagination = $('.pagination .pagination-wrapper');


	$.data(this, 'scrollTimer', setTimeout(function() {
		pagination.addClass('hidden');
	}, 3000));

	$(window).scroll(function() {
		
		if (pagination.hasClass('hidden')) {
			pagination.removeClass('hidden');
		}

		clearTimeout($.data(this, 'scrollTimer'));
		$.data(this, 'scrollTimer', setTimeout(function() {
			pagination.addClass('hidden');
		}, 3000));
	});

	/* ---------------------------------------------------------------------- */
	/*	menu responsive
	/* ---------------------------------------------------------------------- */
	var menuClick = $('a.elemadded'),
		navbarVertical = $('.menu-box');
		
	menuClick.on('click', function(e){
		e.preventDefault();

		if( navbarVertical.hasClass('active') ){
			navbarVertical.slideUp(300).removeClass('active');
		} else {
			navbarVertical.slideDown(300).addClass('active');
		}
	});

	winDow.bind('resize', function(){
		if ( winDow.width() > 768 ) {
			navbarVertical.slideDown(300).removeClass('active');
		} else {
			navbarVertical.slideUp(300).removeClass('active');
		}
	});

});