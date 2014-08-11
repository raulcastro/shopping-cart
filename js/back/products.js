$( function() {
	$('.add-product-sections tr input').change(function(){
		uncheckSections();
		$(this).prop('checked', true);
		sectionId = $(this).attr('sectionId');
		$('#sectionChoosed').val(sectionId);
		loadSectionCategories(sectionId);
	});
	
	$('#buttonAddProduct').click(function(){
		addProduct();
	});
});


function uncheckSections()
{
	$('.add-product-sections tr input').each(function(){
		if ($(this).is(':checked')) {
			$(this).prop('checked', false);
		}
	});
}

function loadSectionCategories(sectionId)
{
	$.ajax({
        type: "POST",
        dataType: 'json',
        url: "/ajax/back/products.php",
        data: {
        	act			: 'load-categories',
        	sectionId 	: sectionId
        },
        success:
            function(result)
            {
        		$('.categories-add-product').html('');
        		if (result.length > 0) {
        			for (var i in result) {
            			var categoryLi = '<li><input type="checkbox" categoryId="'+result[i].category_id+'" />'+result[i].title+'</li>';
            			$('.categories-add-product').append(categoryLi);
            		}
        		}
        		else
    			{
        			var categoryLi = '<h1>There is no category assigned</h1>';
        			$('.categories-add-product').append(categoryLi);
    			}
            }
        }); 
}

function addProduct()
{
	productTitle 			= $('#productTitle').val();
	productSmallDescription = $('#productSmallDescription').val();
	productDescription 		= $('#productDescription').val();
	productKeywords 		= $('#productKeywords').val();
	productStock 			= $('#productStock').val();
	productPrice 			= $('#productPrice').val();
	productBrand			= $('#productBrand').val();
	
	$.ajax({
        type: "POST",
        url: "/ajax/back/products.php",
        data: {
        	act							: 'add-product',
        	productTitle				: productTitle,
        	productSmallDescription 	: productSmallDescription,
        	productDescription  		: productDescription,
        	productKeywords				: productKeywords,
        	productStock				: productStock,
        	productPrice 				: productPrice,
        	productBrand				: productBrand
        },
        success:
            function(lastProduct)
            {
            	if (lastProduct != '0') {
            		$('#lastProduct').val(lastProduct);
            		createRelations();
            	} else {
            		
            	}
            }
        }); 
}

function createRelations()
{
	sectionId = $('#sectionChoosed').val();
	
	if (sectionId > 0)
	{
		var categoriesChoosedSize = 0;
		
		$('.categories-add-product li input').each(function(){
			if ( $(this).is(':checked') ) {
				categoriesChoosedSize ++;
			}
		});
		
		if (categoriesChoosedSize > 0)
		{
			$('.categories-add-product li input').each(function(){
				if ( $(this).is(':checked') ) {
					saveRelations($(this).attr('categoryId'));
				}
			});
		} else {
			saveRelations();
		}
	} else {
		return false;
	}
}

function saveRelations(categoryId)
{
	if (!categoryId) {
		categoryId = 'NULL';
	}
	
	sectionId = $('#sectionChoosed').val();
	lastProduct = $('#lastProduct').val();
	
	$.ajax({
        type: "POST",
        url: "/ajax/back/products.php",
        data: {
        	act	: 		'save-relations',
        	sectionId 	: sectionId,
        	lastProduct : lastProduct,
        	categoryId	: categoryId
        },
        success:
            function(lastProduct)
            {
            	if (lastProduct == '1') {
            		$('.alertAddProductSuccess').show('slow');
            	} else {
            		
            	}
            }
        });
}