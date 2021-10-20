<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

/**
 * Footer area
 */
if ( ! function_exists( 'wolfo_footer_area' ) ) {
	function wolfo_footer_area() {
		$html = array();

		$widgets = wolfo_get_option( 'footer_widgets' );

		$html[] = '<footer id="wolfo-colophon" class="wolfo-footer">';
		$html[] = '<div class="container">';

		if ( $widgets ) {
			switch ( $widgets ) {
				case 1:
					$widget = array(
						'piece' => 1,
						'class' => 'col-md-12 col-sm-12',
					);

					break;
				case 2:
					$widget = array(
						'piece' => 2,
						'class' => 'col-md-6 col-sm-6',
					);

					break;
				case 3:
					$widget = array(
						'piece' => 3,
						'class' => 'col-md-4 col-sm-4',
					);

					break;
				case 4:
					$widget = array(
						'piece' => 4,
						'class' => 'col-md-3 col-xs-12',
					);

					break;
				case 5:
					$widget = array(
						'piece' => 6,
						'class' => 'col-md-2 col-sm-2',
					);

					break;
				case 6:
					$widget = array(
						'piece'  => 3,
						'class'  => 'col-md-3 col-sm-3',
						'layout' => 'col-md-6 col-sm-6',
						'queue'  => 1,
					);

					break;
				case 7:
					$widget = array(
						'piece'  => 3,
						'class'  => 'col-md-3 col-sm-3',
						'layout' => 'col-md-6 col-sm-6',
						'queue'  => 2,
					);

					break;
				case 8:
					$widget = array(
						'piece'  => 3,
						'class'  => 'col-md-3 col-sm-3',
						'layout' => 'col-md-6 col-sm-6',
						'queue'  => 3,
					);

					break;
				case 9:
					$widget = array(
						'piece'  => 4,
						'class'  => 'col-md-2 col-sm-2',
						'layout' => 'col-md-6 col-sm-6',
						'queue'  => 1,
					);

					break;
				case 10:
					$widget = array(
						'piece'  => 4,
						'class'  => 'col-md-2 col-sm-2',
						'layout' => 'col-md-6 col-sm-6',
						'queue'  => 4,
					);

					break;
			}

			$html[] = '<div class="wolfo-footer-widgets">';
			$html[] = '<div class="row">';

			for ( $i = 1; $i < $widget['piece'] + 1; $i ++ ) {
				$widget_class = isset( $widget['queue'] ) && $widget['queue'] == $i ? $widget['layout'] : $widget['class'];

				$html[] = '<div class="' . $widget_class . '">';

				ob_start();
				dynamic_sidebar( 'footer-' . $i );

				$html[] = ob_get_clean();
				$html[] = '</div>';

			}

			$html[] = '</div>';
			$html[] = '</div>';
		}

		$enable_copyright = wolfo_get_option( 'enable_copyright' );
		$copyright_layout = wolfo_get_option( 'ccopyright_layout', '2' );

		if ( $enable_copyright == true ) {
			$html[] = '<div id="wolfo-copyright" class="wolfo-copyright">';
			$html[] = '<div class="wolfo-inner">';

			if ( $copyright_layout == '2' ) {
				$html[] = wolfo_copyright_modules( 'left' );
				$html[] = wolfo_copyright_modules( 'right' );
			} else if ( $copyright_layout == '1' ) {
				$html[] = wolfo_copyright_modules( 'center' );
			}

			$html[] = '</div>';
			$html[] = '</div>';
		}

		$html[] = '</div>';
		$html[] = '</footer>';

		return implode( "\n", $html );
	}
}

/**
 * Render Copyright module.
 */
if ( ! function_exists( 'wolfo_copyright_modules' ) ) {
	function wolfo_copyright_modules( $data, $mode ) {
		$html = array();

		switch ( $mode ) {
			case 'text':
				$html[] = '<div class="modute-txt">' . wpautop( $data ) . '</div>';
				break;
			case 'menu':
				$html[] = wolfo_generate_html_menu_by_id( $data );
				break;
			case 'socials':
				$html[] = wolfo_generate_html_social_list( $data );
				break;
			case 'newsletter':
				$html[] = wolfo_generate_newsletter( $data );
				break;
		}

		return implode( "\n", $html );
	}
}

if ( ! function_exists( 'wolfo_footer_modules' ) ) {
	function wolfo_footer_modules( $module_option = array(), $layout = '' ) {
		$count = is_array( $module_option ) ? count( $module_option ) : 1;

		$column = $count === 5 ? 'cols-lg-20' : 'col-lg-' . ( 12 / $count );

		$html = array();
		if ( is_array( $module_option ) || is_object( $module_option ) ) {
			foreach ( $module_option as $item ) {
				$title       = wolfo_get_value_in_array( $item, 'title' );
				$module      = wolfo_get_value_in_array( $item, 'module' );
				$select_menu = wolfo_get_value_in_array( $item, 'select_menu' );
				$social_list = wolfo_get_value_in_array( $item, 'social_list' );

				switch ( $layout ) {
					case 'footer-2':
						$enable_newsletter = wolfo_get_value_in_array( $item, 'footer_2_enable_newsletter' );
						$id_newsletter     = wolfo_get_value_in_array( $item, 'footer_2_id_newsletter' );
						break;
					case 'footer-3':
						$contact_content = wolfo_get_value_in_array( $item, 'contact_content' );
						break;
					default:
						$enable_newsletter = '0';
						break;
				}

				$html[] = '<div class="column col-12 ' . $column . '">';
				$html[] = '<div class="module-content module-' . $module . '">';
				$html[] = $title ? '<div class="heading-title"><h5 class="title mg-0">' . $title . '</h5></div>' : '';
				$html[] = '<div class="entry-content">';
				switch ( $module ) {
					case 'menu':
						$html[] = wolfo_generate_html_menu_by_id( $select_menu );
						break;
					case 'social':
						$html[] = wolfo_generate_html_social_list( $social_list );
						break;
					case 'contact':
						$html[] = '<div class="modute-txt">' . wpautop( $contact_content ) . '</div>';
						break;
				}
				$html[] = '</div>';
				$html[] = '</div>';

				if ( $enable_newsletter === '1' && $layout === 'footer-2' ) {
					$html[] = wolfo_generate_newsletter( $id_newsletter );
				}
				$html[] = '</div>';
			}
		}

		return implode( '', $html );
	}
}
