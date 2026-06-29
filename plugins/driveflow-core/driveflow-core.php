<?php

/**
 * Plugin Name: Driveflow Core
 * Description: Core functionality for Driveflow (CPT, ACF, API).
 * Version: 1.0
 */

// services cpt
require_once plugin_dir_path(__FILE__) . 'modules/services/register-cpt.php';
require_once plugin_dir_path(__FILE__) . 'modules/services/admin.php';

// testimonials cpt
require_once plugin_dir_path(__FILE__) . 'modules/testimonials/register-cpt.php';
require_once plugin_dir_path(__FILE__) . 'modules/testimonials/admin.php';
require_once plugin_dir_path(__FILE__) . 'modules/testimonials/rest-testimonial.php';

// booking cpt
require_once plugin_dir_path(__FILE__) . 'modules/booking/register-cpt.php';
require_once plugin_dir_path(__FILE__) . 'modules/booking/register-api.php';
require_once plugin_dir_path(__FILE__) . 'modules/booking/create-booking.php';

add_action('init', function () {

    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
        header('Access-Control-Allow-Origin: http://localhost:5173');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        exit;
    }
});

add_action('rest_api_init', function () {

    add_filter('rest_pre_serve_request', function ($value) {
        header('Access-Control-Allow-Origin: http://localhost:5173');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
        return $value;
    });
});
