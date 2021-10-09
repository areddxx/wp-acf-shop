jQuery( document ).ready( function($) {

	// Menu Search
	$(function() {

		var searchIcon 		= $('.menu-item--search'),
			searchModule 	= $('.search-module'),
			searchClose 	= $('.search-module .close'),
			searchInput  	= $('.search-module input[type="search"]');

		$( searchIcon ).on( 'click', function(e) {
			e.preventDefault();
			$(searchModule).toggleClass('search-module--is-active');
			$(searchInput).focus();
			$(searchInput).val('');
		});

		$(searchClose).on('click', function(e) {
			e.preventDefault();
			$('.search-module').removeClass('search-module--is-active');
		});

	});
	// END Menu Search

	// Mobile menu functionality.
	$(function(){
		var menuIcon = $('.header .menu-icon'),
			menuWrap = $('.header'),
			headerHeight = $(menuWrap).outerHeight(),
			menuItem = $('.header .menu-item a');

		$(menuIcon).on('click', function(){
			$(this).toggleClass('is-active');
			$(menuWrap).toggleClass('mobile-active');

			if( $(menuWrap).hasClass('mobile-active') ) {
				$('body').addClass('menu-is-open');
			} else {
				$('body').removeClass('menu-is-open');
				$('.sub-menu').removeClass('sub-menu--is-open');
			}

			mobileMenu();

		});

		// Reset the menu if the browser resizes.
		$(window).on('resize', function(){
			var win = $(this); //this = window
			if (win.width() >= 1024) {
				$(menuWrap).removeClass('mobile-active');
				$( menuIcon ).removeClass('is-active');
			}
		});

	});
	// END Mobile menu functionality.

	// Mobile Menu functionality.
	function mobileMenu() {

		var firstSubMenu 	= $('.mobile-active .main-nav > .menu-item-has-children > a');
		var secondSubMenu 	= $('.mobile-active .main-nav > .menu-item-has-children > .sub-menu > .menu-item-has-children > a ');

		$(firstSubMenu).on('click touchstart', function(e) {

			var href = $(this).attr('href');

			if( $(this).hasClass('menu-open') && href == '#' ) {
				$(this).removeClass('menu-open');
				$(this).siblings('.sub-menu').removeClass('sub-menu--is-open');
				return false;
			}

			// Menu is not active:
			if( ! $(this).hasClass('menu-open') ) {

				e.preventDefault();

				// Close all submenus.
				$(firstSubMenu).removeClass('menu-open');
				$('.header__bottom .main-nav .sub-menu').removeClass('sub-menu--is-open');

				$(this).addClass('menu-open');
				$(this).siblings('.sub-menu').addClass('sub-menu--is-open');
				// $(this).parent().parent('.sub-menu').addClass('sub-menu--is-open');
				// $(this).closest('.menu-item-has-children').find('.sub-menu').addClass('sub-menu--is-open');
			}

		});

		$(secondSubMenu).on('touchstart', function(e) {

			var href = $(this).attr('href');

			if( ! $(this).hasClass('menu-open') ) {
				e.preventDefault();
				$(secondSubMenu).removeClass('menu-open');
				$(this).addClass('menu-open');
				$('.header__bottom .main-nav > .menu-item-has-children > .sub-menu > .menu-item-has-children .sub-menu').removeClass('sub-menu--is-open');
				$(this).siblings('.sub-menu').addClass('sub-menu--is-open');
			}

		});

	}

});