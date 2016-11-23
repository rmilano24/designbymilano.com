<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'client'    => array(
		'label' => esc_html__( 'Client', 'modesto' ),
		'type'  => 'text',
		'value' => '',
		'desc'  => esc_html__( 'Name of client', 'modesto' ),
	),
	'team_box'  => array(
		'type'          => 'popup',
		'label'         => esc_html__( 'Project stuff', 'modesto' ),
		'desc'          => esc_html__( 'Members who worked on project', 'modesto' ),
		'popup-title'   => esc_html__( 'Project stuff', 'modesto' ),
		'button'        => esc_html__( 'Edit members', 'modesto' ),
		'size'          => 'small', // small, medium, large
		'popup-options' => array(
			'title' => array(
				'label' => esc_html__( 'Title', 'modesto' ),
				'type'  => 'text',
				'value' => esc_html__( 'Who worked:', 'modesto' ),
			),
			'team'  => array(
				'type'            => 'addable-box',
				'label'           => false,
				'desc'            => esc_html__( 'Members who worked on project', 'modesto' ),
				'box-options'     => array(
					'profession' => array( 'type' => 'text', 'label' => esc_html__( 'Profession', 'modesto' ), ),
					'name'       => array( 'type' => 'text', 'label' => esc_html__( 'Name', 'modesto' ), ),
				),
				'template'        => 'Staff: {{- profession }}', // box title
				'limit'           => 0, // limit the number of boxes that can be added
				'add-button-text' => esc_html__( 'Add project member', 'modesto' ),
				'sortable'        => true,
			),
		),
	),
	'works-box' => array(
		'type'          => 'popup',
		'label'         => esc_html__( 'Project works', 'modesto' ),
		'desc'          => esc_html__( 'Additional project information', 'modesto' ),
		'popup-title'   => esc_html__( 'Project works', 'modesto' ),
		'button'        => esc_html__( 'Edit', 'modesto' ),
		'size'          => 'small', // small, medium, large
		'popup-options' => array(
			'title' => array(
				'label' => esc_html__( 'Title', 'modesto' ),
				'type'  => 'text',
				'value' => esc_html__( 'Type of works:', 'modesto' ),
			),
			'works' => array(
				'label'           => false,
				'type'            => 'addable-option',
				'help'            => esc_html__( 'Help tip', 'modesto' ),
				'option'          => array( 'type' => 'text' ),
				'add-button-text' => esc_html__( 'Add new project job', 'modesto' ),
				'sortable'        => true,
			),
		),
	),
);