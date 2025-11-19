<?php
/**
 * Title: MM Footer Main
 * Slug: mm/footer-main
 * Categories: mm-footers
 * Description: Hoofdfoter met logo, links, informatie en socialmedia-iconen.
 */
?>

<!-- wp:group {"className":"mm-footer bg-gray-900 text-white py-10","layout":{"type":"constrained"}} -->
<div class="wp-block-group mm-footer bg-gray-900 text-white py-10">
    <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-3 gap-8">

        <!-- Logo + Bedrijfsinfo -->
        <div class="space-y-4 text-center md:text-left">
            <!-- wp:site-logo {"width":64,"className":"mx-auto md:mx-0"} /-->
            <h2 class="text-xl font-semibold tracking-wide">MMCode</h2>
            <p class="text-sm text-gray-300">
                Professionele weboplossingen op maat.
                Jouw partner voor design, ontwikkeling en marketing.
            </p>
            <p class="text-xs text-gray-400 mt-3">
                KVK: 12345678<br>
                BTW: NL123456789B01
            </p>
        </div>

        <!-- Handige links -->
        <div class="space-y-3 text-center md:text-left">
            <h3 class="text-lg font-semibold mb-2 text-red-400">Handige links</h3>
            <ul class="space-y-1">
                <li><a href="/" class="hover:text-red-400 transition">Home</a></li>
                <li><a href="/over-ons" class="hover:text-red-400 transition">Over ons</a></li>
                <li><a href="/diensten" class="hover:text-red-400 transition">Diensten</a></li>
                <li><a href="/contact" class="hover:text-red-400 transition">Contact</a></li>
                <li><a href="/privacy" class="hover:text-red-400 transition">Privacybeleid</a></li>
            </ul>
        </div>

        <!-- Socialmedia -->
        <div class="space-y-3 text-center md:text-left">
            <h3 class="text-lg font-semibold mb-2 text-red-400">Volg ons</h3>
            <div class="flex justify-center md:justify-start gap-4">
                <a href="#" class="hover:text-red-400 transition" aria-label="Facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="hover:text-red-400 transition" aria-label="Instagram">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="hover:text-red-400 transition" aria-label="LinkedIn">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
        </div>

    </div>

    <div class="border-t border-gray-700 mt-10 pt-6 text-center text-sm text-gray-400">
        &copy; <?php echo date('Y'); ?> MMCode. Alle rechten voorbehouden.
    </div>
</div>
<!-- /wp:group -->
