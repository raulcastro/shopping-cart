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
		<link rel="stylesheet" href="/css/be-style.css" media="all" />
		<script src="/js/jquery-2.1.1.min.js"></script>
		<script src="/js/be-scripts.js"></script>
	<?php 
		$mainHeader = ob_get_contents();
		ob_end_clean();
		return $mainHeader;
	}
	
	public function getLoginSection(){
		ob_start();
	?>
		<section>
			<h1><strong><?php echo $this->data['appInfo']['siteName']; ?></strong> Dashboard</h1>
			<form method="link" action="dashboard.html">
				<input type="text" value="Email" />
				<input value="Password" type="password" />
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