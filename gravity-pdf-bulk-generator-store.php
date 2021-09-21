<?php

/**
 * Plugin Name:     Gravity PDF Bulk Generator Store
 * Description:     Sample plugin showing how to listen to the Bulk Generator store on the Gravity Forms Entry List page
 * Author:          Gravity PDF
 * Author URI:      https://gravitypdf.com
 * Version:         0.1
 */

/**
 * @package     Gravity PDF Bulk Generator Store
 * @copyright   Copyright (c) 2021, Blue Liquid Designs
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

/* Load a Javascript file on the Gravity Forms Entry List page */
add_action( 'admin_init', function() {
	if ( \GFForms::get_page() === 'entry_list' ) {
		add_action( 'admin_enqueue_scripts', function() {
			wp_enqueue_script( 'gravitypdf_bulk_generator_listener', plugin_dir_url( __FILE__ ) . '/gravitypdf.js', [], false, true );
		}, 5 );
	}
} );

/* Allow Javascript file to be loaded when Gravity Forms No Conflict Mode is enabled */
add_filter( 'gform_noconflict_scripts', function( $scripts ) {
	$scripts[] = 'gravitypdf_bulk_generator_listener';

	return $scripts;
} );
