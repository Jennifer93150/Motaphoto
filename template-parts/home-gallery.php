<!-- GALLERY OF HOME PAGE -->
<section class="home-page">
    <?php get_template_part('template-parts/form');?>
    <!-- START OF GALLERY -->
    <div id="gallery_wrap" class="block-photo">
        <?php
        // 1. Arguments to define what we want to retrieve
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Check the initial page count
        $order = get_query_var('order'); 

        $args = array(
            'post_type' => 'photos',
            'posts_per_page' => 12,
            'order' => $order,
            'paged' => $paged,
        );
        
        // 2. WP Query
        $my_query = new WP_Query($args);

        // 3. Loop!
        if ($my_query->have_posts()) :

            while ($my_query->have_posts()) : $my_query->the_post();
            
                get_template_part('template-parts/photo_block');

            endwhile;
        endif;

        // 4. We reset to the main query (important)
        wp_reset_postdata();
        ?>
    </div><!-- .block-photo -->
    <!-- END OF GALLERY -->

    <!-- START OF PLUS BUTTON -->
    <?php 
    if ($my_query->max_num_pages > 1) :
        echo '<div class="loadmore_block"><button id="loadmore_home_gallery">Charger plus</button></div>'; // you can use <a> as well
    endif;
     ?>
    <!-- END OF PLUS BUTTON -->

    <?php  // Variable for Ajax ?>
    <script>
        var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
        var posts_myajax = '<?php echo serialize($my_query->query_vars) ?>',
            current_page_myajax = 1,
            max_page_myajax = <?php echo $my_query->max_num_pages ?>
    </script>
</section><!-- .home-page -->