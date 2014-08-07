<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/';
require_once $root.'/backends/adminGeneralBackend.php';
$backend 	= new adminGeneralBackend();
	        
$model = new Admin_Layout_Model();

switch ($_POST['act'])
{
	case 'create':
		if ($last = $model->addCategory($_POST))
		{
			echo $last;
		}
		else {
			echo 0;
		}
	break;
	
	case 'update':
		if ($model->updateCategoryById($_POST))
		{
			echo 1;
		}
		else {
			echo 0;
		}
	break;
		
	case 'delete':
		if ($model->deleteCategoryById($_POST))
		{
			echo 1;
		}
		else {
			echo 0;
		}
	break;
}


    
