<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */

if ( '2' === $atts['columns'] ) {
	$column_class = '6';
} elseif ( '3' === $atts['columns'] ) {
	$column_class = '4';
} elseif ( '4' === $atts['columns'] ) {
	$column_class = '3';
} elseif ( '5' === $atts['columns'] ) {
	$column_class = '2';
} elseif ( '6' === $atts['columns'] ) {
	$column_class = '2';
} else {
	$column_class = '12';
}

$add_class     = fw_akg( 'add_class', $atts );
$margin_bottom = fw_akg( 'margin_class', $atts, '' );
if ( ! empty( $margin_bottom ) ) {
	$add_class .= ' custom-space col-sm-' . $margin_bottom;
}
$add_style = fw_akg( 'inline_style', $atts );

if ( ! empty( $add_style ) ) {
	if ( substr_count( $add_style, 'style=' ) > 0 ) {
		$custom_style = $add_style;
	} else {
		$custom_style = 'style=' . $add_style . '"';
	}
} else {
	$custom_style = '';
}

$animation = fw_akg('animation',$atts);
if(!empty($animation)){
	wp_enqueue_script( 'modesto-aos-animation' );
	$animation_data = 'aos="'.esc_attr($animation).'"';
}else{
	$animation_data = '';
}

?>
<div class="crumina-block <?php echo esc_attr( $add_class ) ?>" <?php echo( $custom_style ) ?> <?php echo( $animation_data ) ?>>
	<div class="row nopadding">
		<?php foreach ( $atts['slides'] as $single_slide ) {
			$url = modesto_gen_link_for_shortcode( $single_slide );
			?>
			<div class="col-xs-6 col-sm-<?php echo esc_attr( $column_class ); ?> client-entry-wrapper">
				<?php $logo_inner = '<img class="client-logo" src="' . fw_resize( $single_slide['client_logo']['url'] ) . '" alt="' . $single_slide['client_name'] . '">';
				if ( ! empty( $single_slide['popup_image'] ) ) {
					$logo_inner .= '<span class="client-thumbnail"><img src="' . esc_url( $single_slide['popup_image']['url'] ) . '" alt="' . $single_slide['client_name'] . '"></span>';
				}
				if ( ! empty( $url['link'] ) ) {
					$link_attributes = array(
						'href'   => esc_url( $url['link'] ),
						'target' => esc_attr( $url['target'] ),
						'class'  => 'client-entry',
						'title'  => $single_slide['client_name']
					);
					echo fw_html_tag( 'a', $link_attributes, $logo_inner );
				} else {
					echo fw_html_tag( 'div', array( 'class' => 'client-entry' ), $logo_inner );
				} ?>
			</div>
		<?php } ?>
	</div><!--.row-->
</div>
