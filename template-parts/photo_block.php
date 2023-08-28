<!-- BLOCK PHOTO IN GALLERY AND SUB SINGLE PHOTO -->
<article class="block-photo-wrapper" id="block-photo-wrapper-<?php the_ID(); ?>" <?php post_class(); ?>  data-post-id="<?php echo get_the_ID(); ?>">
    
    <div id="<?php echo get_the_ID()?>" class="post-item">
        <?php the_post_thumbnail('mota-gallery');?>
    </div>
    
    <?php 
    //var_dump(get_post($post->ID));
    get_template_part('template-parts/overlay'); 
    
    ?>

</article>
