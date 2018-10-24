(function($) {


    "use strict";


    /* ---------------------------------------------------------------------------
	 * Global vars
	 * --------------------------------------------------------------------------- */

    var scrollticker;	// Scroll Timer | don't need to set this in every scroll
    
    var rtl 			= $('body').hasClass('rtl');
    var simple			= $('body').hasClass('style-simple');
    
    var top_bar_top 	= '61px';
    var header_H 		= 0;

    var pretty 			= false;
	 var mobile_init_W 	=  1240;
	
	

    
    
	
	
var topBarTop = '61px';
var mfn_header_height = 0;
// header height
function mfn_stickyH() {
	if (jQuery('body').hasClass('header-below')) {
		// header below slider
		mfn_header_height = jQuery('.mfn-main-slider').innerHeight() + jQuery('#Header').innerHeight();
	} else {
		// default
		mfn_header_height = jQuery('#Top_bar').innerHeight() + jQuery('#Action_bar').innerHeight();
	}
}
// init
function mfn_sticky() {
	if (jQuery('body').hasClass('sticky-header')) {
		var start_y = mfn_header_height;
		var window_y = jQuery(window).scrollTop();
		if (window_y > start_y) {
			if (!(jQuery('#Top_bar').hasClass('is-sticky'))) {
				jQuery('.header-classic .header_placeholder').css('height', jQuery('#Top_bar').innerHeight() - jQuery('#Action_bar').innerHeight());
				jQuery('.header-stack   .header_placeholder').css('height', 71);
				jQuery('.header-below   .header_placeholder').css('height', jQuery('#Top_bar').innerHeight());
				jQuery('.minimalist-header .header_placeholder').css('height', jQuery('#Top_bar').innerHeight());
				jQuery('#Top_bar').addClass('is-sticky').css('top', -60).animate({
					'top': jQuery('#wpadminbar').innerHeight()
				}, 300);
			}
		} else {
			if (jQuery('#Top_bar').hasClass('is-sticky')) {
				jQuery('.header_placeholder').css('height', 0);
				jQuery('#Top_bar').removeClass('is-sticky').css('top', topBarTop);
			}
		}
	}
}


/* ---------------------------------------------------------------------------
 * Equal Wraps | Height
 * --------------------------------------------------------------------------- */
function mfn_equalH_wrap() {
	jQuery('.section.equal-height-wrap .section_wrapper').each(function() {
		var maxH = 0;
		jQuery('> .wrap', jQuery(this)).each(function() {
			jQuery(this).css('height', 'auto');
			if (jQuery(this).innerHeight() > maxH) {
				maxH = jQuery(this).innerHeight();
			}
		});
		jQuery('> .wrap', jQuery(this)).css('height', maxH + 'px');
	});
}

/* ---------------------------------------------------------------------------
 * Equal Items | Height
 * --------------------------------------------------------------------------- */
function mfn_equalH() {
	jQuery('.section.equal-height .mcb-wrap-inner').each(function() {
		var maxH = 0;
		jQuery('> .column', jQuery(this)).each(function() {
			jQuery(this).css('height', 'auto');
			if (jQuery(this).height() > maxH) {
				maxH = jQuery(this).height();
			}
		});
		jQuery('> .column', jQuery(this)).css('height', maxH + 'px');
	});
}

/* ---------------------------------------------------------------------------
 * Overlay menu
 * --------------------------------------------------------------------------- */
jQuery('.overlay-menu-toggle').click(function(e) {
	e.preventDefault();
	jQuery(this).toggleClass('focus');
	jQuery('#Overlay').stop(true, true).fadeToggle(500);
	var menuH = jQuery('#Overlay nav').height() / 2;
	jQuery('#Overlay nav').css('margin-top', '-' + menuH + 'px');
});

/* ---------------------------------------------------------------------------
 * Sliding Footer | Height
 * --------------------------------------------------------------------------- */
function mfn_footer() {
	if (jQuery('.footer-fixed #Footer, .footer-sliding #Footer').length) {
		var footerH = jQuery('#Footer').height();
		jQuery('#Content').css('margin-bottom', footerH + 'px');
	}
}

/* ---------------------------------------------------------------------------
 * Header width
 * --------------------------------------------------------------------------- */
function mfn_header() {
	var rightW = jQuery('.top_bar_right').innerWidth();
	var parentW = jQuery('#Top_bar .one').innerWidth() - 10;
	var leftW = parentW - rightW;
	jQuery('.top_bar_left, .menu > li > ul.mfn-megamenu ').width(leftW);
}

/* ---------------------------------------------------------------------------
 * Full Screen Section
 * --------------------------------------------------------------------------- */
function mfn_sectionH() {
	var windowH = jQuery(window).height();
	// FIX | next/prev section
		var offset = 0;	
		if( $( '.section.full-screen:not(.hide-desktop)' ).length > 1 ){
			offset = 5;
		}

		$( '.section.full-screen' ).each( function(){
			
			var section = $( this );
			var wrapper = $( '.section_wrapper', section );

			section
				.css( 'padding', 0 )
				.css( 'min-height', windowH + offset );
			
			var padding = ( windowH + offset - wrapper.height() ) / 2;
			
			if( padding < 50 ) padding = 50;
			
			wrapper
				.css( 'padding-top', padding + 10 )			// 20 = column margin-bottom / 2
				.css( 'padding-bottom', padding - 10 );
		});
}
 /* ---------------------------------------------------------------------------
	 * Admin Bar & WooCommerce Store Notice
	 * --------------------------------------------------------------------------- */
    
    function adminBarH(){
    	var height = 0;
    	
    	// WP adminbar
    	if( $( 'body' ).hasClass( 'admin-bar' ) ){
    		height += $( '#wpadminbar' ).innerHeight();
    	}
    	
    	// WC demo store
    	if( $( 'body' ).hasClass( 'woocommerce-demo-store' ) ){
    		height += $( 'body > p.demo_store' ).innerHeight();
    	}
    	
    	return height;
    }
/* ---------------------------------------------------------------------------
	 * Into | Full Screen
	 * --------------------------------------------------------------------------- */
	
	function mfn_introH(){
		var windowH = $(window).height() - $('#Header_wrapper').height() - adminBarH();
		
		$('#Intro.full-screen').each(function(){

			var el = $(this);
			var inner = $( '.intro-inner', el );
			
			el.css( 'padding', 0 ).css( 'min-height', windowH );
			
			var padding = ( windowH - inner.height() ) / 2;
			inner.css( 'padding-top', padding ).css( 'padding-bottom', padding );
			
		});
	}
	
	
/* ---------------------------------------------------------------------------
 * # Hash smooth navigation
 * --------------------------------------------------------------------------- */
function hashNav() {
	// # window.location.hash
	var hash = window.location.hash;
	if (hash && jQuery(hash).length) {
		var stickyH = jQuery('.sticky-header #Top_bar').innerHeight();
		var tabsHeaderH = jQuery(hash).siblings('.ui-tabs-nav').innerHeight();
		jQuery('html, body').animate({
			scrollTop: jQuery(hash).offset().top - stickyH - tabsHeaderH
		}, 500);
	}
}

	

/* ---------------------------------------------------------------------------
 * niceScroll | Padding right fix for short content
 * --------------------------------------------------------------------------- */
function niceScrollFix() {
	var el = jQuery('body > .nicescroll-rails');
	if (el.length) {
		if (el.is(":visible")) {
			jQuery('body').addClass('nice-scroll');
		} else {
			jQuery('body').removeClass('nice-scroll');
		}
	}
}
	jQuery(window).load(function(){
		mfn_equalH_wrap();
		mfn_equalH();
	});
	
/* --------------------------------------------------------------------------------------------------------------------------
 * jQuery(document).ready
 * ----------------------------------------------------------------------------------------------------------------------- */
jQuery(document).ready(function() {
	topBarTop = parseInt(jQuery('#Top_bar').css('top'), 10);
	if (topBarTop < 0) topBarTop = 61;
	topBarTop = topBarTop + 'px';
	
	
	
	
	
			
		/* ---------------------------------------------------------------------------
		 * Retina Logo
		 * --------------------------------------------------------------------------- */
		
		function retinaLogo(){
			if( window.devicePixelRatio > 1 ){
				
				var el 		= '';
				var src 	= '';
				var height 	= '';
				
				var parent 	= $( '#Top_bar #logo' );
				var parentH	= parent.data( 'height' );
				
				var maxH	= {
					sticky : {
						init 			: 35,
						no_padding		: 60,
						overflow 		: 110
					},
					mobile : {
						mini 			: 50,
						mini_no_padding	: 60
					},
					mobile_sticky : {
						init 			: 50,
						no_padding		: 60,
						overflow 		: 80
					}
				};

				$( '#Top_bar #logo img' ).each( function( index ){
					
					el 		= $( this );
					src 	= el.data( 'retina' );
					height 	= el.height();

					
					// main -----
					
					if( el.hasClass( 'logo-main' ) ){
						
						if( $( 'body' ).hasClass( 'logo-overflow' ) ){
							
							// do nothing
							
						} else if( height > parentH ){
							
							height = parentH;
							
						}
						
					}
					
					// sticky -----
					
					if( el.hasClass( 'logo-sticky' ) ){
						
						if( $( 'body' ).hasClass( 'logo-overflow' ) ){
							
							if( height > maxH.sticky.overflow ){
								height = maxH.sticky.overflow;
							}
								
						} else if( $( 'body' ).hasClass( 'logo-no-sticky-padding' ) ){
							
							if( height > maxH.sticky.no_padding ){
								height = maxH.sticky.no_padding;
							}
								
						} else if( height > maxH.sticky.init ){
							
							height = maxH.sticky.init;
							
						}
						
					}
					
					// mobile -----
					
					if( el.hasClass( 'logo-mobile' ) ){
						
						if( $( 'body' ).hasClass( 'mobile-header-mini' ) ){
							
							if( parent.data( 'padding' ) > 0 ){
								
								if( height > maxH.mobile.mini ){
									height = maxH.mobile.mini;
								}
								
							} else {
								
								if( height > maxH.mobile.mini_no_padding ){
									height = maxH.mobile.mini_no_padding;
								}
								
							}
								
						}
						
					}
					
					// mobile-sticky -----
					
					if( el.hasClass( 'logo-mobile-sticky' ) ){
						
						if( $( 'body' ).hasClass( 'logo-no-sticky-padding' ) ){
							
							if( height > maxH.mobile_sticky.no_padding ){
								height = maxH.mobile_sticky.no_padding;
							}
								
						} else if( height > maxH.mobile_sticky.init ){
							height = maxH.mobile_sticky.init;
						}
						
					}

					
					// SET
					
					if( src ){
						el.parent().addClass( 'retina' );
						el.attr( 'src', src ).css( 'max-height', height + 'px' );												
					}
					
				});
				
			}
		}
		retinaLogo();

		
	/* ---------------------------------------------------------------------------
	 * Responsive menu
	 * --------------------------------------------------------------------------- */
	jQuery('.responsive-menu-toggle').click(function(e) {
		e.preventDefault();
		var el = jQuery(this)
		var menu = jQuery('#Top_bar #menu');
		var menuWrap = menu.closest('.menu_wrapper');
		el.toggleClass('active');
		if (el.hasClass('is-sticky') && el.hasClass('active')) {
			var top = 0;
			if (menuWrap.length) top = menuWrap.offset().top;
			jQuery('body,html').animate({
				scrollTop: top
			}, 200);
		}
		menu.stop(true, true).slideToggle(200);
	});
	
	/* ---------------------------------------------------------------------------
		 * Menu | Responsive | Side Slide
		 * --------------------------------------------------------------------------- */
		
		function sideSlide(){
	
			var slide 				= $( '#Side_slide' );
			var overlay 			= $( '#body_overlay' );
			var ss_mobile_init_W 	= mobile_init_W;
			var pos 				= 'right';
		
			
			// constructor ----------
			
			var constructor = function(){
				if( ! slide.hasClass( 'enabled' ) ){
					$( 'nav#menu' ).detach().appendTo( '#Side_slide .menu_wrapper' );
					slide.addClass( 'enabled' );
				}
			};
			
			
			// destructor ----------
			
			var destructor = function(){
				if( slide.hasClass( 'enabled' ) ){
					close();
					$( 'nav#menu' ).detach().prependTo( '#Top_bar .menu_wrapper' );
					slide.removeClass( 'enabled' );
				}
			};
			
			
			// reload ----------
			
			var reload = function(){

				if( ( $(window).width() < ss_mobile_init_W ) ){
					constructor();
				} else {
					destructor();
				}
			};
			
			
			// init ----------
			
			var init = function(){
				if( slide.hasClass( 'left' ) ){
					pos = 'left';
				}

				if( $( 'body' ).hasClass( 'header-simple' ) ){
					ss_mobile_init_W = 9999;
				}

				reload();
			};
			
			
			// reset to default ----------
			
			var reset = function( time ){
				
				$( '.lang-active.active', slide ).removeClass('active').children('i').attr('class','icon-down-open-mini');
				$( '.lang-wrapper', slide ).fadeOut(0);
				
				$( '.icon.search.active', slide ).removeClass('active');
				$( '.search-wrapper', slide ).fadeOut(0);
				
				$( '.menu_wrapper, .social', slide ).fadeIn( time );
				
			};
			
			
			// menu button ----------
			
			var button = function(){
				
				// show
				if( pos == 'left' ){
					slide.animate({ 'left':0 },300);
					$('body').animate({ 'right':-125 },300);
				} else {
					slide.animate({ 'right':0 },300);
					$('body').animate({ 'left':-125 },300);
				}
				
				overlay.fadeIn(300);
				
				// reset
				reset(0);
				
			};

			
			// close ----------
			
			var close = function(){
				
				if( pos == 'left' ){
					slide.animate({ 'left':-250 },300);
					$('body').animate({ 'right':0 },300);
				} else {
					slide.animate({ 'right':-250 },300);
					$('body').animate({ 'left':0 },300);
				}
				
				overlay.fadeOut(300);
			};

			
			// search ----------
			
			$( '.icon.search', slide ).on( 'click', function(e){
				
				e.preventDefault();
				
				var el = $(this);
				
				if( el.hasClass('active') ){
					
					$( '.search-wrapper', slide ).fadeOut(0);
					$( '.menu_wrapper, .social', slide ).fadeIn(300);
					
				} else {
					
					$( '.search-wrapper', slide ).fadeIn(300);
					$( '.menu_wrapper, .social', slide ).fadeOut(0);
					
					$( '.lang-active.active', slide ).removeClass('active').children('i').attr('class','icon-down-open-mini');
					$( '.lang-wrapper', slide ).fadeOut(0);
					
				}
				
				el.toggleClass('active');
			});
			
			
			// search form submit ----------
			
			$( 'a.submit', slide ).on( 'click', function(e){
				e.preventDefault();
				$('#side-form').submit();
			});
			
			
			// lang menu ----------
			
			$( '.lang-active', slide ).on( 'click', function(e){
				e.preventDefault();
				
				var el = $(this);
				
				if( el.hasClass('active') ){
					
					$( '.lang-wrapper', slide ).fadeOut(0);
					$( '.menu_wrapper, .social', slide ).fadeIn(300);
					el.children('i').attr('class','icon-down-open-mini');
					
				} else {
					
					$( '.lang-wrapper', slide ).fadeIn(300);
					$( '.menu_wrapper, .social', slide ).fadeOut(0);
					el.children('i').attr('class','icon-up-open-mini');
					
					$( '.icon.search.active', slide ).removeClass('active');
					$( '.search-wrapper', slide ).fadeOut(0);
					
				}
				
				el.toggleClass('active');
			});
			
			
			// init, click, debouncedresize ----------
			
			// init
			
			init();
			
			// click | menu button
			
			$( '.responsive-menu-toggle' ).off( 'click' );
			
			$( '.responsive-menu-toggle' ).on( 'click', function(e){
				e.preventDefault();
				button();			
			});
			
			// click | close
			
			overlay.on( 'click', function(e){
				close();
			});
			
			$( '.close', slide ).on( 'click', function(e){
				e.preventDefault();
				close();
			});
			
			// click | below search or languages menu
			
			$( slide ).on( 'click', function(e){
				if( $( e.target ).is( slide ) ){
					reset(300);
				}
			});
			
			// debouncedresize
			
			$( window ).on( 'debouncedresize', reload );
			
			
		}
	
		if( $( 'body' ).hasClass( 'mobile-side-slide' ) ){
			sideSlide();
		}
	function onePageScroll() {
		if (!jQuery('body').hasClass('one-page')) {
			var menu = jQuery('#menu');
			if (menu.find('li.scroll').length > 1) {
				menu.find('li.current-menu-item:not(:first)').removeClass('current-menu-item currenet-menu-parent current-menu-ancestor current_page_item current_page_parent current_page_ancestor');
				// menu item click
				menu.find('a').click(function() {
					jQuery(this).closest('li').siblings('li').removeClass('current-menu-item currenet-menu-parent current-menu-ancestor current_page_item current_page_parent current_page_ancestor');
					jQuery(this).closest('li').addClass('current-menu-item');
				});
			}
		}
	}
	onePageScroll();
	
		
		function onePageMenu(){
			if( $('body').hasClass('one-page') ){
				
				var menu = $('#menu');

				
				// add attr [data-hash] & [data-id] ----------
				
				$('a[href]', menu).each(function(){	

					var url = $(this).attr( 'href' );
					if( url && url.split('#')[1] ){

						// data-hash
						var hash = '#' + url.split('#')[1];
						if( hash && $(hash).length ){				// check if element with specified ID exists
							$(this).attr( 'data-hash', hash );
							$(hash).attr( 'data-id', hash );
						}
						
						// Visual Composer
						var vcHash = '#' + url.split('#')[1];
						var vcClass = '.vc_row.' + url.split('#')[1];
						if( vcClass && $(vcClass).length ){			// check if element with specified Class exists
							$(this).attr( 'data-hash', vcHash );
							$(vcClass).attr( 'data-id', vcHash );
						}
						
					}
					
				});
				

				// active ----------
				
				var hash;
				var activeSelector = '.menu > li.current-menu-item, .menu > li.current-menu-parent, .menu > li.current-menu-ancestor, .menu > li.current-page-ancestor, .menu > li.current_page_item, .menu > li.current_page_parent, .menu > li.current_page_ancestor';
				
				if( $( activeSelector, menu ).length ){
					
					// remove duplicated 
					$( activeSelector, menu )
						.not(':first').removeClass( 'current-menu-item current-menu-parent current-menu-ancestor current-page-ancestor current_page_item current_page_parent current_page_ancestor' );
					
					// remove if 1st link to section & section is not visible
					hash = $( activeSelector, menu ).find('a[data-hash]').attr( 'data-hash' );
					
					if( hash ){
						hash = '[data-id="'+ hash +'"]';
						
						if( $(hash).length && $( hash ).visible( true ) ){
							// do nothing							
						} else {
							$( activeSelector, menu ).removeClass( 'current-menu-item current-menu-parent current-menu-ancestor current-page-ancestor current_page_item current_page_parent current_page_ancestor' )
								.closest('.menu > li').removeClass( 'current-menu-item current-menu-parent current-menu-ancestor current-page-ancestor current_page_item current_page_parent current_page_ancestor' );
						}
					} else {
						// do nothing
					}
					
				} else {
					
					// add to first if none is active
					var first = $( '.menu > li:first-child', menu );
					var firstA  = first.children('a');
					
					if( firstA.attr( 'data-hash' ) ){		
						hash = firstA.attr( 'data-hash' );
						hash = '[data-id="'+ hash +'"]';
						
						var wpadminbarH = $('#wpadminbar').innerHeight() * 1;
						
						if( $(hash).length && ( $(hash).offset().top == wpadminbarH ) ){
							first.addClass( 'current-menu-item' );
						}
					}
					
				}

				
				// click ----------
				
				$('#menu a[data-hash]').click(function(e){ 
					e.preventDefault(); // only with: body.one-page
					
					// active

					menu.find('li').removeClass('current-menu-item');
					$(this)
						.closest('li').addClass('current-menu-item')
						.closest('.menu > li').addClass('current-menu-item');
	
					var hash = $(this).attr('data-hash');
					hash = '[data-id="'+ hash +'"]';
					
					// mobile - sticky header - close menu
					
					if( $(window).width() < 768 ){
						$('.responsive-menu-toggle').removeClass('active');
						$('#Top_bar #menu').hide();
					}
					
					// offset
					
					var headerFixedAbH = $('.header-fixed.ab-show #Action_bar').innerHeight();
					var tabsHeaderH = $(hash).siblings('.ui-tabs-nav').innerHeight();
					
					var offset = headerFixedAbH - tabsHeaderH - $('#wpadminbar').innerHeight();
					
					// sticky height
					
					var stickyH = fixStickyHeaderH();
					
					// FIX | Header below | 1st section
					if( $( 'body' ).hasClass( 'header-below' ) && $( '#Content' ).length ){
						if( $( hash ).offset().top < ( $( '#Content' ).offset().top + 60 ) ){
							stickyH = -1;
						}	
					}
					
					// animate scroll
					
					$( 'html, body' ).animate({ 
						scrollTop: $( hash ).offset().top - offset - stickyH
					}, 500);
					
				});
				
			}
		}
		onePageMenu();
		
	
	
	
	/* ---------------------------------------------------------------------------
	 * niceScroll
	 * --------------------------------------------------------------------------- */
	if (jQuery('body').hasClass('nice-scroll-on') && jQuery(window).width() > 767 && !navigator.userAgent.match(/(Android|iPod|iPhone|iPad|IEMobile|Opera Mini)/)) {
		jQuery('html').niceScroll({
			autohidemode: false,
			cursorborder: 0,
			cursorborderradius: 5,
			cursorcolor: '#222222',
			cursorwidth: 10,
			horizrailenabled: false,
			mousescrollstep: (window.mfn_nicescroll) ? window.mfn_nicescroll : 40,
			scrollspeed: 60
		});
		jQuery('body').removeClass('nice-scroll-on').addClass('nice-scroll');
		niceScrollFix();
	}
	
	/* ---------------------------------------------------------------------------
	 * Go to top
	 * --------------------------------------------------------------------------- */
	jQuery('#back_to_top').click(function() {
		jQuery('body,html').animate({
			scrollTop: 0
		}, 500);
		return false;
	});
	
	
	
	
	
	
	/* ---------------------------------------------------------------------------
	 * Debouncedresize
	 * --------------------------------------------------------------------------- */
	jQuery(window).bind("debouncedresize", function() {
		iframesHeight();
		jQuery('.masonry.isotope,.isotope').isotope();
		// carouFredSel wrapper Height set
		mfn_carouFredSel_height();
		// Sidebar Height
		
		// Sliding Footer | Height
		mfn_footer();
		// Header Width
		mfn_header();
		// Full Screen Section
		mfn_sectionH();
		// Full Screen Intro
			mfn_introH();
			
		// niceScroll | Padding right fix for short content
		niceScrollFix();
	});
	
	
	// carouFredSel wrapper | Height
	mfn_carouFredSel_height();
	// Sidebar | Height

	// Sliding Footer | Height
	mfn_footer();
	// Header | Width
	mfn_header();
	// Full Screen Section
	mfn_sectionH();
	// Navigation | Hash
	hashNav();
	// Equal Columns | Height
	//mfn_equalH();
});

/* --------------------------------------------------------------------------------------------------------------------------
 * jQuery(window).scroll
 * ----------------------------------------------------------------------------------------------------------------------- */
jQuery(window).scroll(function() {
	mfn_stickyH();
	mfn_sticky();
});

/* --------------------------------------------------------------------------------------------------------------------------
 * jQuery(window).load
 * ----------------------------------------------------------------------------------------------------------------------- */
jQuery(window).load(function() {
	
	
	
	// carouFredSel wrapper | Height
	mfn_carouFredSel_height();
	// Sidebar | Height
	
	// Sliding Footer | Height
	mfn_footer();
	// Header | Width
	mfn_header();
	// Full Screen Section
	mfn_sectionH();
	// Navigation | Hash
	hashNav();
	// niceScroll | Padding right fix for short content
	niceScrollFix();
});

/* --------------------------------------------------------------------------------------------------------------------------
 * jQuery(document).mouseup
 * ----------------------------------------------------------------------------------------------------------------------- */
jQuery(document).mouseup(function(e) {
	// search
	if (jQuery("#searchform").has(e.target).length === 0) {
		if (jQuery("#searchform").hasClass('focus')) {
			jQuery(this).find('.icon_close').click();
		}
	}
});

/* ---------------------------------------------------------------------------
 * Sliders configuration
 * --------------------------------------------------------------------------- */
// carouFredSel wrapper Height set -------------------------------------------
function mfn_carouFredSel_height() {
	jQuery('.caroufredsel_wrapper > ul').each(function() {
		var el = jQuery(this);
		var maxH = 0;
		el.children('li').each(function() {
			if (jQuery(this).innerHeight() > maxH) {
				maxH = jQuery(this).innerHeight();
			}
		});
		//			console.log(maxH);
		el.closest('.caroufredsel_wrapper').height(maxH);
	});
}

// --- Portfolio -------------------------------------------------------------
	
	function slickAutoResponsive( slider ){

		var width = slider.width();
		var count = Math.ceil( width / 380 );
		
		if( count < 1 ) count = 1;
		if( count > 5 ) count = 5;

		return count;
	}
	




window.mfn_nicescroll = 25;


})(jQuery);





jQuery(window).load(function(){ 
	jQuery('.isotope').isotope('layout');
	/* ---------------------------------------------------------------------------
	 * TwentyTwenty [ before_after ]
	 * --------------------------------------------------------------------------- */
	
	
});
