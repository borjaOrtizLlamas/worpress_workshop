<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

class Wolfo_Admin_Page_info {
    public function __construct() {
        add_action('admin_menu', array($this, 'wolfo_theme_page'));
    }

    function wolfo_theme_page() {
        add_theme_page(
            esc_html__('Wolfo Theme', 'wolfo'),
            esc_html__('Wolfo Theme', 'wolfo'),
            'edit_theme_options',
            'wolfo-info',
            array($this, 'theme_info_page')
        );
    }

    function theme_info_page() {
        $theme_data = wp_get_theme();

        ?>
        <div class="wrap about-wrap theme_info_wrapper">
            <h1>
                <?php
                /* translators: %1$s theme name, %2$s theme version */
                printf(esc_html__('Welcome to %1$s - Version %2$s', 'wolfo'), esc_html($theme_data->Name), esc_html($theme_data->Version));
                ?>
            </h1>
            <div class="about-text"><?php echo esc_html($theme_data->Description); ?></div>
            <div class="theme_info">
                <div class="theme_link">
                    <h3><?php esc_html_e('Recommended Plugins', 'wolfo'); ?></h3>
                    <p class="about">
                        <?php echo esc_html__('Please install recommended plugins for better use of theme. It will help you to make website more useful', 'wolfo'); ?>
                    </p>
                    <p>
                        <a href="<?php echo esc_url(admin_url('themes.php?page=tgmpa-install-plugins')); ?>" class="button button-primary"><?php esc_html_e('Install Plugin', 'wolfo'); ?></a>
                    </p>
                </div>
                <div class="theme_link">
                    <h3><?php esc_html_e('Theme documentation', 'wolfo'); ?></h3>
                    <p class="about">
                        <?php
                        /* translators: %s theme name */
                        printf(esc_html__('Need help in setting up and configuring %s? Please take a look at our documentation page.', 'wolfo'), esc_html($theme_data->Name));
                        ?>
                    </p>
                    <p>
                        <a href="<?php echo esc_url('https://wolfcoding.com/'); ?>" target="_blank" class="button button-secondary">
                            <?php echo esc_html__('Documentation', 'wolfo'); ?>
                        </a>
                    </p>
                </div>
                <div class="theme_link">
                    <h3><?php esc_html__('Having trouble? Need support?', 'wolfo'); ?></h3>
                    <p>
                        <a href="<?php echo esc_url('https://wolfcoding.com/'); ?>" target="_blank" class="button button-secondary"><?php esc_html_e('Contact us', 'wolfo'); ?></a>
                    </p>
                </div>
            </div>
        </div>
        <?php
    }
}

new Wolfo_Admin_Page_info();