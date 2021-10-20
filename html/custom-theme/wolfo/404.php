<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}
get_header();
?>
    <section class="wolfo-error wolfo-error-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="wolfo-error-left">
                        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/frontend/404.png') ?>"
                             alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 col-xl-4 offset-lg-1">
                    <div class="wolfo-error-right">
                        <h1 class="wolfo-error-title pt-0"><?php echo esc_html__("Ohh! Page Not Found", "wolfo"); ?></h1>
                        <p class="wolfo-error-description"><?php echo esc_html__("The page you are trying to access does not exist or has been moved. Try going back to our homepage.", "wolfo"); ?></p>
                        <form action="<?php echo site_url('/'); ?>" method="get" id="searchform">
                            <input type="text" class="bas-input" name="s" placeholder="<?php echo esc_attr__('Search on wolfo...', 'wolfo'); ?>"/>
                            <button class="ajax-btn" type="submit"><i class="bx bx-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>
