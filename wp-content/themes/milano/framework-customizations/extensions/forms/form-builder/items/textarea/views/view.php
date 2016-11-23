<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * @var array $item
 * @var array $attr
 */

$options       = $item['options'];
$tooltip_class = $tooltip_text = '';

if ( $options['info'] ) {
$tooltip_class = 'js-tooltip';
$tooltip_text = esc_html($options['info']);
}

?>
<div class="<?php echo esc_attr( fw_ext_builder_get_item_width( 'form-builder', $item['width'] . '/frontend_class' ) ) ?>">
	<div class="input-wrapper">
		<textarea  <?php echo fw_attr_to_html( $attr ) ?> class="input <?php echo esc_attr( $tooltip_class ) ?>" data-title="<?php echo esc_attr( $tooltip_text ); ?>"><?php echo fw_htmlspecialchars( $value ) ?></textarea>
		<label for="<?php echo esc_attr( $attr['id'] ) ?>"><?php echo fw_htmlspecialchars( $item['options']['label'] ) ?>
			<?php if ( $options['required'] ): ?><sup>*</sup><?php endif; ?>
		</label>
		<span></span>
	</div>
</div>