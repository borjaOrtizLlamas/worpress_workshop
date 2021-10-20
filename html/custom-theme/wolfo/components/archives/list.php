<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

$size                        = 'medium';
$enable_post_date            = true;
$enable_post_author          = true;
$enable_post_categories      = false;
$blog_content_typo           = 'h4';
$blog_number_excerpt         = 35;
$enable_post_excerpt         = true;
$enable_readmore             = true;
$button_size                 = 'small';
$button_text                 = esc_html__('Continue Reading', 'wolfo');
$blog_first_post_layout      = 'layout-4';
$blog_first_enable_divider   = true;
$blog_first_enable_thumbnail = true;
$blog_first_enable_excerpt   = true;
$blog_first_number_excerpt   = 35;
$archive_item_column         = 1;
$first_post                  = false;
$class_first                 = ($first_post) ? 'first-' . $blog_first_post_layout : '';
$number_excerpt              = ($first_post) ? $blog_first_number_excerpt : $blog_number_excerpt;

$typo_first                  = ($blog_first_post_layout == 'layout-2') ? 'h2' : 'h3';
$typo_tag                    = $first_post ? $typo_first : $blog_content_typo;
$button_url                  = get_permalink();

$column_class = array(
	'post-listing',
	'column',
	'col-12',
	$class_first,
	($first_post && $blog_first_enable_divider) ? 'first-enable-divider' : '',
	($first_post && ! $blog_first_enable_thumbnail) ? 'no-thumb' : '',
);

?>
<?php if ($first_post) :
	$size = 'large';
	echo '<div class="archive-item-first">';
endif; ?>

<article id="post-<?php the_ID(); ?>" class="<?php echo implode(' ', $column_class); ?>">
	<?php if ($first_post) :
		echo '<div class="first-content">';
	endif; ?>
    <div <?php post_class(' post'); ?>>
		<?php
		if ($first_post && $blog_first_post_layout == 'layout-3') {
			if ($enable_post_categories) {
				echo wolfo_post_categories();
			}
			wolfo_post_content_title($typo_tag);
			if ($enable_post_date) {
				echo wolfo_meta_date_author();
			}
		}

		if ($first_post) {
			if ($blog_first_enable_thumbnail) {
				wolfo_post_thumbnail($size);
			}
		} else {
			wolfo_post_thumbnail($size);
		}
		?>

        <div class="post-content">
            <div class="post-content-wrapper">
				<?php
				if ($first_post) {
					if ($blog_first_post_layout == 'layout-2' || $blog_first_post_layout != 'layout-3') {
						if ($enable_post_categories) {
							echo wolfo_post_categories();
						}
						wolfo_post_content_title($typo_tag);
						echo wolfo_meta_date_author();
					}
					if ($blog_first_enable_excerpt) {
						wolfo_first_post_content_excerpt($number_excerpt);
					}
					if ($enable_readmore) {
						echo wolfo_get_button($button_text, $button_url, $button_size);
					}
				} else {
					if ($enable_post_categories) {
						echo wolfo_post_categories();
					}
					wolfo_post_content_title($typo_tag);
					echo wolfo_meta_date_author();
					wolfo_post_content_excerpt($number_excerpt);
					if ($enable_readmore) {
						echo wolfo_get_button($button_text, $button_url, $button_size);
					}
				} ?>
            </div>
        </div>
    </div>
	<?php if ($first_post) :
		echo '</div>';
	endif; ?>
</article>

<?php if ($first_post) :
	echo '</div>';
endif; ?>
