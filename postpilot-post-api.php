<?php
/**
 * Plugin Name: PostPilot
 */

require_once( dirname( __FILE__ ) . '/class-hmac-auth.php' );
require_once( dirname( __FILE__ ) . '/class-postpilot-post-api.php' );
require_once( dirname( __FILE__ ) . '/Options.class.php' );

add_action( 'rest_api_init', function () {
	$secret = Options::get_secret();
	$auth = new HMAC_Auth( $secret );
	( new PostPilot_Post_API( $auth ) )->register_routes();
} );

new Options();
