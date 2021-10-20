<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
	return;
}

$sidebar = 'primary-bar';

if (is_single()) {
	$sidebar = wolfo_get_option('blog_single_sidebar_type', 'primary-bar');
}

if (class_exists('WooCommerce')) {
	if (is_shop()) {
		$sidebar = wolfo_get_option('shop_sidebar_type', 'shop-bar');
	}

	if (is_product()) {
		$sidebar = wolfo_get_option('product_sidebar_type', 'product-bar');
	}
}

?>

<?php if (is_active_sidebar($sidebar)) : ?>
	<div class="wolfo-sidebar">
		<aside id="sidebar">
			<?php dynamic_sidebar($sidebar); ?>
		</aside>
	</div>
<?php endif; ?>