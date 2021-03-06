// Init functions.
(function($) {

	// Scrolling links.
	var smoothLink = $('.scroll a, a.scroll, .button--scroll');
	$(smoothLink).on('click', function(e){

		var url = $(this).attr('href');
		var urlHash = url.substring(url.indexOf('#'));
		var id = '#' + url.substring(url.indexOf('#')+1);

		// Only scroll if an ID exists, else do the default.
		if( $(id).length > 0 ) {
			e.preventDefault();
			$('body, html').animate({
		        scrollTop: $(urlHash).offset().top
		    }, 1000);
		}

	});

})(jQuery);

Snipcart.api.theme.customization.registerPaymentFormCustomization({
	input: {
	  backgroundColor: 'red',
	  color: '#303030',
	  border: '1px solid black',
	  fontSize: '16px',
	  placeholder: {
		color: 'blue',
	  },
	},
	label: {
	  color: '#fff',
	  fontSize: '20px',
	}
  });