<?php
/**
 * Plugin Name: Plugin Works!
 * Plugin URI: http://localhost
 * Description: Display's "Plugin Works!" in dashboard when activated and viewed
 * Version: 1.0
 * Author: Harry Zhang
 * Author URI: http://localhost
 */

add_action('admin_menu', 'test_plugin_setup_menu');

function test_plugin_setup_menu(){
    add_menu_page( 'Plugin Works!', 'Plugin Works!', 'manage_options', 'test-plugin', 'display_text' );
}

function display_text(){
    echo "<h1>Plugin Works!</h1>";
}

?>