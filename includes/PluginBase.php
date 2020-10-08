<?php
/**
 * Common base class for the plugin's components
 *
 * @package Lieferdienst
 */

namespace Lieferdienst\Inc;

/**
 * Common base class for the plugin's components
 */
class PluginBase {

	public $util;

	/**
	 * PluginBase constructor
	 */
	public function __construct() {
		$this->util = PluginUtil::getInstance();
	}

}
