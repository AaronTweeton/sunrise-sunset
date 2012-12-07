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
 */
get_header() ?>
<div class="span12">
	<?php if ( have_posts() ) : ?>
		<?php if (is_archive()) { ?>
		<div class="well">
			<?php
				if ( is_category() ) { ?>
                	<h1>
						<?php _e( single_cat_title() ); ?>
                    </h1>
					<?php _e( category_description() ); ?>
				<?php } elseif ( is_tag() ) { ?>
					<h1>
						<?php _e( single_tag_title() ); ?>
                    </h1>
					<?php _e( tag_description() ); ?>
				<?php } elseif ( is_author() ) { ?>
					<h1>
						<?php the_author(); ?>
					</h1>
                    <?php the_author_meta('description'); ?>
				} elseif ( is_date() ) { ?>
                	<h1>
						<?php if ( is_year() ) {
                            echo get_the_date('Y');
                        } else if ( is_month() ) {
                            echo get_the_date('F Y');
                        } else if ( is_day() ) {
                            echo get_the_date('l, F Y');
                        } ?>
                    </h1>
			<?php }
			}
			?>
		<hr />
	<?php while ( have_posts() ) : the_post(); ?>
		<article>
			<?php echo get_the_post_thumbnail(); ?> 
			<h2><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
			<?php the_excerpt(); ?>
			<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="btn">Read More &raquo;</a></p>
		</article>
		<hr />
		<?php endwhile; ?>
		<ul class="pager">
			<li class="previous">
				<?php previous_posts_link('&laquo; Previous Entries') ?>
			</li>
			<li class="next">
				<?php next_posts_link('Next Entries &raquo;') ?>
			</li>
		</ul>
	
	<?php else : ?>
	<?php endif; // end have_posts() check ?>
	</div>
</div>
<?php get_sidebar(); ?> 

<?php get_footer() ?>
