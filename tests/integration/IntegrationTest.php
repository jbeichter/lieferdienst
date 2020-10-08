<?php

class IntegrationTest extends WP_UnitTestCase {

	public function setUp() {
		parent::setUp();
		// This code will run before each test!
	}

	public function tearDown() {
		parent::tearDown();
		// This code will run after each test
	}

	public function testBasic() {
		$post_id = $this->factory->post->create();
		$post_id_array = $this->factory->post->create_many( 4 );
		$this->assertEquals( 4, count( $post_id_array ) );

		$user_id = $this->factory->user->create( array( 'user_login' => 'test', 'role' => 'administrator' ) );

	}

	/**
	 * @dataProvider getRequiredPluginsProvider
	 */
//	public function testRequiredPluginsAreActive( $plugin ) {
//		$this->assertTrue( true );
//		var_dump( wp_get_active_and_valid_plugins() );
//		$this->assertTrue( is_plugin_active( $plugin ), sprintf( '%s is not activated.', $plugin ) );
//	}

	/**
	 * @dataProvider getRequiredOptionsProvider
	 */
//	public function testRequiredWPOptionsAreSet( $option_name, $option_value ) {
//		$this->assertTrue( true );
//		// $this->assertSame( $option_value, get_option( $option_name ) );
//	}

	/**
	 * @return array
	 * @see testRequiredPluginsAreActive
	 */
	public function getRequiredPluginsProvider() {
		return [
			[ 'lieferdienst/lieferdienst.php' ],
		];
	}

	/**
	 * @return array
	 * @see testRequiredWPOptionsAreSet
	 */
	public function getRequiredOptionsProvider() {
		return [
			[ 'timezone_string', 'America/New_York' ],
		];
	}

}
