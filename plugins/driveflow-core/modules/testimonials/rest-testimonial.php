<?php

function driveflow_testimonial_image_field()
{
    register_rest_field('testimonial', 'image_url', [
        'get_callback' => function ($post) {
            return get_the_post_thumbnail_url($post['id'], 'full') ?: null;
        }
    ]);
}

add_action('rest_api_init', 'driveflow_testimonial_image_field');
