/*
Galleries JS: Applies to the module-galleries.php module file.
ShuffleJS: https://vestride.github.io/Shuffle/
ShuffleJs is optional and needs to be included in the gulp.js file.
*/
( function($) {

	var Galleries = {
		dom: function(){
			// Shuffle JS is optional.
			// (this.$shuffleJS = new Shuffle(document.getElementById('galleries-images'), {
			//   itemSelector: '.galleries__image',
			//   easing: 'cubic-bezier(0.4, 0.0, 0.2, 0.5)',
			//   useTransforms: false,
			// })),
			(this.$galleryCategory = $('.galleries__nav-item')),
			(this.$galleryImagesContainer = $('.galleries__images')),
			(this.$galleryImage = $('.galleries__image'));
		},
		actions: function(){
			var app = this;

			app.$galleryCategory.on('click', function(e) {
				app.updateNav( $(this) );
				app.filterImages( $(this).data('group') );  // If shuffle JS is not enabled.
				app.$galleryImagesContainer.addClass('is-filtered');

				if( $(this).data('group') == 'all' ) {
					app.$galleryImagesContainer.removeClass('is-filtered');
				}
			});

		},
		updateNav: function(category) {
			var app = this;
			app.$galleryCategory.removeClass('is-active');
			category.addClass('is-active');
		},
		filterImages: function(category) {
			var app = this;

			app.$galleryImage.removeClass('is-visible');

			/*
			Filter images using shuffleJs:
			*/
			// app.$shuffleJS.filter(category);

			app.$galleryImage.each(function() {
				if(jQuery.inArray(category, $(this).data('groups')) !== -1) {
					$(this).addClass('is-visible');
				}
			});
		},
		ready: function(){
			var app = this;
			app.dom();
			app.actions();
		}
	}
	Galleries.ready();

})(jQuery);