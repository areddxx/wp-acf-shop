/*
* Component: Notifications
* Displays notifications and sets
* notification cookies when dismissed.
*/
(function($){

	var Notifications = {
		dom: function(){
			(this.$notification = $('.notification')),
			(this.$notificationClose = $('.notification__close'));
		},
		actions: function(){
			var app = this;

			app.$notificationClose.on('click', function() {
				app.closeNotification( $(this) );
				app.setCookie( $(this) );
			});
		},
		displayNotifications: function() {
			var app = this;

			app.$notification.each(function() {
				$(this).removeClass('is-hidden');
			});
		},
		closeNotification: function(notification) {
			var app = this;
			notification.closest('.notification').addClass('is-dismissed');
		},
		setCookie: function(notification) {
			var app = this;
			var cookieID = notification.closest('.notification').data('notification');
			var cookieValue = notification.closest('.notification').data('value');
			var cookieExpiration = notification.closest('.notification').data('expiration');

			if( ! cookieID ) {
				console.log('A cookie ID must be provided');
				return false;
			}

			$.ajax({
		    	type : 'post',
		    	context: this,
		     	dataType : 'json',
		     	url : themeJS.ajaxurl,
				data : {
					action: 'set_cookie',
					cookie_id: cookieID,
					cookie_value: cookieValue,
					cookie_expiration: cookieExpiration,
				},
		     	success: function(response) {
		     		// console.log(response);
		     	},
		     	error: function(response) {
		     		// console.log('Error: ', response );
		     	},
		  	});

		},
		ready: function(){
			var app = this;
			app.dom();
			app.actions();
			app.displayNotifications()
		}
	}
	Notifications.ready();

})(jQuery);