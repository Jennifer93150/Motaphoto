<!-- OVERLAY ON PHOTO GALLERY AND SINGLE PHOTO -->
<div class="overlay">
    <a href="<?php the_permalink($post->ID); ?>"><img class="overlay-icon overlay-icon_eye" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_eye.png'; ?>" alt="icône oeil"></a>
    <img class="overlay-icon overlay-icon_fullscreen" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_fullscreen.png'; ?>"  alt="icône fullscreen" onclick="openLightbox(<?php the_ID(); ?>)">
    <p class="overlay-icon overlay-ref"><?php the_field('reference', $post->ID); ?></p>
    <p class="overlay-icon overlay-cat"><?php the_terms($post->ID, 'categorie'); ?></p>
</div>