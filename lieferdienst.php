<?php
/**
 * Plugin Name:     Lieferdienst
 * Plugin URI:      https://github.com/jbeichter/lieferdienst
 * Description:     Manage simple form orders and their deliveries.
 * Author:          Johannes Beichter
 * Author URI:      https://github.com/jbeichter
 * License:         GPLv2 or later
 * Text Domain:     lieferdienst
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Lieferdienst
 */

/*
	Lieferdienst - Manage simple form orders and their deliveries.
	Copyright (C) 2020  Johannes Beichter

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License along
	with this program; if not, write to the Free Software Foundation, Inc.,
	51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
*/

defined( 'ABSPATH' ) || die();

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * Plugin activation
 */
function lieferdienst_activate() {
	Inc\Base\Activation::activate();
}
register_activation_hook( __FILE__, 'lieferdienst_activate' );

/**
 * Plugin deactivation
 */
function lieferdienst_deactivate() {
	Inc\Base\Activation::deactivate();
}
register_deactivation_hook( __FILE__, 'lieferdienst_deactivate' );

/**
 * Plugin initialization
 */
if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::registerServices();
}
