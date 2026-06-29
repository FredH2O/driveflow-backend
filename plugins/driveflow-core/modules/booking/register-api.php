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
}

add_action('rest_api_init', 'driveflow_register_booking_routes');
