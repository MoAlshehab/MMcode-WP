<?php
/**
 * Template Name: MMCode Home
 */
get_header();
?>

<!-- HERO SECTION -->
<section class="bg-gray-100 py-20">
    <div class="container mx-auto px-6 md:px-12 flex flex-col md:flex-row items-center gap-12">

        <!-- Left -->
        <div class="md:w-1/2">
            <h1 class="text-5xl md:text-6xl font-bold leading-tight mb-6">
                MMCode – Web Developer & Software Creator
            </h1>

            <p class="text-lg text-gray-600 mb-8">
                Ik bouw professionele webapplicaties met Laravel, React en WordPress.
            </p>

            <div class="flex gap-4">
                <a href="/projecten"
                   class="px-6 py-3 rounded-xl bg-black text-white font-medium hover:bg-gray-800 transition">
                    Bekijk projecten
                </a>
                <a href="/contact"
                   class="px-6 py-3 rounded-xl border border-black font-medium hover:bg-black hover:text-white transition">
                    Neem contact op
                </a>
            </div>
        </div>

        <!-- Right -->
        <div class="md:w-1/2 flex justify-center">
            <div class="w-72 h-72 bg-gray-300 rounded-xl flex items-center justify-center text-xl text-gray-600">
                Jouw Logo
            </div>
        </div>

    </div>
</section>

<!-- SERVICES -->
<section class="py-20">
    <div class="container mx-auto px-6 md:px-12">

        <h2 class="text-3xl font-bold mb-12">Wat ik doe</h2>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="p-8 border rounded-xl shadow-sm hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-3">Web Development</h3>
                <p class="text-gray-600">Laravel, WordPress, PHP, REST APIs.</p>
            </div>

            <div class="p-8 border rounded-xl shadow-sm hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-3">Frontend Development</h3>
                <p class="text-gray-600">React, Inertia, Tailwind, UX/UI.</p>
            </div>

            <div class="p-8 border rounded-xl shadow-sm hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-3">SaaS & Apps</h3>
                <p class="text-gray-600">Moderne webapps op maat voor bedrijven.</p>
            </div>

        </div>

    </div>
</section>

<!-- PROJECTEN -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6 md:px-12">

        <h2 class="text-3xl font-bold mb-12">Projecten</h2>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="p-8 border rounded-xl shadow-sm hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2">Tijd</h3>
                <p class="text-gray-600">Afspraken SaaS app (Laravel + React).</p>
            </div>

            <div class="p-8 border rounded-xl shadow-sm hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2">SnackyWay</h3>
                <p class="text-gray-600">E-commerce project (Laravel + WordPress).</p>
            </div>

            <div class="p-8 border rounded-xl shadow-sm hover:shadow-lg transition">
                <h3 class="text-xl font-semibold mb-2">WOW</h3>
                <p class="text-gray-600">WooCommerce koppeling met Laravel API.</p>
            </div>

        </div>

    </div>
</section>

<!-- CTA -->
<section class="py-20 text-center">
    <h2 class="text-3xl font-bold mb-4">Klaar om samen iets te bouwen?</h2>
    <p class="text-gray-600 mb-6">Stuur me een bericht en ik reageer snel.</p>
    <a href="/contact"
       class="px-8 py-4 bg-black text-white rounded-xl font-medium hover:bg-gray-800 transition">
        Contact opnemen
    </a>
</section>

<?php get_footer(); ?>
