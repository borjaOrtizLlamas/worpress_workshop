<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

if (!class_exists('Kirki')) {
    return;
}

Kirki::add_config(WOLFO_CUSTOMIZER_OPTIONS, [
    'capability'    => 'edit_theme_options',
    'option_type'   => 'theme_mod',
]);

Kirki::add_panel(WOLFO_CUSTOMIZER_PANEL_OPTIONS, [
    'priority'    => 10,
    'title'       => esc_html__('Wolfo Settings', 'wolfo'),
    'description' => esc_html__('Wolfo description', 'wolfo'),
]);

/**
 * Header
 */
require_once WOLFO_CUSTOMIZER_PATH . '/header.php';

/**
 * Typo
 */
require_once WOLFO_CUSTOMIZER_PATH . '/typography.php';

/**
 * Footer
 */
require_once WOLFO_CUSTOMIZER_PATH . '/footer.php';


/**
 * Blog
 */
require_once WOLFO_CUSTOMIZER_PATH . '/blog.php';

/**
 * Post
 */
require_once WOLFO_CUSTOMIZER_PATH . '/post.php';