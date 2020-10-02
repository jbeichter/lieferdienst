<?php
/**
 * Handle plugin initialization, i.e. hook in all of the plugin's functionality into WordPress.
 *
 * @package Lieferdienst
 */

namespace lieferdienst\Inc;

/**
 * Initialize the plugin's service classes.
 */
class Init {

	/**
	 * List of all services to initialize.
	 *
	 * @return array List of service classes
	 */
	public static function get_services() {
		return array();
	}

	/**
	 * Instantiate services and register them with WordPress.
	 */
	public static function register_services() {
		foreach ( self::get_services() as $class ) {
			$service = new $class();
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

}
