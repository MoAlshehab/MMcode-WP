<?php

add_action('init', function () {
    register_block_pattern_category(
        'mm-patterns',
        ['label' => 'MM Patterns']
    );
});


register_block_pattern_category(
    'mm-pages',
    [
        'label' => __('MMCODE – Pagina’s', 'mmcode'),
    ]
);
