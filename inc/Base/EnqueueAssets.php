<?php

/**
 * @package Lieferdienst
 */
namespace Lieferdienst\Inc\Base;

use Lieferdienst\Inc\PluginBase;

class EnqueueAssets extends PluginBase {

	public function register() {
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
	}

	function enqueue() {
		wp_enqueue_style( 'lieferdienst_style', $this->util->assetsUrl . 'lieferdienst.css' );
		wp_enqueue_script( 'lieferdienst_script', $this->util->assetsUrl . 'lieferdienst.js' );
	}

}
