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
		<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
			<?php 
				// Check if thumbnail exists
				if ( has_post_thumbnail() ) { ?>
					<figure>
					<?php
					// Then, check if mobile - if so, send smaller featured image
					if ( wp_is_mobile() ) {
						the_post_thumbnail('small', array (
							'class'	=> 'alignright',
						));
					} else {
						the_post_thumbnail('large', array (
							'class'	=> 'alignright',
						));
					} ?>
					</figure>
			<?php } ?>
		
			<div class="entry-content clearfix">				
				<?php the_content(); ?>
			</div>
		</article>
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
