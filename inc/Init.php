<?php

/**
 * @package Lieferdienst
 */
namespace Inc;

class Init {

	/**
	 * List of all services to initialize.
	 * @return array List of service classes
	 */
	public static function getServices() {
		return [
		];
	}

	/**
	 * Instantiate services and register them with WordPress.
	 */
	public static function registerServices() {
		foreach ( self::getServices() as $class ) {
			$service = new $class();
			if ( method_exists( $service, 'register' ) ) {
				$service->register();
			}
		}
	}

}
