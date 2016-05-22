<?php
if(function_exists('current_user_can'))
//if(!current_user_can('manage_options')) {

if(!current_user_can('delete_pages')) {
    die('Access Denied');
}
if(!function_exists('current_user_can')){
  die('Access Denied');
}

function html_showlist( $rows,  $pageNav,$sort,$cat_row){
  global $wpdb;
  ?>
  <div class="wrap">
    <?php $path_site2 = plugins_url("./images", __FILE__); ?>

    <div style="clear:both;"></div>
      <div id="poststuff">
        <div id="list-page">
          <form method="post"  onkeypress="doNothing()" action="admin.php?page=product_list" id="admin_form" name="admin_form">
            <h2>Product List
              <a onclick="window.location.href='admin.php?page=product_list&task=add_cat'" class="add-new-h2" >Add New List</a>
            </h2>
          </form>
        </div>
      </div>
  </div>
<?php } ?>
