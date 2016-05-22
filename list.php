<?php

/*
Plugin Name: Product Listing
Plugin URI: http://xanderdwyl.com/wp/product-listing
Description: Product Listing is an open source wordpress listing. It enables basic listing of products.
Version: 1.0
Author: Alexjander Bacalso
Author URI: http://xanderdwyl.com/
License: GPLv2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
$plugin_info = get_plugin_data( ABSPATH . 'wp-content/plugins/product-listing/list.php' );

if($plugin_info['Version'] > '0'){
  include_once dirname( __FILE__ ) . '/function/listing.php';
  register_activation_hook( __FILE__, array( 'ListingClass', 'plugin_initialize' ) );
  add_action('admin_menu', 'project_listing_options_panel');
}

function project_listing_options_panel() {
  $page_cat = add_menu_page(
    'Theme page title',
    'Product List',
    'delete_pages',
    'display_product_lists',
    'display_product_lists',
    plugins_url('images/sidebar.icon-16x16.png', __FILE__)
  );

  add_submenu_page(
    'display_product_lists',
    'List',
    'List',
    'delete_pages',
    'display_product_lists',
    'display_product_lists'
  );

  $page_option = add_submenu_page(
    'display_product_lists',
    'Licensing',
    'Licensing',
    'manage_options',
    'list_licensing',
    'list_licensing'
  );

  add_action('admin_print_styles-' . $page_cat, 'list_admin_script');
  add_action('admin_print_styles-' . $page_option, 'list_options_admin_script');

}

function display_product_lists() {
  require_once("list.html.php");
  html_showlist(1,1,'',1);

}
function list_licensing() {
  $plug = get_plugin_data( ABSPATH . 'wp-content/plugins/product-listing/list.php' );

  echo "<p>" .
    $plug['Description']
  . "</p>";
}

function list_admin_script() {
  wp_enqueue_media();

  wp_enqueue_style("uikit_css", plugins_url("style/uikit.almost-flat.min.css", __FILE__), FALSE);
  wp_enqueue_style("main_css", plugins_url("style/main.css", __FILE__), FALSE);
}
function list_options_admin_script() {

}
