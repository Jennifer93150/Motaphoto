<?php

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
                <div class="lightbox-photo" id="lightbox-photo-<?php echo $p->ID; ?>" data-index="<?php echo $index; ?>">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo get_the_title(); ?>">
                    <div class="lightbox-photo_infos">
                        <p class="lightbox-cat"><?php echo $category; ?></p>
                        <p class="lightbox-ref"><?php echo $reference; ?></p>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <div class="lightbox-photo" id="lightbox-photo-<?php echo $p->ID; ?>" data-index="<?php echo $index; ?>" style="display:none">
                    <img src="<?php echo $image_url; ?>" alt="<?php echo get_the_title(); ?>">
                    <div class="lightbox-photo_infos">
                        <p class="lightbox-cat"><?php echo $category; ?></p>
                        <p class="lightbox-ref"><?php echo $reference; ?></p>
                    </div>
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
add_action('wp_ajax_get_post_content', 'get_post_content');
add_action('wp_ajax_nopriv_get_post_content', 'get_post_content');
