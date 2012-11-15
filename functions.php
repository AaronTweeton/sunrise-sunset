<?php
/**
 * Sunset functions and definitions
 *
 * @package WordPress
 * @subpackage Sunset
 * @since 1.0
 */

/**
 * Load CSS & JS
 */
 
function theme_styles()  
{ 
	/* Load Twenty Twelve parent styles */
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'bootstrap' );
	wp_register_style( 'bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.min.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'bootstrap-responsive' );
}
add_action('wp_enqueue_scripts', 'theme_styles');

/**
 * Register Sidebars
 */
register_sidebar(array(
	'name'			=> __( 'Secondary Left' ),
	'id'			=> 'secondary-left',
	'description'	=> __( 'Widgets in this area will be shown in the Secondary area on the left-hand side.' ),
	'before_title'	=> '<h2>',
	'after_title'	=> '</h2>'
)); 
register_sidebar(array(
	'name'			=> __( 'Secondary Center' ),
	'id'			=> 'secondary-center',
	'description'	=> __( 'Widgets in this area will be shown in the Secondary area in the center.' ),
	'before_title'	=> '<h2>',
	'after_title'	=> '</h2>'
)); 
register_sidebar(array(
	'name'			=> __( 'Secondary Right' ),
	'id'			=> 'secondary-right',
	'description'	=> __( 'Widgets in this area will be shown in the Secondary area on the right-hand side.' ),
	'before_title'	=> '<h2>',
	'after_title'	=> '</h2>'
)); 

/**
 * Add "lead" class to first Paragraph
 */
 
function first_paragraph($content){
	return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
add_filter('the_content', 'first_paragraph');

?>