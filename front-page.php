<?php
/**
 * The home template file.
 *
 * @package WordPress
 * @subpackage SunriseSunset
 * @since 1.0
 */
get_header() ?> 
	<div class="row">
		<div class="span12">
			<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<div class="hero-unit">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>        
			<?php else : ?>
			<?php endif; // end have_posts() check ?>
		</div>	
	</div>        
	<?php get_sidebar(); ?> 
<?php get_footer() ?>