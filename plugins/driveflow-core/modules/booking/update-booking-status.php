<?php

function driveflow_update_booking_status($request)
{
    $booking_id = $request['id'];

    $status = $request->get_param('status');

    update_post_meta(
        $booking_id,
        'booking_status',
        $status
    );

    return [
        'success' => true,
        'booking_id' => $booking_id,
        'status' => $status
    ];
}
