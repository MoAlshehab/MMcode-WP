<?php

add_action('init', function () {

    register_block_pattern(
        'mmcode/test',
        [
            'title'      => 'MM TEST PATTERN',
            'categories' => ['mm-patterns'],
            'content'    => '
                <!-- wp:group -->
                <div style="padding:40px;background:#111;color:#fff;text-align:center">
                    <h2>MM PATTERN WERKT ✅</h2>
                    <p>Als je dit ziet, is alles correct MOMOMOMOMOMO.</p>
                </div>
                <!-- /wp:group -->
            ',
        ]
    );

});
