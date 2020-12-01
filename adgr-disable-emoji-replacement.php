<?php
/*
Plugin Name: Disable Emoji Replacement
Plugin URI: https://github.com/adamgreenough/wordpress-utilities
Description: Disable the WordPress emoji replacement and remove additional loaded files.
Version: 1.0
Author: Adam Greenough
Author URI: https://adamgreenough.me/
License: GNU General Public License v3.0
*/

function disable_emojis() {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('admin_print_styles', 'print_emoji_styles');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    add_filter('emoji_svg_url', '__return_false');
}
add_action('init', 'disable_emojis');
