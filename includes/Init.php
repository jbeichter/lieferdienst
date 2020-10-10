<?php
/**
 * Handle plugin initialization, i.e.
 * hook in all of the plugin's functionality into WordPress.
 *
 * @package Lieferdienst
 */
namespace Lieferdienst\Inc;

/**
 * Initialize the plugin.
 */
class Init {

	/**
	 * List of all services to initialize.
	 */
	public static function getServices() {
		return array(
			Base\Translations::class,
			Base\EnqueueAssets::class,
			Pages\AdminPages::class,
			Blocks\OrderForm\OrderFormBlock::class,
		);
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
