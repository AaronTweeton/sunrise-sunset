<?php
/**
 * The home template file.
 *
 * @package WordPress
 * @subpackage SunriseSunset
 * @since 1.0
 */
get_header() ?> 
<div class="span12">
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="hero-unit">
			<?php 
			// Check if thumbnail exists
			if ( has_post_thumbnail() ) { 
				
				// Then, check if mobile - if so, send smaller featured image
				if ( wp_is_mobile() ) {
					the_post_thumbnail('small', array (
						'class'	=> 'alignright',
					));
				} else {
					the_post_thumbnail('large', array (
						'class'	=> 'alignright',
					));
				}
			} 
			?>
			<?php the_content(); ?>
		</div>
	<?php endwhile; ?>        
	<?php else : ?>
	<?php endif; // end have_posts() check ?>
</div>	
<?php get_sidebar(); ?> 
<?php get_footer() ?>