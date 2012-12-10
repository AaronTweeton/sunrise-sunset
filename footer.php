<?php
/**
 * The template for displaying the footer.
 *
 * @package WordPress
 * @subpackage SunriseSunset
 * @since 1.0
 */
?>
    <hr>
    <footer>
    	<div class="row-fluid">
        	<div class="span6">
                <p><small>&copy; <?php echo date('Y') . ' ' . get_bloginfo('name'); ?></small></p>
                <?php dynamic_sidebar( 'copyright' ); ?>
			</div>
            <div class="span6">
				<?php wp_nav_menu( array(
                    'theme_location'	=> 'footer',
                    'fallback_cb'		=> '',
                    'depth'				=>	1,
                    'container'			=>	FALSE,
                    'menu_class'		=>	'nav nav-pills pull-right',
                )); ?>
			</div>
		</div>
    </footer>
</div><!-- /container -->

<?php wp_footer(); ?>
</body>
</html>
