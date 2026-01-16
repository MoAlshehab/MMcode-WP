

<?php
function mmcode_schema_article() {
  if ( ! is_single() ) return;
  echo 'itemscope itemtype="https://schema.org/Article"';
}
