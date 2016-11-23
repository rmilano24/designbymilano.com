<?php if ( ! defined( 'ABSPATH' ) ) {
	die( 'Direct access forbidden.' );
}

/**
 * @var $button_text
 */
?>

<form class="contact-form" method="post" data-title="<?php esc_html_e('THANK YOU!','modesto') ?>" data-message="<?php esc_html_e('Your email is very important to us. One of our representatives will contact you at first chance.', 'modesto') ?>">
	<div class="input-wrapper">
		<input name="name" class="input" type="text" required />
		<label><?php esc_html_e( 'Enter name', 'modesto' ) ?></label>
		<span></span>
	</div>
	<div class="input-wrapper">
		<input name="email" class="input" type="email" required />
		<label><?php esc_html_e( 'Enter email', 'modesto' ) ?></label>
		<span></span>
	</div>
	<div class="input-wrapper">
		<textarea name="message" class="input" required></textarea>
		<label><?php esc_html_e( 'Enter message', 'modesto' ) ?></label>
		<span></span>
	</div>
	<button class="button type-2"><?php echo esc_attr( $button_text ) ?></button>
</form>
