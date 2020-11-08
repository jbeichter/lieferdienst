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
		$this->enqueue_styles();
		$this->enqueue_scripts();
	}
	
	private function enqueue_styles() {
		$style_version = '';
		wp_enqueue_style( 'lieferdienst_style', $this->util->assetsUrl . 'lieferdienst.css', array(), $style_version );
	}
	
	private function enqueue_scripts() {
		wp_enqueue_script( 'lieferdienst_script_vue', $this->util->assetsUrl . 'vue.min.js', array(), '2.6.12', true );
		$script_version = '';
		wp_enqueue_script( 'lieferdienst_script', $this->util->assetsUrl . 'lieferdienst.js', array(), $script_version, true );
	}

}
