</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<?php 
get_template_part( 'template-parts/modal' );
get_template_part('template-parts/lightbox');
?>

<footer id="colophon" class="site-footer">

    <?php if (has_nav_menu('footer')) : ?>
        <nav aria-label="<?php esc_attr_e('Secondary menu', 'motaphoto'); ?>" class="footer-navigation">
            <ul class="footer-navigation-wrapper">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'footer',
                        'items_wrap'     => '%3$s',
                        'container'      => false,
                        'depth'          => 1,
                        'link_before'    => '<span>',
                        'link_after'     => '</span>',
                        'fallback_cb'    => false,
                    )
                );
                ?>
                <li><a>Tous droits réservés</a></li>
            </ul><!-- .footer-navigation-wrapper -->
           
        </nav><!-- .footer-navigation -->
    <?php endif; ?>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>