<?php

/**
 * Plugin Name: Driveflow Core
 * Description: Core functionality for Driveflow (CPT, ACF, API).
 * Version: 1.0
 */

// includes
require_once plugin_dir_path(__FILE__) . 'includes/cors.php';

// services cpt
require_once plugin_dir_path(__FILE__) . 'modules/services/register-cpt.php';
require_once plugin_dir_path(__FILE__) . 'modules/services/admin.php';

// testimonials cpt
require_once plugin_dir_path(__FILE__) . 'modules/testimonials/register-cpt.php';
require_once plugin_dir_path(__FILE__) . 'modules/testimonials/admin.php';
require_once plugin_dir_path(__FILE__) . 'modules/testimonials/rest-testimonial.php';

// booking cpt
require_once plugin_dir_path(__FILE__) . 'modules/booking/register-cpt.php';
require_once plugin_dir_path(__FILE__) . 'modules/booking/register-api.php';
require_once plugin_dir_path(__FILE__) . 'modules/booking/create-booking.php';
require_once plugin_dir_path(__FILE__) . 'modules/booking/update-booking-status.php';
require_once plugin_dir_path(__FILE__) . 'modules/booking/delete-booking.php';
require_once plugin_dir_path(__FILE__) . 'modules/booking/read-booking.php';
