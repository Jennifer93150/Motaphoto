<!-- LIGHTBOX -->
<?php $postId = get_the_ID();?>
<div class="lightbox" id="lightbox">
    <button class="lightbox-close" id="lightbox-close" onclick="lightboxClose()"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Cross_white.png'; ?>" alt="croix"></button>
    <button class="lightbox-next" id="lightbox-next" onclick="plusSlides(1)"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Next.png'; ?>" alt="suivant"></button>
    <button class="lightbox-prev" id="lightbox-prev" onclick="plusSlides(-1)"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Prev.png'; ?>" alt="precedent"></button>
    <div class="lightbox-container" id="lightbox-container">
        <div id="lightbox-content" class="lightbox-content" data-id="<?php echo $postId; ?>">
            <!-- HERE IS THE PICTURE ON WHICH I CLICK -->
        </div>
    </div>
</div>