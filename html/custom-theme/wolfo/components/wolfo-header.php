<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

global $post;

$page_title_row       = 'stretch-row';
$page_title_layout    = 'top-breadcrumb';
$page_title_alignment = 'center';
$enable_breadcrumb    = true;
$enable_title         = true;
$enable_description   = true;

$desc       = '';
$page_title = get_the_title();

//single product
if ( is_singular( 'product' ) ) {
    global $post;

    $woo_single_enable_breadcrumb = true;
    $enable_breadcrumb            = $woo_single_enable_breadcrumb;

    $product_details    = get_post_meta( $post->ID, '_custom_product_options', true );
    $product_breadcrumb = wolfo_get_value_in_array( $product_details, 'product_breadcrumb' );

    $enable_breadcrumb = ( $product_breadcrumb == 'enable' ) ? true : $enable_breadcrumb;
    $enable_breadcrumb = ( $product_breadcrumb == 'disable' ) ? false : $enable_breadcrumb;
}

//Single Post
if ( is_single() ) {
    global $post;

    $single_post_enable_breadcrumb = false;
    $enable_breadcrumb             = $single_post_enable_breadcrumb;

    $post_details    = get_post_meta( $post->ID, '_custom_post_options', true );
    $post_breadcrumb = wolfo_get_value_in_array( $post_details, 'post_breadcrumb' );

    $enable_breadcrumb = ( $post_breadcrumb == 'enable' ) ? true : $enable_breadcrumb;
    $enable_breadcrumb = ( $post_breadcrumb == 'disable' ) ? false : $enable_breadcrumb;
}

if ( is_category() || is_tax( 'product_cat' ) || is_tax( 'brands' ) ) {
    ob_start();
    $page_title = single_term_title();

    $page_title = ob_get_clean();
} else if ( is_search() ) {
    ob_start();
    $page_title         = printf( esc_html__( 'Search Results for: %s', 'wolfo' ), '' . get_search_query() . '' );
    $page_title         = ob_get_clean();
    $enable_description = false;
} else if ( is_404() ) {
    $page_title = esc_html__( 'Page Not Found', 'wolfo' );
} else if ( is_author() ) {
    $page_title = esc_html__( 'Author Archives: ', 'wolfo' ) . get_the_author();
} else if ( is_tag() || is_tax( 'product_tag' ) ) {
    $page_title = esc_html__( 'Tags Archives: ', 'wolfo' ) . single_tag_title( '', false );
} else if ( is_day() ) {
    $page_title = esc_html__( 'Daily Archives: ', 'wolfo' ) . get_the_date();
} else if ( is_month() ) {
    $page_title = esc_html__( 'Monthly Archives: ', 'wolfo' ) . get_the_date( 'F Y' );
} else if ( is_year() ) {
    $page_title = esc_html__( 'Yearly Archives: ', 'wolfo' ) . get_the_date( 'Y' );
} else if ( class_exists( 'WooCommerce' ) && is_singular( 'product' ) ) {
    $page_title = esc_html__( 'Product', 'wolfo' );
}

if ( is_tax( 'product_cat' ) || is_category() || is_tag() || is_tax( 'product_tag' ) ) {
    $queried_object = get_queried_object();
    $term_id        = $queried_object->term_id;
    $desc           = term_description( $term_id, 'product_cat' );
}

if ( is_front_page() ) {
    return;
}

$class_tt = array(
    'layout-' . $page_title_layout,
    'txt-' . $page_title_alignment,
);
?>
<?php if ( ! is_404() ) : ?>
    <?php if ( $page_title_row == 'stretch-row' ) {
        echo '<div class="page-title ' . implode( ' ', $class_tt ) . '">';
        echo '<div class="container">';
    } else {
        echo '<div class="container">';
        echo '<div class="page-title ' . implode( ' ', $class_tt ) . '">';
    } ?>
    <div class="content-wrapper">
        <?php if ( $enable_breadcrumb ) : ?>
            <div class="breadcrumbs-wrapper">
                <?php get_template_part( 'templates/breadcrumb' ); ?>
            </div>
        <?php endif; ?>
        <?php
        if ( ( ! ( class_exists( 'WooCommerce' ) && is_singular( 'product' ) ) && ! is_singular( 'post' ) ) ) :
            if ( ( $enable_title && $page_title ) || ( $enable_description && $desc ) ) { ?>
                <div class="page-title-wrapper">

                <?php if ( $enable_title && $page_title ) { ?>
                    <h1 class="entry-page-title"><?php echo esc_attr( $page_title ); ?>></h1>
                <?php } ?>
                <?php if ( $enable_description && $desc ) { ?>
                    <p class="entry-description"><?php echo wp_strip_all_tags( $desc ); ?></p>
                <?php } ?>

                </div>
            <?php }
        endif; ?>
    </div>
    </div>
    </div>
<?php endif; ?>