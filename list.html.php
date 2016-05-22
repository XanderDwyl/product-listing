<?php
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
              <a onclick="window.location.href='admin.php?page=product_list&task=add_cat'" class="uk-button uk-button-small uk-button-primary" >Add New List</a>
            </h2>
            <div class="uk-overflow-container">
              <table class="uk-table uk-table-striped uk-border-circle uk-table-hover product-list">
                <thead>
                   <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Subtitle</th>
                    <th>Description</th>
                    <th>Value</th>
                    <th>Delete</th>
                   </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Subtitle</td>
                    <td>Description</td>
                    <td>Value</td>
                    <td>
                      <div class="uk-button uk-button-small"> <i class="uk-icon uk-icon-trash"></i> Delete</div>
                    </td>
                   </tr>
                   <tr>
                    <td>ID</td>
                    <td>Title</td>
                    <td>Subtitle</td>
                    <td>Description</td>
                    <td>Value</td>
                    <td>
                      <div class="uk-button uk-button-small"> <i class="uk-icon uk-icon-trash"></i> Delete</div>
                    </td>
                   </tr>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
  </div>
<?php } ?>
