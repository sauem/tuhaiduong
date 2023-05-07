<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined('ABSPATH') || exit;

get_header('shop');

$product_style = shopio_get_theme_option('wocommerce_block_style', 0) == 0 ? '' : shopio_get_theme_option('wocommerce_block_style', 0);

$layout = isset($_GET['layout']) ? $_GET['layout'] : apply_filters('shopio_shop_layout', 'grid');

?>


<?php
/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action('woocommerce_before_main_content');
if (woocommerce_product_loop()) {
    ?>
    <header class="woocommerce-products-header">
        <?php if (apply_filters('woocommerce_show_page_title', true)) : ?>
            <h1 class="woocommerce-products-header__title page-title"><?php woocommerce_page_title(); ?></h1>
        <?php endif; ?>

        <?php
        /**
         * Hook: woocommerce_archive_description.
         *
         * @hooked woocommerce_taxonomy_archive_description - 10
         * @hooked woocommerce_product_archive_description - 10
         */
        do_action('woocommerce_archive_description');
        ?>
    </header>
    <?php
    woocommerce_output_all_notices();
    ?>
    <div class="shopio-sorting">
        <?php
        /**
         * Hook: woocommerce_before_shop_loop.
         *
         */
        do_action('shopio_woocommerce_before_shop_loop');
        shopio_button_shop_canvas();
        shopio_button_shop_dropdown();
        shopio_button_grid_list_layout();
        woocommerce_catalog_ordering();
        shopio_products_per_page_select();
        if (shopio_get_theme_option('woocommerce_archive_layout') == 'dropdown') {
            shopio_render_woocommerce_shop_dropdown();
        }
        ?>
    </div>
    <?php
    $columns = wc_get_loop_prop('columns');
    wc_set_loop_prop('columns', $columns);
    if ($layout == 'list') {
        wc_set_loop_prop('product-class', 'shopio-products products-list');
    } else {
        wc_set_loop_prop('product-class', 'shopio-products products');
    }

    woocommerce_product_loop_start();

    if (wc_get_loop_prop('total')) {
        while (have_posts()) {
            the_post();

            /**
             * Hook: woocommerce_shop_loop.
             */
            do_action('woocommerce_shop_loop');
            if ($layout == 'list') {
                wc_get_template_part('content', 'product-list');
            } else {
                wc_get_template_part('content-product', $product_style);
            }
        }
    }

    woocommerce_product_loop_end();

    /**
     * Hook: woocommerce_after_shop_loop.
     *
     * @hooked woocommerce_pagination - 10
     */
    do_action('woocommerce_after_shop_loop');
} else {
    /**
     * Hook: woocommerce_no_products_found.
     *
     * @hooked wc_no_products_found - 10
     */
    do_action('woocommerce_no_products_found');
}
/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action('woocommerce_after_main_content');

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action('woocommerce_sidebar');
?>
<?php

get_footer('shop');
