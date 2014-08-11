<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/';
require_once $root.'/backends/adminGeneralBackend.php';
$backend 	= new adminGeneralBackend();
	        
$model = new Admin_Layout_Model();

switch ($_POST['act']) {
	case 'load-categories':
		$categories =  $model->getCategoriesBySectionId($_POST['sectionId']);
		$categoryList= $categories;
		header("content-type:application/json");
		print json_encode($categoryList);
	break;
	
	case 'add-product':
		if ($lastProduct = $model->addProduct($_POST)){
			echo $lastProduct;
		} else {
			echo 0;
		}	
	break;
	
	case 'save-relations':
		if ($model->createRelations($_POST)) {
			echo 1;
		} else {
			echo 0;
		}
	break;	
		
	default:
	break;
}


