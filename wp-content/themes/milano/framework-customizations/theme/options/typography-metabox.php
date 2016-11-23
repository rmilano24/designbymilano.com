<?php
$custom_font_pairs = fw_get_db_settings_option( 'font_pairs' );
if ( is_array( $custom_font_pairs ) ) {
	foreach ( $custom_font_pairs as $single_pair ) {
		$settings[] = $single_pair['title'];
	}
}

$settings['999'] = esc_html__( 'Default', 'modesto' );
$options[]       = array(
	'font_pairs' => array(
		'type'        => 'select',
		'value'       => '999',
		'label'       => esc_html__( 'Custom font settings', 'modesto' ),
		'desc'        => esc_html__( 'Pick custom fonts pair for this page.', 'modesto' ),
		'help'        => esc_html__( 'You can add new pairs in "Typography" section of theme settings', 'modesto' ),
		'choices'     => $settings,
		'no-validate' => false,
	)
);