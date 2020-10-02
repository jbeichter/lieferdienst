<?php
/**
 * PHPUnit bootstrap file
 *
 * @package Lieferdienst
 */

$lieferdienst_tests_dir = getenv( 'WP_TESTS_DIR' );

if ( ! $lieferdienst_tests_dir ) {
	$lieferdienst_tests_dir = rtrim( sys_get_temp_dir(), '/\\' ) . '/wordpress-tests-lib';
}

if ( ! file_exists( $lieferdienst_tests_dir . '/includes/functions.php' ) ) {
	echo "Could not find $lieferdienst_tests_dir/includes/functions.php, have you run bin/install-wp-tests.sh ?" . PHP_EOL; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	exit( 1 );
}

// Give access to tests_add_filter() function.
require_once $lieferdienst_tests_dir . '/includes/functions.php';

/**
 * Manually load the plugin being tested.
 */
function lieferdienst_manually_load_plugin() {
	require dirname( dirname( __FILE__ ) ) . '/lieferdienst.php';
}
tests_add_filter( 'muplugins_loaded', '_manually_load_plugin' );

// Start up the WP testing environment.
require $lieferdienst_tests_dir . '/includes/bootstrap.php';
