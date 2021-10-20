<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

$footer_layout	= wolfo_get_option('footer_layout');

switch ($footer_layout){
	case 'footer-1':
		echo get_template_part('components/footer/layout-1');
		break;
	case 'footer-2':
		echo get_template_part('components/footer/layout-2');
		break;
	case 'footer-3':
		echo get_template_part('components/footer/layout-3');
		break;
	case 'footer-4':
		echo get_template_part('components/footer/layout-4');
		break;
	case 'footer-5':
		echo get_template_part('components/footer/layout-5');
		break;
	case 'footer-6':
		echo get_template_part('components/footer/layout-6');
		break;
	case 'footer-7':
		echo get_template_part('components/footer/layout-7');
		break;
}
