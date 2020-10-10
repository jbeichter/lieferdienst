<?php
/**
 * OrderForm Block
 *
 * @package Lieferdienst
 */

namespace Lieferdienst\Inc\Blocks\OrderForm;

use Lieferdienst\Inc\PluginBase;

/**
 * OrderForm Block
 */
class OrderFormBlock extends PluginBase {

	/**
	 * Hook plugin-specific components into WordPress
	 */
	public function register() {
	    add_action( 'init', array( $this, 'init_block' ) );
	}
	
	/**
	 * Initialize the block
	 */
	public function init_block() {
    	$dir = dirname( __FILE__ );
    
    	$script_asset_path = "$dir/build/index.asset.php";
    	$index_js     = 'build/index.js';
    	$script_asset = require( $script_asset_path );
    	wp_register_script(
    		'lieferdienst-orderform-block-editor',
    		plugins_url( $index_js, __FILE__ ),
    		$script_asset['dependencies'],
    		$script_asset['version']
    	);
    	wp_set_script_translations( 'lieferdienst-orderform-block-editor', 'orderform' );
    
    	$editor_css = 'build/index.css';
    	wp_register_style(
    		'lieferdienst-orderform-block-editor',
    		plugins_url( $editor_css, __FILE__ ),
    		array(),
    		filemtime( "$dir/$editor_css" )
    	);
    
    	$style_css = 'build/style-index.css';
    	wp_register_style(
    		'lieferdienst-orderform-block',
    		plugins_url( $style_css, __FILE__ ),
    		array(),
    		filemtime( "$dir/$style_css" )
    	);
    
    	register_block_type( 'lieferdienst/orderform', array(
    		'editor_script' => 'lieferdienst-orderform-block-editor',
    		'editor_style'  => 'lieferdienst-orderform-block-editor',
    		'style'         => 'lieferdienst-orderform-block',
    	) );
    }
    
}
