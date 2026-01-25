<?php
/**
 * Homepage pattern – large hero + contact CTA
 */

register_block_pattern(
    'mmcode/homepage-large',
    [
        'title'       => __('Homepage – Large Hero', 'mmcode'),
        'description' => __('Large, flexible homepage layout with hero, features and contact CTA.', 'mmcode'),
        'categories'  => ['mm-patterns'],
        'content'     => mmcode_homepage_large_pattern(),
    ]
);

function mmcode_homepage_large_pattern(): string
{
    return <<<HTML
<!-- wp:group {"className":"bg-neutral-950 text-white"} -->
<div class="wp-block-group bg-neutral-950 text-white">
  <div class="max-w-7xl mx-auto px-6 py-28">

    <!-- wp:columns {"verticalAlignment":"center","className":"gap-16"} -->
    <div class="wp-block-columns are-vertically-aligned-center gap-16">

      <!-- wp:column -->
      <div class="wp-block-column">

        <!-- wp:heading {"level":1,"className":"text-5xl md:text-6xl font-extrabold"} -->
        <h1 class="text-5xl md:text-6xl font-extrabold">Your powerful headline goes here</h1>
        <!-- /wp:heading -->

        <!-- wp:paragraph {"className":"text-lg text-neutral-300 mt-6"} -->
        <p class="text-lg text-neutral-300 mt-6">Describe your product, service or company here. Everything is editable.</p>
        <!-- /wp:paragraph -->

        <!-- wp:buttons {"className":"mt-10 flex gap-4"} -->
        <div class="wp-block-buttons mt-10 flex gap-4">

          <!-- wp:button -->
          <div class="wp-block-button">
            <a class="wp-block-button__link bg-white text-black px-8 py-4 rounded-xl font-semibold">
              Get started
            </a>
          </div>
          <!-- /wp:button -->

          <!-- wp:button {"className":"is-style-outline"} -->
          <div class="wp-block-button is-style-outline">
            <a class="wp-block-button__link border border-white/30 text-white px-8 py-4 rounded-xl">
              Contact us
            </a>
          </div>
          <!-- /wp:button -->

        </div>
        <!-- /wp:buttons -->

      </div>
      <!-- /wp:column -->

      <!-- wp:column -->
      <div class="wp-block-column">

        <!-- wp:image {"sizeSlug":"large","className":"rounded-3xl overflow-hidden"} -->
        <figure class="wp-block-image size-large rounded-3xl overflow-hidden">
          <img alt="" />
        </figure>
        <!-- /wp:image -->

      </div>
      <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

  </div>
</div>
<!-- /wp:group -->

<!-- wp:group {"className":"bg-white"} -->
<div class="wp-block-group bg-white">
  <div class="max-w-7xl mx-auto px-6 py-24">

    <!-- wp:columns {"columns":3,"className":"gap-10"} -->
    <div class="wp-block-columns gap-10">

      <!-- wp:column -->
      <div class="wp-block-column p-8 rounded-2xl border border-neutral-200">
        <!-- wp:heading {"level":3} -->
        <h3>Feature one</h3>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p>Explain your feature here.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:column -->

      <!-- wp:column -->
      <div class="wp-block-column p-8 rounded-2xl border border-neutral-200">
        <!-- wp:heading {"level":3} -->
        <h3>Feature two</h3>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p>Explain your feature here.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:column -->

      <!-- wp:column -->
      <div class="wp-block-column p-8 rounded-2xl border border-neutral-200">
        <!-- wp:heading {"level":3} -->
        <h3>Feature three</h3>
        <!-- /wp:heading -->
        <!-- wp:paragraph -->
        <p>Explain your feature here.</p>
        <!-- /wp:paragraph -->
      </div>
      <!-- /wp:column -->

    </div>
    <!-- /wp:columns -->

  </div>
</div>
<!-- /wp:group -->
HTML;
}
