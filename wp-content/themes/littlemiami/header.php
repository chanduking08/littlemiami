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

    <nav class="navbar navbar-expand-lg navbar-dark bg-xl-dark z-3 container bg-transparent">
        <div class="container d-flex align-items-center">
            <!-- Site Logo -->
            <?php 
            if (has_custom_logo()) {
                the_custom_logo(); 
            } else {
                echo '<span class="text-white">Little Miami</span>'; // Fallback text
            }
            ?>

            <!-- Hamburger Button: visible only below 992px, aligned right -->
            <button class="navbar-toggler p-3 d-lg-none ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>

        <div class="container">
            <div class="row">
                <div class="text-lg-end open-status text-center px-0">
                    <p class="mb-0 text-white content">TACO TRAILER<span class="separator position-relative px-1">.</span>OPEN<span class="px-2">|</span>ROOFTOP BAR<span class="separator position-relative px-1">.</span>OPEN</p>
                </div>

                <!-- Desktop Menu -->
                <div class="desktop-menu d-none d-lg-flex px-0">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'primary',
                        'depth'          => 2,
                        'container'      => false,
                        'menu_class'     => 'navbar-nav ms-auto',
                        'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                        'walker'         => new WP_Bootstrap_Navwalker()
                    ));
                    ?>
                    <div class="social-icons d-flex mt-2">
                        <a href="https://maps.app.goo.gl/9NN1eu711gu4hdMj7/" target="_blank"><i class="fa fa-map-marker text-dark p-1 mx-1"></i></a>
                        <a href="https://www.facebook.com/littlemiamibrewing/" target="_blank"><i class="fa fa-facebook text-dark p-1 mx-1"></i></a>
                        <a href="https://twitter.com/littlemiamibrew/" target="_blank"><i class="fa fa-twitter text-dark p-1 mx-1"></i></a>
                        <a href="https://www.instagram.com/littlemiamibrew/" target="_blank"><i class="fa fa-instagram text-dark p-1 ml-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </nav>


    <!-- Offcanvas Sidebar: visible only for mobile/tablet -->
    <div class="offcanvas offcanvas-start d-lg-none" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasMenuLabel">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'depth'          => 2,
                'container'      => false,
                'menu_class'     => 'navbar-nav',
                'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',
                'walker'         => new WP_Bootstrap_Navwalker()
            ));
            ?>
            <div class="social-icons mt-4">
                <a href="https://maps.app.goo.gl/9NN1eu711gu4hdMj7/" target="_blank"><i class="fa fa-map-marker text-dark p-1 mx-1"></i></a>
                <a href="https://www.facebook.com/littlemiamibrewing/" target="_blank"><i class="fa fa-facebook text-dark p-1 mx-1"></i></a>
                <a href="https://twitter.com/littlemiamibrew/" target="_blank"><i class="fa fa-twitter text-dark p-1 mx-1"></i></a>
                <a href="https://www.instagram.com/littlemiamibrew/" target="_blank"><i class="fa fa-instagram text-dark p-1 mx-1"></i></a>
            </div>
        </div>
    </div>
