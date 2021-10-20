<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

Kirki::add_section('wolfo_customizer_section_post', [
    'title'          => esc_html__('Post', 'wolfo'),
    'panel'          => WOLFO_CUSTOMIZER_PANEL_OPTIONS,
    'priority'       => 25,
]);

Kirki::add_field(
    WOLFO_CUSTOMIZER_OPTIONS, [
        'type'          => 'radio-buttonset',
        'settings'      => 'wolfo_post_width',
        'label'         => esc_html__('Width', 'wolfo'),
        'section'       => 'wolfo_customizer_section_post',
        'default'       => 'boxed',
        'choices'       => [
            'boxed'     => esc_html__('Boxed', 'wolfo'),
            'full'      => esc_html__('Full Width', 'wolfo')
        ]
    ]
);

Kirki::add_field(
    WOLFO_CUSTOMIZER_OPTIONS, [
        'type'          => 'radio-buttonset',
        'settings'      => 'wolfo_post_sidebar',
        'label'         => esc_html__('Sidebar', 'wolfo'),
        'section'       => 'wolfo_customizer_section_post',
        'default'       => 'right',
        'choices'       => [
            'left'      => esc_html__('Left', 'wolfo'),
            'right'     => esc_html__('Right', 'wolfo'),
            'full'      => esc_html__('None', 'wolfo')
        ]
    ]
);