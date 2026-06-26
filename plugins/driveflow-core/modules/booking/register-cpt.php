<?php

function driveflow_register_booking_cpt()
{
    $labels = array(
        'name' => 'Bookings',
        'singular_name' => 'Booking',
        'add_new' => 'Add Booking'
    );

    register_post_type(
        'booking',
        array(
            'labels' => $labels,
            'public' => true,
            'show_in_rest' => true,
            'rest_base' => 'bookings',
            'support' => array('title'),
            'menu_icon' => 'dashicon-calendar-alt'
        )
    );
}

add_action('init', 'driveflow_register_booking_cpt');
