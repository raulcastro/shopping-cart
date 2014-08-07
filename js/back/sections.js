$( function() {
	$('#buttonAddSection').click(function(){
		addSection();
	});
	
	$('.sections-manage li input').click(function(){
		itemId = $(this).attr('id');
		if (!$(this).is(':checked')){
			act = $(this).attr('act');
			
			$('#sectionsList tr input').each(function(){
				if ($(this).is(':checked')) {
					sectionId = $(this).attr('sectionId');
					manageSection(act, sectionId);
				}
			});
		}
	});
	
	$('#buttonUpdateSection').click(function(){
		updateSection();
	});
});

function manageSection(act, sectionId)
{
	switch(act)
	{
		case 'publishSection':
			publishSection(act, sectionId);
		break;
		
		case 'unpublishSection':
			unpublishSection(act, sectionId);
		break; 
		
		case 'deleteSection':
			deleteSection(act, sectionId);
		break;
		
		default:
			return false;
		break;
	}
	
	uncheckSections();
}

function publishSection(act, sectionId)
{
	$.ajax({
        type: "POST",
        url: "/ajax/back/sections.php",
        data: {
        	act			: act,
        	sectionId 	: sectionId
        },
        success:
            function(xml)
            {
            	if (xml == '1') {
            		$('#sectionIcon'+sectionId).html('&#10003;');
            	} else {
            		
            	}
            }
        }); 
}

function unpublishSection(act, sectionId)
{
	$.ajax({
        type: "POST",
        url: "/ajax/back/sections.php",
        data: {
        	act			: act,
        	sectionId 	: sectionId
        },
        success:
            function(xml)
            {
            	if (xml == '1') {
            		$('#sectionIcon'+sectionId).html('&#128683;');
            	} else {
            		
            	}
            }
        }); 
}

function deleteSection(act, sectionId)
{
	$.ajax({
        type: "POST",
        url: "/ajax/back/sections.php",
        data: {
        	act			: act,
        	sectionId 	: sectionId
        },
        success:
            function(xml)
            {
            	if (xml == '1') {
            		$('#sectionRow'+sectionId).remove();
            	} else {
            		
            	}
            }
        }); 
}

function uncheckSections()
{
	$('#sectionsList tr input').each(function(){
		if ($(this).is(':checked')) {
			$(this).prop('checked', false);
		}
	});
}

function addSection()
{
	sectionTitle 		= $('#sectionTitle').val();
	sectionDescription 	= $('#sectionDescription').val();
	sectionKeywords 	= $('#sectionKeywords').val();
	
	$.ajax({
        type: "POST",
        url: "/ajax/back/sections.php",
        data: {
        	act					: 'create',
        	sectionTitle 		: sectionTitle,
        	sectionDescription 	: sectionDescription,
        	sectionKeywords 	: sectionKeywords,
        },
        success:
            function(xml)
            {
            	if (xml == '1') {
            		$('.alertAddSectionSuccess').fadeIn('slow');
            	} else {
            		
            	}
            }
        }); 
}

function updateSection()
{
	currentSectionId = $('#currentSectionId').val();
	
	sectionTitle 		= $('#sectionTitle').val();
	sectionDescription 	= $('#sectionDescription').val();
	sectionKeywords 	= $('#sectionKeywords').val();
	
	$.ajax({
        type: "POST",
        url: "/ajax/back/sections.php",
        data: {
        	act					: 'update',
        	currentSectionId	: currentSectionId,
        	sectionTitle 		: sectionTitle,
        	sectionDescription 	: sectionDescription,
        	sectionKeywords 	: sectionKeywords,
        },
        success:
            function(xml)
            {
            	if (xml == '1') {
            		$('.alertUpdateSectionSuccess').fadeIn('slow');
            	} else {
            		
            	}
            }
        }); 
}