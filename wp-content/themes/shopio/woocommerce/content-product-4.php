<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>
<li <?php wc_product_class('product-style-4', $product); ?>>
    <?php do_action('woocommerce_before_shop_loop_item'); ?>
    <div class="product-block">
        <div class="content-product-imagin"></div>
        <div class="product-transition">
            <?php
            do_action('woocommerce_before_shop_loop_item_title');
            shopio_template_loop_product_thumbnail();
            ?>
            <div class="group-action top">
                <div class="shop-action vertical">
                    <?php
                    shopio_wishlist_button();
                    shopio_compare_button();
                    shopio_quickview_button();
                    do_action('shopio_woocommerce_product_loop_action');
                    ?>
                </div>
            </div>
            <?php
            woocommerce_template_loop_product_link_open();
            woocommerce_template_loop_product_link_close();
            ?>
        </div>
        <div class="product-caption">
            <?php
            shopio_woocommerce_get_product_category();
            do_action('woocommerce_shop_loop_item_title');
            ?>
            <div class="product-flex">
                <?php
                do_action('woocommerce_after_shop_loop_item_title');
                woocommerce_template_loop_rating();
                ?>
            </div>

            <div class="product-caption-bottom">
                <?php
                woocommerce_template_loop_add_to_cart();
                ?>
            </div>
        </div>
    </div>
    <?php do_action('woocommerce_after_shop_loop_item'); ?>
</li>

