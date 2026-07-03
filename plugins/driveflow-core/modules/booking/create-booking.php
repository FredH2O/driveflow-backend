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

    if (empty($data['phone'])) {
        return new WP_Error(
            'missing_phone',
            'Phone number is required.',
            ['status' => 400]
        );
    }

    if (empty($data['service'])) {
        return new WP_Error(
            'missing_service',
            'Service is required.',
            ['status' => 400]
        );
    }

    // sanitize
    $name = sanitize_text_field($data['name']);
    $phone = sanitize_text_field($data['phone']);
    $service = sanitize_text_field($data['service']);
    $date = sanitize_text_field($data['date']);
    $time = sanitize_text_field($data['time']);
    $status = 'pending';

    // booking creation
    $post_id = wp_insert_post([
        'post_type' => 'booking',
        'post_status' => 'publish',
        'post_title' => $name . ' - ' . $service,
    ]);

    // error checking 
    if (is_wp_error($post_id)) {
        return new WP_Error(
            'booking_failed',
            'Unable to create booking.',
            ['status' => 500]
        );
    }

    update_field('customer_name', $name, $post_id);
    update_field('phone_number', $phone, $post_id);
    update_field('service', $service, $post_id);
    update_field('booking_date', $date, $post_id);
    update_field('booking_time', $time, $post_id);
    update_field('booking_status', $status, $post_id);

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
            'status' => $status
        ]
    ];
}
