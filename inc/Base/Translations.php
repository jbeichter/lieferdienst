<?php
/**
 * Manage plugin translations
 *
 * @package Lieferdienst
 */

namespace Lieferdienst\Inc\Base;

use Lieferdienst\Inc\PluginBase;

/**
 * This class loads available translations for the plugin
 */
class Translations extends PluginBase {

	public function register() {
		add_action( 'init', array( $this, 'loadTextdomain' ) );
	}

	function loadTextdomain() {
		load_plugin_textdomain( 'lieferdienst', false, $this->util->pluginRelTranslationsDir );
	}

}
