<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var string $title
 * @var string $subtitle
 */

if ( empty( $title ) ) {
	return;
}
?>
<div class="<?php echo fw_ext_builder_get_item_width('form-builder', '1_1/frontend_class') ?> form-builder-item">
	<div class="header title">
		<h5><?php echo esc_html( $title ); ?></h5>
		<?php if ( ! empty( $subtitle ) ) : ?>
			<div class="empty-space col-xs-b15"></div>
			<p><?php echo esc_html( $subtitle ); ?></p>
		<?php endif ?>
	</div>
</div>