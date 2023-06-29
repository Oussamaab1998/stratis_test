<?php

/**
 * 
 * Plugin Name: Test Plugin
 * Description: This is my stratis test plugin
 * Version: 1.0.0
 * Text Domain: options-plugin
 * 
 */

if (!defined('ABSPATH'))
{
    die('You cannot be here');
}

if (!class_exists('TestPlugin')){
class TestPlugin {

    public function __construct()
    {
        define('MY_PLUGIN_PATH', plugin_dir_path( __FILE__) );
        require_once( MY_PLUGIN_PATH .'/vendor/autoload.php');
    }

    public function initialize()
    {
        include_once MY_PLUGIN_PATH.'includes/utilities.php';

        include_once MY_PLUGIN_PATH.'includes/options-page.php';

        include_once MY_PLUGIN_PATH.'includes/stratis-plugin.php';
    }
}

    $testPlugin = new TestPlugin;

    $testPlugin -> initialize();
}
