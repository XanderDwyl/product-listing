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
    'list_group',
    'list_group',
    plugins_url('images/sidebar.icon-16x16.png', __FILE__)
  );

  add_submenu_page(
    'list_group',
    'List Group',
    'List Group',
    'delete_pages',
    'list_group',
    'list_group'
  );

  $page_option = add_submenu_page(
    'list_group',
    'Licensing',
    'Licensing',
    'manage_options',
    'list_licensing',
    'list_licensing'
  );

  add_action('admin_print_styles-' . $page_cat, 'list_admin_script');
  add_action('admin_print_styles-' . $page_option, 'list_options_admin_script');

}

function list_group() {
  require_once("list.html.php");

  // format params task
  if (isset($_GET["task"]))
    $task = esc_html($_GET["task"]);
  else
    $task = '';

  // format params id
  if (isset($_GET["id"]))
    $id = intval($_GET["id"]);
  else
    $id = 0;

  switch ($task) {
    case 'add_group':
      add_group();
      break;
    case 'edit_list':
      edit_list();
      break;
    case 'remove_group':
      remove_group();
      break;
    default:
      show_group();
      break;
  }
}

function show_group() {
  global $wpdb;
  $grouptable = $wpdb->prefix."product_list_group";
  $grouplist = $wpdb->prefix."product_lists";

  $query = "SELECT plg.id, pl.group_id, plg.name, plg.status, count(DISTINCT pl.id) AS listcount FROM " .
          $grouptable . " plg LEFT JOIN " . $grouplist .
          " pl ON plg.id = pl.group_id GROUP BY plg.id, pl.group_id, plg.name, plg.status";

  $result=$wpdb->get_results($query);

  html_showgroup($result,1,'',1);
}

function add_group() {
  global $wpdb;

  $addQuery = "INSERT INTO `" . $wpdb->prefix ."product_list_group" .
              "` ( `name`, `status`) VALUES ( 'New Group', '1')";
  $wpdb->query($addQuery);

  header('Location: admin.php?page=list_group&task=edit_list&id=' . $wpdb->insert_id);
}

function edit_list() {
  global $wpdb;

  // format params id
  if (isset($_GET["id"]))
    $id = intval($_GET["id"]);
  else
    $id = 0;

  $groupQuery  = "SELECT * FROM `" . $wpdb->prefix . "product_list_group` ORDER BY id ASC";
  $groupResult = $wpdb->get_results($groupQuery);

  $listQuery  = "SELECT * FROM `".$wpdb->prefix."product_lists` WHERE group_id='" . $id . "'";
  $listResult = $wpdb->get_results($listQuery);

  html_showlist($groupResult, $listResult, $id);
}

function remove_group() {
  global $wpdb;

  // format params id
  if (isset($_GET["id"]))
    $id = intval($_GET["id"]);
  else
    $id = 0;

  $removeQuery = "DELETE FROM ".$wpdb->prefix."product_list_group WHERE id = " . $id . " ";
  $wpdb->query($removeQuery);

  header('Location: admin.php?page=list_group');
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
  wp_enqueue_script("simple_slider_js",  plugins_url("js/uikit.min.js", __FILE__), FALSE);
}
function list_options_admin_script() {

}
