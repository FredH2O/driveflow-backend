<?php

function driveflow_register_booking_routes()
{
    register_rest_route(
        'driveflow/v1',
        '/bookings',
        [
            'methods' => 'POST',
            'callback' => 'driveflow_create_booking',
            'permission_callback' => '__return_true',
        ]
    );

    register_rest_route(
        'driveflow/v1',
        '/bookings/(?P<id>\d+)/status',
        [
            'methods' => 'PATCH',
            'callback' => 'driveflow_update_booking_status',
            'permission_callback' => '__return_true'
        ]
    );

    register_rest_route(
        'driveflow/v1',
        '/bookings/(?P<id>\d+)',
        [
            'methods' => 'DELETE',
            'callback' => 'driveflow_update_booking_status',
            'permission_callback' => '__return_true'
        ]
    );
}

add_action('rest_api_init', 'driveflow_register_booking_routes');
