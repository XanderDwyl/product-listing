<?php
if(function_exists('current_user_can'))
//if(!current_user_can('manage_options')) {

if(!current_user_can('delete_pages')) {
    die('Access Denied');
}}
if(!function_exists('current_user_can')){
  die('Access Denied');
}
function showlist() {
  global $wpdb;

  session_start();
  if(isset($_REQUEST['csrf_token_list_1985'])){

}
