<?php

/*
Plugin Name: Dark Sky Plugin
Plugin URI:
Description:
Author:
Version:
Author URI:
Text Domain:
*/

require_once(dirname(__FILE__) . '/darksky-form.php');
require_once(dirname(__FILE__) . '/darksky-about.php');
require_once(dirname(__FILE__) . '/darksky-widget.php');

/****** Install, Activate, Deactivate, Uninstall Plugin ******/

register_activation_hook(__FILE__, 'darksky_activate');
register_deactivation_hook(__FILE__, 'deactivate_darksky');
function darksky_activate () {
    global $wpdb;
    $wpdb->query("CREATE TABLE IF NOT EXISTS `$wpdb->dbname`.`" . $wpdb->prefix . "darksky_new_table`( `latitude` DECIMAL(10,6) NOT NULL DEFAULT '-27.469771' , `longitude` DECIMAL(10,6) NOT NULL DEFAULT '153.025124' );");
}

function deactivate_darksky () {
    global $wpdb;
    $wpdb->query("DROP TABLE IF EXISTS `$wpdb->dbname`.`" . $wpdb->prefix . "darksky_new_table`");
}


/****** Hooks: Actions ******/

//// 1. Run at init
//function darksky_run_me () {
//    echo '<h1 class="entry-title" style="color: white;">Run me at action init.</h1>';
//}
//
//add_action('init', 'darksky_run_me');

//// 2. Run with Priority
//function darksky_run_me_11 () {
//    echo '<h1 class="entry-title" style="color: white;">Run me at action init run_me_11.</h1>';
//}
//function darksky_run_me () {
//    echo '<h1 class="entry-title" style="color: white;">Run me at action init run_me.</h1>';
//}
//function darksky_run_me_9 () {
//    echo '<h1 class="entry-title" style="color: white;">Run me at action init run_me_9.</h1>';
//}
//add_action('init', 'darksky_run_me_11', 11);
//add_action('init', 'darksky_run_me');
//add_action('init', 'darksky_run_me_9', 10);
////add_action('init', 'darksky_run_me_9', 12);

//// 3. Run with number of args
//function darksky_save_a_post ($arg1, $arg2) {
//    echo'<pre>';
//    var_dump($arg1); // Post ID
//    echo'</pre>';
//    echo'<pre>';
//    var_dump($arg2); // Post Data
//    echo'</pre>';
//}
//add_action('save_post', 'darksky_save_a_post', 11, 2);


/****** Hooks: Filters  ******/

//function darksky_filter_the_title($title, $id) {
//    if (strtoupper($title) === 'SHOP') {
//        return "<span style='color: blueviolet;'>$id - $title</span>";
//    }
//    return $title;
//}
//add_filter('the_title', 'darksky_filter_the_title', 10, 2);


/****** Hooks: Add/Remove your own ******/
add_action('darksky_my_own_hooks', 'darksky_save_location', 10, 2);
function darksky_save_location ($latitude, $longitude) {
    global $wpdb;
    $wpdb->query("INSERT INTO `$wpdb->dbname`.`" . $wpdb->prefix . "darksky_new_table` (`latitude`, `longitude`) VALUES ('-27.469771', '153.025124')");
}

//do_action('darksky_my_own_hooks', $latitude, $longitude);
//remove_action('darksky_my_own_hooks', 'darksky_save_location');


/****** Admin Menu: Add to menu  ******/

add_action('admin_menu', 'darksky_add_item_to_menu');
add_action('admin_menu', 'darksky_add_item_to_submenu');
function darksky_add_item_to_menu () {
    if (is_admin()) {
        add_menu_page('Dark Sky Title', 'Dark Sky', 'manage_options', 'admin.php?page=dark-sky', 'darksky_setup_form');
    }
}
function darksky_add_item_to_submenu () {
    if (is_admin()) {
        add_submenu_page('admin.php?page=dark-sky','About Dark Sky Title', 'About Dark Sky', 'manage_options', 'admin.php?page=about-dark-sky', 'darksky_about_dark_sky');
    }
}
function darksky_setup_form () {
    $wp_list_table = new DarkSkyForm();
    $wp_list_table->display();
}
function darksky_about_dark_sky () {
    $wp_list_table = new DarkSkyAboutUs();
    $wp_list_table->display();
}

/****** Form: Add to Setup Form  ******/

/****** Widget: Add as Widget ******/
