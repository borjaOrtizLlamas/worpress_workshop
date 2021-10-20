<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

require_once get_template_directory() . '/inc/core/breadcrumb.php';
require_once get_template_directory() . '/inc/core/style.php';

/**
 * Get config from library
 */
if (!function_exists('wolfo_get_option')) {
	function wolfo_get_option($option_name = '', $default = '', $name = '_wolfo_options') {
		$options = get_option($name);

		if (!empty($option_name) && !empty($options[$option_name])) {
			return $options[$option_name];
		} else {
			return (!empty($default)) ? $default : null;
		}

	}
}

/**
 * Get array value.
 */
if (!function_exists('wolfo_get_value_in_array')) {
	function wolfo_get_value_in_array($array, $key, $default = null) {
		return isset($array[$key]) ? $array[$key] : $default;
	}
}

/**
 * Get registered sidebars
 */
if (! function_exists('wolfo_wp_registered_sidebars')) {
	function wolfo_wp_registered_sidebars() {
		global $wp_registered_sidebars;

		$widgets	= array();

		if (! empty($wp_registered_sidebars)) {
			foreach ($wp_registered_sidebars as $key => $value) {
				$widgets[$key]	= $value['name'];
			}
		}

		return array_reverse($widgets);
	}
}

/**
 * Generate template for terms list
 */
if (! function_exists('wolfo_generate_html_terms_list')) {
	function wolfo_generate_html_terms_list($post_id, $taxonomy, $is_link = true, $space = ',') {
		$terms		= wp_get_post_terms($post_id, $taxonomy);

		$html 		= '';
		$numItems 	= count($terms);
		$i 			= 0;

		if (!empty($terms)) {
			$html .= '<div class="term-' . $taxonomy . '">';

			foreach ($terms as $term) {
				$s = (++$i === $numItems) ? '' : $space;

				$html .= $is_link ? '<a href="' . get_term_link($term->slug, $taxonomy) . '">' : '';
				$html .= $term->name;
				$html .= $is_link ? '</a>' : '';
				$html .= $s;
			}

			$html .= '</div>';
		}

		return $html;
	}
}

/**
 * Create excerpt by post id
 */
if (! function_exists('wolfo_get_excerpt_by_id')) {
	function wolfo_get_excerpt_by_id($post_id, $length) {
		$post		= get_post($post_id);
		$content	= $post->post_content;
		$excerpt	= $post->post_excerpt;
		$excerpt	= $excerpt ? $excerpt : $content;

		$excerpt 	= strip_tags(strip_shortcodes($excerpt));
		$words 		= explode(' ', $excerpt, $length + 1);

		if (count($words) > $length) {
			array_pop($words);
			array_push($words, '...');
			$excerpt = implode(' ', $words);
		}

		$excerpt = '<p>' . $excerpt . '</p>';

		return $excerpt;
	}
}
