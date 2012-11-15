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
 * @subpackage Sunset
 * @since 1.0
 */
get_header() ?> 
   
    <?php if ( have_posts() ) : ?>
    
    <?php while ( have_posts() ) : the_post(); ?>
        <!-- Main hero unit for a primary marketing message or call to action -->
        <div>
            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <?php the_content(); ?>
        </div>
    
    <?php endwhile; ?>
    <?php else : ?>    
    <?php endif; // end have_posts() check ?>
    
    <div class="row tertiary" id="tertiary">
        <div class="span4">
	        <?php dynamic_sidebar( 'secondary-left' ); ?>
        </div>
        <div class="span4">
	        <?php dynamic_sidebar( 'secondary-center' ); ?>
        </div>
        <div class="span4">
	        <?php dynamic_sidebar( 'secondary-right' ); ?>
        </div>
    </div>    

<?php get_footer() ?>
