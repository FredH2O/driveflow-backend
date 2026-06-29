<?php

function driveflow_create_booking(WP_REST_Request $request)
{
    $data = $request->get_json_params();

    return [
        'success' => true,
        'message' => 'Booking handler connected',
        'received' => $data
    ];
}
