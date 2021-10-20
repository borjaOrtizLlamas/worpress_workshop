<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

global $wp_query;

$blog_width             = get_theme_mod('wolfo_blog_width', 'boxed');
$blog_sidebar           = get_theme_mod('wolfo_blog_sidebar', 'right');
$blog_widget            = get_theme_mod('wolfo_blog_widget', 'primary-bar');
$blog_template          = get_theme_mod('wolfo_blog_template', 'list');
$blog_column            = get_theme_mod('wolfo_blog_column', '3');
$pagination             = 'navigation';

$column_class       = ['column', 'column-resize', 'col-12'];
$check_layout       = ['post-' . $blog_template];
$container_class    = ($blog_width == 'full') ? 'container-fluid' : 'container';

if ($blog_template == 'grid') {
    $column_class[] = 'col-md-' . (12 / $blog_column);
}

//== Check Sidebar
$check_sidebar = [$blog_sidebar];

if ($blog_sidebar != 'full' && is_active_sidebar($blog_widget)) {
    $check_sidebar[] = 'has-sidebar row';
} else {
    $check_sidebar[] = 'no-sidebar';
}

?>

<div class="content-default content-archive-wapper <?php echo join(' ', $check_layout); ?>">
    <div class="<?php echo esc_attr($container_class); ?>">
        <div class="<?php echo join(' ', $check_sidebar); ?>">
            <div class="content-archive content-layout">
                <?php if (have_posts()) : ?>
                    <div class="row <?php echo esc_attr($blog_template); ?>" data-column="<?php echo esc_attr($blog_column); ?>">
                        <?php $params = [];

                        while (have_posts()) : the_post();
                            if ($wp_query->current_post == 0 && ! is_paged()) {
                                $params['first_post'] = true;
                            } else {
                                $params['first_post'] = false;
                            }

                            set_query_var('params', $params);

                            get_template_part('components/archives/' . $blog_template);

                        endwhile;
                        ?>
                    </div>

                <?php
                else :
                    get_template_part('components/archive/content', 'none');
                    ?>
                <?php endif; ?>

                <?php
                if ($wp_query->max_num_pages > 1) {
                    $pagination_quey = array(
                        'posts_per_page'   => get_option('posts_per_page'),
                        'layout'           => $blog_template,
                        'type'             => 'post',
                        'max_number_pages' => $wp_query->max_num_pages
                   );

                    set_query_var('pagination_quey', $pagination_quey);
                    get_template_part('components/paging/' . $pagination);
                }
                ?>
            </div>

            <?php wolfo_page_sidebar($blog_sidebar, $blog_widget); ?>
        </div>
    </div>
</div>

