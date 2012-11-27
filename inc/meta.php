<?php custom_wp_link_pages(); ?>
<p><?php the_tags( 'Tags: <span class="badge">', '</span> <span class="badge">', '</span>' ); ?></p>
<p><?php
_e('Categories: ','sunrisesunset');
$categories = get_the_category();
$separator = ' ';
$output = '';
if($categories){
	foreach($categories as $category) {
		$output .= '<span class="badge"><a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</span></a>'.$separator;
	}
echo trim($output, $separator);
}
?>
</p>