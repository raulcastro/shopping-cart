$( function() {
	$("#accordion" ).accordion();
	$('#buttonAddCategory').click(function(){
		addCategory();
	});
	
	$('.buttonUpdateCategory').click(function(){
		currentCategoryId = $(this).siblings('.categoryId').attr('value');
		
		categoryTitle 		= $(this).siblings('.field-wrap').find('.categoryTitle').attr('value');
		categoryDescription = $(this).siblings('.field-wrap').find('.categoryDescription').attr('value');
		categoryKeywords 	= $(this).siblings('.field-wrap').find('.categoryKeywords').attr('value');
		curOBJ				= this;
		$.ajax({
	        type: "POST",
	        url: "/ajax/back/categories.php",
	        data: {
	        	act					: 'update',
	        	currentCategoryId	: currentCategoryId,
	        	categoryTitle 		: categoryTitle,
	        	categoryDescription : categoryDescription,
	        	categoryKeywords 	: categoryKeywords,
	        },
	        success:
	            function(xml)
	            {
	            	if (xml == '1') {
	            		$(curOBJ).siblings('.alertUpdateCategorySuccess').fadeIn('slow');
	            		$('#titleCategoryAccordion'+currentCategoryId).html(categoryTitle);
	            	} else {
	            		
	            	}
	            }
	        }); 
	});
	
	$('.buttonDeleteCategory').click(function(){
		currentCategoryId = $(this).siblings('.categoryId').attr('value');
		
		curOBJ				= this;
		$.ajax({
	        type: "POST",
	        url: "/ajax/back/categories.php",
	        data: {
	        	act					: 'delete',
	        	currentCategoryId	: currentCategoryId
	        },
	        success:
	            function(xml)
	            {
	            	if (xml == '1') {
	            		$(curOBJ).parent().remove();
	            		$('#titleCategoryAccordion'+currentCategoryId).remove();
	            	} else {
	            		
	            	}
	            }
	        }); 
	});
});

function addCategory()
{
	currentSectionId = $('#currentSectionId').val();
	
	categoryTitle 		= $('#categoryTitle').val();
	categoryDescription = $('#categoryDescription').val();
	categoryKeywords 	= $('#sectionKeywords').val();
	
	$.ajax({
        type: "POST",
        url: "/ajax/back/categories.php",
        data: {
        	act					: 'create',
        	currentSectionId	: currentSectionId,
        	categoryTitle 		: categoryTitle,
        	categoryDescription : categoryDescription,
        	categoryKeywords 	: categoryKeywords,
        },
        success:
            function(xml)
            {
            	if (xml != '0') {
            		$('.alertAddCategorySuccess').fadeIn('slow');
            		
            		categoryItem = '<h3 id="titleCategoryAccordion'+xml+'">'+categoryTitle+'</h3>' +
					  '<div>'+
					    '<div class="content categories-update-form">' +
					    	'<input type="hidden" value="'+xml+'" class="categoryId" />' +
				        	'<div class="field-wrap">' +
								'<input type="text" value="'+categoryTitle+'" class="categoryTitle" />' +
							'</div>' +
							'<div class="field-wrap">' +
								'<textarea rows="" cols="" class="categoryDescription">'+categoryDescription+'</textarea>' +
							'</div>' +
							'<div class="field-wrap">' +
								'<input type="text" value="'+categoryKeywords+'" class="categoryKeywords" />' +
							'</div>' +
							'<button class="blue buttonUpdateCategory" type="button">Update</button>' +
				            '<button class="red buttonDeleteCategory" type="button">Delete</button>' +
			            	'<div class="green alertUpdateCategorySuccess">' +
								'<p>The category was succesfully updated</p>' +
								'<span class="closeAlert">&#10006;</span>>' +
							'</div>' +
				        '</div>' +
					  '</div>';
            		$('#accordion').append(categoryItem);
            		$("#accordion" ).accordion('destroy');
            		$("#accordion" ).accordion();
            	}
          }
	}); 
}