<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

?>

<header class="header-nav header-1" id="masthead">
    <div class="main-header">
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="header-left col-4 col-sm-6 col-lg-2">
                        <?php echo wolfo_logo(); ?>
                    </div>
                    <div class="header-center col-12 col-md-8">
                        <?php echo wolfo_header_main_menu(); ?>
                    </div>
                    <div class="header-right col-8 col-sm-6 col-lg-2">
                        <div class="bg-open-canvas-menu"></div>
                        <?php
                        if ( has_nav_menu( 'primary' ) ) {
                            echo '<a class="icon-menu br-icon-menu" href="javascript:void(0)"><span></span><span></span><span></span></a>';

                            ?>
                            <div class="wolfo-canvas-menu main-menu">
                                <div class="content-cv">
                                    <div class="container-fluid">
                                        <div class="container-content-cv">
                                            <?php if (has_nav_menu('primary')) {
                                                wp_nav_menu(
                                                    array(
                                                        'theme_location'    => 'primary',
                                                        'menu_class'        => 'mobile-nav'
                                                    )
                                                );
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                        echo wolfo_header_search_form();
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
