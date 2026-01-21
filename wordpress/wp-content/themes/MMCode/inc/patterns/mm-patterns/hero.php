<?php

register_block_pattern(
    'mmcode/hero',
    [
        'title'       => __('MM Hero – Pagina', 'mmcode-child'),
        'description' => __('Hero met standaard afbeelding, titel en CTA', 'mmcode-child'),
        'categories'  => ['mm-patterns'],
        'content'     => '
<!-- wp:cover {
    "url":"' . get_stylesheet_directory_uri() . '/assets/images/hero-default.jpg",
    "dimRatio":50,
    "overlayColor":"black",
    "align":"full"
} -->
<div class="wp-block-cover alignfull">

    <span aria-hidden="true"
        class="wp-block-cover__background has-black-background-color has-background-dim-50">
    </span>

    <div class="wp-block-cover__inner-container">

        <!-- wp:heading {"level":1} -->
        <h1 class="text-4xl md:text-5xl font-bold">
            Pagina titel
        </h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph -->
        <p class="mt-4 text-lg max-w-xl">
            Korte introductie van deze pagina.
        </p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons -->
        <div class="mt-6">
            <!-- wp:button -->
            <div class="wp-block-button">
                <a class="btn-primary">
                    Contact opnemen
                </a>
            </div>
            <!-- /wp:button -->
        </div>
        <!-- /wp:buttons -->

    </div>

</div>
<!-- /wp:cover -->
',
    ]
);
