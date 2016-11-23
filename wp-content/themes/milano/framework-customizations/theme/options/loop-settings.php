<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}
$options = array(
	'taxonomy_select' => array(
		'type'       => 'multi-select',
		'label'      => esc_html__( 'Categories', 'modesto' ),
		'help'       => esc_html__( 'Click on field and type category name to find  category', 'modesto' ),
		'population' => 'taxonomy',
		'source'     => 'category',
		'limit'      => 100,
	),
	'exclude'         => array(
		'type'  => 'checkbox',
		'value' => false,
		'label' => esc_html__( 'Exclude selected', 'modesto' ),
		'desc'  => esc_html__( 'Show all categories except that selected in "Categories" option', 'modesto' ),
		'text'  => esc_html__( 'Exclude', 'modesto' ),
	),
	'per_page'        => array(
		'label' => esc_html__( 'Items per page', 'modesto' ),
		'type'  => 'short-text',
		'value' => 10,
		'desc'  => esc_html__( 'Number of items that will be displayed on one page', 'modesto' ),
	),
	'order'           => array(
		'type'         => 'switch',
		'value'        => 'DESC',
		'label'        => esc_html__( 'Order', 'modesto' ),
		'desc'         => esc_html__( 'Designates the ascending or descending order of items', 'modesto' ),
		'left-choice'  => array(
			'value' => 'DESC',
			'label' => esc_html__( 'Descending', 'modesto' ),
		),
		'right-choice' => array(
			'value' => 'ASC',
			'label' => esc_html__( 'Ascending', 'modesto' ),
		),
	),
	'orderby'         => array(
		'label'   => esc_html__( 'Order posts by', 'modesto' ),
		'type'    => 'select',
		'desc'    => esc_html__( 'Sort retrieved posts by parameter.', 'modesto' ),
		'choices' => array(
			'date'          => esc_html__( 'Default ( date )', 'modesto' ),
			'comment_count' => esc_html__( 'Order by number of comments', 'modesto' ),
			'author'        => esc_html__( 'Order by author.', 'modesto' ),
			'modified'      => esc_html__( 'Order by last modified date.', 'modesto' ),
		),
	),


);