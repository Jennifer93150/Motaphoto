<?php

function theme_enqueue_styles()
{
    // Chargement du style.css du thème parent Twenty Twenty
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // Chargement du style.css pour nos personnalisations
    wp_enqueue_style('child-theme-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style('navigation-style', get_stylesheet_directory_uri() . '/assets/css/navigation.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/navigation.css'));
    wp_enqueue_style('footer-style', get_stylesheet_directory_uri() . '/assets/css/footer.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/footer.css'));
    wp_enqueue_style('modal-style', get_stylesheet_directory_uri() . '/assets/css/modal.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/modal.css'));

    // Fichiers Js
    wp_enqueue_script('navigation', get_stylesheet_directory_uri() . '/assets/js/navigation.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/navigation.js'));
    wp_enqueue_script('modal', get_stylesheet_directory_uri() . '/assets/js/modal.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/modal.js'));

    //Google fonts
    wp_enqueue_style('body-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat&family=Space+Mono&display=swap', false);
    wp_enqueue_style('form-google-fonts', ' https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@500&family=Space+Mono&display=swap', false);

    // Chargement du /css/shortcodes/banniere-titre.css pour notre shortcode banniere titre
    // wp_enqueue_style('banniere-titre-shortcode', get_stylesheet_directory_uri() . '/css/shortcodes/banniere-titre.css', array(), filemtime(get_stylesheet_directory() . '/css/shortcodes/banniere-titre.css'));

}

//Ajout de nouveaux emplacements de menu
function register_my_menu()
{
    register_nav_menu('primary', 'Menu de navigation');
    register_nav_menu('footer', 'Pied de page');
}

// creation de type de contenu personnalisé (Photo)
function motaphoto_register_custom_post_types()
{
    $labels_photo = array(
        'menu_name'             => __('Photos', 'motaphoto'),
        'name_admin_bar'        => __('Photo', 'motaphoto'),
        'add_new_item'          => __('Ajouter un nouvel Photo', 'motaphoto'),
        'new_item'              => __('Nouvel Photo', 'motaphoto'),
        'edit_item'             => __('Modifier l\'Photo', 'motaphoto'),
    );

    $args_photo = array(
        'label'                 => __('Photos', 'motaphoto'),
        'description'           => __('Photos', 'motaphoto'),
        'labels'                => $labels_photo,
        'supports'              => array('title', 'thumbnail', 'excerpt', 'editor'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 40,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'menu_icon'                       => 'dashicons-embed-photo',
    );

    register_post_type('cif_photo', $args_photo);
}

/***** Actions *****/
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
add_action('after_setup_theme', 'register_my_menu');
add_action('init', 'motaphoto_register_custom_post_types', 11);
