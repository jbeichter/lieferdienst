<?php
/**
 * Control activation and deactivation of the plugin.
 *
 * @package Lieferdienst
 */

namespace lieferdienst\Inc\Base;

/**
 * This class contains the callbacks used to control the activation and deactivation of the plugin.
 */
class Activation {

	/**
	 * Called when the plugin gets activated.
	 */
	public static function activate() {
		flush_rewrite_rules();

		$default = array();
		if ( ! get_option( 'lieferdienst' ) ) {
			update_option( 'lieferdienst', $default );
		}
	}

	/**
	 * Called when the plugin gets deactivated.
	 */
	public static function deactivate() {
		flush_rewrite_rules();
	}

}
