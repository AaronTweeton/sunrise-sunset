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
<div class="row primary">
	<div class="span12">
    	<div class="well">
		<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : the_post(); ?>
            <?php the_breadcrumb(); ?>
            <article class="hentry">
				<header>
					<hgroup>
						<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
						<h4><?php _e('Published on ','sunrisesunset')?>
							<time class="updated" datetime="<?php echo get_the_time('Y-m-d H:i:sO', $post->ID); ?>" pubdate><?php the_time(get_option('date_format')); ?></time>
							<span class="byline author vcard"><?php _e(' by ','sunrisesunset')?><span class="fn"><?php the_author() ?></span></span>
						</h4>
					</hgroup>
				</header>
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
                <?php custom_wp_link_pages(); ?>
                <p><?php the_tags( 'Tags: <span class="badge">', '</span> <span class="badge">', '</span>' ); ?></p>
				<p><?php
				_e('Categories: ','sunrisesunset');
				$categories = get_the_category();
				$separator = ' ';
				$output = '';
				if($categories){
					foreach($categories as $category) {
						$output .= '<span class="badge"><a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</span></a>'.$separator;
					}
				echo trim($output, $separator);
				}
				?></p>

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
