<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    // Chargement du style.css du thème parent Twenty Twenty
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // Chargement du style.css pour nos personnalisations
    wp_enqueue_style('child-theme-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
   
    //Google fonts
    wp_enqueue_style('body-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat&family=Space+Mono&display=swap', false);
    wp_enqueue_style('form-google-fonts', ' https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@500&family=Space+Mono&display=swap', false);

    // Chargement du /css/shortcodes/banniere-titre.css pour notre shortcode banniere titre
    // wp_enqueue_style('banniere-titre-shortcode', get_stylesheet_directory_uri() . '/css/shortcodes/banniere-titre.css', array(), filemtime(get_stylesheet_directory() . '/css/shortcodes/banniere-titre.css'));

}

/***** Actions *****/
add_action('after_setup_theme', 'register_my_menu');