<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

Kirki::add_section('wolfo_customizer_section_blog', [
    'title'          => esc_html__('Blog', 'wolfo'),
    'panel'          => WOLFO_CUSTOMIZER_PANEL_OPTIONS,
    'priority'       => 20,
]);

Kirki::add_field(
    WOLFO_CUSTOMIZER_OPTIONS, [
        'type'          => 'radio-buttonset',
        'settings'      => 'wolfo_blog_width',
        'label'         => esc_html__('Width', 'wolfo'),
        'section'       => 'wolfo_customizer_section_blog',
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
        'settings'      => 'wolfo_blog_sidebar',
        'label'         => esc_html__('Sidebar', 'wolfo'),
        'section'       => 'wolfo_customizer_section_blog',
        'default'       => 'right',
        'choices'       => [
            'left'      => esc_html__('Left', 'wolfo'),
            'right'     => esc_html__('Right', 'wolfo'),
            'full'      => esc_html__('None', 'wolfo')
        ]
    ]
);

//Kirki::add_field(
//    WOLFO_CUSTOMIZER_OPTIONS, [
//        'type'          => 'select',
//        'settings'      => 'wolfo_blog_widget',
//        'label'         => esc_html__('Widget', 'wolfo'),
//        'section'       => 'wolfo_customizer_section_blog',
//        'default'       => 'primary-bar',
//        'choices'       => wolfo_wp_registered_sidebars(),
//        'active_callback'   => [
//            [
//                'setting'   => 'wolfo_blog_sidebar',
//                'operator'  => '!=',
//                'value'     => 'none'
//            ]
//        ]
//    ]
//);

Kirki::add_field(
    WOLFO_CUSTOMIZER_OPTIONS, [
        'type'          => 'select',
        'settings'      => 'wolfo_blog_template',
        'label'         => esc_html__('Template', 'wolfo'),
        'section'       => 'wolfo_customizer_section_blog',
        'default'       => 'list',
        'choices'       => [
            'list'      => esc_html__('List', 'wolfo'),
            'grid'      => esc_html__('Grid', 'wolfo')
        ]
    ]
);

Kirki::add_field(
    WOLFO_CUSTOMIZER_OPTIONS, [
        'type'          => 'select',
        'settings'      => 'wolfo_blog_column',
        'label'         => esc_html__('Column', 'wolfo'),
        'section'       => 'wolfo_customizer_section_blog',
        'default'       => '3',
        'choices'       => [
            '2'      => esc_html__('2 Column', 'wolfo'),
            '3'      => esc_html__('3 Column', 'wolfo'),
            '4'      => esc_html__('4 Column', 'wolfo'),
            '6'      => esc_html__('6 Column', 'wolfo')
        ],
        'active_callback'   => [
            [
                'setting'   => 'wolfo_blog_template',
                'operator'  => '===',
                'value'     => 'grid'
            ]
        ]
    ]
);