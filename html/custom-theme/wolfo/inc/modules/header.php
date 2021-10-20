<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

/**
 * Chosen header from option
 */
if (!function_exists('wolfo_header')) {
	function wolfo_header() {
		$header_layout 	= get_theme_mod('wolfo_select_header', 'header-1');

        if ($header_layout == 'custom') {
            if (function_exists('hfe_header_enabled') && true == hfe_header_enabled()){
                echo hfe_render_header();
            }
        } else {
            get_template_part('components/header/' . $header_layout);
        }
	}
}

/**
 * Render site logo.
 */
if (!function_exists('wolfo_logo')) {
	function wolfo_logo() {
		$home_url		= esc_url(home_url('/'));
		$html			= [];

		$html[]	= '<div id="wolfo-site-logo" class="wolfo-site-logo">';

		if (function_exists('the_custom_logo') && has_custom_logo()) {
            $custom_logo_id 	= get_theme_mod('custom_logo');
            $custom_logo 		= wp_get_attachment_image_src($custom_logo_id , 'full');

			$html[] = '<a href="' . esc_url($home_url) . '">';
            $html[] = '<img src="' . esc_url(wolfo_get_value_in_array($custom_logo, 0)) . '" alt="' . esc_attr(get_bloginfo('name', 'display'))  . '"/>';
			$html[] = '</a>';
		} else {
			$html[] = '<h1 class="site-name"><a href="' . esc_url($home_url) . '">' . esc_attr(get_bloginfo('name')) . '</a></h1>';
		}

		$html[]	= '</div>';

		return implode("\n", $html);
	}
}

/**
 * Render main navigation menu.
 */
if (!function_exists('wolfo_header_main_menu')) {
	function wolfo_header_main_menu() {
		$html	= array();

		$html[]	= '<nav id="wolfo-site-nav" class="wolfo-site-nav">';

		ob_start();

		if (has_nav_menu('primary')) {
			wp_nav_menu(array(
				'theme_location'	=> 'primary',
				'menu_class'		=> 'mainnav',
				'container'			=> '',
				'link_before'		=> '<span class="wolfo-link-inner">',
				'link_after'		=> '</span>',
			));
		}

		$html[]	= ob_get_clean();

		$html[]	= '</nav>';

		return implode("\n", $html);
	}
}

/**
 * Generate header mobile menu
 */
if (! function_exists('wolfo_mobile_menu')) {
	function wolfo_mobile_menu() {
		$html	= array();
		$html[]	= '<div id="wolfo-navigation-mobile">';

		ob_start();

		if (has_nav_menu('mobile')) {
			wp_nav_menu(array(
				'theme_location'	=> 'mobile',
			));
		} else {
			wp_nav_menu(array(
				'theme_location'	=> 'primary',
				'mobile'			=> true,
			));
		}

		$html[]	= ob_get_clean();

		$html[]	= '</div>';

		return implode("\n", $html);

	}
}

/**
 * Generate header mobile icon.
 */
if (! function_exists('wolfo_mobile_icon')) {
	function wolfo_mobile_icon() {
		$html	= array();

		$html[]	= '<div id="wolfo-menu-toggle"><div class="inner-toggle"><i class="fas fa-bars"></i></div></div>';

		return implode("\n", $html);
	}
}

/**
 * Render icon search.
 */
if (! function_exists('wolfo_header_search_form')) {
    function wolfo_header_search_form() {
        $search_popup_title = esc_html__('What are your looking for?', 'wolfo');

        $html = array();

        $html[] = '<div class="wolfo-ajax-search">';
        $html[] = '<a class="wolfo-search-icon" href="javascript:void(0)"><i class="bx bx-search"></i></a>';

        $html[] = '<div class="bas-wrapper">';

        $html[] = '<div class="search-content-inp">';
        $html[] = '<h3 class="search-title txt-center mt-0">' . $search_popup_title . '</h3>';

        $html[] = '<form action="' . site_url('/') . '" method="get" tabindex="-1">';

        $html[] = '<div class="bas-inner">';

        $html[] = '<input type="text" id="baso-input" class="bas-input" name="s" placeholder="' . esc_html__('I am looking for', 'wolfo') . '"/>';

        $html[] = '<button class="ajax-btn" type="submit"><i class="bx bx-search"></i><span>' . esc_html__('Search', 'wolfo') . '</span></button>';

        $html[] = '</div>';

        $html[] = '</form>';

        $html[] = '</div>';

        $html[] = '<div class="bas-ajax-content"></div>';

        $html[] = '<a class="search-close" href="javascript:void(0)"><i class="bx bx-x"></i></a>';

        $html[] = '</div>';

        $html[] = '</div>';

        return implode("\n", $html);
    }
}