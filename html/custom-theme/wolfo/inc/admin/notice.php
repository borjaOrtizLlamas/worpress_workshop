<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

class Wolfo_Welcome_Screen_Notice {
    public function __construct() {
        add_action('load-themes.php', array($this, 'wolfo_theme_activation_admin_notice'));

    }

    public function wolfo_theme_activation_admin_notice() {
        global $pagenow;

        if (is_admin() && ('themes.php' == $pagenow)) {
            add_action('admin_notices', array($this, 'wolfo_admin_notice_detail'), 99);
        }
    }

    public function wolfo_admin_notice_detail() {
        ?>
        <div class="updated notice is-dismissible wolfo-note">
            <h1>
                <?php
                $theme_info = wp_get_theme();

                printf(esc_html__('Thanks for installing  %1$s ', 'wolfo'), esc_html($theme_info->Name), esc_html($theme_info->Version));
                ?>
            </h1>
            <p><?php echo esc_html__('Welcome! Thank you for choosing WolfCoding WordPress theme. To take full advantage of the features this theme Please Install Our Demo', 'wolfo'); ?></p>
            <p class="t">
                <a href="?page=wolfo-info.php" class="button button-primary" target="_blank">
                    <?php echo esc_html__('Theme Detail','wolfo'); ?>
                </a>
                <a href="https://wolfcoding.com/" target="_blank" class="button button-primary">
                    <?php echo esc_html__('Documentation','wolfo'); ?>
                </a>
            </p>
        </div>
        <?php
    }

}

new Wolfo_Welcome_Screen_Notice();