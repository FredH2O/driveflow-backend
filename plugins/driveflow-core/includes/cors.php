<?php

function driveflow_cors_headers($value)
{
    header('Access-Control-Allow-Origin: http://localhost:5173');
    header('Access-Control-Allow-Methods: GET, POST, PATCH, OPTIONS, DELETE');
    header('Access-Control-Allow-Headers: Content-Type, Authorization');

    return $value;
}

add_filter('rest_pre_serve_request', 'driveflow_cors_headers');
