<?php
if(!current_user_can('delete_pages')) {
    die('Access Denied');
}
if(!function_exists('current_user_can')){
  die('Access Denied');
}

function html_showlist( $rows,  $pageNav,$sort,$cat_row){
  global $wpdb;
  $query="SELECT * FROM ".$wpdb->prefix."product_lists";
  $result=$wpdb->get_results($query);
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
                  <?php
                    for($i=0; $i<count($result);$i++){
                  ?>
                    <tr>
                      <td><?php echo $result[$i]->id; ?></td>
                      <td><?php echo $result[$i]->title; ?></td>
                      <td><?php echo $result[$i]->subtitle; ?></td>
                      <td><?php echo $result[$i]->description; ?></td>
                      <td><?php echo $result[$i]->value; ?></td>
                      <td>
                        <div class="uk-button uk-button-small"> <i class="uk-icon uk-icon-trash"></i> Delete</div>
                      </td>
                     </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </form>
        </div>
      </div>
  </div>
<?php } ?>
