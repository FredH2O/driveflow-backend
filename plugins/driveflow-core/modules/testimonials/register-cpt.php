<?php

function driveflow_register_testimonials_cpt()
{
    $labels = [
        'name' => 'Testimonials',
        'singular_name' => 'Testimonial',
        'add_new' => 'Add Testimonial',
        'add_new_item' => 'Add New Testimonial',
    ];

    register_post_type(
        'testimonial',
        [
            'labels' => $labels,
            'public' => true,
            'show_in_rest' => true,
            'rest_base' => 'testimonials',
            'supports' => ['title', 'thumbnail'],
            'rewrite' =>   ['slug' => 'testimonials'],
            'menu_icon' => 'dashicons-format-status',
        ]
    );
}

add_action('init', 'driveflow_register_testimonials_cpt');
