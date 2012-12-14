<?php
/**
 * Adds SunriseSunset_Quote_Widget widget.
 *
 * @package WordPress
 * @subpackage SunriseSunset
 * @since 1.1
 * 
 * @todo	Need to be able to make posts_per_page variable from admin
 */
 
class SunriseSunset_Quote_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	public function __construct() {
		parent::__construct(
	 		'sunrisesunset_quote_widget', // Base ID
			'Quote Widget', // Name
			array( 'description' => __( 'A widget that displays an quote', 'text_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );

		echo $before_widget;
		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title; 
		
		// Start widget output	
		// The Query
		$args = array(
			'posts_per_page' => 1,
			'tax_query' => array(
				array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => array( 'post-format-quote' )
				)
			)
		);
		$the_query = new WP_Query( $args );
		
		// The Loop
		while ( $the_query->have_posts() ) : $the_query->the_post();
			// Strip out any footnote references which are located within []
			$content = get_the_content();
			echo preg_replace ('/\[.*?\]/', '', $content); ?>
			<a class="btn" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e( 'Read more', sunrisesunset ) ?> &raquo;</a>
		<?php endwhile;
		
		// Reset Post Data
		wp_reset_postdata();

		// End widget output 
		echo $after_widget;
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );

		return $instance;
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
		<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<?php 
	}

} // class SunriseSunset_Quote_Widget


// register SunriseSunset_Quote_Widget widget
register_widget( 'SunriseSunset_Quote_Widget' );

?>