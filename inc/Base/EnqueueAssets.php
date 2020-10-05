<?php
/**
 * Styles and scripts
 *
 * @package Lieferdienst
 */

namespace Lieferdienst\Inc\Base;

use Lieferdienst\Inc\PluginBase;

/**
 * Styles and scripts
 */
class EnqueueAssets extends PluginBase {

	/**
	 * Hook plugin-specific components into WordPress
	 */
	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	/**
	 * Enqueue styles and scripts
	 */
	public function enqueue() {
		$style_version = '';
		wp_enqueue_style( 'lieferdienst_style', $this->util->assetsUrl . 'lieferdienst.css', array(), $style_version );
		$script_version = '';
		wp_enqueue_script( 'lieferdienst_script', $this->util->assetsUrl . 'lieferdienst.js', array(), $script_version, true );
	}

}
