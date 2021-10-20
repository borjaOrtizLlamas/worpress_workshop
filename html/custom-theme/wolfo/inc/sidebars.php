<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

/**
 * Primary widget
 */
register_sidebar(array(
	'id'			=> 'primary-bar',
	'name'			=> esc_html__('Primary Bar', 'wolfo'),
	'description'	=> esc_html__('Drag widgets for all of pages sidebar', 'wolfo'),
	'before_widget'	=> '<div class="wolfo-widget %2$s">',
	'after_widget'	=> '<div class="clear"></div></div>',
	'before_title'	=> '<div class="wolfo-widget-title"><h4>',
	'after_title'	=> '</h4></div>',
));

/**
 * Footer Widget
 */
for ($i = 0; $i < 3; $i++) {
    $num	= $i + 1;

    register_sidebar(array(
        'id'			=> 'footer-' . $num,
        'name'			=> sprintf(esc_html__('Footer Widgets %d', 'wolfo'), $num),
        'description'	=> esc_html__('Drag widgets for all of pages sidebar', 'wolfo'),
        'before_widget'	=> '<div class="wolfo-widget %2$s">',
        'after_widget'	=> '<div class="clear"></div></div>',
        'before_title'	=> '<div class="wolfo-widget-title"><h4>',
        'after_title'	=> '</h4></div>',
    ));
}

