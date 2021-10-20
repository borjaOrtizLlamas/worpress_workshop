<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

require_once WOLFO_ADMIN_PATH . '/kirki/kirki.php';
require_once WOLFO_ADMIN_PATH . '/customizer.php';

if (is_admin()) {
    if (get_option('wolfo_disable_admin_notice') != '1') {
        require_once WOLFO_ADMIN_PATH . '/notice.php';
    }

    require_once WOLFO_ADMIN_PATH . '/wolfo-info.php';
    require_once WOLFO_ADMIN_PATH . '/tgm/class-tgm-plugin-activation.php';
    require_once WOLFO_ADMIN_PATH . '/plugin-activation.php';
}
