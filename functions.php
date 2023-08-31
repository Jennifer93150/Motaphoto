<?php

/**
 * Pagination query
 */
require get_stylesheet_directory() . '/photo-query.php';

function theme_enqueue_styles()
{
    // Load style.css parent theme Twenty Twenty
    wp_enqueue_style('parent-style', get_template_directory_uri() . '/style.css');
    // Load my style.css
    wp_enqueue_style('child-theme-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style('navigation-style', get_stylesheet_directory_uri() . '/assets/css/navigation.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/navigation.css'));
    wp_enqueue_style('footer-style', get_stylesheet_directory_uri() . '/assets/css/footer.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/footer.css'));
    wp_enqueue_style('modal-style', get_stylesheet_directory_uri() . '/assets/css/modal.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/modal.css'));
    wp_enqueue_style('single-page-style', get_stylesheet_directory_uri() . '/assets/css/single-page.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/single-page.css'));
    wp_enqueue_style('hero-style', get_stylesheet_directory_uri() . '/assets/css/hero.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/hero.css'));
    wp_enqueue_style('gallery-style', get_stylesheet_directory_uri() . '/assets/css/gallery.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/gallery.css'));
    wp_enqueue_style('photo-block-style', get_stylesheet_directory_uri() . '/assets/css/photo_block.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/photo_block.css'));
    wp_enqueue_style('lightbox-style', get_stylesheet_directory_uri() . '/assets/css/lightbox.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/lightbox.css'));
    wp_enqueue_style('overlay', get_stylesheet_directory_uri() . '/assets/css/overlay.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/overlay.css'));
    wp_enqueue_style('form', get_stylesheet_directory_uri() . '/assets/css/form.css', array(), filemtime(get_stylesheet_directory() . '/assets/css/form.css'));

    // Files Js
    wp_enqueue_script('navigation', get_stylesheet_directory_uri() . '/assets/js/navigation.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/navigation.js'));
    wp_enqueue_script('modal', get_stylesheet_directory_uri() . '/assets/js/modal.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/modal.js'));
    wp_enqueue_script('JQuery', 'https://code.jquery.com/jquery-3.4.1.min.js');
    wp_enqueue_script('changeReferenceModal', get_stylesheet_directory_uri() . '/assets/js/changeRefModal.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/changeRefModal.js'));
    wp_enqueue_script('photo-query', get_stylesheet_directory_uri() . '/assets/js/photo-query.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/photo-query.js'));
    wp_enqueue_script('lightbox', get_stylesheet_directory_uri() . '/assets/js/lightbox.js', array(), filemtime(get_stylesheet_directory() . '/assets/js/lightbox.js'));
   
    //Google fonts
    wp_enqueue_style('body-google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat&family=Space+Mono&display=swap', false);
    wp_enqueue_style('form-google-fonts', ' https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins:wght@500&family=Space+Mono&display=swap', false);

    // Chargement du /css/shortcodes/banniere-titre.css pour notre shortcode banniere titre
    // wp_enqueue_style('banniere-titre-shortcode', get_stylesheet_directory_uri() . '/css/shortcodes/banniere-titre.css', array(), filemtime(get_stylesheet_directory() . '/css/shortcodes/banniere-titre.css'));

}

function mota_setup()
{   //Add menus
    register_nav_menu('primary', 'Menu de navigation');
    register_nav_menu('footer', 'Pied de page');

    // Add option featured image
    add_theme_support('post-thumbnails');
    // Add Image Sizes
    mota_add_image_sizes();
}

/*
** Custom Image Sizes
*/
function mota_add_image_sizes()
{
    add_image_size('mota-hero', 1440, 962, true);
    add_image_size('mota-gallery', 564, 495, true);
    add_image_size('mota-single-page', 563, 844, true);
}

/**
 * DISPLAY PHOTO IN LIGHTBOX
 */
function get_post_content()
{
    $post_id = $_POST['post_id'];
     $post = get_post($post_id);

    $argsPhoto = array(
        'numberposts'    => -1,
        'post_type'    => 'photos',

    );
    $my_posts = get_posts($argsPhoto);

    if (!empty($my_posts)) {
        $index = 0;
        foreach ($my_posts as $p) {
            $index++;
            $image_url = get_the_post_thumbnail_url($p->ID, 'full'); 
            $categories = get_the_terms($p->ID, 'categorie');
            foreach ($categories as $key => $cat) {
                $category = $cat->name;
            }  
            $reference = get_field('reference', $p->ID);
            
            if ($post_id == $p->ID) { 
                ?>
                <div class="slide" id="slide-<?php echo $p->ID; ?>" data-index="<?php echo $index; ?>">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo get_the_title(); ?>">
                    <p class="lightbox-cat"><?php echo $category; ?></p>
                    <p class="lightbox-ref"><?php echo $reference; ?></p>
                </div>
            <?php
            } else {
            ?>
                <div class="slide" id="slide-<?php echo $p->ID; ?>" data-index="<?php echo $index; ?>" style="display:none">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo get_the_title(); ?>">
                    <p class="lightbox-cat"><?php echo $category; ?></p>
                    <p class="lightbox-ref"><?php echo $reference; ?></p>
                </div>
            <?php
            } ?>
            </div>
    <?php
        }
    }
        die();
    }

    /***** Actions *****/
    add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
    add_action('after_setup_theme', 'mota_setup');

    add_action('wp_ajax_get_post_content', 'get_post_content');
    add_action('wp_ajax_nopriv_get_post_content', 'get_post_content');
