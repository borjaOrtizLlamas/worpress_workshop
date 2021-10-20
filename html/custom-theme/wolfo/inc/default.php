<?php
/**
 * @copyright Copyright (c) 2021 WolfCoding (https://wolfcoding.com). All rights reserved.
 */
if (!defined('ABSPATH')) {
    return;
}

class WOLFO_Value_Options_Default {


	public static function typography_h1() {
		return array(
			'color'          	=> '#2b3769',
			'font-family'    	=> 'PT Serif Caption',
			'font-size'      	=> '45',
			'line-height'    	=> '50',
			'font-weight'		=> '400',
			'text-transform' 	=> 'none',
			'subset'         	=> 'latin-ext',
			'type'           	=> 'google',
			'unit'           	=> 'px',
		);
	}

	public static function typography_h2() {
		return array(
			'color'          	=> '#2b3769',
			'font-family'    	=> 'PT Serif Caption',
			'font-size'      	=> '36',
			'line-height'    	=> '40',
			'font-weight'		=> '400',
			'text-transform' 	=> 'none',
			'subset'         	=> 'latin-ext',
			'type'           	=> 'google',
			'unit'           	=> 'px',
		);
	}

	public static function typography_h3() {
		return array(
			'color'          => '#2b3769',
			'font-family'    => 'PT Serif Caption',
			'font-size'      => '24',
			'line-height'    => '30',
			'text-transform' => 'none',
			'font-weight'		=> '400',
			'subset'         => 'latin-ext',
			'type'           => 'google',
			'unit'           => 'px',
		);
	}

	public static function typography_h4() {
		return array(
			'color'          => '#2b3769',
			'font-family'    => 'PT Serif Caption',
			'font-size'      => '20',
			'line-height'    => '24',
			'font-weight'		=> '400',
			'text-transform' => 'none',
			'subset'         => 'latin-ext',
			'type'           => 'google',
			'unit'           => 'px',
		);
	}

	public static function typography_h5() {
		return array(
			'color'          => '#2b3769',
			'font-family'    => 'PT Serif Caption',
			'font-size'      => '18',
			'line-height'    => '22',
			'font-weight'		=> '400',
			'text-transform' => 'none',
			'subset'         => 'latin-ext',
			'type'           => 'google',
			'unit'           => 'px',
		);
	}

	public static function typography_h6() {
		return array(
			'color'          => '#2b3769',
			'font-family'    => 'PT Serif Caption',
			'font-size'      => '16',
			'line-height'    => '20',
			'font-weight'		=> '400',
			'text-transform' => 'none',
			'subset'         => 'latin-ext',
			'type'           => 'google',
			'unit'           => 'px',
		);
	}

	public static function button() {
		return [
			'button_color'	=> [
				'color'	=> '',
				'hover'	=> '',
			],
			'button_background'	=> [
				'normal'	=> '',
				'hover'		=> '',
			],
			'button_border_enable'	=> '1',
			'button_border'	=> [
				'top'		=> '',
				'right'		=> '',
				'bottom'	=> '',
				'left'		=> '',
				'style'		=> '',
				'color'		=> '',
			],
			'button_border_hover_color'	=> '',
			'button_border_radius'		=> [
				'top'		=> '',
				'right'		=> '',
				'bottom'	=> '',
				'left'		=> '',
			],
			'button_padding'	=> [
				'top'		=> '',
				'right'		=> '',
				'bottom'	=> '',
				'left'		=> '',
			],
			'button_effect'	=> 'style-3'
		];
	}

	public static function input() {
		return [
			'input_color'			=> '',
			'input_background'		=> '',
			'input_border_enable'	=> '',
			'input_border'			=> [
				'top'		=> '',
				'right'		=> '',
				'bottom'	=> '',
				'left'		=> '',
				'style'		=> '',
				'color'		=> '',
			],
			'input_border_radius'	=> [
				'top'		=> '',
				'right'		=> '',
				'bottom'	=> '',
				'left'		=> '',
			],
			'input_padding'	=> [
				'top'		=> '',
				'right'		=> '',
				'bottom'	=> '',
				'left'		=> '',
			]
		];
	}

}