<?php

register_block_pattern(
    'mmcode/cta',
    [
        'title'       => __('CTA – MMCODE', 'mmcode-child'),
        'categories'  => ['mm-cta'],
        'description' => __('Call to Action sectie', 'mmcode-child'),
        'content'     => file_get_contents(
            get_stylesheet_directory() . '/inc/patterns/cta.php'
        ),
    ]
);
