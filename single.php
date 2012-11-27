<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * For example, it puts together the home page when no home.php file exists.
 *
 * @package WordPress
 * @subpackage SunriseSunset
 * @since 1.0
 *
 * @todo	Fix center-aligned image so the text isn't wrapping around it.
 * @todo	Headlines should clear image floats
 */
get_header() ?> 
<div class="span12">
	<div class="well">
	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>
		<?php the_breadcrumb(); ?>
		<?php get_template_part( 'content', get_post_format() ); ?>
		<?php get_template_part( 'inc/meta' ); ?>
	<?php endwhile; ?>
	<ul class="pager">
		<li class="previous">
			<?php previous_post_link('%link', '&laquo; %title', TRUE, ''); ?> 
		</li>
		<li class="next">
			<?php next_post_link('%link', '%title &raquo;', TRUE, ''); ?> 
		</li>
	</ul>
	<?php else : ?>    
	<?php endif; // end have_posts() check ?>
	</div>
</div>
<?php get_sidebar(); ?> 

<?php get_footer() ?>
