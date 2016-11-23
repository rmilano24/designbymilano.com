<?php if (!defined('FW')) die('Forbidden');

$cfg = array();

$cfg['page_builder'] = array(
	'title'         => esc_html__('Image', 'modesto'),
	'description'   => esc_html__('Add an Image', 'modesto'),
	'tab'           => esc_html__('Media Elements', 'modesto'),
	'title_template' => '{{- title }}<div class="image-block-preview"><img src="{{= o["source"]["media"]["image"]["url"] }}" alt=""></div>',
);