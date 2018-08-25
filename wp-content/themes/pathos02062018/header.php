<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since 1.0
 * @version 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 

	$page_banner = get_template_directory_uri(). "/assets/images/oils-banner.jpg";
	if( is_tax() ) {
		$termObj 	= get_queried_object();
		$termID		= $termObj->term_id;
		$termImg 	= get_field('banner_image_mgmt', $termObj);
		if( is_array($termImg) && trim($termImg["url"]) != '' ){ $page_banner = $termImg["url"]; }
	} else if ( is_page()) {
		global $post;
		$bannerImg 	= get_field('banner_image_mgmt', $post->ID);
		if( is_array($bannerImg) && trim($bannerImg["url"]) != '' ){ $page_banner = $bannerImg["url"]; }
	}
?>


	<section class="header en-header mx-auto bg-white py-1">
		<div class="row">
			<div class="col-md-3">
				<a href="<?php echo site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/new-logo.png" alt="" class="logo"></a>
			</div> <!--col end-->
			<div class="col-md-8 d-flex pl-5">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/images/strap.jpg" alt="" class="img-fluid logo-text align-self-center">
			</div> <!--col end-->
			<div class="col-md-1 p-0">
			<?php dynamic_sidebar( 'multilanguage-switcher' ); ?>
				<div class="header-flag">
					
					<!--<a href="javascript:void(0);" class="lang-fr"></a>
					<a href="javascript:void(0);"class="lang-en"></a>-->
				</div>
			</div> <!--col end-->
		</div>
	</section>
	<nav class="navbar bg-white mx-auto ">
		<div class="row">
			<div class="col-md-3 pr-0">
				<button id="menu-button" class="menu " type="button"> <i id="icon-bar1"></i> <i id="icon-bar2"></i> <i id="icon-bar3"></i> </button>
				<?php
				wp_nav_menu( array( 'menu' => 'main_menu', 'container' => false, 'menu_id' => 'menu-responsive', 'menu_class'=>'nav flex-column', 'theme_location'=>'primary-menu' ) ); 
				/* ?>
				<ul class="nav flex-column" id="menu-responsive">
					<li class="nav-item"><a href="index.html" class="navfont">welcome</a></li>
					<li class="nav-item"><a href="products.html" class="navfont">product catalogue/photos</a></li>
					<li class="nav-item"><a href="oils-vinegars.html" class="navfont">OILS, VINEGARS & COOKING WINES</a></li>
					<li class="nav-item"><a href="olives-antipasti.html" class="navfont">olives &amp; antipasti</a></li>
					<li class="nav-item"><a href="condiments-tomatoes.html" class="navfont">condiments, sauces &amp; tomato products</a></li>
					<li class="nav-item"><a href="vegetables-pulses.html" class="navfont">tinned vegetables, beans &amp; pulses</a></li>
					<li class="nav-item"><a href="pasta-rice-grains.html" class="navfont">pasta, rice &amp; grains</a></li>
					<li class="nav-item"><a href="continental-cheeses.html" class="navfont">continental cheeses</a></li>
					<li class="nav-item"><a href="tuna-other.html" class="navfont">OTHER SPECIALITY PRODUCTS</a></li>
					<li class="nav-item"><a href="contact-customer-services.html" class="navfont">contact/customer services</a></li>
				</ul>
			<?php */ ?>
			</div> <!--col end-->
			<div class="col-md-9 pl-5 d-flex">
				<img src="<?php echo $page_banner; ?>" alt="" class="img-fluid w-100"/>
			</div> <!--col end--->
		</div>
	</nav>
	<table class="home-table2" width="980" border="0" align="center" cellpadding="0" cellspacing="0">
		<tr>
			<td bgcolor="#FFFFFF"><!-- InstanceBeginEditable name="content" -->
