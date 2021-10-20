<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

global $post;

$single_post_layout          = 'bottom-title';
$single_post_alignment       = 'left';
$enable_post_date            = true;
$enable_post_author          = true;
$enable_post_categories      = false;
$post_sidebar_padding        = 0;
$post_sidebar_layout         = get_theme_mod('wolfo_post_sidebar');
$single_post_sidebar_content = 'primary-bar';
$post_enable_excerpt         = true;
$post_author_enable          = true;
$post_navigation_enable      = true;
$post_comment_enable         = true;
$post_related_enable         = false;
$related_column              = 3;
$excerpt_class               = (! $post_enable_excerpt || ! has_excerpt()) ? 'no-excerpt' : '';
$thumb_url                   = (has_post_thumbnail()) ? get_the_post_thumbnail_url($post->ID, 'full') : '';

$post_details          = get_post_meta($post->ID, '_custom_post_options', true);
$post_layout           = wolfo_get_value_in_array($post_details, 'post_layout');
$post_layout_alignment = wolfo_get_value_in_array($post_details, 'post_layout_alignment');
$post_comments         = wolfo_get_value_in_array($post_details, 'post_comments');
$post_related          = wolfo_get_value_in_array($post_details, 'post_related');
$sidebar_position      = wolfo_get_value_in_array($post_details, 'sidebar_position');
$sidebar_content       = wolfo_get_value_in_array($post_details, 'sidebar_content');

$single_post_layout    = ($post_layout != 'default' && $post_layout != '') ? $post_layout : $single_post_layout;
$single_post_alignment = ($post_layout_alignment == 'default') ? $single_post_alignment : $post_layout_alignment;
$post_comment_enable   = ($post_comments == 'enable') ? true : $post_comment_enable;
$post_comment_enable   = ($post_comments == 'disable') ? false : $post_comment_enable;

$post_related_enable = ($post_related == 'enable') ? true : $post_related_enable;
$post_related_enable = ($post_related == 'disable') ? false : $post_related_enable;

$post_sidebar_layout         = ($sidebar_position != '' && $sidebar_position != 'default') ? $sidebar_position : $post_sidebar_layout;
$single_post_sidebar_content = ($sidebar_position != '' && $sidebar_position != 'default') ? $sidebar_content : $single_post_sidebar_content;


$check_sidebar = array(
	$post_sidebar_layout,
	($post_sidebar_padding > 30) ? 'has-biger' : '',
);
//== Check layout sidebar
$check_sidebar[] = ($post_sidebar_layout != 'full' && is_active_sidebar($single_post_sidebar_content)) ? 'has-sidebar' : 'has-no-sidebar';

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('single-post-article clearfix info-' . $single_post_layout . ' title-' . $single_post_alignment); ?>>
    <div class="content-default single-post-wapper">
		<?php if ($single_post_layout == 'parallax') {
			wolfo_post_single_info($single_post_layout);
		} ?>

        <div class="container">
            <div class="<?php echo join(' ', $check_sidebar); ?>">
                <div class="row">
                    <div class="content-layout content-blog">
						<?php if ($single_post_layout != 'parallax') {
							wolfo_post_single_info($single_post_layout);
						} ?>
                        <div class="inner-content-post">
                            <div class="single-post-content flex-x align-center">
                                <div class="col-12 col-lg-12">
									<?php
									if ($post_enable_excerpt) {
										wolfo_post_single_excerpt();
									}
									wolfo_post_single_content();
									if ($post_navigation_enable) {
										wolfo_post_single_navigation();
									}
									if ($post_author_enable && ! empty(get_the_author_meta('description'))) {
										//== [ author ]
										wolfo_post_single_author();
									}
									if ($post_comment_enable) {
										//== [ comment ]
										wolfo_post_single_comment();
									} ?>
                                </div>
                            </div>
                        </div>
                    </div>

					<?php wolfo_page_sidebar($post_sidebar_layout, $single_post_sidebar_content); ?>
                </div>
            </div>
        </div>
		<?php if ($post_related_enable) {
			//== [ related post ]
			wolfo_post_single_related();
		} ?>
    </div>
</article>
