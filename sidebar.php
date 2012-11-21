<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage SunriseSunset
 * @since 1.0
 */
?>
<div class="row secondary" id="secondary">
	<div class="span4">
		<div class="well">
			<?php dynamic_sidebar( 'secondary-left' ); ?>
		</div>
	</div>
	<div class="span4">
		<div class="well">
			<?php dynamic_sidebar( 'secondary-center' ); ?>
		</div>
	</div>
	<div class="span4">
		<div class="well">
			<?php dynamic_sidebar( 'secondary-right' ); ?>
		</div>
	</div>
</div>    