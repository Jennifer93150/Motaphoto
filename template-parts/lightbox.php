<!-- LIGHTBOX -->
<div class="lightbox" id="lightbox">
    <button class="lightbox-close" id="lightbox-close" onclick="lightboxClose()"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Cross_white.png'; ?>" alt="croix"></button>
    <button class="lightbox-next" id="lightbox-next" onclick="changeImage(1)"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Next.png'; ?>" alt="suivant"></button>
    <button class="lightbox-prev" id="lightbox-prev" onclick="changeImage(-1)"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Prev.png'; ?>" alt="precedent"></button>
    <div class="lightbox-container" id="lightbox-container">
        <div id="lightbox-content" class="lightbox-content">
            <img id="lightbox-photo" src="" alt="photo" />
            <div class="lightbox-photo_infos">
                <p id="lightbox-photo_title"></p>
                <p id="lightbox-photo_ref"></p>
                <p id="lightbox-photo_id"></p>
            </div>
        </div>
    </div>
</div>