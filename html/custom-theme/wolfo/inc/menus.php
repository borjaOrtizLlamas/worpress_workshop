<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

/**
 * Register menu.
 */
register_nav_menus(array(
	'primary'		=> esc_html__('Top primary menu', 'wolfo'),
));
