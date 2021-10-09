/*
Simple ajax example that fetches from the REST API.
*/
(function($) {

	const loadPostsButton = $('#load-posts');
	const postsContainer = $('#main .content-area');
	let currentPage = $(loadPostsButton).data('page');

	if (loadPostsButton) {

		$(loadPostsButton).on('click', (e) => {

			e.preventDefault();
			currentPage++;
			let nextPage = currentPage;

			$(loadPostsButton).attr('data-page', nextPage);
			fetch('/wp-json/wpst/v1/get_posts/' + nextPage)
			.then(response => response.json() )
			.then(data => {
				console.log(data);
				for (var i = data.length - 1; i >= 0; i--) {
					$(postsContainer).append(data[i]);
				}
			});

		});

	}

})(jQuery);


/*
Example Ajax using wp-admin ajax.
*/
(function($) {

	const loadPostsButton = $('#load-posts');
	let currentPage = $(loadPostsButton).data('page');

	$(loadPostsButton).on('click', function(e) {
		e.preventDefault();

		currentPage++;
		let nextPage = currentPage;
		const articlesContainer = $('#main .content-area');
		const articles = $('#main .content-area .article');

		$.ajax({
	    	type : 'post',
	    	context: this,
	     	dataType : 'json',
	     	url : themeJS.ajaxurl,
			data : {
				action: 'load_more_posts',
				next_page: nextPage,
			},
	     	beforeSend: function(data) {
	     	},
	     	success: function(response) {
	     		// console.log('Success:', response);
	     		// $(articlesContainer).html('');

				if (response.html) {

					let $newPosts = $(response.html.replace(/(\r\n|\n|\r)/gm, ''));
					$( $newPosts ).each( function(index) {
						$( $(this) ).addClass('is-hidden');
						$(this).insertAfter('.content-area article');
					});

					setTimeout( function() {
						$('.article').removeClass('is-hidden');
					}, 150);

					// Update url and history.
					var getUrl = window.location;
					var baseUrl = getUrl.protocol + '//' + getUrl.host + '/';
					window.history.pushState('', '', baseUrl + 'blog/page/' + parseInt(nextPage));

				} else {
					$(loadPostsButton).html('No More Posts').fadeOut(1250);
				}

	     	},

	     	error: function(response) {
	     		console.log('Error: ', response );
	     	},

	     	complete: function(response) {
	     	}

	  	});

	});

})(jQuery);