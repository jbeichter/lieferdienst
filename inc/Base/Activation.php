<?php

/**
 * @package Lieferdienst
 */
namespace Inc\Base;

class Activation {

	public static function activate() {
		flush_rewrite_rules();

		$default = array();
		if ( ! get_option( 'lieferdienst' ) ) {
			update_option( 'lieferdienst', $default );
		}
	}

	public static function deactivate() {
		flush_rewrite_rules();
	}

}
