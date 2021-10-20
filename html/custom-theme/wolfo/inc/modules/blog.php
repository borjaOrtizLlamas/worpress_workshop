<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

/**
 * Create thumbnail post for blog page
 */
if (! function_exists('wolfo_blog_thumbnail')) {
	function wolfo_blog_thumbnail($size) {
		if (post_password_required() || is_attachment() || ! has_post_thumbnail()) {
			return;
		}

		global $post;

		echo '<div class="post-thumbnail">';
		echo '<a href="' . esc_url(get_the_permalink($post->ID)) . '" class="wolfo-image-wrapper"><span class="' . wolfo_image_class() . '">';
		echo get_the_post_thumbnail($post->ID, $size);
		echo '</span></a>';
		echo '</div>';
	}
}

/**
 * Create title post for blog page
 */
if (!function_exists('wolfo_blog_title')) {
	function wolfo_blog_title() {
		global $post;

		echo '<h3 class="entry-title">';
		echo '<a href="' . esc_url(get_the_permalink($post->ID)) . '">';
		echo get_the_title($post->ID);
		echo '</a>';
		echo '</h3>';
	}
}

/**
 * Create date of post for blog post
 */
if (!function_exists('wolfo_blog_date')) {
	function wolfo_blog_date($format = false) {
		global $post;

		$format = ($format == false) ? get_option('date_format') : $format;

		echo '<div class="entry-date">';
		echo '<a href="' . esc_url(get_the_permalink($post->ID)) . '" rel="bookmark">';
		echo '<span>' . get_the_date($format) . '</span>';
		echo '</a>';
		echo '</div>';
	}
}

/**
 * Create author of post for blog post
 */
if (!function_exists('wolfo_blog_author')) {
	function wolfo_blog_author() {
		echo '<div class="entry-author author vcard">';
		echo '<a class="url fn n" href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '">' . get_the_author() . '</a>';
		echo '</div>';
	}
}

/**
 * Create comments of post for blog post
 */
if (!function_exists('wolfo_blog_comments')) {
	function wolfo_blog_comments() {
		if (! is_single() && ! is_search() && ! post_password_required() && (comments_open() || get_comments_number())) {
			echo '<div class="entry-comments-link">';
			comments_popup_link(esc_html__('0 Comment', 'wolfo'), esc_html__('1 Comment', 'wolfo'), esc_html__('% Comments', 'wolfo'));
			echo '</div>';
		}
	}
}

/**
 * Create excerpt of post for blog post
 */
if (!function_exists('wolfo_blog_excerpt')) {
	function wolfo_blog_excerpt($length) {
		global $post;

		$excerpt = wolfo_get_excerpt_by_id($post->ID, $length);

		echo '<div class="entry-excerpt">' . $excerpt . '</div>';
	}
}