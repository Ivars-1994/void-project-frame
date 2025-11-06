<?php
/**
 * Theme functions: init, enqueue scripts and styles, include required files and widgets.
 *
 * @package Bravisthemes
 * @since Fixera 1.0
 */
if( !defined('THEME_DEV_MODE_ELEMENTS') && is_user_logged_in()){
    define('THEME_DEV_MODE_ELEMENTS', true);
}
if(!defined('DEV_MODE')){define('DEV_MODE', true);}
require_once get_template_directory() . '/inc/classes/class-main.php';

if ( is_admin() ){ 
	require_once get_template_directory() . '/inc/admin/admin-init.php'; 
}
/**
 * Theme Require
*/
fixera()->require_folder('inc');
fixera()->require_folder('inc/classes');
fixera()->require_folder('inc/theme-options');
fixera()->require_folder('template-parts/widgets');
if(class_exists('Woocommerce')){
    fixera()->require_folder('woocommerce');
}

// Shortcode to return only the city name based on IP
function geo_location_city_only_shortcode() {
    // Get real visitor IP
    $ip = $_SERVER['REMOTE_ADDR'];
    if (!empty($_SERVER['HTTP_CF_CONNECTING_IP'])) {
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
    }

    // Get city using ip-api
    $response = wp_remote_get("http://ip-api.com/json/{$ip}?fields=status,city");

    if (is_wp_error($response)) {
        return "Ihrer Stadt"; // fallback
    }

    $body = wp_remote_retrieve_body($response);
    $data = json_decode($body);

    if (isset($data->status) && $data->status === 'success' && !empty($data->city)) {
        return sanitize_text_field($data->city);
    }

    return "Ihrer Stadt"; // fallback
}
add_shortcode('geo_city_name', 'geo_location_city_only_shortcode');


function disable_right_click_script() {
  echo "
    <script>
      document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
      });
      document.addEventListener('copy', function(e) {
        e.preventDefault();
      });
      document.addEventListener('cut', function(e) {
        e.preventDefault();
      });
      document.addEventListener('paste', function(e) {
        e.preventDefault();
      });
    </script>
  ";
}
add_action('wp_footer', 'disable_right_click_script');








function custom_post_title_shortcode() {
    return get_the_title();
}
add_shortcode('post_title', 'custom_post_title_shortcode');



