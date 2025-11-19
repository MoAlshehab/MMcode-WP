<?php
// Kies hier dynamisch welke footer je wilt tonen
$selected_footer = 'mm-footer-red'; // voorbeeld, kan je aanpassen of via customizer

$footer_file = get_stylesheet_directory() . "/patterns/footers/{$selected_footer}.php";
if ( file_exists( $footer_file ) ) {
    echo '<div class="mt-auto">'; // mt-auto duwt footer naar onder
    include $footer_file;
    echo '</div>';
}
?>

</div> <!-- sluit flex container -->

<?php wp_footer(); ?>
</body>
</html>
