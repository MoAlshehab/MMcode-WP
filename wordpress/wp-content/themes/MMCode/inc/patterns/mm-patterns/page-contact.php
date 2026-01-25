<?php
/**
 * Block Pattern: Contact pagina
 */

register_block_pattern(
    'mmcode/contact-page',
    [
        'title'      => __('Contact pagina – MMCODE', 'mmcode'),
        'categories' => ['mm-pages'],
        'content'    => '
<!-- wp:heading {"level":1} -->
<h1>Contact</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Neem contact met ons op via het formulier of onderstaande gegevens.</p>
<!-- /wp:paragraph -->

<!-- wp:columns -->
<div class="wp-block-columns">

  <!-- wp:column -->
  <div class="wp-block-column">
    <h4>Adres</h4>
    <p>Straatnaam 1<br>Plaats</p>
  </div>
  <!-- /wp:column -->

  <!-- wp:column -->
  <div class="wp-block-column">
    <h4>Contact</h4>
    <p>Email: info@bedrijf.nl<br>Tel: 06 12345678</p>
  </div>
  <!-- /wp:column -->

</div>
<!-- /wp:columns -->
        ',
    ]
);
