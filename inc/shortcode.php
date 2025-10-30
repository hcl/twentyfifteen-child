<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

if ( ! shortcode_exists('latex') ) {

	add_shortcode('latex', 'twentyfifteen_child_mathjax_render');
	add_filter('no_texturize_shortcodes', 'twentyfifteen_child_shortcode_exempt_from_wptexturize');
	
	function twentyfifteen_child_mathjax_render($attributes, $content = null) {
		$attributes = shortcode_atts(
			array(
				'display' => false
			),
			$attributes,
			'latex'
		);
	
		$content = preg_replace("|<br\s*/?>|", "\n", $content);
		$encoded = htmlspecialchars(html_entity_decode($content));
	
		if ( boolval($attributes['display']) ) {
			return sprintf('<div class="mathjax">%s</div>', $encoded);
		} else {
			return sprintf('<span class="mathjax">%s</span>', $encoded);
		}
	}
	
	function twentyfifteen_child_shortcode_exempt_from_wptexturize($shortcodes) {
	    $shortcodes[] = 'latex';
	    return $shortcodes;
	}

}
