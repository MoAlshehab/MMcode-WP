<?php
/**
 * Services Sidebar
 * MMCODE WP
 */

if ( ! is_active_sidebar('services-sidebar') ) {
  return;
}
?>

<aside class="sidebar sidebar-services">

  <div class="sidebar-inner">

    <?php dynamic_sidebar('services-sidebar'); ?>

  </div>

</aside>
