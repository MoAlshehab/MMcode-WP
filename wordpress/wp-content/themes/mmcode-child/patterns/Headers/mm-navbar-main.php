<?php
/**
 * Title: MM Navbar Volledig
 * Slug: mm/navbar-full
 * Categories: header, navigation, mm-headers
 * Description: Responsive rode navbar voor MMCode met dropdown en socialmedia-iconen.
 */
?>

<!-- wp:group {"align":"full","layout":{"type":"flex","justifyContent":"space-between","alignItems":"center"},"className":"mm-navbar bg-red-600 text-white px-6 py-4"} -->
<div class="wp-block-group mm-navbar bg-red-600 text-white px-6 py-4 flex justify-between items-center">

    <!-- wp:group {"layout":{"type":"flex","alignItems":"center"},"className":"flex items-center gap-3"} -->
    <div class="flex items-center gap-3">
        <!-- wp:site-logo {"width":40} /-->
        <!-- wp:site-title {"className":"text-xl font-bold tracking-wide"} /-->
    </div>
    <!-- /wp:group -->

    <!-- Desktop Navigation -->
    <!-- wp:group {"layout":{"type":"flex","justifyContent":"right"},"className":"hidden md:flex items-center gap-8 font-medium"} -->
    <nav class="hidden md:flex items-center gap-8 font-medium">
        <a href="/" class="hover:text-gray-200 transition">Home</a>

        <!-- Web Service Dropdown -->
        <div class="relative group">
            <button class="hover:text-gray-200 transition flex items-center gap-1">
                Web Service
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div class="absolute left-0 hidden group-hover:block bg-white text-black rounded-lg shadow-lg mt-2 py-2 w-52 z-50">
                <a href="#" class="block px-4 py-2 hover:bg-red-100">Web Design</a>
                <a href="#" class="block px-4 py-2 hover:bg-red-100">Web Development</a>
                <a href="#" class="block px-4 py-2 hover:bg-red-100">Digital Marketing</a>
                <a href="#" class="block px-4 py-2 hover:bg-red-100">Social Media Marketing</a>
                <a href="#" class="block px-4 py-2 hover:bg-red-100">SEO Optimization</a>
            </div>
        </div>

        <a href="/portfolio" class="hover:text-gray-200 transition">Portfolio</a>
        <a href="/over-ons" class="hover:text-gray-200 transition">Over ons</a>
        <a href="/contact" class="hover:text-gray-200 transition">Contact</a>
    </nav>
    <!-- /wp:group -->

    <!-- Social media icons -->
    <!-- wp:group {"layout":{"type":"flex"},"className":"hidden md:flex items-center gap-4 text-xl"} -->
    <div class="hidden md:flex items-center gap-4 text-xl">
        <a href="#" class="hover:text-gray-200"><i class="fab fa-facebook"></i></a>
        <a href="#" class="hover:text-gray-200"><i class="fab fa-instagram"></i></a>
        <a href="#" class="hover:text-gray-200"><i class="fab fa-linkedin"></i></a>
    </div>
    <!-- /wp:group -->

    <!-- Mobile Menu Button -->
    <!-- wp:html -->
    <button id="menu-toggle" class="md:hidden focus:outline-none text-white">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
    </button>
    <!-- /wp:html -->

</div>
<!-- /wp:group -->

<!-- Mobile Menu -->
<!-- wp:html -->
<div id="mobile-menu" class="hidden flex flex-col items-center bg-red-700 text-white md:hidden space-y-4 py-4">
    <a href="/" class="hover:text-gray-200">Home</a>
    <details class="w-full text-center">
        <summary class="cursor-pointer hover:text-gray-200">Web Service</summary>
        <div class="flex flex-col mt-2 space-y-1 text-sm">
            <a href="#" class="hover:text-gray-200">Web Design</a>
            <a href="#" class="hover:text-gray-200">Web Development</a>
            <a href="#" class="hover:text-gray-200">Digital Marketing</a>
            <a href="#" class="hover:text-gray-200">Social Media Marketing</a>
            <a href="#" class="hover:text-gray-200">SEO Optimization</a>
        </div>
    </details>
    <a href="/portfolio" class="hover:text-gray-200">Portfolio</a>
    <a href="/over-ons" class="hover:text-gray-200">Over ons</a>
    <a href="/contact" class="hover:text-gray-200">Contact</a>

    <div class="flex gap-4 text-xl pt-2">
        <a href="#" class="hover:text-gray-200"><i class="fab fa-facebook"></i></a>
        <a href="#" class="hover:text-gray-200"><i class="fab fa-instagram"></i></a>
        <a href="#" class="hover:text-gray-200"><i class="fab fa-linkedin"></i></a>
    </div>
</div>

<script>
    document.getElementById("menu-toggle").addEventListener("click", function() {
        const menu = document.getElementById("mobile-menu");
        menu.classList.toggle("hidden");
    });
</script>
<!-- /wp:html -->
