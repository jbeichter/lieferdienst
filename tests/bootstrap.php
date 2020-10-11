<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Lieferdienst
 */

$_lieferdienst_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $_lieferdienst_tests_dir ) {
	$_lieferdienst_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $_lieferdienst_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $_lieferdienst_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $_lieferdienst_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function _lieferdienst_manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/lieferdienst.php';
}
tests_add_filter( 'muplugins_loaded', '_lieferdienst_manually_load_plugin' );

// Start up the WP testing environment.
require $_lieferdienst_tests_dir . '/includes/bootstrap.php';

if ( class_exists( 'Lieferdienst\\Inc\\Init' ) ) {
	echo "class check successful" . PHP_EOL;
} else {
	echo "class check NOT successful" . PHP_EOL;
	$autoloader_file = dirname( dirname( __FILE__ ) ) . '/vendor/autoload.php';
	echo "searching for autoloader at {$autoloader_file}" . PHP_EOL;

	// Initialize class loader.
	if ( file_exists( dirname( dirname( __FILE__ ) ) . '/vendor/autoload.php' ) ) {
		echo "autoload found" . PHP_EOL;
		require_once dirname( dirname( __FILE__ ) ) . '/vendor/autoload.php';
	} else {
		echo "autoload NOT found" . PHP_EOL;
		if ( class_exists( 'Lieferdienst\\Inc\\Init' ) ) {
			echo "class check successful" . PHP_EOL;
		} else {
			echo "class check NOT successful" . PHP_EOL;
		}
	}

}
