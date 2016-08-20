<?php

/**
* Plugin Name: Easy Author Box for Beaver Builder Theme
* Plugin URI:  https://purposewp.com
* Description: Plugin Description
* Version:     0.1.0
* Author:      PurposeWP
* Author URI:  https://purposewp.com/
* License:     GPL-2.0+
* License URI: http://www.gnu.org/licenses/gpl-2.0.txt
* Text Domain: pwp-eab-bbt
* Domain Path: /languages
*/

/**
 * Copyright 2015 PurposeWP, LLC (email: hello@purposewp.com)
 * Easy Author Box for Beaver Builder Theme is free software; you can redistribute it and/or modify it
 * under the terms of the GNU General Public License, version 2, as published
 * by the Free Software Foundation.
 *
 * Easy Author Box for Beaver Builder Theme is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE.
 *
 * See the GNU General Public License for more details:
 * http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * WordPress resources for developers
 *
 * Codex:            https://codex.wordpress.org/
 * Plugin Handbook:  https://developer.wordpress.org/plugins/
 * Coding Standards: https://make.wordpress.org/core/handbook/coding-standards/
 * Contribute:       https://make.wordpress.org/
 */

// If this file is called directly, abort.
defined( 'WPINC' ) or die( 'Get off my lawn!' );

// Pull in WP Helpers
include( plugin_dir_path( __FILE__ ) .  'lib/wp-helpers.php' );

class PWP_Easy_Author_Box extends WP_Helpers {
	protected static $instance;
	public static $version   = '0.1.0';
	public static $namespace = 'pwp-eab-bbt';

	public function __construct() {
		self::$instance = $this;

		$this->init();
	}

	public function init() {
		// Translations
		// load_plugin_textdomain( self::$namespace, false, plugin_dir_path( __FILE__ ) . '/languages' );

		// Added priority to load late for moving Genesis stuffs.
		add_action( 'customize_register',  array( $this, 'pwp_customize_register' ) );

		$this->pwp_get_author_box();
	}


	/**
	 * Add Author Box settings and controls to the Customizer.
	 *
	 * @since 0.1.0
	 *
	 * @param object $wp_customize An instance of the WP_Customize_Manager class
	 */
	public function pwp_customize_register( $wp_customize ) {

		$locations = array(
			'before-content'  => _x( 'Before Content', 'Author Box Position', self::$namespace ),
			'after-content'   => _x( 'After Content', 'Author Box Position', self::$namespace ),
			'after-post-meta' => _x( 'After Post Meta', 'Author Box Position', self::$namespace ),
			);

		$wp_customize->add_setting( 'pwp_eab_location' , array(
			'type'    => 'theme_mod',
			'default' => 'after-content',
			) );

		$wp_customize->add_control( 'pwp_eab_location', array(
			'section' => 'fl-content-posts',
			'label'   => __( 'Author Box Position', self::$namespace ),
			'type'    => 'select',
			'choices' => $locations,
			) );
	}

	/**
	 * Get Author Box
	 */
	public function pwp_get_author_box() {
		if ( get_theme_mod( 'pwp_eab_location' ) === 'before-content' ) {
			add_action( 'fl_post_top_meta_close', array( $this, 'pwp_author_box' ) );
		} elseif ( get_theme_mod( 'pwp_eab_location' ) === 'after-post-meta' ) {
			add_action( 'fl_post_bottom_meta_close', array( $this, 'pwp_author_box' ) );
		} else {
			add_filter( 'the_content', array( $this, 'pwp_author_box' ) );
		}

		return;
	}

	/**
	 * Easy Author Box for Beaver Builder Theme
	 *
	 * Based upon Viktor's reply here: http://forum.wpbeaverbuilder.com/support/q/author-bio-box/
	 */
	public function pwp_author_box( $content ) {

		$author_bio = get_the_author_meta( 'user_description' );

		if ( ! is_singular( 'post' ) || empty( $author_bio ) )
			return $content;

		if ( get_theme_mod( 'pwp_eab_location' ) != 'after-content' ) {
			include( plugin_dir_path( __FILE__ ) . 'templates/author-box.php' );
			return $content;
		}

		ob_start();
		include( plugin_dir_path( __FILE__ ) . 'templates/author-box.php' );
		$author_box = ob_get_contents();
		ob_end_clean();

		return $content . $author_box;
	}
}
new PWP_Easy_Author_Box;
