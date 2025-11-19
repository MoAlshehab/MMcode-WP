<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<!-- Begin flex container -->
<div class="flex flex-col min-h-screen">

    <!-- Navbar altijd bovenaan -->
    <header class="sticky top-0 z-50">
        <?php
        // Dynamisch header selecteren, default navbar-red
        $selected_navbar = 'mm-navbar-red';
        if ( get_field('select_header') ) {
            $selected_navbar = get_field('select_header');
        }
        $header_file = get_stylesheet_directory() . "/patterns/headers/{$selected_navbar}.php";
        if ( file_exists( $header_file ) ) {
            include $header_file;
        }
        ?>
    </header>

    <!-- Begin main content -->
    <main class="flex-1">
