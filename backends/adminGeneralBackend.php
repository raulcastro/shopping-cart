<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/models/Admin_Layout_Model.php';

class adminGeneralBackend
{
	protected  $model;
	
	public function __construct()
	{
		$this->model = new Admin_Layout_Model();
	}
	
	public function loadIndexInfo()
	{
		$data 		= array();
		
		$userInfoRow = $this->model->getCurrentUserInfo();
		
// 		User info

		$userInfo = array(
			'userId'	=>$userInfoRow['user_id'],
			'user' 		=> $userInfoRow['user'],
			'userType' 	=> $userInfoRow['type'],
			'userName' 	=> $userInfoRow['name'],
			'userEmail' => $userInfoRow['email'],
			'about'		=> $userInfoRow['about'],
			'avatar' 	=> $userInfoRow['avatar']
		);
		
		$data['userInfo'] = $userInfo;
		
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
				'lang'			=> $appInfoRow['lang'],
				'email'			=> $appInfoRow['email']
				
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
	
	public function getCurrentSection($sectionId)
	{
		$currentSection = array();
		
		return $currentSection['currentSection'] = $this->model->getSectionById($sectionId);
	}
	
	public function getCurrentSectionCategories($sectionId)
	{
		$currentSectionCategories = array();
	
		return $currentSectionCategories['currentSectionCategories'] = $this->model->getCategoriesBySectionId($sectionId);
	}
}

// $backend = new generalBackend();

// $info = $backend->loadIndexInfo();

// var_dump($info);