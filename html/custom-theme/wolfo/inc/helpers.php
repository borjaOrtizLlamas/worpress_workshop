<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

/**
 * Social List
 */
if ( ! function_exists( 'wolfo_generate_html_social_list' ) ) {
	function wolfo_generate_html_social_list( $socials ) {
		$html = '<div class="wolfo-social-list"><ul class="socials list-style-none pdm-0">';

		if ( ! empty( $socials ) ) {
			foreach ( $socials as $social ) {
				$title = wolfo_get_value_in_array( $social, 'title' );
				$icon  = wolfo_get_value_in_array( $social, 'icon' );
				$link  = wolfo_get_value_in_array( $social, 'link' );

				$html .= '<li class="social-item">';
				$html .= $link ? '<a href="' . esc_url( $link ) . '">' : '';
				$html .= $icon ? '<i class="' . esc_attr( $icon ) . '"></i>' : '';
				$html .= $title ? '<span>' . esc_attr( $title ) . '</span>' : '';
				$html .= $link ? '</a>' : '';
				$html .= '</li>';
			}
		}

		$html .= '</ul></div>';

		return $html;
	}
}

/**
 * Show Menu by ID
 */
if ( ! function_exists( 'wolfo_generate_html_menu_by_id' ) ) {
	function wolfo_generate_html_menu_by_id( $slug ) {
		$menu = wp_get_nav_menu_items( $slug );

		$html = '<div class="wolfo-menu">';
		$html .= '<ul class="menu list-style-none pdm-0">';

		if ( ! empty( $menu ) ) {
			foreach ( $menu as $item ) {
				if ( $item->menu_item_parent == '0' ) {
					$html .= '<li class="menu-item">';
					$html .= '<a href="' . esc_url( $item->url ) . '"><span>' . esc_attr( $item->title ) . '<span></span></a>';
					$html .= '</li>';
				}
			}
		}

		$html .= '</ul></div>';

		return $html;
	}
}

/**
 * Pagination
 */
/**
 * Render pagination.
 */
if ( ! function_exists( 'wolfo_pagination' ) ) {
	function wolfo_pagination() {
		echo '<div class="wolfo-pagination">';

		the_posts_pagination( array(
			'prev_text' => esc_html__( 'Previous', 'wolfo' ),
			'next_text' => esc_html__( 'Next', 'wolfo' ),
		) );

		echo '</div>';
	}
}

/**
 * Logo
 */
if ( ! function_exists( 'wolfo_generate_html_logo' ) ) {
	function wolfo_generate_html_logo( $logo ) {
		$alt = $logo['alt'] === '' ? get_bloginfo() : $logo['alt'];

		$html = '<div class="logo">';
		if ( $logo['url'] === '' ) {
			$html .= '<h1 class="mg-0"><a href="/">' . get_bloginfo() . '</a></h1>';
		} else {
			$html .= '<a href="/"><img src="' . $logo['url'] . '" alt="' . $alt . '"></a>';
		}
		$html .= '</div>';

		return $html;
	}
}

if ( ! function_exists( 'wolfo_get_button' ) ) {
    function wolfo_get_button( $name = '', $link = '#', $size = '' ) {
        $btn_style             = 'btn-default';
        $btn_hover_effect      = 'btn-effect-1';
        $btn_link_hover_effect = 'btn-effect-1';
        $btn_icon_code         = 'bx-right-arrow-alt';
        $btn_enable_dashed     =true;
        $btn_size              = $size ? $size : 'medium';

        $class_dashed = ( $btn_style == 'btn-outline' && $btn_enable_dashed == true ) ? 'enable-dashed' : '';
        $class_effect = ( $btn_style == 'btn-link' ) ? $btn_link_hover_effect : $btn_hover_effect;

        $class_btn = array(
            'wolfo-button',
            $btn_style,
            'size-' . $btn_size,
            $class_effect,
            $class_dashed,
        );

        $class_btn = array_filter( $class_btn );

        $html = array();

        $html[] = '<div class="' . implode( ' ', $class_btn ) . '">';
        $html[] = '<a href="' . esc_url($link) . '">';
        if ( $btn_style == 'btn-default' || $btn_style == 'btn-outline' ) {
            if ( $btn_hover_effect == 'btn-effect-3' ) {
                $html[] = '<i class="bx ' . $btn_icon_code . '"></i>';
            } elseif ( $btn_hover_effect == 'btn-effect-4' ) {
                $html[] = '<span>' . $name . '</span>';
                $html[] = '<span class="btn-line"></span>';
            } else {
                $html[] = '<span>' . $name . '</span>';
            }
        } elseif ( $btn_style == 'btn-link' ) {
            if ( $btn_link_hover_effect == 'btn-effect-1' ) {
                $html[] = '<span>' . $name . '</span>';
                $html[] = '<span class="btn-line"></span>';
            } elseif ( $btn_link_hover_effect == 'btn-effect-2' ) {
                $html[] = '<span class="btn-line top"></span>';
                $html[] = '<div class="link-name"><span class="btn-line top"></span><span>' . $name . '</span><span class="btn-line bottom"></span></div>';
                $html[] = '<span class="btn-line bottom"></span>';
            } else {
                $html[] = '<span>' . $name . '</span>';
            }
        } else {
            $html[] = '<span>' . $name . '</span>';
        }
        if ( $btn_style == 'btn-fancy' ) {
            $html[] = '<span class="btn-line top"></span><span class="btn-line bottom"></span>';
        }
        if ( $btn_style == 'btn-link' && $btn_link_hover_effect == 'btn-effect-2' ) {
            $html[] = '<span class="btn-line-af"></span>';
        }
        $html[] = '</a>';
        $html[] = '</div>';

        return implode( "\n", $html );
    }
}

if ( ! function_exists( 'wolfo_page_sidebar' ) ) {
    function wolfo_page_sidebar( $page, $sidebar ) {
        if ( $page != 'full' && is_active_sidebar( $sidebar ) ) {
            get_sidebar();
        }
    }
}

if ( ! function_exists( 'wolfo_style_flex_width' ) ) {
    function wolfo_style_flex_width( $data ) {
        $html = array(
            'flex: 0 0 ' . $data . ';',
            'max-width: ' . $data . ';',
        );

        return implode( '', $html );
    }
}