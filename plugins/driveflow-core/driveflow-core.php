<?php

/**
 * Plugin Name: Driveflow Core
 * Description: Core functionality for Driveflow (CPT, ACF, API).
 * Version: 1.0
 */

// driveflow's "services" custom post type for adding services

function driveflow_register_services_cpt()
{
    $labels = [
        'name' => 'Services',
        'singular_name' => 'Service',
        'add_new' => 'Add Service',
        'add_new_item' => 'Add New Service',
    ];

    register_post_type(
        'service',
        [
            'labels' => $labels,
            'public' => true,
            'show_in_rest' => true,
            'rest_base' => 'services',
            'supports' => ['title', 'thumbnail'],
            'rewrite' => ['slug' => 'services'],
            'menu_icon' => 'dashicons-table-col-before',
        ]
    );
}

add_action('init', 'driveflow_register_services_cpt');

function driveflow_service_limit_notice()
{
    $screen = get_current_screen();

    if (!$screen || $screen->post_type !== 'service') {
        return;
    }

    $count = wp_count_posts('service')->publish;

    if ($count >= 6) {
        echo '
        <div class="notice notice-warning">
          <p>
             <strong>Maximum services reached (6).</strong> 
             Delete an existing service before adding a new one.
          </p>
        </div>';
    }
}

add_action('admin_notices', 'driveflow_service_limit_notice');

function driveflow_limit_services_to_six($post_ID, $post, $update)
{

    $post_type = get_post_type($post_ID);

    if ($post_type !== 'service') {
        return;
    }

    $count = wp_count_posts('service')->publish;

    // if creating a new service AND already at limitt
    if (!$update && $count >= 6) {
        wp_die('Maximum of 6 services allowed.');
    }
}

add_action('wp_insert_post', 'driveflow_limit_services_to_six', 10, 3);

// Allow React development server to access the REST API
add_filter('rest_pre_serve_request', function ($value) {
    header('Access-Control-Allow-Origin: http://localhost:5173');
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');

    return $value;
});
