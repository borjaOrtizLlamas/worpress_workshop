<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

class WOLFO_Theme_Include {
	private static $initialized	= false;

	public static function init() {
		if (self::$initialized) {
			return;
		} else {
			self::$initialized	= true;
		}

		// Load define
        require_once get_template_directory() . '/inc/define.php';

		// Load core theme
		require_once get_template_directory() . '/inc/core/core.php';

		// Load default menu
		require_once get_template_directory() . '/inc/menus.php';

		// Load default modules
		require_once get_template_directory() . '/inc/default.php';

		// Load helpers
		require_once get_template_directory() . '/inc/helpers.php';

		// Load hooks & Filters
		require_once get_template_directory() . '/inc/hooks.php';
		require_once get_template_directory() . '/inc/filters.php';

		// Load function modules
		require_once get_template_directory() . '/inc/modules/header.php';
		require_once get_template_directory() . '/inc/modules/footer.php';
		require_once get_template_directory() . '/inc/modules/blog.php';
		require_once get_template_directory() . '/inc/modules/post.php';

		add_action('widgets_init', array(__CLASS__, '_register_sidebar'), 20);

		// only frontend
		if (! is_admin()) {
			add_action('wp_enqueue_scripts', array(__CLASS__, '_action_enqueue_scripts'), 20);
		}

        if (is_admin()) {
            add_action('admin_enqueue_scripts', array(__CLASS__, 'enqueue_admin_scripts'), 20);
        }

        require_once get_template_directory() . '/inc/admin/admin.php';
	}

	public static function _register_sidebar() {
		require_once get_template_directory() . '/inc/sidebars.php';
	}

	public static function _action_enqueue_scripts() {
		// Load library & class
		require_once get_template_directory() . '/inc/static.php';
		require_once get_template_directory() . '/inc/classes/style-builder.class.php';

        require_once get_template_directory() . '/inc/custom-style/layout.php';

		$builder		= WOLFO_Style_Builder::getInstance();
		$custom_style	= $builder->render();

		if ($custom_style) {
			wp_add_inline_style('wolfo-style', $custom_style);
		}
	}

    public static function enqueue_admin_scripts() {
        wp_enqueue_script('wolfo-admin-script', get_template_directory_uri() . '/assets/js/admin.js', array('jquery'), false, true);
        wp_localize_script('wolfo-admin-script', 'wolfo_script', array(
            'ajax_url'		=> admin_url('admin-ajax.php')
        ));
    }
}

WOLFO_Theme_Include::init();
