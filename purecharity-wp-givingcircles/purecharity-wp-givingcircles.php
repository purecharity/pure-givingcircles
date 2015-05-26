<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://purecharity.com
 * @since             1.0.0
 * @package           Purecharity_Wp_Givingcircles
 *
 * @wordpress-plugin
 * Plugin Name:       Pure Charity Giving Circles
 * Plugin URI:        http://purecharity.com/purecharity-wp-givingcircles-uri/
 * Description:       Pure Charity Giving Circles integratiosn via shortcodes to display a Giving Circle or a list of your Giving Circles inside a page
 * Version:           1.1.1
 * Author:            Rafael Dalprá / Pure Charity
 * Author URI:        http://purecharity.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       purecharity-wp-givingcircles
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The Shortcodes handler class.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/shortcode.class.php';

/**
 * The template tags class.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/template_tags.php';

/**
 * The code that runs during plugin activation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/activator.class.php';

/**
 * The code that runs during plugin deactivation.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/deactivator.class.php';

/** This action is documented in includes/purecharity-wp-givingcircles-activator.class.php */
register_activation_hook( __FILE__, array( 'Purecharity_Wp_Givingcircles_Activator', 'activate' ) );

/** This action is documented in includes/purecharity-wp-givingcircles-deactivator.class.php */
register_deactivation_hook( __FILE__, array( 'Purecharity_Wp_Givingcircles_Deactivator', 'deactivate' ) );

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require_once plugin_dir_path( __FILE__ ) . 'includes/purecharity-wp-givingcircles.class.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_purecharity_wp_givingcircles() {

	$plugin = new Purecharity_Wp_Givingcircles();
	$plugin->run();

}
run_purecharity_wp_givingcircles();
register_activation_hook( __FILE__, array( 'Purecharity_Wp_Givingcircles', 'activation_check' ) );


/**
 * Force the use of a specific template
 *
 * @since    1.1.1
 */
function gc_force_template() {
	$options = get_option( 'purecharity_givingcircles_settings' );
  include(TEMPLATEPATH . '/' . $options['single_view_template']);
  exit;
}