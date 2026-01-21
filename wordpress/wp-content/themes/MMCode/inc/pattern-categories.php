<?php

add_action('init', function () {
    register_block_pattern_category(
        'mm-patterns',
        ['label' => 'MM Patterns']
    );
});


