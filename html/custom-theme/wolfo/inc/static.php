<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

/**
 ******************************************************************************************************************************
 *  SITE STYLE
 ******************************************************************************************************************************
 */
// Third party scripts.
wp_register_style('boxicons', get_template_directory_uri() . '/assets/css/vendor/boxicons/css/boxicons.min.css', array());

// Enqueue
wp_enqueue_style('boxicons');

wp_enqueue_style('wolfo-style',get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.0');

if (is_rtl()) {
	wp_enqueue_style('wolfo-style-rtl', get_template_directory_uri() . '/assets/css/rtl.css', array());
}

$custom_css		= wolfo_get_option('custom_css');

if ($custom_css) {
	wp_add_inline_style('wolfo-style', wp_specialchars_decode($custom_css));
}

/**
 ******************************************************************************************************************************
 *  SITE SCRIPT
 ******************************************************************************************************************************
 */
if (is_singular() && comments_open() && get_option('thread_comments')) {
	wp_enqueue_script('comment-reply');
}

// Enqueues
wp_enqueue_script('wolfo-menu', get_template_directory_uri() . '/assets/js/menu.js', array(), '1.0.0', true);
wp_enqueue_script('wolfo-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), '1.0.0', true);
wp_enqueue_script('wolfo-skip-link-focus-fix', get_template_directory_uri() . '/assets/js/skip-link-focus-fix.js', array(), '1.0.0', true);
wp_enqueue_script('wolfo-script',	get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.0', true);

$custom_js = wolfo_get_option('custom_js');

if ($custom_js) {
	wp_add_inline_script('wolfo-script', $custom_js);
}

wp_localize_script('wolfo-script', 'wolfo_script', array(
	'ajax_url' 				=> admin_url('admin-ajax.php'),
	'site_url'				=> esc_url(home_url('/')),
	'is_rtl'				=> is_rtl(),
	'view_port'				=> wolfo_get_option('menu_max_width', 992),
	'product_added'			=> esc_html__('Product Added', 'wolfo'),
));
