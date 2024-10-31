<?php
/*
Plugin Name: New Page Link
Plugin URI: http://wordpresshowtos.blogspot.com/2015/10/new-page-link-plugin.html
Description: A plugin to open your links in a new tab
Author: Zeeshan Aslam Durrani
Version: 2.3
Author URI: http://wordpresshowtos.blogspot.com
Text Domain: new-page-link
Domin Path: Languages
License: GPLV2

Copyright 2015 ZEESHANASLAMDURRANI (email : zeeshanaslamdurrani@mailfence.com)
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.
This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.
You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA
*/

/*******************
* Global Variables 
*******************/

$npl_prefix = 'npl';
$npl_plugin_name = 'New Page Link';
$npl_options = get_option('npl_link');

/*******************
* includes 
*******************/

$dir = plugin_dir_path( __FILE__ );

include($dir.'includes/admin-options.php'); // Options page
include($dir.'includes/data-processing.php'); // to open links in a new window

/*****************
* Translation
******************/

load_plugin_textdomain('new-page-link', false, basename(dirname( __FILE__ ) ) . '/languages' );

/**************************
* Settings Page Link
****************************/
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'npl_add_plugin_page_settings_link');

function npl_add_plugin_page_settings_link( $links ) {
    $links[] = '<a href="' .
        admin_url( 'options-general.php?page=npl_newlink' ) .
        '">' . __('Settings') . '</a>';
     return $links;
}


?>
