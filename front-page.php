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
				<!-- Main hero unit for a primary marketing message or call to action -->
				<div class="hero-unit">
					<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>        
			<?php else : ?>
			<?php endif; // end have_posts() check ?>
		</div>	
	</div>
        
	<?php get_sidebar(); ?> 

<?php get_footer() ?>
