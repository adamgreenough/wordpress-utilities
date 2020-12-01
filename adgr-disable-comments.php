<?php
/*
Plugin Name: Disable Comments
Plugin URI: https://github.com/adamgreenough/wordpress-utilities
Description: Hide 'Comments' functionality from the admin area.
Version: 1.0
Author: Adam Greenough
Author URI: https://adamgreenough.me/
License: GNU General Public License v3.0
*/

// Removes the Comments sidebar menu
function remove_comments_sidebar_link() {
  remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_comments_sidebar_link');

// Remove comments count from the admin bar
function remove_comments_topbar_link($wp_admin_bar) {
  $wp_admin_bar->remove_menu('comments');
}
add_action('admin_bar_menu', 'remove_comments_topbar_link', 999);

// Removes Comments support from posts and pages
function remove_comment_support() {
    remove_post_type_support('post', 'comments');
    remove_post_type_support('page', 'comments');
}
add_action('init', 'remove_comment_support', 100);
