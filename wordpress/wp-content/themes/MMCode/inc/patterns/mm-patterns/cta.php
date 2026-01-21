<?php

register_block_pattern(
    'mmcode/cta',
    [
        'title'      => 'MM CTA PATTERN',
        'categories' => ['mm-patterns'],
        'content'    => '
            <!-- wp:group -->
            <div class="bg-primary text-white py-16 text-center">
                <h2 class="text-3xl font-bold">
                    Klaar om te starten?
                </h2>
                <p class="mt-4">
                    Neem vandaag nog contact met ons op.
                </p>
                <a class="btn-primary mt-6 inline-block">
                    Contact opnemen MOOOOO
                </a>
            </div>
            <!-- /wp:group -->
        ',
    ]
);
