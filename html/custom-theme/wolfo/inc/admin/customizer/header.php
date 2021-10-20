<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

Kirki::add_section('wolfo_customizer_section_header', [
    'title'          => esc_html__('Header', 'wolfo'),
    'panel'          => WOLFO_CUSTOMIZER_PANEL_OPTIONS,
    'priority'       => 1,
]);

Kirki::add_field(
    WOLFO_CUSTOMIZER_OPTIONS, [
        'type'          => 'select',
        'settings'      => 'wolfo_select_header',
        'label'         => esc_html__('Select Header', 'wolfo'),
        'section'       => 'wolfo_customizer_section_header',
        'default'       => 'header-1',
        'choices'       => [
            'header-1'  => esc_html__('Header 1', 'wolfo'),
            'custom'    => esc_html__('Custom', 'wolfo')
        ]
    ]
);

Kirki::add_field(
    WOLFO_CUSTOMIZER_OPTIONS, [
        'type'      => 'custom',
        'settings'  => 'header_custom_note',
        'section'   => 'wolfo_customizer_section_header',
        'default'   => '<p>' . esc_html__('To Create a custom Header layout please go to "Appearance > Header Footer Builder" in The admin menu and click Add New', 'wolfo') . '</p>',
        'active_callback'   => [
            [
                'setting'   => 'select_header',
                'operator'  => '===',
                'value'     => 'custom'
            ]
        ]
    ]
);