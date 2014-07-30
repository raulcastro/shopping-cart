<?php
$root = $_SERVER['DOCUMENT_ROOT'].'/';
require_once $root.'/backends/adminGeneralBackend.php';
$backend 	= new adminGeneralBackend();
	        
$model = new Admin_Layout_Model();

if ($model->updateAppInfo($_POST))
{
	echo 1;
}
else {
	echo 0;
}
    
