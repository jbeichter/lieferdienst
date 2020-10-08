<?php
/**
 * Translations
 *
 * @package Lieferdienst
 */

namespace Lieferdienst\Inc\Base;

use Lieferdienst\Inc\PluginBase;

/**
 * Translations
 */
class Translations extends PluginBase {

	/**
	 * Hook plugin-specific components into WordPress
	 */
	public function register() {
		add_action( 'init', array( $this, 'loadTextdomain' ) );
	}

	/**
	 * Load plugin's translation files
	 */
	public function loadTextdomain() {
		load_plugin_textdomain( 'lieferdienst', false, $this->util->translationsDirRel );
	}

}
