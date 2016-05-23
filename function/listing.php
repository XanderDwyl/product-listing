<?php
  class ListingClass {

    static function plugin_initialize() {
      global $wpdb;
      $sql_product_lists = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "product_lists`(
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `group_id` int(11),
        `title` varchar(50) CHARACTER SET utf8 NOT NULL,
        `subtitle` varchar(200) CHARACTER SET utf8 NOT NULL,
        `description` text CHARACTER SET utf8 NOT NULL,
        `value` varchar(200) CHARACTER SET utf8 NOT NULL,

        PRIMARY KEY (`id`)

      ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";

      $sql_product_list_group = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "product_list_group`(
        `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
        `name` varchar(50) CHARACTER SET utf8 NOT NULL,
        `status` varchar(50) CHARACTER SET utf8 NOT NULL,

        PRIMARY KEY (`id`)

      ) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ";

      // execute sql
      $wpdb->query($sql_product_lists);
      $wpdb->query($sql_product_list_group);
    }
  }

