<?php
/**
 * =================================================
 * Hook shopio_page
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_single_post_top
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_single_post
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_single_post_bottom
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_loop_post
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_footer
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_after_footer
 * =================================================
 */
add_action('shopio_after_footer', 'shopio_sticky_single_add_to_cart', 999);

/**
 * =================================================
 * Hook wp_footer
 * =================================================
 */
add_action('wp_footer', 'shopio_render_woocommerce_shop_canvas', 1);

/**
 * =================================================
 * Hook wp_head
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_before_header
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_before_content
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_content_top
 * =================================================
 */
add_action('shopio_content_top', 'shopio_shop_messages', 10);

/**
 * =================================================
 * Hook shopio_post_content_before
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_post_content_after
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_sidebar
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_loop_after
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_page_after
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_woocommerce_before_shop_loop_item
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_woocommerce_before_shop_loop_item_title
 * =================================================
 */
add_action('shopio_woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
add_action('shopio_woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 15);

/**
 * =================================================
 * Hook shopio_woocommerce_shop_loop_item_title
 * =================================================
 */
add_action('shopio_woocommerce_shop_loop_item_title', 'shopio_woocommerce_get_product_category', 5);
add_action('shopio_woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 5);

/**
 * =================================================
 * Hook shopio_woocommerce_after_shop_loop_item_title
 * =================================================
 */
add_action('shopio_woocommerce_after_shop_loop_item_title', 'shopio_woocommerce_get_product_description', 15);
add_action('shopio_woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 20);
add_action('shopio_woocommerce_after_shop_loop_item_title', 'shopio_woocommerce_product_list_bottom', 25);

/**
 * =================================================
 * Hook shopio_woocommerce_after_shop_loop_item
 * =================================================
 */
