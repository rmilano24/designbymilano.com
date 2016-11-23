<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

class Modesto_Widget_Vcard extends WP_Widget {

	/**
	 * Mandatory constructor needs to call the parent constructor with the
	 * following params: id (if false, one will be generated automatically),
	 * the title of the widget (can be translated, of course), and last, params
	 * to further configure the widget.
	 * see https://codex.wordpress.org/Widgets_API for more info
	 */
	public function __construct() {
		parent::__construct(
			false,
			__( 'Theme widget: vCard', 'modesto' ), array( 'classname' => 'w-card' )
		);
	}

	public function widget( $args, $instance ) {

		echo $args['before_widget'];
		$title = empty( $instance['title'] ) ? '' : apply_filters( 'widget_title', $instance['title'] );
		if ( ! empty( $title ) ) {
			echo $args['before_title'];
			echo esc_html( $title );
			echo $args['after_title'];
		}
		$fields = $this->widget_vcard_fields();

		foreach ( $fields as $name => $label ) {
			if ( ! isset( $instance[ $name ] ) ) {
				$instance[ $name ] = '';
			}
		}
		?>

		<div class="vcard">
			<p class="w-card__item">
				<?php if ( $instance['firstname'] || $instance['lastname'] || $instance['job'] ) { ?>
					<span class="fn"><?php echo esc_html( $instance['firstname'] ) . ' ' . esc_html( $instance['lastname'] );
						if ( $instance['job'] ) {
							echo ' - ' . esc_html( $instance['job'] );
						} ?>
		</span>
				<?php } ?>
			</p>
			<p class="w-card__item">
				<?php if ( $instance['company'] ) { ?><span class="company-name"><?php echo esc_html( $instance['company'] ); ?>, </span>
				<?php }
				if ( $instance['street_address'] ) { ?><span class="street-address"><?php echo esc_html( $instance['street_address'] ); ?>, </span>
				<?php }
				if ( $instance['locality'] ) { ?><span class="locality"> <?php echo esc_html( $instance['locality'] ); ?>, </span>
				<?php }
				if ( $instance['region'] ) { ?> <span class="region"><?php echo esc_html( $instance['region'] ); ?>, </span>
				<?php }
				if ( $instance['postal_code'] ) { ?> <span class="postal-code"><?php echo esc_html( $instance['postal_code'] ); ?></span> <?php } ?>
			</p>
			<?php if ( $instance['tel'] ) { ?>
				<p class="w-card__item">
					<?php esc_html_e( 'Tel', 'modesto' ); ?>: <a class="mouseover-simple" href="tel:<?php echo esc_html( $instance['tel'] ); ?>"><?php echo esc_html( $instance['tel'] ); ?></a>
				</p>
			<?php } ?>
			<?php if ( $instance['email'] ) { ?>
				<p class="w-card__item">
					<?php esc_html_e( 'E-Mail', 'modesto' ); ?>: <a class="mouseover-simple email" href="<?php echo esc_url( $instance['email'] ); ?>"><?php echo esc_url( $instance['email'] ); ?></a>
				</p>
			<?php } ?>
		</div>
		<div class="content-vcard">
			<?php $button_text = ( isset( $instance['button_text'] ) && ! ( '' === $instance['button_text'] ) ) ? $instance['button_text'] : esc_html__( 'Download vcard file', 'modesto' ); ?>
			<form method="POST" action="<?php echo get_template_directory_uri() ?>/inc/includes/vcard/vcard.php">
				<input type="hidden" name="email1" value="<?php echo esc_attr( $instance['email'] ); ?>" class="hidden"/>
				<input type="hidden" name="office_tel" value="<?php echo esc_attr( $instance['tel'] ); ?>" class="hidden"/>
				<input type="hidden" name="work_postal_code" value="<?php echo esc_attr( $instance['postal_code'] ); ?>" class="hidden"/>
				<input type="hidden" name="work_city" value="<?php echo esc_attr( $instance['region'] ); ?>" class="hidden"/>
				<input type="hidden" name="work_address" value="<?php echo esc_attr( $instance['street_address'] ); ?>" class="hidden"/>
				<input type="hidden" name="title" value="<?php echo esc_attr( $instance['job'] ); ?>" class="hidden"/>
				<input type="hidden" name="company" value="<?php echo esc_attr( $instance['company'] ); ?>" class="hidden"/>
				<input type="hidden" name="last_name" value="<?php echo esc_attr( $instance['lastname'] ); ?>" class="hidden"/>
				<input type="hidden" name="first_name" value="<?php echo esc_attr( $instance['firstname'] ); ?>" class="hidden"/>
				<button class="button type-3" id="vcard-download"><?php echo esc_html( $button_text ); ?></button>
			</form>
		</div>
		<?php
		echo $args['after_widget'];
	}

	function update( $new_instance, $old_instance ) {
		$instance = array_map( 'strip_tags', $new_instance );

		return $instance;
	}

	function form( $instance ) {

		$fields = $this->widget_vcard_fields();

		foreach ( $fields as $name => $label ) {
			${$name} = isset( $instance[ $name ] ) ? esc_attr( $instance[ $name ] ) : '';
			?>
			<p>
				<label
					for="<?php echo esc_attr( $this->get_field_id( $name ) ); ?>"><?php echo esc_html( $label ); ?></label>
				<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( $name ) ); ?>"
				       name="<?php echo esc_attr( $this->get_field_name( $name ) ); ?>" type="text"
				       value="<?php echo( ${$name} ); ?>">
			</p>
			<?php
		}
	}

	public function widget_vcard_fields() {
		$fields = array(
			'title'          => __( 'Title', 'modesto' ),
			'firstname'      => __( 'First name', 'modesto' ),
			'lastname'       => __( 'Last name', 'modesto' ),
			'job'            => __( 'Job', 'modesto' ),
			'company'        => __( 'Company', 'modesto' ),
			'street_address' => __( 'Street Address', 'modesto' ),
			'locality'       => __( 'City/Locality', 'modesto' ),
			'region'         => __( 'State/Region', 'modesto' ),
			'postal_code'    => __( 'Zipcode/Postal Code', 'modesto' ),
			'tel'            => __( 'Telephone', 'modesto' ),
			'email'          => __( 'Email', 'modesto' ),
			'button_text'    => __( 'Dowload button text', 'modesto' ),
		);

		return $fields;
	}
}


