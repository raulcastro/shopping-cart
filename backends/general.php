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
				'facebook' 		=> $appInfoRow['facebook']
				
		);
		
		$data['appInfo'] = $appInfo;

// 		array of the main sliders
		
		$slidersArray = $this->model->getMainSliders();
		
		$data['mainSliders'] = $slidersArray;
		
// 		Sections, this is for the links
		
		$sectionsArray = $this->model->getMainSections();
		
		$data['sections'] = $sectionsArray;
		
		return $data;
	}
}

// $backend = new generalBackend();

// $info = $backend->loadIndexInfo();

// var_dump($info);