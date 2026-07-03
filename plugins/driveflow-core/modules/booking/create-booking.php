<?php

function driveflow_create_booking(WP_REST_Request $request)
{
    // json token
    $data = $request->get_json_params();

    // validation
    if (empty($data['name'])) {
        return new WP_Error(
            'missing_name',
            'Name is required.',
            ['status' => 400]
        );
    }

    if (empty($data['date'])) {
        return new WP_Error(
            'missing_date',
            'Date is required.',
            ['status' => 400]
        );
    }

    if (empty($data['time'])) {
        return new WP_Error(
            'missing_time',
            'Time is required.',
            ['status' => 400]
        );
    }

    // sanitize
    $name = sanitize_text_field($data['name']);
    $phone = sanitize_text_field($data['tel']);
    $service = sanitize_text_field($data['service']);
    $date = sanitize_text_field($data['date']);
    $time = sanitize_text_field($data['time']);

    // booking creation
    $post_id = wp_insert_post([
        'post_type' => 'booking',
        'post_status' => 'publish',
        'post_title' => $name . ' - ' . $service,
    ]);

    // save meta
    update_post_meta($post_id, 'booking_name', $name);
    update_post_meta($post_id, 'booking_tel', $phone);
    update_post_meta($post_id, 'booking_service', $service);
    update_post_meta($post_id, 'booking_date', $date);
    update_post_meta($post_id, 'booking_time', $time);

    // error checking 
    if (is_wp_error($post_id)) {
        return new WP_Error(
            'booking_failed',
            'Unable to create booking.',
            ['status' - 500]
        );
    }

    return [
        'success' => true,
        'message' => 'Booking created successfully',
        'booking_id' => $post_id,
        'data' => [
            'name' => $name,
            'phone' => $phone,
            'service' => $service,
            'date' => $date,
            'time' => $time,
        ]
    ];
}
