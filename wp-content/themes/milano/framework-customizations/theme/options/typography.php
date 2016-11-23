<?php

$options[] = array(
	'font_pairs' => array(
		'label'         => esc_html__( 'Font pairs', 'modesto' ),
		'popup-title'   => esc_html__( 'Add/Edit Font pair', 'modesto' ),
		'type'          => 'addable-popup',
		'template' => '{{- title }}',
		'desc'          => false,
		'popup-options' => array(
			'title'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Font pair Title', 'modesto' ),
				'desc'  => esc_html__( 'Set title for font pair', 'modesto' ),
				'value'=> 'pair'.fw_unique_increment()
			),
			'font_1' => array(
				'type'       => 'typography',
				'components' => array(
					'family' => true,
					'size'   => false,
					'style'  => false,
					'color'  => false
				),
				'label'      => esc_html__( 'Main font', 'modesto' ),
			),
			'font_2' => array(
				'type'       => 'typography',
				'components' => array(
					'family' => true,
					'size'   => false,
					'style'  => false,
					'color'  => false
				),
				'label'      => esc_html__( 'Accent font', 'modesto' ),
			),
		)
	),
);