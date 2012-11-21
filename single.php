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
 * @todo	Add arrows to pagination
 * @todo	Fix Categories to appear more like Tags.
 * @todo	Add Author information
 * @todo	Fix center-aligned image so the text isn't wrapping around it.
 * @todo	Add margins & padding to images
 * @todo	Headlines should clear image floats
 */
get_header() ?> 
<div class="row primary">
	<div class="span12">
    	<div class="well">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
            <?php the_breadcrumb(); ?>
            <article>
                <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                <?php the_content(); ?>
                <?php custom_wp_link_pages(); ?>
                <?php the_tags( 'Tags: <span class="badge">', '</span> <span class="badge">', '</span>' ); ?>
                <?php the_category(); ?>
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
</div>
<?php get_sidebar(); ?> 

<?php get_footer() ?>
