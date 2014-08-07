<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/';
require_once $root.'/backends/adminGeneralBackend.php';
$backend 	= new adminGeneralBackend();
	        
$model = new Admin_Layout_Model();

switch ($_POST['act'])
{
	case 'create':
		if ($model->addSection($_POST))
		{
			echo 1;
		}
		else {
			echo 0;
		}
	break;
	
	case 'publishSection':
		if ($model->publishSection($_POST))
		{
			echo 1;
		}
		else {
			echo 0;
		}
	break;
		
	case 'unpublishSection':
		if ($model->unpublishSection($_POST))
		{
			echo 1;
		}
		else {
			echo 0;
		}
	break;
			
	case 'deleteSection':
		if ($model->deleteSection($_POST))
		{
			echo 1;
		}
		else {
			echo 0;
		}
	break;
		
// 	case 'create':
// 	if ($model->addSection($_POST))
// 	{
// 		echo 1;
// 	}
// 	else {
// 		echo 0;
// 	}
// 	break;
}


    
