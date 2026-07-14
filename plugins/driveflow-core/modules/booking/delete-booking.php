<?php

function driveflow_delete_booking($request)
{
    $booking_id = $request['id'];

    wp_delete_post($booking_id, true);

    return [
        'success' => true,
        'booking_id' => $booking_id
    ];
}
