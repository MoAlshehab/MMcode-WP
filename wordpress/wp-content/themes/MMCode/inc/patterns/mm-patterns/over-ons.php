<?php
/**
 * Block Pattern: Standaard Over Ons Pagina
 */

register_block_pattern(
    'mmcode/page-about',
    [
        'title'       => __('Over ons – Standaard', 'mmcode'),
        'description' => __('Professionele standaard Over ons pagina.', 'mmcode'),
        'categories'  => ['mm-pages'],
        'content'     => '
<!-- wp:group {"className":"page-section"} -->
<div class="wp-block-group page-section">

<!-- wp:heading {"level":1} -->
<h1>Over ons</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Wij zijn een professioneel bedrijf dat zich richt op kwaliteit en service.</p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns">

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} -->
<h3>Onze missie</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Wij helpen klanten groeien met slimme digitale oplossingen.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column">
<!-- wp:heading {"level":3} -->
<h3>Onze visie</h3>
<!-- /wp:heading -->
<!-- wp:paragraph -->
<p>Innovatie, eenvoud en betrouwbaarheid staan centraal.</p>
<!-- /wp:paragraph -->
</div>
<!-- /wp:column -->

</div>
<!-- /wp:columns -->

</div>
<!-- /wp:group -->
',
    ]
);

