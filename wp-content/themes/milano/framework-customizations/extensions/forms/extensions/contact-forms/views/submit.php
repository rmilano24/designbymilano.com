<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var int    $form_id
 * @var string $submit_button_text
 * @var array  $extra_data
 */
?>
<div>
	<div class="empty-space col-xs-b10"></div>
	<button type="submit" class="button type-3"><?php echo esc_attr( $submit_button_text ) ?></button>
</div>