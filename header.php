<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package WordPress
 * @subpackage SunriseSunset
 * @since 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
	<?php wp_head(); ?>    
</head>
<body <?php body_class($class); ?>>

<div class="navbar navbar-inverse navbar-fixed-top access">
	<div class="navbar-inner">
		<div class="container">
			 <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			<a class="brand" href="<?php echo home_url(); ?>"><?php echo bloginfo('name'); ?></a>
			
			<div class="nav-collapse collapse">
				<ul class="nav">
					<?php wp_nav_menu( array(
						'fallback_cb'     => 'nav_fallback'			
					)); ?>
				</ul>
			</div>
		</div>
	</div>
</div>

<div class="container">
