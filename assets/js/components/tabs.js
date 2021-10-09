/*
Component: Tabs
*/
(function($){

	var Tabs = {
		dom: function(){
			(this.$queryString = window.location.search),
			(this.$tabNavItem = $('.tabs-nav-item')),
			(this.$tabContentItem = $('.tabs-content-item'));
		},
		actions: function(){
			var app = this;

			app.$tabNavItem.on('click', function(e) {
				e.preventDefault();
				var tab = $(this).data('tab');
				if( ! tab ) return;
				app.updateNav(tab);
				app.updateContent(tab);
			});

		},
		getParameters: function() {
			var app = this;

			/*
			Check the URL for parameters to apply
			a filter on page load.
			*/
			var urlParams = new URLSearchParams(app.$queryString);

			if( urlParams.get('tab') ) {
				app.updateNav( urlParams.get('tab') );
				app.updateContent( urlParams.get('tab') );
			}
		},
		updateContent: function(tab) {
			var app = this;

			app.$tabContentItem.removeClass('is-active');
			app.$tabContentItem.each(function() {
				if( tab == $(this).data('tab') ) {
					$(this).addClass('is-active');
				}
			});
		},
		updateNav: function(tab) {
			var app = this;

			app.$tabNavItem.removeClass('is-active');
			app.$tabNavItem.each(function() {
				if( tab == $(this).data('tab') ) {
					$(this).addClass('is-active')
				}
			});
		},
		ready: function(){
			var app = this;
			app.dom();
			app.getParameters();
			app.actions();
		}
	}
	Tabs.ready();

})(jQuery);