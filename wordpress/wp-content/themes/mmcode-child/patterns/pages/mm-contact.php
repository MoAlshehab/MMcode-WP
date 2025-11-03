<?php
/**
 * Title: MM Contact Page
 * Slug: mm/contact
 * Categories: mm-pages
 * Description: Contactpagina voorbeeld met header en footer.
 */
?>

<!-- Header -->
<?php include get_stylesheet_directory() . '/patterns/headers/mm-navbar-dark.php'; ?>

<section class="py-20 max-w-2xl mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6 text-center">Neem contact op</h1>
    <form class="bg-white p-8 rounded-lg shadow-md grid gap-4">
        <input type="text" placeholder="Naam" class="border border-gray-300 p-2 rounded">
        <input type="email" placeholder="E-mail" class="border border-gray-300 p-2 rounded">
        <textarea placeholder="Bericht" class="border border-gray-300 p-2 rounded h-32"></textarea>
        <button class="bg-primary text-white px-6 py-3 rounded-lg font-semibold hover:bg-red-700 transition">Verstuur</button>
    </form>
</section>

<!-- Footer -->
<?php include get_stylesheet_directory() . '/patterns/footers/mm-footer-dark.php'; ?>
