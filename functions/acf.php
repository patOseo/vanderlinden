<?php

if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Global Options');
	acf_add_options_page(array(
		'page_title' 	=> 'Resources',
		'menu_title'	=> 'Resources',
		'icon_url' => 'dashicons-format-image',
		'position' => '30',
	));
}