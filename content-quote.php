<article id="post-<?php the_ID(); ?>" <?php post_class('hentry'); ?>>
	<header>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
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