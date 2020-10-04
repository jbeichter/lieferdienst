<?php
/**
 * @package Lieferdienst
 */

namespace Lieferdienst\Inc;

/**
 * Utility class
 */
class PluginUtil {

	private static $instance = null;

	public $pluginName;
	public $pluginKey;

	public $pluginDir;
	public $pluginRelTranslationsDir;
	public $templatesDir;

	public $pluginUrl;
	public $assetsUrl;

	private function __construct() {
		$this->pluginName = dirname( dirname( plugin_basename( __FILE__ ) ) );
		$this->pluginKey = $this->pluginName . "/" . $this->pluginName . ".php";

		$this->pluginDir = dirname( dirname( __FILE__ ) );
		$this->pluginRelTranslationsDir = $this->pluginName . '/languages';
		$this->templatesDir = $this->pluginDir . '/templates';

		$this->pluginUrl = plugin_dir_url( $this->pluginDir );
		$this->assetsUrl = $this->pluginUrl . '/assets';
	}

	public static function getInstance() {
		if ( PluginUtil::$instance == null ) {
			PluginUtil::$instance = new PluginUtil();
		}
		return PluginUtil::$instance;
	}

}
