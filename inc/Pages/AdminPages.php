<?php
/**
 * Configure Admin Pages
 *
 * @package Lieferdienst
 */

namespace Lieferdienst\Inc\Pages;

use Lieferdienst\Inc\PluginBase;

/**
 * This class configures Admin Pages.
 */
class AdminPages extends PluginBase {

	private $settingsSlug;

	public function register() {
		add_action( 'admin_menu', array( $this, 'addPages' ) );
		add_filter( "plugin_action_links_{$this->util->pluginKey}", array( $this, 'addSettingsLink' ) );
	}

	public function addPages() {
		$mainSlug = 'lieferdienst';
		$this->addDashboardPage( $mainSlug );
		$this->addSettingsPage( $mainSlug );
	}

	public function addDashboardPage( $mainSlug ) {
		$pageTitle = __( 'Dashboard', 'lieferdienst' );
		add_menu_page(
			$pageTitle,
			__( 'Delivery Service', 'lieferdienst' ),
			'manage_options',
			$mainSlug,
			array($this, 'renderDashboardPage'),
			'dashicons-car',
			110
		);
		add_submenu_page(
			$mainSlug,
			$pageTitle,
			__( 'Dashboard', 'lieferdienst' ),
			'manage_options',
			$mainSlug
		);
	}

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

	public function addSettingsLink( $links ) {
		$href = "admin.php?page={$this->settingsSlug}";
		$text = esc_html__( 'Settings', 'lieferdienst' );
		$settingsLink = '<a href="' . $href . '">' . $text . '</a>';
		array_push( $links, $settingsLink );
		return $links;
	}

	public function renderDashboardPage() {
		return require_once $this->util->templatesDir . "/admin-dashboard.php";
	}

	public function renderSettingsPage() {
		return require_once $this->util->templatesDir . "/admin-settings.php";
	}

}
