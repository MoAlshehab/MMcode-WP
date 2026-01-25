<?php
/**
 * Block Pattern: Diensten pagina
 */

register_block_pattern(
    'mmcode/services-page',
    [
        'title'      => __('Diensten pagina – MMCODE', 'mmcode'),
        'categories' => ['mm-pages'],
        'content'    => '
<!-- wp:heading {"level":1} -->
<h1>Onze diensten</h1>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns">

  <!-- wp:column -->
  <div class="wp-block-column">
    <h3>Dienst 1</h3>
    <p>Beschrijving dienst.</p>
  </div>
  <!-- /wp:column -->

  <!-- wp:column -->
  <div class="wp-block-column">
    <h3>Dienst 2</h3>
    <p>Beschrijving dienst.</p>
  </div>
  <!-- /wp:column -->

  <!-- wp:column -->
  <div class="wp-block-column">
    <h3>Dienst 3</h3>
    <p>Beschrijving dienst.</p>
  </div>
  <!-- /wp:column -->

</div>
<!-- /wp:columns -->
        ',
    ]
);
