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

  add_shortcode('list_group', 'product_list_shortcode');
  function product_list_shortcode($atts) {
    include_once dirname( __FILE__ ) . '/../client/front_end.html.php';

    global $wpdb;
    $groupQuery  = "SELECT * FROM `" . $wpdb->prefix . "product_list_group` WHERE id='" . $atts['id'] . "'";
    $title = $wpdb->get_results($groupQuery)[0];

    $listQuery  = "SELECT * FROM `".$wpdb->prefix."product_lists` WHERE group_id='" . $atts['id'] . "'";
    $data = $wpdb->get_results($listQuery);

    wp_enqueue_media();
    wp_enqueue_style("list_client_css", plugins_url("/../style/list_client.css", __FILE__), FALSE);
    wp_enqueue_script("list_uikit_js",  plugins_url("/../js/uikit.min.js", __FILE__), FALSE);

    render_extracted_code($title->name, $data);
  }


