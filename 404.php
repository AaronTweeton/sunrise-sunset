<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage SunriseSunset
 * @since 1.0.1
 */
get_header() ?> 
<div class="row primary">
	<div class="span12">
    	<div class="well">
            <article>
                <h1><?php _e( 'Looks like you &lsquo;once was lost&rsquo;.', 'sunrisesunset' ); ?></h1>
                <p><?php _e( 'Perhaps searching, or one of the links below, can help.', 'sunrisesunset' ); ?></p>
					<?php get_search_form(); ?>
			</article>
		</div>
    </div>
</div>
<?php get_sidebar(); ?> 
<?php get_footer() ?>
