<!-- SINGLE PAGE -->
<div class="single-page">
    <!-- DISPLAY SINGLE POST -->
    <section class="single-page-photo">
        <?php
        // RECOVERS THE DIFFERENT CPT AND ACF 
        $list_cat = wp_get_object_terms($post->ID, 'categorie');
        $list_format = wp_get_object_terms($post->ID, 'format');

        //ACF
        $type = get_field('type');
        $reference = get_field('reference');
        $year = get_field('annee');

        // LOOP FOR POST DISPLAY
        if (have_posts()) : while (have_posts()) : the_post();  ?>
                <div class="single-page-photo-first">
                    <div class="single-page-photo-text">
                        <!-- <div> -->
                        <h2><?php the_title(); ?></h2>
                        <p>Référence : <span id="single-reference"><?php echo $reference ?></span></p>
                        <p>Catégorie : <?php foreach ($list_cat as $key => $cat) {
                                            $categoryNameSingle = $cat->name;
                                            echo $categoryNameSingle;
                                        }  ?></p>
                        <p>Format : <?php foreach ($list_format as $key => $format) {
                                        $formatName = $format->name;
                                        echo $formatName;
                                    } ?></p>
                        <p>Type : <?php echo $type ?> </p>
                        <p>Année : <?php echo $year ?> </p>
                        <!-- </div> -->
                    </div>
                    <div class="single-page-photo-image">
                        <?php
                        the_post_thumbnail(); ?>
                        <div class="overlay-single" id="overlay"><img class="overlay-icon_fullscreen" src="<?php echo get_stylesheet_directory_uri() . '/assets/images/Icon_fullscreen.png'; ?>" onclick="openLightbox(<?php the_ID(); ?>)"></div>
                    <?php endwhile; ?>
                    </div>
                </div>
                <div class="single-page-photo-borderSubInfos"></div>
                <!-- END POST DISPLAY -->
                <!-- PART SUB POST -->
                <div class="single-page-sub-photo">
                    <div class="single-page-sub-photo-contact">
                        <p>Cette photo vous intéresse ?</p>
                        <button id="single-page-button">Contact</button>
                    </div>
                    <!-- Previous/next post navigation with miniature thumbnail. -->
                    <div class="single-page-sub-photo-miniature">
                    <?php
                    $next_post = get_next_post();
                    $previous_post = get_previous_post();

                    the_post_navigation(array(
                        'prev_text' => '<span class="meta-nav">-></span>' . get_the_post_thumbnail($previous_post->ID, 'thumbnail'),
                        'next_text' => get_the_post_thumbnail($next_post->ID, 'thumbnail') . '<span class="meta-nav"><-</span>',
                    ));

                endif; ?>
                    </div>
                </div>
                <div class="single-page-sub-photo-border"></div>
    </section>
    <section>
        <!-- DISPLAY GALLERY -->
        <h3>Vous aimerez aussi </h3>
        <div id="gallery_wrap" class="block-photo">
            <?php
            // 1. We define the arguments to define what we want to retrieve
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Check the initial page count

            $args = array(
                'post_type' => 'photos',
                'posts_per_page' => 2,
                'paged' => $paged,
                'categorie' => $categoryNameSingle,
            );
            // 2. We execute the WP Query
            $my_query = new WP_Query($args);

            // 3. We start the loop!
            if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();

                    get_template_part('template-parts/photo_block');

                endwhile;
            endif;

            // 4. We reset to the main query (important)
            wp_reset_postdata(); ?>
        </div><!-- .block-photo-->
        <!-- END OF GALLERY -->

        <!-- START OF PLUS BUTTON -->
        <?php if ($my_query->max_num_pages > 1) :
            echo '<div class="loadmore_block"><button id="loadmore_single">Toutes les photos</button></div>';
        endif; ?>
        <!-- END OF PLUS BUTTON -->
    </section>

    <?php  // Variable for Ajax 
    ?>
    <script>
        const image = document.querySelector('.single-page-photo-image img');
        const overlay = document.querySelector('.single-page-photo-image .overlay-single');

        function updateOverlaySize() {
            const rect = image.getBoundingClientRect();
            overlay.style.width = rect.width + 'px';
            overlay.style.height = rect.height + 'px';
        }

        image.addEventListener('load', updateOverlaySize);
        window.addEventListener('resize', updateOverlaySize);

        // });
    </script>
    <script>
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        var posts_myajax = '<?php echo serialize($my_query->query_vars) ?>',
            current_page_myajax = 1,
            max_page_myajax = <?php echo $my_query->max_num_pages ?>,
            categoryName = '<?php echo $my_query->query_vars['categorie']; ?>'
    </script>
</div>