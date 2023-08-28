<!-- BANNER HOME PAGE -->
<?php 
// 1. We define the arguments to define what we want to retrieve
$args = array(
    'post_type' => 'photos',
    'posts_per_page' => 1,
    'orderby'=> 'rand',
);

// 2. We execute the WP Query
$my_query = new WP_Query( $args );

// 3. We start the loop!
if( $my_query->have_posts() ) : while( $my_query->have_posts() ) : $my_query->the_post();?>
    
<div class="hero">
<?php the_post_thumbnail('mota-hero'); ?>
</div>

<?php endwhile;
endif;

// 4. We reset to the main query (important)
wp_reset_postdata();?>