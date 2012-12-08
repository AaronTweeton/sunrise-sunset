<?php
/**
 * SunriseSunset functions and definitions
 *
 * @package WordPress
 * @subpackage SunriseSunset
 * @since 1.1
 */

/**
 * Register Sidebars
 */
register_sidebar(array(
	'name'			=> __( 'Secondary Left' ),
	'id'			=> 'secondary-left',
	'description'	=> __( 'Widgets in this area will be shown in the Secondary area on the left-hand side.' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'	=> '<h2>',
	'after_title'	=> '</h2>'
	
)); 
register_sidebar(array(
	'name'			=> __( 'Secondary Center' ),
	'id'			=> 'secondary-center',
	'description'	=> __( 'Widgets in this area will be shown in the Secondary area in the center.' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'	=> '<h2>',
	'after_title'	=> '</h2>'
)); 
register_sidebar(array(
	'name'			=> __( 'Secondary Right' ),
	'id'			=> 'secondary-right',
	'description'	=> __( 'Widgets in this area will be shown in the Secondary area on the right-hand side.' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'	=> '<h2>',
	'after_title'	=> '</h2>'
)); 
register_sidebar(array(
	'name'			=> __( 'Footer' ),
	'id'			=> 'footer',
	'description'	=> __( 'Widgets in this area will be shown in the Footer area at the very bottom.' ),
	'before_widget' => '<div id="%1$s" class="widget %2$s">',
	'after_widget'  => '</div>',
	'before_title'	=> '<h2>',
	'after_title'	=> '</h2>'
)); 

/**
 * Register Menus
 */
register_nav_menu( 'primary', 'Primary Menu' );
register_nav_menu( 'footer', 'Footer Menu' );

?>