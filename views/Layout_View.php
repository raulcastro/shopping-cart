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
	<html lang="<?php echo $this->data['appInfo']['lang']; ?>">
	<head>
		<?php echo self::getMainHeader(); ?>
	</head>
	
	<body>
	
		<header id="header">
			<?php echo self::getGeneralTopNavigation(); ?>
			<?php echo self::getGeneralMainNavigation(); ?>
		</header>
		
		<?php echo self::getMainSlider(); ?>
		<section id="content">
			<?php echo self::getMainContent(); ?>	
		</section>	
		
		<!-- ========== FOOTER START ========== -->
		<footer id="footer">
			<?php echo self::getGeneralFooter($data); ?>
		</footer><!-- footer -->
		<!-- ========== FOOTER END ========== -->
		<?php echo self::getGeneralCopyright($data); ?>
		
		<?php echo self::getShoppingCart(); ?>		
		
		<?php echo self::getGeneralSeoScripts(); ?>
		<!-- JS scipts -->
		<?php echo self::getGeneralScripts(); ?>
		<!-- /JS scipts -->
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
	
	public function getMainHeader()
	{
	ob_start();
	?>
 	<meta charset="UTF-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	
	<title><?php echo $this->data['appInfo']['title']; ?></title>

	<meta property="og:title" content="<?php echo $this->data['appInfo']['title']; ?>" />
	<meta property="og:image" content="" />
	<meta property="og:description" content="<?php echo $this->data['appInfo']['description']; ?>" />
	<meta name="description" content="<?php echo $this->data['appInfo']['description']; ?>"/>
	<meta property="og:type" content="website" /> 
	<meta property="og:url" content="<?php echo $this->data['appInfo']['url']; ?>" />
	<meta property="og:site_name" content="<?php echo $this->data['appInfo']['siteName']; ?> />
	<meta property="fb:admins" content="" />
	<meta name="keywords" content="<?php echo $this->data['appInfo']['keywords']; ?>" />

	<link rel="wlwmanifest" type="" href="" /> 
	<link rel='next' title='Bazar en linea - Categories' href='' />
	<link rel='canonical' href='http://www.bazarenlinea.com.mx/' />
	
	<link rel="icon" href="favicon.ico" type="image/x-icon" />
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="apple-touch-icon.png" type="image/x-icon" />
	
	<!-- CSS scripts -->
	<?php echo self::getGeneralCSS(); ?>
	<!-- /CSS scrips -->
	
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<![endif]-->
	 <?php 
	 $header = ob_get_contents();
	 ob_end_clean();
	 return $header;
	}
	
	/*
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
		<!-- Bootstrap -->
	  	<link href="css/front/bootstrap.min.css" rel="stylesheet">
	
	  	<link href="css/front/owl.carousel.css" rel="stylesheet">
	  	<link href="css/front/owl.theme.css" rel="stylesheet">
	  	<link href="css/front/owl.transitions.css" rel="stylesheet">
	
	  	<link href="css/front/style.css" rel="stylesheet">
	  	<link href="css/front/config.css" rel="stylesheet">
		<?php 
		$generalCSS = ob_get_contents();
		ob_end_clean();
		return $generalCSS;
	}
	
	/*
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
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> download this one -->
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/jquery-2.1.1.min.js"></script>
		<script src="js/front/bootstrap.min.js"></script>
		<script src="js/front/owl.carousel.min.js"></script>
		<script src="js/front/jquery.jpanelmenu.min.js"></script>
		<script src="js/front/main.js"></script>
		<?php 
		$generalScripts = ob_get_contents();
		ob_end_clean();
		return $generalScripts;
	}
	
	/*
	 * getGeneralTopNavigation
	 * 
	 * Is the very top menu, it has functions like login/register and some 
	 * common static links like blog or contact us
	 * 
	 * @param NULL
	 * @return string html script
	 */
	public static function getGeneralTopNavigation()
	{
		ob_start();
		?>
		<!-- ========== TOP BAR START ========== -->
		
		<div id="top-bar">
			<div class="container">
			
				<nav id="language-selector">
					<ul class="nav nav-pills">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Espa&ntilde;ol <b class="caret"></b></a>
							<ul role="menu" class="dropdown-menu">
								<li><a href="#">English</a></li>
							</ul>
						</li>
					</ul>
				</nav>
				
				<nav id="shopping-cart">
					<a href="#">
						<i class="fa fa-shopping-cart fa-lg"></i> Carrito
						<span class="fa-stack">
						<i class="fa fa-circle fa-stack-2x"></i>
						<i class="fa fa-stack-1x fa-inverse">3</i>
					</span>
					</a>
				</nav>
				
				<nav id="top-nav" role="navigation" class="navbar">
					<div class="navbar-header">
						<button data-target=".top-nav" data-toggle="collapse" class="navbar-toggle" type="button">
						<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
					</div>
				
					<div class="collapse navbar-collapse top-nav">
						<ul class="nav navbar-nav">
							<li><a href="about-us.html">Acerca de nosotros</a></li>
							<li><a href="blog.html">Blog</a></li>
							<li><a href="contact.html">Contacto</a></li>
							<li><a href="my-account.html">Entrar / Registrarse</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</nav>
			
			</div>
		</div><!-- / #top-bar -->
		
		<!-- ========== /TOP BAR  ========== -->
		<?php 
		$topNavigation = ob_get_contents();
		ob_end_clean();
		return $topNavigation;
	}
	
	/*
	 * getGEneralMainNavigation
	 * 
	 * is the real menu of the application, is where we show dinamically the 
	 * categories of the shopping cart
	 * 
	 * @param NULL
	 * @return string html code for the menu
	 */
	public function getGeneralMainNavigation()
	{
		ob_start();
		?>
		<!-- ========== MENU START ========== -->
		
		<nav id="main-nav">
			<div class="navbar">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-nav">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="index.html" title="<?php echo $this->data['appInfo']['title']; ?>" rel="home">
							<img src="images/logo.png" alt="Garbini" class="img-responsive" alt="<?php echo $this->data['appInfo']['title']; ?>">
						</a>
					</div>
					
					<div class="navbar-collapse collapse main-nav">
						<ul class="nav navbar-nav navbar-right">
<!-- 							<li class="dropdown"> -->
<!-- 								<a href="category.html" class="dropdown-toggle" data-toggle="dropdown">&Uacute;ltimos productos</a> -->
<!-- 							</li> -->
							            
							<?php
							foreach ($this->data['sections'] as $section)
							{
							?>
							<li class="dropdown">
								<a href="/store/<?php echo $section['section_id'];?>/<?php echo Tools::slugify($section['title']); ?>/" class="dropdown-toggle" data-toggle="dropdown">
								<?php echo $section['title']; ?> <b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="category.html">Subcat #1</a></li>
									<li><a href="category.html">Subcat #2</a></li>
									<li><a href="category.html">Subcat #3</a></li>
									<li><a href="category.html">Subcat #4</a></li>
								</ul>
							</li>
							<?php
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<!-- ========== MENU END ========== -->
		<?php 
		$mainNavigation = ob_get_contents();
		ob_end_clean();
		return $mainNavigation;
	}
	
	/*
	 * getMainSlider
	 * 
	 * is the main slider, only displayed on the index
	 * 
	 * @param Null
	 * @return string html code
	 */
	public function getMainSlider()
	{
		ob_start();
		?>
		<!-- ========== SLIDER START ========== -->

		<section id="slider">
			<div id="bs-carousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				<?php 
					$i = 0;
					foreach ($this->data['mainSliders'] as $slider )
					{
					?>
					<li data-target="#bs-carousel" data-slide-to="<?php echo $i; ?>" class="<?php if ($i == 0) echo 'active'; ?>"></li>
					<?php
						$i++;
					}
				?>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner">
				<?php 
					$i = 0;
					foreach ($this->data['mainSliders'] as $slider )
					{
					?>
					<div class="item <?php if ($i == 0) echo 'active'; ?>">
						<a href="<?php echo $slider['url']; ?>" title="<?php echo $slider['name']; ?>">
							<img src="/images-app/main-sliders/front/<?php echo $slider['slider']; ?>" alt="<?php echo $slider['name']; ?>" />
						</a>
					</div>
					<?php
						$i++;
					}
				?>
				</div>
				
				<!-- Controls -->
				<a class="left carousel-control" href="#bs-carousel" data-slide="prev">
					<i class="fa fa-angle-left"></i>
					<!--<span class="glyphicon glyphicon-chevron-left"></span-->
				</a>
				<a class="right carousel-control" href="#bs-carousel" data-slide="next">
					<i class="fa fa-angle-right"></i>
					<!--span class="glyphicon glyphicon-chevron-right"></span-->
				</a>
			</div>
		</section>
		
		<!-- ========== SLIDER END ========== -->
		<?php
		$mainSlider = ob_get_contents();
		ob_end_clean();
		return $mainSlider;
	}
	
	/*
	 * getMainTopOffers
	 * 
	 * This section appears on the index and other section. It display the top 
	 * offers, only 4 
	 * 
	 * @param NULL
	 * @return string HTML code
	 */
	
	public static function getMainTopOffers()
	{
		ob_start();
		?>
		<div class="row ad-banners">  
			<div class="col-sm-4">
				<a href="#"><img src="images-app/ad-1.jpg" alt=""></a>
			</div>
			<div class="col-sm-4">
				<a href="#"><img src="images-app/ad-2.jpg" alt=""></a>
				<a href="#"><img src="images-app/ad-3.jpg" alt=""></a>
			</div>
			<div class="col-sm-4">
				<a href="#"><img src="images-app/ad-4.jpg" alt=""></a>
			</div>
		</div>
		<?php 
		$topOffers = ob_get_contents();
		ob_end_clean();
		return $topOffers;
	}
	
	/*
	 * getMainPromotted
	 * 
	 * it's a section that displays the promotted products, it can has a many 
	 * products are published, it also shows an static add in the center
	 * 
	 * @param NULL
	 * @return string HTML code
	 */
	
	public static function getMainPromotted()
	{
		ob_start();
		?>
		<div class="products-carousel products-small products">
			<div class="banner">
				<img src="images-app/30-off.jpg" alt="">
			</div>
			
			<div class="carousel">
				<div>
					<div class="product">
						<div class="thumbnail">
							<a href="#"><img src="images-app/sale-1.jpg" alt=""></a>
						</div>
						<hr>
						<div class="title">
							<h3><a href="#">Reshape Panties</a></h3>
							<p>by Jack &amp; Jones</p>
						</div>
					</div>
				</div>
				<div>
					<div class="product">
						<div class="thumbnail">
							<a href="#"><img src="images-app/sale-2.jpg" alt=""></a>
						</div>
						<hr>
						<div class="title">
							<h3><a href="#">Reshape Panties</a></h3>
							<p>by Jack &amp; Jones</p>
						</div>
					</div>
				</div>
				<div>
					<div class="product">
						<div class="thumbnail">
							<a href="#"><img src="images-app/sale-3.jpg" alt=""></a>
						</div>
						<hr>
						<div class="title">
							<h3><a href="#">Reshape Panties</a></h3>
							<p>by Jack &amp; Jones</p>
						</div>
					</div>
				</div>
				<div>
					<div class="product">
						<div class="thumbnail">
							<a href="#"><img src="images-app/sale-4.jpg" alt=""></a>
						</div>
						<hr>
						<div class="title">
							<h3><a href="#">Reshape Panties</a></h3>
							<p>by Jack &amp; Jones</p>
						</div>
					</div>
				</div>
				<div>
					<div class="product">
						<div class="thumbnail">
							<a href="#"><img src="images-app/sale-5.jpg" alt=""></a>
						</div>
						<hr>
						<div class="title">
							<h3><a href="#">Reshape Panties</a></h3>
							<p>by Jack &amp; Jones</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php 
		$promotted = ob_get_contents();
		ob_get_clean();
		return $promotted;
	}
	
	/*
	 * getMainItemsGrid
	 * 
	 * This section show a grid of products, probabily will show the latest ones
	 * 
	 * @param NULL
	 * @return string HTML code
	 */
	public static function getMainItemsGrid()
	{
		ob_start();
		?>
		<h2 class="align-center unbranded">Browse Our Store</h2>
		<div class="gap-25"></div>

		<ul class="products row">
		
			<li class="col-sm-3 first">
				<div class="product">
					<div class="thumbnail">
						<a href="product.html"><img src="images-app/product-1.jpg" alt=""></a>
						<a href="#" class="add-to-cart" title="Add to Cart">
							<span class="fa-stack fa-2x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</div>
					<hr>
					<div class="title">
						<h3><a href="#">Reshape Panties</a></h3>
						<p>by Jack &amp; Jones</p>
					</div>
					<span class="price">$18</span>
				</div>
			</li>
			
			<li class="col-sm-3">
				<div class="product">
					<div class="thumbnail">
						<a href="product.html"><img src="images-app/product-2.jpg" alt=""></a>
						<a href="#" class="add-to-cart" title="Add to Cart">
							<span class="fa-stack fa-2x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</div>
					<hr>
					<div class="title">
						<h3><a href="#">Reshape Panties</a></h3>
						<p>by Jack &amp; Jones</p>
					</div>
					<span class="price">$18</span>
				</div>
			</li>
			
			<li class="col-sm-3">
				<div class="product">
					<div class="thumbnail">
						<a href="product.html"><img src="images-app/product-3.jpg" alt=""></a>
						<a href="#" class="add-to-cart" title="Add to Cart">
							<span class="fa-stack fa-2x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</div>
					<hr>
					<div class="title">
						<h3><a href="#">Reshape Panties</a></h3>
						<p>by Jack &amp; Jones</p>
					</div>
					<span class="price">$18</span>
				</div>
			</li>
			
			<li class="col-sm-3 last">
				<div class="product">
					<div class="thumbnail">
						<a href="product.html"><img src="images-app/product-4.jpg" alt=""></a>
						<a href="#" class="add-to-cart" title="Add to Cart">
							<span class="fa-stack fa-2x">
								<i class="fa fa-circle fa-stack-2x"></i>
								<i class="fa fa-shopping-cart  fa-stack-1x fa-inverse"></i>
							</span>
						</a>
					</div>
					<hr>
					<div class="title">
						<h3><a href="#">Reshape Panties</a></h3>
						<p>by Jack &amp; Jones</p>
					</div>
					<span class="price">$18</span>
				</div>
			</li>
		</ul>
		<?php
		$mainItemGrid = ob_get_contents();
		ob_end_clean();
		return $mainItemGrid;
	}
	
	/*
	 * getMainContent
	 * 
	 * This section is the content showed on the display, it shows basically a 
	 * bit overview of the whole site
	 * 
	 * @param NULL
	 * @return string HTML code
	 * 
	 */
	public static function getMainContent()
	{
		ob_start();
		?>
		<div class="container">
	    	<?php echo self::getMainTopOffers(); ?>
			<?php echo self::getMainPromotted(); ?>
			<?php echo self::getMainItemsGrid(); ?>
  		</div>
		<?php 
		$mainGrid = ob_get_contents();
		ob_end_clean();
		return $mainGrid;
	}
	
	/*
	 * getGeneralFooter
	 * 
	 * This is the footer, it contains the contact info, newsletter, sitemap and so
	 * 
	 * @param NULL
	 * @return string html code
	 */
	
	public function getGeneralFooter()
	{
		ob_start();
		?>
		<div class="container">
			<hr>
			<div class="row">
				<div class="col-sm-2">
					<aside class="widget widget_nav_menu">
						<h3 class="widget-title"><?php echo $this->data['appInfo']['title']; ?></h3>
						<ul>
							<li><a href="#">Inicio</a></li>
							<li><a href="#">Acerca de nosotros</a></li>
							<li><a href="#">Entrar / Registrarse</a></li>
							<li><a href="#">Pagar</a></li>
							<li><a href="#">Mi lista de deseos</a></li>
							<li><a href="#">Mi carrito</a></li>
							<li><a href="#">Novedades</a></li>
						</ul>
					</aside>
				</div>
				
				<div class="col-sm-2">
					<aside class="widget widget_nav_menu">
						<h3 class="widget-title">Tienda</h3>
						<ul>
						<?php
							foreach ($this->data['sections'] as $section)
							{
							?>
							<li class="dropdown">
								<a href="/store/<?php echo $section['section_id'];?>/<?php echo Tools::slugify($section['title']); ?>/">
								<?php echo $section['title']; ?> 
								</a>
							</li>
							<?php
							}
							?>
						</ul>
					</aside>
				</div>
				
				<div class="col-sm-2">
					<aside class="widget widget_nav_menu">
						<h3 class="widget-title">Info</h3>
						<ul>
							<li><a href="#">Compa&ntilde;&iacute;a</a></li>
							<li><a href="#">Franquisia</a></li>
							<li><a href="#">Socios</a></li>
							<li><a href="#">Contacto</a></li>
							<li><a href="#">FAQ</a></li>
							<li><a href="#">Terminos de servicio</a></li>
							<li><a href="#">Pol&iacute;tica de privacidad</a></li>
						</ul>
					</aside>
				</div>
				
				<div class="col-sm-3">
					<aside class="widget widget_newsletter">
						<h3 class="widget-title">Novedades</h3>
						<form action="#" id="newsletter">
							<label for="newsletter-email">Suscribete a nuestras novedades</label>
							<div class="input-group">
								<input type="text" name="newsletter-email" id="newsletter-email" placeholder="Email" class="form-control input-lg">
								<span class="input-group-btn">
								<button class="btn btn-default btn-lg" type="button"><i class="fa fa-envelope"></i></button>
								</span>
							</div>
						</form>
					</aside>
					
					<aside class="widget widget_social_profiles">
						<h3 class="widget-title">Conectate con nosotros!</h3>
						<ul class="social-profiles">
							<li>
								<a href="<?php echo $this->data['appInfo']['facebook']; ?>" title="Facebook" target="_blank">
									<span class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</li>
							<li>
								<a href="<?php echo $this->data['appInfo']['googleplus']; ?>" title="Google+" target="_blank">
									<span class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</li>
							<li>
								<a href="<?php echo $this->data['appInfo']['twitter']; ?>" title="Twitter" target="_blank">
									<span class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</li>
							<li>
								<a href="<?php echo $this->data['appInfo']['pinterest']; ?>" title="Pinterest" target="_blank">
									<span class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</li>
							<li>
								<a href="<?php echo $this->data['appInfo']['linkedin']; ?>" title="LinkedIn" target="_blank">
									<span class="fa-stack fa-lg">
										<i class="fa fa-circle fa-stack-2x"></i>
										<i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
									</span>
								</a>
							</li>
						</ul>
					</aside>
				</div>
				
				<div class="col-sm-3">
					<aside class="widget widget_text">
						<h3 class="widget-title">Aceptamos</h3>
						<img src="images/payments.png" alt="">
					</aside>
					
					<aside class="widget widget_text">
						<h3 class="widget-title">Envio gratis</h3>
						<p class="free-shipping"><i class="fa fa-plane fa-3x"></i> <span>En compras mayores a $2000 MN</span></p>
					</aside>
				</div>
			</div>
		</div>
		<?php 
		$generalFooter = ob_get_contents();
		ob_end_clean();
		return $generalFooter;
		
	}
	/*
	 * getGeneralCopyright
	 * 
	 * is the last section, under the footer, about who created the website
	 * 
	 * @param NULL
	 * @return string html code
	 */
	public function getGeneralCopyright()
	{
		ob_start();
		$generalCopyRight = ob_get_contents();
		ob_end_clean();
		?>
		<div id="copyright">
			<div class="container">
				&copy; <?php echo date('Y'); ?> <?php echo $this->data['appInfo']['title']; ?> | All Rights Reserved | Designed by   
				<a href="<?php echo $this->data['appInfo']['creator_url']; ?>" target="_blank"><?php echo $this->data['appInfo']['creator']; ?></a>		
			</div>
		</div>
		<?php 
		return $generalCopyRight;
	}
	
	/*
	 * getGeneralSeoScipts
	 * 
	 * this is basically the script that Google gives you for index
	 * 
	 * @param NULL
	 * @return string javascript code
	 */
	public static function getGeneralSeoScripts()
	{
		ob_start();
		?>
		<!-- BEGIN GOOGLE ANALYTICS CODEs -->
		<!-- END GOOGLE ANALYTICS CODE -->
		<?php 
		$generalSeoScripts = ob_get_contents();
		ob_end_clean();
		return $generalSeoScripts;
	}
	
	/*
	 * getShoppingCart
	 * 
	 * Probabily the most important function on the website =)
	 * 
	 * @param NULL
	 * @return string HTML code
	 */
	
	public static function getShoppingCart()
	{
		ob_start();
		?>
		<div id="cart-panel" class="panel-left">
			<aside class="widget_shopping_cart">
				<h3>Shopping Cart</h3>
				<ul class="cart_list">
					<li>
						<a href="http://coffeecreamthemes.com/themes/perfekta/wordpress/s/flying-ninja/">
							<img alt="" src="http://placehold.it/60x60">
							Reshape Panties
						</a>
						<span class="quantity">1 × <span class="amount">$12.00</span></span>
					</li>
					<li>
						<a href="http://coffeecreamthemes.com/themes/perfekta/wordpress/s/flying-ninja/">
							<img alt="" src="http://placehold.it/60x60">
							Reshape Panties
						</a>
						<span class="quantity">1 × <span class="amount">$12.00</span></span>
					</li>
					<li>
						<a href="http://coffeecreamthemes.com/themes/perfekta/wordpress/s/flying-ninja/">
							<img alt="" src="http://placehold.it/60x60">
							Reshape Panties
						</a>
						<span class="quantity">1 × <span class="amount">$12.00</span></span>
					</li>
				</ul>
				<p class="total"><strong>Subtotal:</strong> <span class="amount">$36.00</span></p>
				<p class="buttons">
				<a class="btn btn-default btn-lg btn-block" href="shopping-cart.html">View Cart</a>
				<a class="btn btn-primary btn-lg btn-block" href="my-account.html">Checkout</a>
				</p>
			</aside>
		</div>
		<?php 
		$cart = ob_get_contents();
		ob_end_clean();
		return $cart;
	}
}