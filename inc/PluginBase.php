<?php

namespace Lieferdienst\Inc;

class PluginBase {

	public $util;

	public function __construct() {
		$this->util = PluginUtil::getInstance();
	}

}
