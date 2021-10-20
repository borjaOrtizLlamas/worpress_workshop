<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
	return;
}

get_header();
while (have_posts()) : the_post();
    get_template_part('components/content', 'single');
endwhile;
get_footer();
