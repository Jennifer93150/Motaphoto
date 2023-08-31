<!-- OVERLAY ON PHOTO GALLERY AND SINGLE PHOTO -->
<div class="overlay">
    <?php
    //Infos For js
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

    ?>
    <a href="<?php the_permalink($post->ID); ?>"><img class="overlay-icon overlay-icon_eye" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_eye.png'; ?>" alt="icône oeil"></a>
    <!-- SENDING INFORMATION IN VARIABLES TO USE THEM ON THE JS SIDE & THE ID OF THE POST ON WHICH I CLICK -->
    <img class="overlay-icon overlay-icon_fullscreen" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_fullscreen.png'; ?>" data-cat="<?php $categoryNameSingle; ?>" data-ref="<?php the_field('reference', $post->ID); ?>" data-title="<?php echo $the_title; ?>" alt="icône fullscreen" onclick="openLightbox(<?php the_ID(); ?>)">
    <p class="overlay-icon overlay-ref"><?php the_field('reference', $post->ID); ?></p>
    <p class="overlay-icon overlay-cat"><?php the_terms($post->ID, 'categorie'); ?></p>
</div>