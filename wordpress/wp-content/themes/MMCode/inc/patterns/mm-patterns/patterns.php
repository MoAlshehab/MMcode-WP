<?php

add_action('init', function () {

    register_block_pattern(
        'mmcode/test',
        [
            'title'       => __('MM Test Pattern', 'mmcode-child'),
            'description' => __('Test pattern om te controleren of MMCODE patterns werken.', 'mmcode-child'),
            'categories'  => ['mm-patterns'],
            'content'     => '
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"4rem","bottom":"4rem","left":"2rem","right":"2rem"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull">

    <!-- wp:heading {"textAlign":"center","level":2} -->
    <h2 class="has-text-align-center">
        MM Pattern werkt ✅
    </h2>
    <!-- /wp:heading -->

    <!-- wp:paragraph {"align":"center"} -->
    <p class="has-text-align-center">
        Als je dit ziet, dan zijn je patterns correct geregistreerd.
    </p>
    <!-- /wp:paragraph -->

</div>
<!-- /wp:group -->
',
        ]
    );

});

