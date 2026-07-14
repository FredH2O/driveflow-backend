<?php

function driveflow_read_booking($request)
{
    $booking_id = $request['id'];

    $booking = get_post($booking_id);

    return [

        'id' => $booking->ID,
        'title' => $booking->post_title,
        'status' => get_post_meta(
            $booking_id,
            'booking_status',
            true
        )
    ];
}
