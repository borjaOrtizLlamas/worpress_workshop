<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

Kirki::add_section('wolfo_customizer_section_footer', [
    'title'          => esc_html__('Footer', 'wolfo'),
    'panel'          => WOLFO_CUSTOMIZER_PANEL_OPTIONS,
    'priority'       => 20,
]);

Kirki::add_field(
    WOLFO_CUSTOMIZER_OPTIONS, [
        'type'          => 'select',
        'settings'      => 'wolfo_select_footer',
        'label'         => esc_html__('Select Footer', 'wolfo'),
        'section'       => 'wolfo_customizer_section_footer',
        'default'       => 'footer-1',
        'choices'       => [
            'footer-1'  => esc_html__('Footer 1', 'wolfo'),
            'custom'    => esc_html__('Custom', 'wolfo')
        ]
    ]
);

Kirki::add_field(
    WOLFO_CUSTOMIZER_OPTIONS, [
        'type'      => 'custom',
        'settings'  => 'footer_custom_note',
        'section'   => 'wolfo_customizer_section_footer',
        'default'   => '<p>' . esc_html__('To Create a custom Footer layout please go to "Appearance > Header Footer Builder" in The admin menu and click Add New', 'wolfo') . '</p>',
        'active_callback'   => [
            [
                'setting'   => 'select_footer',
                'operator'  => '===',
                'value'     => 'custom'
            ]
        ]
    ]
);