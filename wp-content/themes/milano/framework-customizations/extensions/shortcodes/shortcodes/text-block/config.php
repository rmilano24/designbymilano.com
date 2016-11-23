<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$cfg = array();

$cfg['page_builder'] = array(
	'title'          => esc_html__( 'Text Block', 'modesto' ),
	'description'    => esc_html__( 'Add a Text Block', 'modesto' ),
	'tab'            => esc_html__( 'Content Elements', 'modesto' ),
	'popup_size'     => 'large',
	'title_template' => '{{- title }}<div>{{= o.text }}</div>',
);
