<?php
/**
 * Sunset functions and definitions
 *
 * @package WordPress
 * @subpackage SunriseSunset
 * @since 1.0
 */

/**
 * Load CSS & JS
 */
 
function theme_styles()  
{ 
	/* Load Bootstrap styles */
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '2.2.1', 'all' );
	wp_enqueue_style( 'bootstrap' );
	wp_register_style( 'bootstrap-responsive', get_template_directory_uri() . '/css/bootstrap-responsive.min.css', array(), '2.2.1', 'all' );
	wp_enqueue_style( 'bootstrap-responsive' );

	/* Load Fonts */
	wp_register_style( 'font-daysone', 'http://fonts.googleapis.com/css?family=Days+One', array(), '1.0', 'all' );
	wp_enqueue_style( 'font-daysone' );
	wp_register_style( 'font-droidserif', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic', array(), '1.0', 'all' );
	wp_enqueue_style( 'font-droidserif' );
	
	/* Load WordPress styles */	
	wp_register_style( 'style', get_template_directory_uri() . '/style.css', array(), '1.0', 'all' );
	wp_enqueue_style( 'style' );
}
add_action('wp_enqueue_scripts', 'theme_styles');

function theme_scripts()  
{ 
	/* Load jQuery */
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js', '', '1.8.3', 'true');
    wp_enqueue_script( 'jquery' );

	/* Load Bootstrap */
    wp_register_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', '2.2.1', 'true');
    wp_enqueue_script( 'bootstrap' );
}
add_action('wp_enqueue_scripts', 'theme_scripts');

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

/**
 * Register Menus
 */

register_nav_menu( 'primary', 'Primary Menu' );



/**
 * Thumbnails
 */
 
if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 150, 150 ); // default Post Thumbnail dimensions   
}

/**
 * Remove pesky width and height attributes from thumbnails 
 */
 
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );

function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}

/**
 * Add "lead" class to first Paragraph
 */
 
function first_paragraph($content){
	return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
add_filter('the_content', 'first_paragraph');

/**
 * The formatted output of a list of pages.
 *
 * Displays page links for paginated posts (i.e. includes the "nextpage".
 * Quicktag one or more times). This tag must be within The Loop.
 *
 * The defaults for overwriting are:
 * 'next_or_number' - Default is 'number' (string). Indicates whether page
 *      numbers should be used. Valid values are number and next.
 * 'nextpagelink' - Default is 'Next Page' (string). Text for link to next page.
 *      of the bookmark.
 * 'previouspagelink' - Default is 'Previous Page' (string). Text for link to
 *      previous page, if available.
 * 'pagelink' - Default is '%' (String).Format string for page numbers. The % in
 *      the parameter string will be replaced with the page number, so Page %
 *      generates "Page 1", "Page 2", etc. Defaults to %, just the page number.
 * 'before' - Default is '<p id="post-pagination"> Pages:' (string). The html 
 *      or text to prepend to each bookmarks.
 * 'after' - Default is '</p>' (string). The html or text to append to each
 *      bookmarks.
 * 'text_before' - Default is '' (string). The text to prepend to each Pages link
 *      inside the <a> tag. Also prepended to the current item, which is not linked.
 * 'text_after' - Default is '' (string). The text to append to each Pages link
 *      inside the <a> tag. Also appended to the current item, which is not linked.
 *
 * @param string|array $args Optional. Overwrite the defaults.
 * @return string Formatted output in HTML.
 */
function custom_wp_link_pages( $args = '' ) {
	$defaults = array(
		'before' => '<div class="pagination pagination-right"><ul>', 
		'after' => '</ul></div>',
		'text_before' => '',
		'text_after' => '',
		'link_before' => '<li>',
		'link_after' => '</li>',
		'next_or_number' => 'number', 
		'nextpagelink' => __( 'Next page' ),
		'previouspagelink' => __( 'Previous page' ),
		'pagelink' => '%',
		'echo' => 1
	);

	$r = wp_parse_args( $args, $defaults );
	$r = apply_filters( 'wp_link_pages_args', $r );
	extract( $r, EXTR_SKIP );

	global $page, $numpages, $multipage, $more, $pagenow;

	$output = '';
	if ( $multipage ) {
		if ( 'number' == $next_or_number ) {
			$output .= $before;
			for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
				$j = str_replace( '%', $i, $pagelink );
				$output .= ' ';
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= $link_before . _wp_link_page( $i );
				else
					$output .= '<li class="active"><span>';

				$output .= $text_before . $j . $text_after;
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= '</a>';
				else
					$output .= '</span></li>';
			}
			$output .= $after;
		} else {
			if ( $more ) {
				$output .= $before;
				$i = $page - 1;
				if ( $i && $more ) {
					$output .= $link_before . _wp_link_page( $i );
					$output .= $text_before . $previouspagelink . $text_after . '</a>' . 'link_after';
				}
				$i = $page + 1;
				if ( $i <= $numpages && $more ) {
					$output .= $link_before . _wp_link_page( $i );
					$output .= $text_before . $nextpagelink . $text_after . '</a>' . 'link_after';
				}
				$output .= $after;
			}
		}
	}

	if ( $echo )
		echo $output;

	return $output;
}


/**
 * Nav menu 
 */
 
class description_walker extends Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth, $args)
      {
			global $wp_query;
			$indent = ( $depth ) ? str_repeat( "t", $depth ) : '';
			
			$class_names = $value = '';
			
			// If the item has children, add the dropdown class for bootstrap
			if ( $args->has_children ) {
				$class_names = "dropdown ";
			}
			
			$classes = empty( $item->classes ) ? array() : (array) $item->classes;
			
			$class_names .= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
			$class_names = ' class="'. esc_attr( $class_names ) . '"';
           
           	$output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           	$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           	$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           	$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           	$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
           	// if the item has children add these two attributes to the anchor tag
           	if ( $args->has_children ) {
				$attributes .= 'class="dropdown-toggle" data-toggle="dropdown"';
			}

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
            $item_output .= $args->link_after;
            // if the item has children add the caret just before closing the anchor tag
            if ( $args->has_children ) {
            	$item_output .= '<b class="caret"></b></a>';
            }
            else{
            	$item_output .= '</a>';
            }
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
            
        function start_lvl(&$output, $depth) {
            $indent = str_repeat("t", $depth);
            $output .= 'n$indent<ul class="dropdown-menu">n';
        }
            
      	function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output )
      	    {
      	        $id_field = $this->db_fields['id'];
      	        if ( is_object( $args[0] ) ) {
      	            $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
      	        }
      	        return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
      	    }
      	
            
}

/**
 * Menu fallback
 */
 
function nav_fallback() {
	echo '<ul class="nav">';
    wp_list_pages( array (
		'title_li'		=>	'',
		'depth'			=>	1,
		'number'		=>	7,
	));
	echo '</ul>';
}

/**
 * Convert menu fallback to Bootstrap styles
 */
function clean_wp_list_pages($menu) {
    $menu = preg_replace('/<div class="menu">/','',$menu); // Remove extra div
    $menu = preg_replace('/<ul>/','<ul class="nav">',$menu); // Add "nav" class to ul
    $menu = preg_replace('/current_page_item/','active',$menu);		
    return $menu;
}
add_filter( 'wp_list_pages', 'clean_wp_list_pages' );

/**
 * Breadcrumbs
 */
 
function the_breadcrumb() {
	global $post;
	echo '<ul class="breadcrumb">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo '</a></li><span class="divider">/</span>';
		if (is_category() || is_single()) {
			echo '<li>';
			the_category(' </li><span class="divider">/</span><li> ');
			if (is_single()) {
				echo '</li><span class="divider">/</span><li>';
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			if ($post->post_parent) {
				$parent_title = get_the_title($post->post_parent);
				if ( $parent_title != the_title(' ', ' ', false) ) {
				  echo '<a href=' . get_permalink($post->post_parent)
					. ' ' . 'title=' . $parent_title . '>' . $parent_title
					. '</a><span class="divider">/</span>';
				} 
			}
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
	echo '</ul>';
}


?>