/*
Module: Hero Carousel: hero-carousel.php
*/
import { Carousel } from '@fancyapps/ui';

(function($) {

	var HeroCarousel = {
		dom: function(){
			this.$heroCarousel = $('.hero--carousel'),
			this.$heroItemVideo = $('.hero-item__video');
		},
		actions: function(){
		},
		initCarousel: function() {
			var app = this;

			if( ! app.$heroCarousel.length ) return;

			const heroCarousel = new Carousel( app.$heroCarousel[0], {
				Dots: false,
				'preload': 0,
				'slidesPerPage' : 1,
				'initialPage': 0,
				'friction': 0.85,
				'center': false,
				'infinite': true,
				'fill': true,
				'dragFree': false,
				'classNames': {},
				'l10n': {},
			});

		},
		fadeInVideo: function() {
			var app = this;

			// Hero Item Video: Fade in background video when loaded.
			if( app.$heroItemVideo.length ) {
				$(window).load(function(){
					app.$heroItemVideo.removeClass('loading');
				});
			}
		},
		ready: function(){
			var app = this;
			app.dom();
			app.fadeInVideo();
			app.initCarousel();
			app.actions();
		}
	}
	HeroCarousel.ready();

})(jQuery);