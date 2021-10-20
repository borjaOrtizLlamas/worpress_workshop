<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

global $post;
$style_builder = Wolfo_Style_Builder::getInstance();

/**
 * Blog
 */
$blog_sidebar           = get_theme_mod('wolfo_blog_sidebar', 'right');
$blog_widget            = get_theme_mod('wolfo_blog_widget', 'primary-bar');
$blog_sidebar_width     = 300;

$blog_sidebar_class     = '.content-archive-wapper .' . $blog_sidebar . ' .content-sidebar';
$blog_math_width        = 'calc(100% - ' . $blog_sidebar_width . 'px);';


if (is_active_sidebar($blog_widget) && $blog_sidebar != 'full') {
	$style_builder->addStyle('.content-archive-wapper .wolfo-sidebar', wolfo_style_flex_width($blog_sidebar_width . 'px'));
	$style_builder->addStyle('.content-archive-wapper .content-layout', wolfo_style_flex_width($blog_math_width));
}

/**
 * Post
 */
$post_sidebar           = get_theme_mod('wolfo_post_sidebar', 'right');
$post_sidebar_width     = 300;
$post_widget            = 'primary-bar';
$post_sidebar_width     = $post_sidebar_width . 'px';
$post_content_width     = 'calc(100% - ' . $post_sidebar_width . ');';
$post_class             = '.single-post-wapper .' . $post_sidebar . ' .content-sidebar';

if (is_active_sidebar($post_widget) && $post_sidebar != 'full') {
	$style_builder->addStyle('.single-post-wapper .content-layout', wolfo_style_flex_width($post_content_width));
	$style_builder->addStyle('.single-post-wapper .wolfo-sidebar', wolfo_style_flex_width($post_sidebar_width));
}

