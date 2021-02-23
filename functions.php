<?php

function twentyfifteen_fonts_url() {
	$fonts_url = get_stylesheet_directory_uri().'/css/fonts.css';
	return $fonts_url;
}

function text_autospace_style($classes){
	array_push($classes,'han-la');
	return $classes;
}

function mathjax_load(){
	$load_mathjax_js_url = get_stylesheet_directory_uri().'/js/load_mathjax.js';
	wp_enqueue_script('mathjax', $load_mathjax_js_url, array('jquery'), '1.0', false);
}

function text_autospace_js() {
	wp_register_script(
		'text_autospace', 
		get_stylesheet_directory_uri().'/js/text-autospace.min.js', 
		array('jquery'),
		null,
		false
	);
	wp_enqueue_script('text_autospace');
}
add_action('wp_enqueue_scripts','text_autospace_js');
add_action('wp_footer','mathjax_load');

add_filter('body_class', 'text_autospace_style');
add_filter('xmlrpc_enabled', '__return_false');
