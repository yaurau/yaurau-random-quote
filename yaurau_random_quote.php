<?php

/**
 * Plugin Name:       Yaurau Random Quote
 * Plugin URI:        https://github.com/yaurau/yaurau-random-quote
 * Description:       A plugin for output random quote.
 * Version:           1.0.0
 * Author:            Rauvtovich Yauhen
 * Author URI:        https://github.com/yaurau
 * License:           GPL-2.0+
 */


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-yaurau-random-quote-activator.php
 */
function activate_yaurau_random_quote() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yaurau-random-quote-activator.php';
    $create = new Yaurau_Random_Quote_Activator;
    $create->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-yaurau-useful-data-deactivator.php
 */
function deactivate__yaurau_random_quote() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-yaurau-useful-data-deactivator.php';
	Plugin_Name_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_yaurau_random_quote' );
register_deactivation_hook( __FILE__, 'deactivate_yaurau_related_post' );
