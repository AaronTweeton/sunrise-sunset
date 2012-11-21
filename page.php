<?php
/**
 * The home template file.
 *
 * @package WordPress
 * @subpackage SunriseSunset
 * @since 1.0
 * 
 * @todo	Breadrcrumb should display parent link
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
				<?php the_content();?>
			</article>
		<?php endwhile; ?>
		
		<?php
		$children = wp_list_pages( array(
			'title_li'	=>	'',
			'child_of'	=>	$post->ID,
			'echo'		=>	0,
			'depth'		=>	1
		));
		if ($children) { ?>
		<ul class="nav nav-pills">
		<?php echo $children; ?>
		</ul>
		<?php } ?>
		
		<?php else : ?>    
		<?php endif; // end have_posts() check ?>
		</div>
	</div>
</div>	    
<?php get_sidebar(); ?> 

<?php get_footer() ?>
