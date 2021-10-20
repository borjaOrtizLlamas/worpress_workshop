<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

add_action('tgmpa_register', 'wolfo_register_required_plugins');

/**
 * Register the required plugins for this theme.
 */
function wolfo_register_required_plugins() {
	$plugins = [
//	    [
//            'name'      => esc_html__('Elementor Website Builder', 'wolfo'),
//            'slug'      => 'elementor',
//            'required'  => false,
//        ],
//        [
//            'name'      => esc_html__('Elementor Header & Footer Builder', 'wolfo'),
//            'slug'      => 'header-footer-elementor',
//            'required'  => false,
//        ],
        [
            'name'      => esc_html__('Advanced Import', 'wolfo'),
            'slug'      => 'advanced-import',
            'required'  => false,
        ]
    ];

	$config = [
        'id'			=> 'tgmpa',
        'menu'			=> 'tgmpa-install-plugins',
        'has_notices'	=> false,
        'dismissable'	=> true,
        'is_automatic'	=> false,
    ];

	tgmpa($plugins, $config);
}
