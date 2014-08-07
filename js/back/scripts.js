$( function() {
	if ( $('.login').length ) $.getScript('/js/back/login.js');
	if ( $('.settings-form').length ) $.getScript('/js/back/settings.js');
	if ( $('.sections-add-form, .sections-manage, .sections-update-form').length ) $.getScript('/js/back/sections.js');
});