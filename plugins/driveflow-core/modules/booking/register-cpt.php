<?php

function driveflow_register_booking_cpt()
{
    register_post_type('booking', [
        'labels' => [
            'name' => 'Bookings',
            'singular_name' => 'Booking',
        ],

        'public' => true,
        'show_in_rest' => true,

        'supports' => [
            'title',
        ],

        'menu_icon' => 'dashicons-calendar',
    ]);
}

add_action('init', 'driveflow_register_booking_cpt');
