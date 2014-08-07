$( function() {
	$('#buttonSaveSattings').click(function(){
		saveSettings();
	});
});

function saveSettings()
{
	siteTitle 		= $('#siteTitle').val();
	siteName 		= $('#siteName').val();
	siteContent 	= $('#siteContent').val();
	siteDescription	= $('#siteDescription').val();
	siteKeywords 	= $('#siteKeywords').val();
	siteEmail 		= $('#siteEmail').val();
	siteTwitter 	= $('#siteTwitter').val();
	siteFacebook 	= $('#siteFacebook').val();
	siteGooglePlus	= $('#siteGooglePlus').val();
	sitePinterest 	= $('#sitePinterest').val();
	siteLinkedin 	= $('#siteLinkedin').val();
	siteLang 		= $('#siteLang').val();
	
	$.ajax({
        type: "POST",
        url: "/ajax/back/settings.php",
        data: {
        	siteTitle 		: siteTitle,
        	siteName 		: siteName,
        	siteContent 	: siteContent,
        	siteDescription	: siteDescription,
        	siteKeywords 	: siteKeywords,
        	siteEmail 		: siteEmail,
        	siteTwitter 	: siteTwitter,
        	siteFacebook 	: siteFacebook,
        	siteGooglePlus	: siteGooglePlus,
        	sitePinterest 	: sitePinterest,
        	siteLinkedin 	: siteLinkedin,
        	siteLang 		: siteLang
        },
        success:
            function(xml)
            {
            	if (xml == '1') {
            		$('.alertSettingsSuccess').fadeIn('slow');
            	} else {
            		
            	}
            }
        }); 
}