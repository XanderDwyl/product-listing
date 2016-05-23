<?php
if(!current_user_can('delete_pages')) {
    die('Access Denied');
}
if(!function_exists('current_user_can')){
  die('Access Denied');
}

function html_showgroup( $results,  $pageNav,$sort,$cat_row){
  ?>
  <div class="wrap">
    <?php $path_site2 = plugins_url("./images", __FILE__); ?>

    <div style="clear:both;"></div>
      <div id="poststuff">
        <div id="list-page">
          <form method="post" onkeypress="doNothing()" action="admin.php?page=list_group" id="admin_form" name="admin_form">
            <h2>List Group
              <a onclick="window.location.href='admin.php?page=list_group&task=add_group'" class="uk-button uk-button-small uk-button-primary" >Add New List</a>
            </h2>

            <div class="uk-overflow-container">
              <table class="uk-table uk-table-striped uk-border-circle uk-table-hover product-list">
                <thead>
                   <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>List Count</th>
                    <th>Delete</th>
                   </tr>
                </thead>
                <tbody>
                  <?php
                    for($i=0; $i<count($results);$i++){
                  ?>
                    <tr>
                      <td><?php echo $results[$i]->id; ?></td>
                      <td>
                        <a href="<?php echo "?page=list_group&task=edit_list&id=".$results[$i]->id; ?>">
                          <?php echo $results[$i]->name; ?>
                        </a>
                      </td>
                      <td><div class="uk-badge uk-badge-notification"><?php echo $results[$i]->listcount; ?></div></td>
                      <td>
                        <a class="uk-button uk-button-small" href="<?php echo "?page=list_group&task=remove_group&id=".$results[$i]->id; ?>">
                          <i class="uk-icon uk-icon-trash"></i> Delete
                        </a>
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

<?php
function html_showlist($title, $body, $id) {
  ?>
  <div class="wrap">
    <?php $path_site2 = plugins_url("./images", __FILE__); ?>

    <div style="clear:both;"></div>
    <div id="poststuff">
      <ul class="uk-tab">
        <?php
          for($i=0; $i<count($title);$i++){
        ?>
          <li <?php if($title[$i]->id == $id) { echo "class='uk-active'"; } ?> >
            <a href="/wp-admin/admin.php?page=list_group&task=edit_list&id=<?php echo $title[$i]->id; ?>"><?php echo $title[$i]->name; ?></a>
          </li>
        <?php } ?>
      </ul>

      <ul class="uk-list uk-list-striped">
        <li>
          <div class="uk-pull-right">
            <div class="uk-button">Add List</div>
          </div>
        </li>
        <?php
          for($i=0; $i<count($body);$i++){
        ?>
          <li>
            <div class="uk-grid">
                <div class="uk-width-medium-1-3">
                  <img class="uk-thumbnail" src=<?php echo plugins_url('images/placeholder_600x400.svg', __FILE__); ?> alt="">
                </div>
                <div class="uk-width-medium-2-3">
                  <form class="uk-form uk-form-horizontal">
                    <div class="uk-form-row">
                      <label class="uk-form-label" for="form-h-it">Title</label>
                      <div class="uk-form-controls">
                        <input type="text" id="form-h-it" placeholder="Title" value="<?php echo $body[$i]->title; ?>">
                      </div>
                    </div>
                    <div class="uk-form-row">
                      <label class="uk-form-label" for="form-h-it">Sub Title</label>
                      <div class="uk-form-controls">
                        <input type="text" id="form-h-it" placeholder="Sub Title" value="<?php echo $body[$i]->subtitle; ?>">
                      </div>
                    </div>
                    <div class="uk-form-row">
                      <label class="uk-form-label" for="form-h-it">Description</label>
                      <div class="uk-form-controls">
                        <textarea id="form-h-t" cols="30" rows="5" placeholder="Textarea text"><?php echo $body[$i]->description; ?></textarea>
                      </div>
                    </div>
                    <div class="uk-form-row">
                      <label class="uk-form-label" for="form-h-it">Value</label>
                      <div class="uk-form-controls">
                        <input type="text" id="form-h-it" placeholder="Value" value="<?php echo $body[$i]->value; ?>">
                      </div>
                    </div>
                  </form>
                </div>
            </div>
          </li>
        <?php } ?>
      </ul>

    </div>
  </div>
<?php } ?>

