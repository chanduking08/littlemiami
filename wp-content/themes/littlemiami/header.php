<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=BenchNine:wght@300;400;700&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php if (is_active_sidebar('top-bar')) : ?>
        <div class="top-bar bg-primary text-center text-white py-2">
            <?php dynamic_sidebar('top-bar'); ?>
        </div>
    <?php endif; ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-xl-dark z-3">
        <div class="container">
            <!-- Site Logo -->
            <?php 
            if (has_custom_logo()) {
                the_custom_logo(); 
            } else {
                echo '<span class="text-white">Little Miami</span>'; // Fallback text
            }
            ?>

            <!-- Hamburger Button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="row">
                <div class="text-end">
                    <p class="mb-0 text-white">TACO TRAILER<span class="separator position-relative px-1">.</span>OPEN<span class="px-2">|</span>ROOFTOP BAR<span class="separator position-relative px-1">.</span>OPEN</p>
                </div>
                <!-- Navigation Menu -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'depth'          => 2, // Supports dropdowns
                        'container'      => false,
                        'menu_class'     => 'navbar-nav ms-auto',
                        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'         => new WP_Bootstrap_Navwalker()
                    ));
                    ?>
                    <a href="https://maps.app.goo.gl/9NN1eu711gu4hdMj7/" target="_blank"><i class="fa fa-map-marker text-dark p-1 mx-1"></i></a>
                    <a href="https://www.facebook.com/littlemiamibrewing/" target="_blank"><i class="fa fa-facebook text-dark p-1 mx-1"></i></a>
                    <a href="https://twitter.com/littlemiamibrew/" target="_blank"><i class="fa fa-twitter text-dark p-1 mx-1"></i></a>
                    <a href="https://www.instagram.com/littlemiamibrew/" target="_blank"><i class="fa fa-instagram text-dark p-1 mx-1"></i></a>
                </div>
            </div>
        </div>
    </nav>
