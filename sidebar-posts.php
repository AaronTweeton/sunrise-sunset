<?php
/**
 * The Sidebar containing posts area.
 *
 * @package WordPress
 * @subpackage SunriseSunset
 * @since 1.0
 */
?>
</div><!-- /primary row-fluid -->
<div class="row secondary" id="secondary">    
	<?php
	$the_query = new WP_Query( array (
		'posts_per_page'		=>	3,
		'ignore_sticky_posts'	=>	1,
		'offset'				=>	1
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
