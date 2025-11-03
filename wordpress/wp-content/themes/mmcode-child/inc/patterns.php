<?php
function mm_register_patterns() {
    if ( function_exists( 'register_block_pattern' ) ) {

        // --- Headers ---
        $headers = [
            'navbar-red'  => 'mm-navbar-red.php',
            'navbar-dark' => 'mm-navbar-dark.php',
        ];
        foreach( $headers as $slug => $file ) {
            $file_path = get_stylesheet_directory() . '/patterns/headers/' . $file;
            if ( file_exists( $file_path ) ) {
                register_block_pattern(
                    "mmcode/{$slug}",
                    [
                        'title'      => __( ucwords(str_replace('-', ' ', $slug)), 'mmcode-child' ),
                        'categories' => ['mm-headers'],
                        'content'    => file_get_contents( $file_path ),
                    ]
                );
            }
        }

        // --- Footers ---
        $footers = [
            'footer-red'  => 'mm-footer-red.php',
            'footer-dark' => 'mm-footer-dark.php',
        ];
        foreach( $footers as $slug => $file ) {
            $file_path = get_stylesheet_directory() . '/patterns/footers/' . $file;
            if ( file_exists( $file_path ) ) {
                register_block_pattern(
                    "mmcode/{$slug}",
                    [
                        'title'      => __( ucwords(str_replace('-', ' ', $slug)), 'mmcode-child' ),
                        'categories' => ['mm-footers'],
                        'content'    => file_get_contents( $file_path ),
                    ]
                );
            }
        }

        // --- Pages (nu MM Pages categorie) ---
        $pages = [
            'homepage'  => 'mm-homepage.php',
            'contact'   => 'mm-contact.php',
        ];
        foreach( $pages as $slug => $file ) {
            $file_path = get_stylesheet_directory() . '/patterns/pages/' . $file;
            if ( file_exists( $file_path ) ) {
                register_block_pattern(
                    "mmcode/{$slug}",
                    [
                        'title'      => __( ucwords(str_replace('-', ' ', $slug)), 'mmcode-child' ),
                        'categories' => ['mm-pages'], // ✅ gebruik de nieuwe categorie
                        'content'    => file_get_contents( $file_path ),
                    ]
                );
            }
        }

    }
}
add_action( 'init', 'mm_register_patterns' );
