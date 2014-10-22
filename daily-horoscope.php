<?php
/*
Plugin Name: Honest Daily Horoscope
Plugin URI: http://waffle.technology
Description: Provides an honest daily horoscope for each astrology sign!
Version: 1.0
Author: ramiabraham
License:

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

class HonestDailyHoroscope {

	/**
	 * constructor
	 */
	function __construct() {

		register_activation_hook( __FILE__, array( &$this, 'install_honest_daily_horoscope' ) );

		add_action( 'init', array( &$this, 'init_honest_daily_horoscope' ) );
	}

	/**
	 * the goggles do nothing
	 */
	function install_honest_daily_horoscope() {

	}

	/**
	 * runs when initialized
	 */
	function init_honest_daily_horoscope() {

		add_shortcode( 'honest_daily_horoscope', array( &$this, 'render_shortcode' ) );
	}

	/**
	 * just being honest with you k
	 */
	function render_shortcode($atts, $content = null ) {

		extract(shortcode_atts(array(
			'sign' => ''
			), $atts));

		return '<strong>Daily horoscope for ' . $sign . ', ' . date_i18n('j F Y') . ':</strong> The position and behavior of the stars and planets have absolutely no influence on anything in your life.';

	}

}
new HonestDailyHoroscope();