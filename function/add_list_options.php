<?php
  // add buttons in wp pages editor
  add_action('media_buttons_context', 'add_product_list_button');
  function add_product_list_button($context) {

    $img = plugins_url( '../images/sidebar.icon-16x16.png' , __FILE__ );
    $container_id = 'product_list';

    $title = 'Select Huge IT Slider to insert into post';

    $context .= '<a class="button thickbox" title="Select product list to insert into post"    href="?page=list_group&task=add_shortcode_post&TB_iframe=1&width=400&inlineId='.$container_id.'">
      <span class="wp-media-buttons-icon" style="background: url('.$img.'); background-repeat: no-repeat; background-position: left bottom;"></span>
    Add Product List
    </a>';

    return $context;
  }

  // add_shortcode('huge_it_slider', 'huge_it_slider_images_list_shotrcode');

  // function   huge_it_cat_images_list($id)
  // {
  //     require_once("slider_front_end.html.php");
  //     require_once("slider_front_end.php");
  //     if (isset($_GET['product_id'])) {
  //         if (isset($_GET['view'])) {
  //             if (esc_html($_GET['view']) == 'huge_itslider') {
  //                 return showPublishedimages_1($id);
  //             } else {
  //                 return front_end_single_product(esc_html($_GET['product_id']));
  //             }
  //         } else {
  //             return front_end_single_product(esc_html($_GET['product_id']));
  //         }
  //     } else {
  //         return showPublishedimages_1($id);
  //     }
  // }
