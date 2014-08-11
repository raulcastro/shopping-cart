$( function() {
	if ( $('.login').length ) $.getScript('/js/back/login.js');
	if ( $('.settings-form').length ) $.getScript('/js/back/settings.js');
	if ( $('.sections-add-form, .sections-manage, .sections-update-form').length ) $.getScript('/js/back/sections.js');
	if ( $('.categories-add-form').length ) $.getScript('/js/back/categories.js');
	if ( $('.add-product').length ) $.getScript('/js/back/products.js');
});