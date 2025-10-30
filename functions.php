<?php

require_once get_theme_file_path( 'inc/shortcode.php' );

add_action( 'wp_enqueue_scripts', 'twentyfifteen_child_enqueue_styles' );

function twentyfifteen_child_enqueue_styles() {
	wp_enqueue_style( 
		'twentyfifteen-parent-style', 
		get_parent_theme_file_uri( 'style.css' )
	);
}

add_action( 'wp_enqueue_scripts', 'twentyfifteen_child_text_autospace' );

function twentyfifteen_child_text_autospace() {
	wp_enqueue_style( 
		'twentyfifteen-text-autospace-style', 
		get_theme_file_uri( '/css/text-autospace.css' )
	);
	wp_register_script(
		'text_autospace_loader', 
		get_theme_file_uri( '/js/text-autospace-loader.js' ), 
		array('jquery'),
		null,
		false
	);
	wp_enqueue_script('text_autospace_loader');
	wp_localize_script(
		'text_autospace_loader',
		'TwentyFifteenChildData', 
		array(
			'stylesheet_directory_uri' => get_stylesheet_directory_uri(),
		)
	);
}

function twentyfifteen_child_text_autospace_body_class($classes){
	array_push($classes,'han-la');
	return $classes;
}

add_action('wp_footer', 'twentyfifteen_child_mathjax_load');
function twentyfifteen_child_mathjax_load(){
	$load_mathjax_js_url = get_theme_file_uri( '/js/mathjax-loader.min.js' );
	wp_enqueue_script('mathjax', $load_mathjax_js_url, array('jquery'), '1.0', false);
}

add_filter('body_class', 'twentyfifteen_child_text_autospace_body_class');
add_filter('xmlrpc_enabled', '__return_false');

function twentyfifteen_child_dark_mode() {
	// Get 'dark' color scheme
	$color_scheme = twentyfifteen_get_color_schemes()['dark']['colors'];
	// Convert main and sidebar text hex color to rgba.
	$color_textcolor_rgb         = twentyfifteen_hex2rgb( $color_scheme[3] );
	$color_sidebar_textcolor_rgb = twentyfifteen_hex2rgb( $color_scheme[4] );
	$colors                      = array(
		'background_color'            => $color_scheme[0],
		'header_background_color'     => $color_scheme[1],
		'box_background_color'        => $color_scheme[2],
		'textcolor'                   => $color_scheme[3],
		'secondary_textcolor'         => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_textcolor_rgb ),
		'border_color'                => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.1)', $color_textcolor_rgb ),
		'border_focus_color'          => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.3)', $color_textcolor_rgb ),
		'sidebar_textcolor'           => $color_scheme[4],
		'sidebar_border_color'        => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.1)', $color_sidebar_textcolor_rgb ),
		'sidebar_border_focus_color'  => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.3)', $color_sidebar_textcolor_rgb ),
		'secondary_sidebar_textcolor' => vsprintf( 'rgba( %1$s, %2$s, %3$s, 0.7)', $color_sidebar_textcolor_rgb ),
		'meta_box_background_color'   => $color_scheme[5],
	);
	// Generate color scheme css
	$color_scheme_css = twentyfifteen_get_color_scheme_css( $colors );
	$dark_mode_css = <<<CSS
	@media (prefers-color-scheme: dark) {
		{$color_scheme_css}
	}
CSS;
	wp_add_inline_style( 'twentyfifteen-parent-style', $dark_mode_css );
}
add_action( 'wp_enqueue_scripts', 'twentyfifteen_child_dark_mode' );
