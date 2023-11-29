<?php

if (!defined('ABSPATH')) {
    die("can't access");
}
define( 'WORDPRESS_PLUGIN_PREFIX', 'wordpress_plugin' );
define( 'WORDPRESS_PLUGIN_PLUGIN_VERSION', '1.0.0' );


define('WORDPRESS_PLUGIN_PATH', trailingslashit(plugin_dir_path(__FILE__)));
define('WORDPRESS_PLUGIN_URL', trailingslashit(plugins_url('/', __FILE__)));

//List Of Table
define( 'WORDPRESS_PLUGIN_CONTANTS', 'contacts' );