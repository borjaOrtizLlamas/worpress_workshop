<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
	return;
}

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <a class="skip-link screen-reader-text" href="#main"><?php esc_html_e('Skip to content', 'wolfo'); ?></a>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<?php wolfo_header(); ?>
		<?php get_template_part('components/wolfo-header'); ?>
        <main id="main" class="main-content">
