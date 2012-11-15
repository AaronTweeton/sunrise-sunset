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
        <div class="hero-unit">
            <h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
            <?php if ( is_single() ) {
				the_content();
				} else {
				the_excerpt(); 
				} ?>
            <p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="btn btn-primary btn-large">Learn more &raquo;</a></p>
        </div>
    
    <?php endwhile; ?>
        
    <?php else : ?>
    
    <?php endif; // end have_posts() check ?>

    <div class="row secondary" id="secondary">    
		<?php
    
        $the_query = new WP_Query( array (
            'posts_per_page'	=>	3,
            'offset'			=>	1
            ));
        
        while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
            <div class="span4">
                <h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
                <?php the_excerpt(); ?>
                <p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="btn">Learn more &raquo;</a></p>            
            </div>
        <?php endwhile;
        
        // Reset Post Data
        wp_reset_postdata();
        ?>
	</div>
    
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
