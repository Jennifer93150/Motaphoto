<?php 
/**
 * Header file for the Motaphoto WordPress theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Motaphoto
 * @since Motaphoto
 */
?>
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
            <header>
                        <!-- BARRE DE NAVIGATION + MENU  -->
                        <?php if (has_nav_menu('primary')) : ?>
                            <nav id="navigation" class="navigation" aria-label="<?php esc_attr_e('Primary menu', 'motaphoto'); ?>">
                                <a href="#home"><img class="navigation-logo" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Logo.png'; ?>" alt="Nathalie Mota"></a>
                                <?php
                                wp_nav_menu(
                                    array(
                                        'theme_location'  => 'primary',
                                        'items_wrap'      => '<ul id="myTopnav" class="navigation_menu">%3$s</ul>',
                                        'fallback_cb'     => false,
                                    )
                                );
                                ?>
                                <div id="navigation_cross" class="navigation_cross"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Croix.png'; ?>" alt="burger croix" onclick="menuClose()"></div>
                                <a href="javascript:void(0);" id="navigation_burger" class="navigation_burger" onclick="menuClose()">
                                    <img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Burger.png'; ?>" alt="menu burger">
                                </a>
                            </nav><!-- #site-navigation -->
                        <?php
                        endif;

                        ?>
                    </header>
                <main id="main" class="site-main">
                   