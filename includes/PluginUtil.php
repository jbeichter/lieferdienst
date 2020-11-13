<?php
/**
 * Utility class
 *
 * @package Lieferdienst
 */

namespace Lieferdienst\Inc;

/**
 * Utility class
 */
class PluginUtil {

	private static $pluginFile = '';
	private static $instance   = null;

	public $pluginName;
	public $pluginKey;

	public $pluginDir;
	public $translationsDir;
	public $translationsDirRel;
	public $templatesDir;

	public $pluginUrl;
	public $assetsUrl;

	/**
	 * PluginUtil constructor
	 */
	private function __construct() {
		$this->pluginKey  = plugin_basename( self::$pluginFile );
		$this->pluginName = dirname( $this->pluginKey );

		$this->pluginDir          = dirname( self::$pluginFile );
		$this->translationsDir    = $this->pluginDir . '/languages';
		$this->translationsDirRel = $this->pluginName . '/languages';
		$this->templatesDir       = $this->pluginDir . '/templates';

		$this->pluginUrl = plugin_dir_url( self::$pluginFile );
		$this->assetsUrl = plugins_url( 'assets', self::$pluginFile );
	}

	/**
	 * Get the singleton instance
	 */
	public static function getInstance() {
		if ( null === self::$instance ) {
			self::$instance = new PluginUtil();
		}
		return self::$instance;
	}

	/**
	 * Construct the singleton
	 */
	public static function setPluginFile( $pluginFile ) {
		self::$pluginFile = $pluginFile;
	}
}
