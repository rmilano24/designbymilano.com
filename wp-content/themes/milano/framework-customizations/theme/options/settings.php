<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
/**
 * Framework options
 *
 * @var array $options Fill this array with options to generate framework settings form in backend
 */

$options = array(
	fw()->theme->get_options( 'general-settings' ),
	$options = array(
		'header' => array(
			'title'   => esc_html__( 'Header', 'modesto' ),
			'type'    => 'tab',
			'options' => array(
				'header-box' => array(
					'title'   => esc_html__( 'Website navigation settings', 'modesto' ),
					'type'    => 'box',
					'options' => array(
						fw()->theme->get_options( 'header-options' ),
					),
				),
			),
		),
	),
	$options = array(
		'blog' => array(
			'title'   => esc_html__( 'Blog', 'modesto' ),
			'type'    => 'tab',
			'options' => array(
				'blog-box' => array(
					'title'   => esc_html__( 'Blog Settings', 'modesto' ),
					'type'    => 'box',
					'options' => array(
						fw()->theme->get_options( 'blog-settings' ),
					),
				),
			),
		),
	),

	$options = array(
		'post' => array(
			'title'   => esc_html__( 'Single Post', 'modesto' ),
			'type'    => 'tab',
			'options' => array(
				'post-box' => array(
					'title'   => esc_html__( 'Single Post Settings', 'modesto' ),
					'type'    => 'box',
					'options' => array(
						fw()->theme->get_options( 'post-options' ),
					),
				),
			),
		),
	),

	$options = array(
		'portfolio' => array(
			'title'   => esc_html__( 'Portfolio', 'modesto' ),
			'type'    => 'tab',
			'options' => array(
				'blog-box' => array(
					'title'   => esc_html__( 'Portfolio Settings', 'modesto' ),
					'type'    => 'box',
					'options' => array(
						fw()->theme->get_options( 'portfolio-settings' ),
					),
				),
			),
		),
	),

	$options = array(
		'project' => array(
			'title'   => esc_html__( 'Project', 'modesto' ),
			'type'    => 'tab',
			'options' => array(
				'project-box' => array(
					'title'   => esc_html__( 'Project Settings', 'modesto' ),
					'type'    => 'box',
					'options' => array(
						fw()->theme->get_options( 'project-header' ),
						fw()->theme->get_options( 'project-options' ),
					),
				),
			),
		),
	),
	
	$options = array(
		'footer' => array(
			'title'   => esc_html__( 'Footer', 'modesto' ),
			'type'    => 'tab',
			'options' => array(
				'footer-box' => array(
					'title'   => esc_html__( 'Footer Settings', 'modesto' ),
					'type'    => 'box',
					'options' => array(
						fw()->theme->get_options( 'footer-options' ),
					),
				),
			),
		),
	),

	$options = array(
		'api' => array(
			'title'   => esc_html__( 'API Keys', 'modesto' ),
			'type'    => 'tab',
			'options' => array(
				'api_keys' => array(
					'title'   => esc_html__( 'API Keys', 'modesto' ),
					'type'    => 'box',
					'options' => array(
						fw()->theme->get_options( 'api-keys' ),
					),
				),
			),
		),
	),

	$options = array(
		'fonts' => array(
			'title'   => esc_html__( 'Typography', 'modesto' ),
			'type'    => 'tab',
			'options' => array(
				'font_settings' => array(
					'title'   => esc_html__( 'Typography settings', 'modesto' ),
					'type'    => 'box',
					'options' => array(
						fw()->theme->get_options( 'typography' ),
					),
				),
			),
		),
	),
);
