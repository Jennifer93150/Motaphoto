<!-- OVERLAY ON PHOTO GALLERY AND SINGLE PHOTO -->
<div class="overlay">
    <?php
    //Recuperation des infos pour les envoyer cote js
    //Url de l'image
    $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full')[0];
    // Nombre de posts
    $countPhotos = wp_count_posts('photos')->publish;
    //Reference
    $reference = get_field('reference');
    //Catégorie
    $taxo = array(
        'taxonomy'   => 'categorie',
    );
    $list_cat = get_terms($taxo);

    foreach ($list_cat as $key => $cat) {
        $categoryNameSingle = $cat->name;
    };
    // $cat = the_terms($post->ID, 'categorie');
    // $the_post = get_post($post->ID); // On récupère le post
    // $the_title = $the_post->post_title; // On récupère le contenu du post
    ?>
    <a href="<?php the_permalink($post->ID); ?>"><img class="overlay-icon overlay-icon_eye" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_eye.png'; ?>" alt="icône oeil"></a>
    <img class="overlay-icon overlay-icon_fullscreen" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_fullscreen.png'; ?>" data-image="<?php echo $image_url; ?>" data-count="<?php echo $countPhotos; ?>" data-cat="<?php $categoryNameSingle; ?>" data-ref="<?php the_field('reference', $post->ID); ?>" data-title="<?php echo $the_title; ?>" alt="icône fullscreen" onclick="openLightbox()">
    <p class="overlay-icon overlay-ref"><?php the_field('reference', $post->ID); ?></p>
    <p class="overlay-icon overlay-cat"><?php the_terms($post->ID, 'categorie'); ?></p>
</div>