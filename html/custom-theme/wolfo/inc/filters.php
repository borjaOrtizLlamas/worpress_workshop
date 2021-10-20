<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}
/**
 * Add custom classes to the aray of body classes
 */
if (!function_exists('wolfo_filter_body_classes')) {
	function wolfo_filter_body_classes($classes) {
		return $classes;
	}

	add_filter('body_class', 'wolfo_filter_body_classes');
}

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
if (!function_exists('wolfo_header_add_to_cart_fragment')) {
	function wolfo_header_add_to_cart_fragment($fragments) {
		ob_start();
		$count = WC()->cart->cart_contents_count;

		?>
		<a class="wolfo-btn-cart" href="<?php echo esc_url(wc_get_cart_url()); ?>">
			<span class="ct"><i class="fa fa-shopping-cart"></i></span>
			<span class="nm">
				(<span class="cart-count"><?php echo esc_html($count); ?></span>)
				<?php echo esc_html__('Item', 'wolfo'); ?>
			</span>

		</a>

		<?php
		$fragments['a.wolfo-btn-cart'] = ob_get_clean();

		return $fragments;
	}

	add_filter('woocommerce_add_to_cart_fragments', 'wolfo_header_add_to_cart_fragment');
}

/**
 * Mini Cart
 */
if (!function_exists('wolfo_header_mini_cart_fragment')) {
	function wolfo_header_mini_cart_fragment($fragments) {
		ob_start();

		woocommerce_mini_cart();
		$mini_cart = ob_get_clean();

		?>
		<div class="wolfo-cart-content"><?php echo json_decode(json_encode($mini_cart)); ?></div>

		<?php
		$fragments['.wolfo-cart-content'] = ob_get_clean();

		return $fragments;
	}

	add_filter('woocommerce_add_to_cart_fragments', 'wolfo_header_mini_cart_fragment');
}
