<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/models/Layout_Model.php';

class generalBackend
{
	protected  $model;
	
	public function __construct()
	{
		$this->model = new Layout_Model();
	}
	
	public function loadIndexInfo()
	{
		$data 		= array();
		
// 		Info of the Application
		
		$appInfoRow = $this->model->getGeneralAppInfo();
		
		$appInfo = array( 
				'title' 		=> $appInfoRow['title'],
				'siteName' 		=> $appInfoRow['site_name'],
				'url' 			=> $appInfoRow['url'],
				'content' 		=> $appInfoRow['content'],
				'description'	=> $appInfoRow['description'],
				'keywords' 		=> $appInfoRow['keywords'],
				'creator' 		=> $appInfoRow['creator'],
				'creatorUrl' 	=> $appInfoRow['creator_url'],
				'twitter' 		=> $appInfoRow['twitter'],
				'facebook' 		=> $appInfoRow['facebook'],
				'googleplus' 	=> $appInfoRow['googleplus'],
				'pinterest' 	=> $appInfoRow['pinterest'],
				'linkedin' 		=> $appInfoRow['linkedin'],
				'lang'			=> $appInfoRow['lang']
				
		);
		
		$data['appInfo'] = $appInfo;

// 		array of the main sliders
		
		$slidersArray = $this->model->getMainSliders();
		
		$data['mainSliders'] = $slidersArray;
		
// 		Sections, this is for the links, it also include the categories
		
		$sectionsArray = $this->model->getMainSections();
		
		for ($i = 0; $i < sizeof($sectionsArray); $i++)
		{
			$categories = $this->model->getCategoriesBySectionId($sectionsArray[$i]['section_id']);
			
			$sectionsArray[$i]['categories'] = $categories;
		}
		
// 		Last four products published
		
		$lastFourProductsArray = $this->model->getLastFourProducts();
		
		$data['lastFourProducts'] = $lastFourProductsArray;
		
		$data['sections'] = $sectionsArray;
		
		return $data;
	}
	
	public function getCurrentProduct($productId)
	{
		return $this->model->getProductByProductId($productId);
	}
}

//  $backend = new generalBackend();

// $info = $backend->loadIndexInfo();
// var_dump($info);

// var_dump($info);