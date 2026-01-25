<?php
/**
 * Block Pattern: Grote pagina (Full width)
 */

register_block_pattern(
    'mmcode/large-page',
    [
        'title'       => __('Grote pagina – MMCODE', 'mmcode'),
        'description' => __('Brede pagina met grote secties. Alles is verwijderbaar.', 'mmcode'),
        'categories'  => ['mm-pages'],
        'content'     => '
<!-- wp:group {"align":"full","className":"mm-page-large"} -->
<div class="wp-block-group alignfull mm-page-large">

  <!-- wp:heading {"textAlign":"center","level":1} -->
  <h1 class="has-text-align-center">Grote pagina titel</h1>
  <!-- /wp:heading -->

  <!-- wp:paragraph {"align":"center"} -->
  <p class="has-text-align-center">Introductietekst. Admin kan dit aanpassen of verwijderen.</p>
  <!-- /wp:paragraph -->

  <!-- wp:spacer {"height":"60px"} -->
  <div style="height:60px"></div>
  <!-- /wp:spacer -->

  <!-- wp:columns -->
  <div class="wp-block-columns">

    <!-- wp:column -->
    <div class="wp-block-column">
      <h3>Sectie links</h3>
      <p>Content links.</p>
    </div>
    <!-- /wp:column -->

    <!-- wp:column -->
    <div class="wp-block-column">
      <h3>Sectie rechts</h3>
      <p>Content rechts.</p>
    </div>
    <!-- /wp:column -->

  </div>
  <!-- /wp:columns -->

</div>
<!-- /wp:group -->
        ',
    ]
);
