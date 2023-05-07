</div><!-- .col-full -->
</div><!-- #content -->

<?php do_action('shopio_before_footer');
if (shopio_is_elementor_activated() && function_exists('hfe_init') && (hfe_footer_enabled() || hfe_is_before_footer_enabled())) {
    do_action('hfe_footer_before');
    do_action('hfe_footer');
} else {
    ?>

    <footer id="colophon" class="site-footer" role="contentinfo">
        <?php
        /**
         * Functions hooked in to shopio_footer action
         *
         * @see shopio_footer_default - 20
         *
         *
         */
        do_action('shopio_footer');

        ?>

    </footer><!-- #colophon -->

    <?php
}

/**
 * Functions hooked in to shopio_after_footer action
 * @see shopio_sticky_single_add_to_cart    - 999 - woo
 */
do_action('shopio_after_footer');
?>

</div><!-- #page -->
<?php

/**
 * Functions hooked in to wp_footer action
 * @see shopio_template_account_dropdown    - 1
 * @see shopio_mobile_nav - 1
 * @see shopio_render_woocommerce_shop_canvas - 1 - woo
 */

wp_footer();
?>
<script src="<?= get_template_directory_uri() ?>/assets/js/frontend/custom.js"></script>
<?php get_template_part('template-parts/modal') ?>

</body>
</html>
