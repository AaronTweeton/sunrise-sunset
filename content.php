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
</article>