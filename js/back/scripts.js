$( function() {
	if ( $('.login').length ) $.getScript('/js/back/login.js');
	if ( $('.settings-form').length ) $.getScript('/js/back/settings.js');
});