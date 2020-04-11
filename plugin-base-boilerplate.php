<?php
/**
 * Plugin Name: Plugin Base Boilerplate
 * Description: WordPress plugin base boilerplate
 * Version: 1.0.0
 * Author: Saulo Paiva
 */

if ( ! class_exists( 'PluginBaseBoilerplateSetup' ) ) {
	require_once dirname( __FILE__ ) . '/classes/Setup.php';
	$PluginBaseBoilerplateSetup = new PluginBaseBoilerplateSetup();
	$PluginBaseBoilerplateSetup->init();
}
