<?php
/**
 * Admin Pages
 *
 * @package Lieferdienst
 */

namespace Lieferdienst\Inc\Pages;

use Lieferdienst\Inc\PluginBase;

/**
 * Admin Pages
 */
class AdminPages extends PluginBase {

	private $settingsSlug;

	/**
	 * Hook plugin-specific components into WordPress
	 */
	public function register() {
		add_action( 'admin_menu', array( $this, 'addPages' ) );
		add_filter( "plugin_action_links_{$this->util->pluginKey}", array( $this, 'addSettingsLink' ) );
	}

	/**
	 * Callback that adds the Admin Pages
	 */
	public function addPages() {
		$mainSlug = 'lieferdienst';
		$this->addDashboardPage( $mainSlug );
		$this->addSettingsPage( $mainSlug );
	}

	/**
	 * Dashboard Page
	 */
	public function addDashboardPage( $mainSlug ) {
		$pageTitle = __( 'Dashboard', 'lieferdienst' );
		add_menu_page(
			$pageTitle,
			__( 'Delivery Service', 'lieferdienst' ),
			'manage_options',
			$mainSlug,
			array( $this, 'renderDashboardPage' ),
			'dashicons-car',
			110
		);

		// First submenu entry referencing the main entry.
		add_submenu_page(
			$mainSlug,
			$pageTitle,
			__( 'Dashboard', 'lieferdienst' ),
			'manage_options',
			$mainSlug
		);
	}

	/**
	 * Settings Page
	 */
	public function addSettingsPage( $mainSlug ) {
		$this->settingsSlug = $mainSlug . '-settings';
		add_submenu_page(
			$mainSlug,
			__( 'Settings', 'lieferdienst' ),
			__( 'Settings', 'lieferdienst' ),
			'manage_options',
			$this->settingsSlug,
			array( $this, 'renderSettingsPage' )
		);
	}

	/**
	 * Callback to link the Settings Page from the plugin's entry in WP's list of installed Plugins
	 */
	public function addSettingsLink( $links ) {
		$href         = "admin.php?page={$this->settingsSlug}";
		$text         = esc_html__( 'Settings', 'lieferdienst' );
		$settingsLink = '<a href="' . $href . '">' . $text . '</a>';
		array_push( $links, $settingsLink );
		return $links;
	}

	/**
	 * Callback to render the Dashboard Page
	 */
	public function renderDashboardPage() {
		require_once $this->util->templatesDir . '/admin-dashboard.php';
	}

	/**
	 * Callback to render the Settings Page
	 */
	public function renderSettingsPage() {
		require_once $this->util->templatesDir . '/admin-settings.php';
	}

}
