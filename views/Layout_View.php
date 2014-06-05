<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/Framework/Tools.php';

class Layout_View
{
	private $data;
	
	public function __construct($data)
	{
		$this->data = $data;
	}
	
	public function getMainPage()
	{
	ob_start();
	?>
	<!DOCTYPE html>
	<head>
		<?php echo self::getMainHeader(); ?>
	</head>
	
	<body class="home page page-id-2 page-template-default countryorigin-int">
		<div id="container">
			<header role="banner">
				<h1 id="logo"><a href="/" title="<?php echo $this->data['appInfo']['title']; ?>" rel="home"><?php echo $this->data['appInfo']['title']; ?></a></h1>
				<?php echo self::getGeneralTopNavigation(); ?>
				<?php echo self::getGeneralMainNavigation(); ?>
			</header>
		
			<?php echo self::getMainSlider(); ?>
			<?php echo self::getMainGrid(); ?>		
		
		</div> <!-- /containter -->
		
		<footer role="contentinfo">
			<?php echo self::getGeneralFooter($data); ?>
		</footer><!-- footer -->
		<?php echo self::getGeneralCopyright($data); ?>
		<?php echo self::getGeneralSeoScripts(); ?>
	
	</body>
	</html>
	<?php
	$mainPage = ob_get_contents();
	ob_end_clean();
	return $mainPage;
	}

	/*
	 * getMainHeader
	 * 
	 * This function returns the headeer of the index, by now, it can 
	 * receive params like js and css
	 * 
	 * @param NULL
	 * @return string $header an html string
	 * 
	 */
	
	public  function getMainHeader()
	{
	 ob_start();
	 ?>
 	<meta charset="UTF-8" />
	<title><?php echo $this->data['appInfo']['title']; ?></title>

	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="apple-touch-icon.png" type="image/x-icon" />
	<link rel="stylesheet" href="/css/base.css" />
	<link rel="stylesheet" href="/css/style.css" />

	<meta property="og:title" content="<?php echo $this->data['appInfo']['title']; ?>" />
	<meta property="og:image" content="" />
	<meta property="og:description" content="<?php echo $this->data['appInfo']['description']; ?>" />
	<meta name="description" content="<?php echo $this->data['appInfo']['description']; ?>"/>
	<meta property="og:type" content="website" /> 
	<meta property="og:url" content="<?php echo $this->data['appInfo']['url']; ?>" />
	<meta property="og:site_name" content="<?php echo $this->data['appInfo']['siteName']; ?> />
	<meta property="fb:admins" content="" />
	<meta name="keywords" content="<?php echo $this->data['appInfo']['keywords']; ?>" />

<!-- 	<meta name="viewport" content="width=device-width,initial-scale=1"> -->

	<script src="modernizr.js"></script>

	<script type='text/javascript' src=''></script>
	<link rel="wlwmanifest" type="" href="" /> 
	<link rel='next' title='Bazar en linea - Categories' href='' />

	<link rel='canonical' href='http://www.bazarenlinea.com.mx/' />
	
	<!-- jQuery library (served from Google) -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<!-- bxSlider Javascript file -->
	<script src="/js/jquery.bxslider.min.js"></script>
	<!-- bxSlider CSS file -->
	<link href="/js/jquery.bxslider.css" rel="stylesheet" />
	<script type="text/javascript">
	$(document).ready(function(){
		  $('#mainSlider').bxSlider({
			  auto: true
			  });
		});
	</script>
	 <?php 
	 $header = ob_get_contents();
	 ob_end_clean();
	 return $header;
	}
	
	public static function getGeneralTopNavigation()
	{
		ob_start();
		?>
		<nav>
			<ul class="user reset">
				<li class="store-language">
					<a href="#">Internacional</a>
					<div class="sub">
						<h4>Enviar a:</h4>
						<ul>
							<li><a href="#" onclick="location.href='?___store=eu';">Europe</a></li>
							<li class="selected-store">International</li>
						</ul>
					</div>
				</li>
				<li class="sign-in">
					<a href="#">Entrar</a>
					<div class="sub">
						<h4>Inscribirse a bazar en linea</h4>
						<form method="POST" action="">
							<fieldset>
								<p>
									<label>E-Mail Address</label>
									<input name="login[username]" placeholder="E-Mail Address" type="text">
								</p>
								<p>
									<label>Password</label>
									<input name="login[password]" placeholder="Password" type="password">
									<a href="">Forgot Password?</a>
								</p>
								<p class="submit">
									<input type="submit" name="submit" value="Sign in" />
									or <a href="">Register</a>
								</p>
							</fieldset>
						</form>
					</div>
				</li>
				<li class="newsletter">
					<a href="#">Blog</a>
					<div class="sub">
						<h4>Sign up for News</h4>
						<form action="#">
							<fieldset>
								<p>
									<label class="visuallyhidden">E-Mail Address</label>
									<input id="newsletter-text" placeholder="E-Mail Address" type="text">
									<span id="newsletter-error"></span>
								</p>
								<p class="submit">
									<input id="newsletter-submit" type="submit" name="submit" value="Submit" />
								</p>
							</fieldset>
						</form>
					</div>
				</li>
				<li class="search">
					<form action="" method="get">
						<label class="visuallyhidden">Buscar</label>
						<input type="text" name="q" class="no-border" value="Buscar">
						<input type="submit" value="Buscar" class="submit">
					</form>
				</li>
				<li class="shopping-bag"><a href="">Contacto</a></li>
				<li class="shopping-bag"><a href="">Acerca de nosotros</a></li>
				<li class="shopping-bag"><a href="">Carrito de compras</a></li>
			</ul>
		</nav>
		<?php 
		$topNavigation = ob_get_contents();
		ob_end_clean();
		return $topNavigation;
	}
	
	public function getGeneralMainNavigation()
	{
		ob_start();
		?>
		<nav id="access" role="navigation">
			<a id="skip" href="#content" class="visuallyhidden" title="Skip to content">Skip to content</a>
			<ul>
				<li><a href="/store/latest-products"><span>Ultimos productos</span></a></li>
				<?php
					foreach ($this->data['sections'] as $section)
					{
						?>
				<li>
					<a href="/store/<?php echo $section['section_id'];?>/<?php echo Tools::slugify($section['title']); ?>/">
						<span><?php echo $section['title']; ?></span>
					</a>
				</li>
						<?php
					}
				?>
			</ul>
		</nav><!-- #access -->
		<?php 
		$mainNavigation = ob_get_contents();
		ob_end_clean();
		return $mainNavigation;
	}
	
	public function getMainSlider()
	{
		ob_start();
		?>
		<div id="keyviz">
			<ul class="reset" id="mainSlider">
			<?php 
				foreach ($this->data['mainSliders'] as $slider )
				{
				?>
				<li>
					<a href="<?php echo $slider['url']; ?>" title="<?php echo $slider['name']; ?>">
						<img src="/pictures-content/main-sliders/front/<?php echo $slider['slider']; ?>" alt="<?php echo $slider['name']; ?>" />
					</a>
				</li>
				<?php 	
				}
			?>
			</ul>
		</div>
		<?php
		$mainSlider = ob_get_contents();
		ob_end_clean();
		return $mainSlider;
	}
	
	public static function getMainItemGrid()
	{
		ob_start();
		?>
		<li>
			<span class="subheader"><em>FLORAL STATEMENTS</em></span>
			<a href="">
				<img src="/pictures-content/image1.jpg" title="DRIES VAN NOTEN" width="280" height="210" alt="DRIES VAN NOTEN">
			</a>
			<h2>
				<a href="">
					DRIES VAN NOTEN					
				</a>
			</h2>
		</li>
		<?php
		$mainItemGrid = ob_get_contents();
		ob_end_clean();
		return $mainItemGrid;
	}

	public static function getMainItemGridWithText()
	{
		ob_start();
		?>
		<li >
			<span class="subheader">
				<em>26 May 2014</em>
			</span>
			
			<a href="" title="Permalink to Spring Summer 2014: Engineered Garments">
				<img width="280" height="212" src="/pictures-content/blog_1.jpg" class="attachment-thumbnail wp-post-image" alt="blog_eg_08" title="blog_eg_08" />						
			</a>
					
			<h2 class="entry-title"><a href="" title="Spring Summer 2014: Engineered Garments" rel="bookmark">Spring Summer 2014: Engineered Garments</a></h2>
		
			<div class="entry-content">
				<p>Time to be adventurous! Not for the faint hearted, this Engineered Garments SS14 Collection is a pattern explosion full of loud prints, patchworks of florals, checks and batik! Based around the hippie dippy era surrounding '1968', this collection will have you feeling...</p>
			</div><!-- .entry-content -->
								
			<a href="" title="Permalink to Spring Summer 2014: Engineered Garments" class="more">Read more</a>
		</li>
		<?php 
		$mainItemGridWithText = ob_get_contents();
		ob_end_clean();
		return $mainItemGridWithText;
	}
	
	public static function getMainGrid()
	{
		ob_start();
		?>
		<section id="content" role="main">
			<ul class="news reset">
				<?php echo self::getMainItemGrid(); ?>
			</ul>
			<ul class="news reset">
				<?php echo self::getMainItemGridWithText(); ?>			
			</ul>
		</section>
		<?php 
		$mainGrid = ob_get_contents();
		ob_end_clean();
		return $mainGrid;
	}
	
	public function getGeneralFooter()
	{
		ob_start();
		?>
		<div class="wrapper">
			<nav class="footer-main">
				<ul>
					<li class="sign-in"><a href="">Sign in</a></li>
					<li class="shopping-bag"><a href="">Shopping Bag</a></li>
					<li><a href="/features">Features</a></li>
					<li><a href="/news">News</a></li>
					<li class="tw"><a href="<?php echo $this->data['appInfo']['facebook']; ?>" target="_blank">S&iacute;guenos en Twitter</a></li>
					<li class="fb"><a href="<?php echo $this->data['appInfo']['twitter']; ?>" target="_blank">Unete a Facebook</a></li>
				</ul>
			</nav>	
			<address>
				Puerto Vallarta<br>
				257 620 70<br>
				Online <br>
				Lun-Viernes: 12 pm-8 pm,  <br>
				Sabado: 11 am-8 pm
			</address>
			
			<nav class="short-nav">
				<ul>
					<li>
						<h3>Shop</h3>
						<ul>
							<li><a href="">Account</a></li>
							<li><a href="">Shopping Bag</a></li>
							<li><a href="">Checkout</a></li>
							<li><a href="">Register</a></li>
							<li><a href="">Imprint</a></li>
						</ul>
					</li>
					<li>
						<h3>Service</h3>
						<ul>
							<li><a href="">Terms and Conditions</a></li>
						  	<li><a href="">Returns & Delivery</a></li>
						  	<li><a href="">Payment Options</a></li>
						  	<li><a href="">FAQ</a></li>
						  	<li><a href="">Privacy & Cookies</a></li>
						</ul>
					</li>
				</ul>					
			</nav>		
		</div>
		<?php 
		$generalFooter = ob_get_contents();
		ob_end_clean();
		return $generalFooter;
		
	}
	
	public function getGeneralCopyright($data)
	{
		ob_start();
		$generalCopyRight = ob_get_contents();
		ob_end_clean();
		?>
		<div id="copyright">
			<div class="wrapper">
				<p class="copyright">&copy; <?php echo date('Y'); ?> Bazar en linea, All rights reserved. </p>
				<p class="site-by"><span>Site by:</span> <a href="<?php echo $this->data['appInfo']['creator_url']; ?>" target="_blank"><?php echo $this->data['appInfo']['creator']; ?></a></p>			
			</div>
		</div>
		<?php 
		return $generalCopyRight;
	}
	
	public static function getGeneralSeoScripts()
	{
		ob_start();
		?>
		<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> -->
		<!--<script>window.jQuery || document.write('<script src="http://www.sotostore.com/wp-content/themes/boilerplate/js/jquery.js"><\/script>')</script>-->
		
		
		<!-- BEGIN GOOGLE ANALYTICS CODEs -->
		<!-- END GOOGLE ANALYTICS CODE -->
		<?php 
		$generalSeoScripts = ob_get_contents();
		ob_end_clean();
		return $generalSeoScripts;
	}
}