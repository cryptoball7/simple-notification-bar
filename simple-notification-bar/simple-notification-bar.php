<?php
/**
 * Plugin Name: Simple Notification Bar
 * Description: Adds a customizable top bar to display announcements or promotions.
 * Version: 1.0
 * Author: Cryptoball cryptoball7@gmail.com
 */

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Register styles
function snb_enqueue_styles() {
    wp_enqueue_style('snb-style', plugin_dir_url(__FILE__) . 'css/notification-bar.css');
}
add_action('wp_enqueue_scripts', 'snb_enqueue_styles');

// Display the notification bar
function snb_display_notification_bar() {
    $text = get_option('snb_text', 'Welcome to our website!');
    $bg_color = get_option('snb_bg_color', '#333');
    $text_color = get_option('snb_text_color', '#fff');

    echo "<div class='snb-bar' style='background-color: $bg_color; color: $text_color;'>"
         . esc_html($text) . "</div>";
}
add_action('wp_body_open', 'snb_display_notification_bar');

// Add admin menu
function snb_add_admin_menu() {
    add_options_page('Simple Notification Bar', 'Notification Bar', 'manage_options', 'simple-notification-bar', 'snb_options_page');
}
add_action('admin_menu', 'snb_add_admin_menu');

// Register settings
function snb_settings_init() {
    register_setting('snb_settings', 'snb_text');
    register_setting('snb_settings', 'snb_bg_color');
    register_setting('snb_settings', 'snb_text_color');

    add_settings_section('snb_settings_section', 'Notification Bar Settings', null, 'simple-notification-bar');

    add_settings_field('snb_text', 'Notification Text', function () {
        $value = get_option('snb_text', '');
        echo "<input type='text' name='snb_text' value='" . esc_attr($value) . "' class='regular-text' />";
    }, 'simple-notification-bar', 'snb_settings_section');

    add_settings_field('snb_bg_color', 'Background Color', function () {
        $value = get_option('snb_bg_color', '#333');
        echo "<input type='text' name='snb_bg_color' value='" . esc_attr($value) . "' class='snb-color-field' />";
    }, 'simple-notification-bar', 'snb_settings_section');

    add_settings_field('snb_text_color', 'Text Color', function () {
        $value = get_option('snb_text_color', '#fff');
        echo "<input type='text' name='snb_text_color' value='" . esc_attr($value) . "' class='snb-color-field' />";
    }, 'simple-notification-bar', 'snb_settings_section');
}
add_action('admin_init', 'snb_settings_init');

// Admin settings page
function snb_options_page() {
    ?>
    <div class="wrap">
        <h1>Simple Notification Bar</h1>
        <form action="options.php" method="post">
            <?php
            settings_fields('snb_settings');
            do_settings_sections('simple-notification-bar');
            submit_button();
            ?>
        </form>
    </div>
    <?php
}

// Enqueue color picker
function snb_admin_scripts($hook_suffix) {
    if ($hook_suffix === 'settings_page_simple-notification-bar') {
        wp_enqueue_style('wp-color-picker');
        wp_enqueue_script('snb-color-picker', plugin_dir_url(__FILE__) . 'js/snb-admin.js', array('wp-color-picker'), false, true);
    }
}
add_action('admin_enqueue_scripts', 'snb_admin_scripts');
