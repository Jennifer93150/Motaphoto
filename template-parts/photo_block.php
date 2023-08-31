<!-- BLOCK PHOTO IN GALLERY AND SUB SINGLE PHOTO -->
<article class="block-photo-wrapper" <?php post_class(); ?>  data-post-id="<?php echo get_the_ID(); ?>">
    <div class="post-item">
        <?php the_post_thumbnail('mota-gallery');?>
    </div>
    <?php get_template_part('template-parts/overlay'); ?>
</article>
