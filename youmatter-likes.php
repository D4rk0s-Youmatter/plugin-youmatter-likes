<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin. 
 *
 * @link              Jérémie Gisserot
 * @since             1.0.0
 * @package           ym_likes
 *
 * @wordpress-plugin
 * Plugin Name:       Youmatter Likes
 * Plugin URI:        https://www.labubulle.com
 * Description:       Gestion des likes
 * Version:           1.0.0
 * Author:            Jérémie Gisserot
 * Author URI:        Jérémie Gisserot
 * Text Domain:       ym-likes
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ym_likes_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ym-likes-activator.php
 */
function activate_ym_likes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ym-likes-activator.php';
	ym_likes_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ym-likes-deactivator.php
 */
function deactivate_ym_likes() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ym-likes-deactivator.php';
	ym_likes_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ym_likes' );
register_deactivation_hook( __FILE__, 'deactivate_ym_likes' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-ym-likes.php';

/**
 * The helpers functions for theme use
 */
require plugin_dir_path( __FILE__ ) . 'helpers/helpers.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ym_likes() {

	$plugin = new ym_likes();
	$plugin->run();

}
run_ym_likes();