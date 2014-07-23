<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Framework/Tools.php';

class Admin_Layout_View
{
	private $data;
	private $currentTitle;
	
	public function __construct($data) {
		$this->data = $data;
	}
	
	/**
	 * Return the complete HTML Document, from <html> to </html> tag. The section
	 * it's an string, it can be login, dashboard and so, it calls another 
	 * basically functions by itself. 
	 * 
	 * @param string $section
	 * @param string $title
	 * @param string $body
	 * @return string
	 */
	public function getMainPage($section = '', $title = '', $body = '') {
		ob_start();
		$this->currentTitle = $title;
	?>
	<!DOCTYPE html>
	<html>
	<head>
		<?php echo self::getMainHeader(); ?>
	</head>
	
	<body class="<?php echo $section; ?>">
		<?php echo $body; ?>
		<?php echo self::getGeneralScripts(); ?>
	</body>
	</html>
	<?php
		$mainPage = ob_get_contents();
		ob_end_clean();
		return $mainPage;
	}
	
	public function getMainHeader(){
		ob_start();
	?>
		<meta charset="utf-8">
		<title><?php echo $this->data['appInfo']['title']; ?> - <?php echo $this->currentTitle; ?></title>
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
		<?php echo self::getGeneralCSS(); ?>
		
	<?php 
		$mainHeader = ob_get_contents();
		ob_end_clean();
		return $mainHeader;
	}
	
	/**
	 * getGeneralCSS
	 *
	 * it returns the common css needed for all the pages of the website
	 * @param NULL
	 * @return string html code
	 */
	
	public static function getGeneralCSS()
	{
		ob_start();
		?>
			<link rel="stylesheet" href="/css/back/style.css" media="all" />
		<?php 
		$generalCSS = ob_get_contents();
		ob_end_clean();
		return $generalCSS;
	}
		
		/**
		 * getGeneralScripts
		*
		* it returns the common JS needed for all the pages of the website
		* @param NULL
		* @return string html code
		*/
		
		public static function getGeneralScripts()
		{
			ob_start();
			?>
			
			
			<script src="/js/jquery-1.6.1.min.js"></script>
			<script src="/js/back/scripts.js"></script>
			<script src="/js/back/jquery.wysiwyg.js"></script>
			<script src="/js/back/custom.js"></script>
			<script src="/js/back/cycle.js"></script>
			<script src="/js/back/jquery.checkbox.min.js"></script>
			<script src="/js/back/flot.js"></script>
			<script src="/js/back/flot.resize.js"></script>
			<script src="/js/back/flot-graphs.js"></script>
			<script src="/js/back/flot-time.js"></script>
			<script src="/js/back/cycle.js"></script>
			<script src="/js/back/jquery.tablesorter.min.js"></script>
			<?php 
			$generalScripts = ob_get_contents();
			ob_end_clean();
			return $generalScripts;
		}
	
	/**
	 * getCommonContentSection
	 * 
	 * most of the body structure around the backend
	 * 
	 * @return string
	 */
	public function getCommonContentSection()
	{
		ob_start();
		?>
		<?php echo self::getTopArea(); ?>
		<?php
		$body = ob_get_contents();
		ob_end_clean();
		return $body;
	}
	
	public function getSideBar()
	{
		ob_start();
		?>
		
		<?php
		$sideBar = ob_get_contents();
		ob_end_clean();
		return $sideBar;
	}
	
	/**
	 * getTopArea
	 * here we display the top header with the name of the company, and also the 
	 * name of user, the pendinf notifications, log-oout functions and so
	 * 
	 * @return string
	 */
	public function getTopArea()
	{
		ob_start();
		?>
		<div class="testing">
			<header class="main">
			    <h1><strong>Bazar en linea</strong> Dashboard</h1>
			    <input type="text" value="search" />
			</header>
			<section class="user">
			    <div class="profile-img">
			        <p><img src="images/uiface2.png" alt="" height="40" width="40" /> Welcome back John Doe</p>
			    </div>
			    <div class="buttons">
			        <button class="ico-font">&#59157;</button>
			        <span class="button dropdown">
			            <a href="#">Notifications <span class="pip">4</span></a>
			            <ul class="notice">
			                <li>
			                    <hgroup>
			                        <h1>You have a new task</h1>
			                        <h2>Report web statistics week by week.</h2> 
			                    </hgroup>
			                    <p><span>14:24</span></p>
			                </li>
			                <li>
			                    <hgroup>
			                        <h1>New comment</h1>
			                        <h2>Comment on <em>About page</em> by Darren.</h2> 
			                    </hgroup>
			                    <p><span>11:04</span></p>
			                </li>
			                <li>
			                    <hgroup>
			                        <h1>Broken link</h1>
			                        <h2>We've spotted a broken link on the <em>Blog page</em>.</h2> 
			                    </hgroup>
			                    <p><span>10:46</span></p>
			                </li>
			                <li>
			                    <hgroup>
			                        <h1>User report</h1>
			                        <h2><em>Lee Grant</em> has been promoted to admin.</h2> 
			                    </hgroup>
			                    <p><span>09:57</span></p>
			                </li>
			            </ul>
			        </span> 
			        <span class="button dropdown">
			            <a href="#">Inbox <span class="pip">6</span></a>
			            <ul class="notice">
			                <li>
			                    <hgroup>
			                        <h1>Hi, I need a favour</h1>
			                        <h2>John Doe</h2>
			                        <h3>Lorem ipsum dolor sit amet, consectetuer sed aidping putamus delo de sit felume...</h3>
			                    </hgroup>
			                    <p><span>11:24</span></p>
			                </li>
			                <li>
			                    <hgroup>
			                        <h1><span class="icon">&#59154;</span>Hi, I need a favour</h1>
			                        <h2>John Doe</h2>
			                        <h3>Lorem ipsum dolor sit amet, consectetuer sed aidping putamus delo de sit felume...</h3>
			                    </hgroup>
			                    <p><span>11:24</span></p>
			                </li>
			                <li>
			                    <hgroup>
			                        <h1><span class="icon">&#59154;</span>Hi, I need a favour</h1>
			                        <h2>John Doe</h2>
			                        <h3>Lorem ipsum dolor sit amet, consectetuer sed aidping putamus delo de sit felume...</h3>
			                    </hgroup>
			                    <p><span>11:24</span></p>
			                </li>
			            </ul>
			        </span> 
			        <span class="button">Live</span>
			         <span class="button">Help</span>
			         <span class="button blue"><a href="index.html">Logout</a></span>
			    </div>
			</section>
		</div>
		<?php
		$sideBar = ob_get_contents();
		ob_end_clean();
		return $sideBar;
	}
	
	
	
	public function getUserDetails()
	{
		ob_start();
		?>
			
		<?php
		$sideBar = ob_get_contents();
		ob_end_clean();
		return $sideBar;
	}
	
	/**
	 * getLoginSection
	 * 
	 * This only works for the login section, it's and special one
	 * @return string
	 */
	public function getLoginSection(){
		ob_start();
	?>
		<section>
			<h1>
				<strong><?php echo $this->data['appInfo']['siteName']; ?></strong> 
				Dashboard
			</h1>
			
			<form method="post" id="login-form" 
					action="<?php echo $_SERVER['REQUEST_URI']; ?>">
				<input type="text" value="Email" name="loginUser" />
				<input value="Password" type="password" name="loginPass" />
				<input type="hidden" name="submitButton" value="1">
				<button class="blue">Login</button>
			</form>
			<p><a href="#">Forgot your password?</a></p>
		</section>
	<?php 
		$loginSection = ob_get_contents();
		ob_end_clean();
		return $loginSection;
	}	
}