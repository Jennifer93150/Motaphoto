<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <div id="page" class="site">
        <a class="skip-link screen-reader-text" href="#content">
            <?php
            /* translators: Hidden accessibility text. */
            esc_html_e('Skip to content', 'twentytwentyone');
            ?>
        </a>

        <div id="content" class="site-content">
            <div id="primary" class="content-area">
                <main id="main" class="site-main">

                    <!-- BARRE DE NAVIGATION + MENU  -->
                    <?php if (has_nav_menu('primary')) : ?>
                        <nav id="navigation" class="navigation" aria-label="<?php esc_attr_e('Primary menu', 'motaphoto'); ?>">
                            <a href="#home"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Logo.png'; ?>" alt="Nathalie Mota"></a>
                            <?php
                            wp_nav_menu(
                                array(
                                    'theme_location'  => 'primary',
                                    'items_wrap'      => '<ul id="myTopnav" class="navigation_menu">%3$s</ul>',
                                    'fallback_cb'     => false,
                                )
                            );
                            ?>
                            <div id="navigation_cross" class="navigation_cross"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Burger croix.png'; ?>" alt="burger croix" onclick="menuClose()"></div>
                            <a href="javascript:void(0);" id="navigation_burger" class="navigation_burger" onclick="menuClose()">
                                <i class="fa fa-bars"></i>
                            </a>
                        </nav><!-- #site-navigation -->
                    <?php
                    endif;
