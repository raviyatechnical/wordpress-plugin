<?php

/**
 * Plugin Name: WordPress Plugin
 * Description: This plugin to create custom contact list-tables from database using WP_List_Table class.
 * Version:     0.0.1
 * Plugin URI: https://github.com/raviyatechnical/wordpress-plugin
 * Author:      Bhargav Raviya
 * Author URI:  https://github.com/bhargavraviya
 * License:     MIT
 * License URI: https://opensource.org/licenses/MIT
 * Text Domain: wordpress-plugin
 */
// * Domain Path: /languages

if (!defined('ABSPATH')) {
    die("can't access");
}

require_once plugin_dir_path(__FILE__) . 'constants.php';
require_once plugin_dir_path(__FILE__) . 'includes/admin_menu.php';

add_action('admin_enqueue_scripts', 'wordpress_plugin_admin_styles');
register_activation_hook(__FILE__, 'wordpress_plugin_install');
register_activation_hook(__FILE__, 'wordpress_plugin_install_data');

global $wpbc_db_version;
$wpbc_db_version = '1.1.0';

function wordpress_plugin_admin_styles()
{
    wp_enqueue_style('custom-styles', plugins_url('/css/styles.css', __FILE__));
}

function wordpress_plugin_install()
{
    global $wpdb;
    global $wpbc_db_version;

    $table_name = WORDPRESS_PLUGIN_CONTANTS;

    $sql = "CREATE TABLE " . $table_name . " (
      id int(11) NOT NULL AUTO_INCREMENT,
      name VARCHAR (50) NOT NULL,
      lastname VARCHAR (100) NOT NULL,
      email VARCHAR(100) NOT NULL,
      phone VARCHAR(15) NULL,
      company VARCHAR(100) NULL,
      web VARCHAR(100) NULL,  
      two_email VARCHAR(100) NULL,   
      two_phone VARCHAR(15) NULL,  
      job VARCHAR(100) NULL,
      address VARCHAR (250) NULL,
      notes VARCHAR (250) NULL,
      PRIMARY KEY  (id)
    );";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);

    add_option('wpbc_db_version', $wpbc_db_version);

    $installed_ver = get_option('wpbc_db_version');
    if ($installed_ver != $wpbc_db_version) {
        $sql = "CREATE TABLE " . $table_name . " (
          id int(11) NOT NULL AUTO_INCREMENT,
          name VARCHAR (50) NOT NULL,
          lastname VARCHAR (100) NOT NULL,
          email VARCHAR(100) NOT NULL,
          phone VARCHAR(15) NULL,
          company VARCHAR(100) NULL,
          web VARCHAR(100) NULL,  
          two_email VARCHAR(100) NULL,   
          two_phone VARCHAR(15) NULL,  
          job VARCHAR(100) NULL,          
          address VARCHAR (250) NULL,
          notes VARCHAR (250) NULL,
          PRIMARY KEY  (id)
        );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);

        update_option('wpbc_db_version', $wpbc_db_version);
    }
}

function wordpress_plugin_install_data()
{
    global $wpdb;
    $table_name = WORDPRESS_PLUGIN_CONTANTS;
}
