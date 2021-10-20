<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

Kirki::add_section('wolfo_customizer_section_typography', [
    'title'          => esc_html__('Typography', 'wolfo'),
    'panel'          => WOLFO_CUSTOMIZER_PANEL_OPTIONS,
    'priority'       => 5,
]);

Kirki::add_field(
    WOLFO_CUSTOMIZER_OPTIONS, [
        'type'          => 'typography',
        'settings'      => 'wolfo_body_typo',
        'label'         => esc_html__('Body', 'wolfo'),
        'section'       => 'wolfo_customizer_section_typography',
        'transport'     => 'auto',
        'output'        => [
            [
                'element'   => 'body'
            ]
        ],
        'default'     => [
            'font-family'    => 'Work Sans',
            'variant'        => 'regular',
            'font-size'      => '14px',
            'line-height'    => '1.86',
            'letter-spacing' => '0',
            'color'          => '#555555',
            'text-transform' => 'none',
            'text-align'     => 'left',
        ],
    ]
);

Kirki::add_field(
    WOLFO_CUSTOMIZER_OPTIONS, [
        'type'          => 'typography',
        'settings'      => 'wolfo_heading_typo',
        'label'         => esc_html__('Heading', 'wolfo'),
        'section'       => 'wolfo_customizer_section_typography',
        'transport'     => 'auto',
        'output'        => [
            [
                'element'   => 'h1,h2,h3,h4,h5,h6'
            ]
        ],
        'default'     => [
            'font-family'    => 'Poppins',
            'variant'        => 'regular',
            'font-size'      => '',
            'line-height'    => '',
            'letter-spacing' => '',
            'color'          => '',
            'text-transform' => '',
            'text-align'     => '',
        ],
    ]
);