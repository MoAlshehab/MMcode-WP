<?php
/**
 * Title: MM Homepage
 * Slug: mm/homepage
 * Categories: mm-patterns
 * Description: Voorbeeld homepage met header, hero en footer.
 */
?>

<!-- Header -->
<?php include get_stylesheet_directory() . '/patterns/headers/mm-navbar-red.php'; ?>

<!-- Hero -->
<section class="bg-primary text-white py-20 text-center">
    <h1 class="text-4xl font-bold mb-4">Welkom bij MMCode</h1>
    <p class="text-lg">De beste plek voor jouw diensten en projecten.</p>
    <a href="/contact" class="mt-6 inline-block bg-white text-primary px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">Contacteer ons</a>
</section>

<!-- Features -->
<section class="py-16 max-w-7xl mx-auto px-4 grid grid-cols-1 md:grid-cols-3 gap-8">
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <h3 class="font-bold text-xl mb-2">Service 1</h3>
        <p>Beschrijving van service 1.</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <h3 class="font-bold text-xl mb-2">Service 2</h3>
        <p>Beschrijving van service 2.</p>
    </div>
    <div class="bg-white p-6 rounded-lg shadow-md text-center">
        <h3 class="font-bold text-xl mb-2">Service 3</h3>
        <p>Beschrijving van service 3.</p>
    </div>
</section>

<!-- Footer -->
<?php include get_stylesheet_directory() . '/patterns/footers/mm-footer-red.php'; ?>
