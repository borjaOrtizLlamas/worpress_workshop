<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

?>
</main>
<?php
global $post;

$footer_sidebar_1 = 'footer-1';
$footer_sidebar_2 = 'footer-2';
$footer_sidebar_3 = 'footer-3';

$footer_class = ['footer', 'layout-3', 'has-border'];

$footer_type = get_theme_mod('wolfo_select_footer', 'footer-1');
?>

<?php if ($footer_type == 'footer-1') : ?>
    <?php if (is_active_sidebar($footer_sidebar_1) || is_active_sidebar($footer_sidebar_2) || is_active_sidebar($footer_sidebar_3)) { ?>
        <footer class="<?php echo implode(' ', $footer_class); ?>">
            <div class="main-footer">
                <div class="container">
                    <div class="row">
                        <?php
                        echo '<div class="col-12 col-md-4">';
                        dynamic_sidebar($footer_sidebar_1);
                        echo '</div>';
                        echo '<div class="col-12 col-md-4">';
                        dynamic_sidebar($footer_sidebar_2);
                        echo '</div>';
                        echo '<div class="col-12 col-md-4">';
                        dynamic_sidebar($footer_sidebar_3);
                        echo '</div>';
                        ?>
                    </div>
                </div>
            </div>
        </footer>
    <?php } ?>
<?php else : ?>
    <?php
    if (function_exists('hfe_footer_enabled') && true == hfe_footer_enabled()){
        echo hfe_render_footer();
    }
    ?>
<?php endif; ?>
</div>

<?php wp_footer(); ?>
</body>
</html>