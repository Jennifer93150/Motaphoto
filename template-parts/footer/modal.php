<!-- The Modal -->
<div id="modal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        <img class="modal-content-title" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Contact header.png'; ?>" alt="Contact header">
        <div id="modal-cross" class="modal-cross"><img src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Burger croix.png'; ?>" alt="burger croix" onclick="modalClose()"></div>
        <div class="modal-content-form">
            <?php echo do_shortcode('[contact-form-7 id="16" title="Contact form 1"]');?>
        </div>
    </div>
</div>