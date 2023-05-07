<?php
/**
 * =================================================
 * Hook shopio_page
 * =================================================
 */
add_action('shopio_page', 'shopio_page_header', 10);
add_action('shopio_page', 'shopio_page_content', 20);

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
add_action('shopio_single_post', 'shopio_post_header', 10);
add_action('shopio_single_post', 'shopio_post_thumbnail', 20);
add_action('shopio_single_post', 'shopio_post_content', 30);

/**
 * =================================================
 * Hook shopio_single_post_bottom
 * =================================================
 */
add_action('shopio_single_post_bottom', 'shopio_post_taxonomy', 5);
add_action('shopio_single_post_bottom', 'shopio_post_nav', 10);
add_action('shopio_single_post_bottom', 'shopio_display_comments', 20);

/**
 * =================================================
 * Hook shopio_loop_post
 * =================================================
 */
add_action('shopio_loop_post', 'shopio_post_header', 15);
add_action('shopio_loop_post', 'shopio_post_content', 30);

/**
 * =================================================
 * Hook shopio_footer
 * =================================================
 */
add_action('shopio_footer', 'shopio_footer_default', 20);

/**
 * =================================================
 * Hook shopio_after_footer
 * =================================================
 */

/**
 * =================================================
 * Hook wp_footer
 * =================================================
 */
add_action('wp_footer', 'shopio_template_account_dropdown', 1);
add_action('wp_footer', 'shopio_mobile_nav', 1);

/**
 * =================================================
 * Hook wp_head
 * =================================================
 */
add_action('wp_head', 'shopio_pingback_header', 1);

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
add_action('shopio_sidebar', 'shopio_get_sidebar', 10);

/**
 * =================================================
 * Hook shopio_loop_after
 * =================================================
 */
add_action('shopio_loop_after', 'shopio_paging_nav', 10);

/**
 * =================================================
 * Hook shopio_page_after
 * =================================================
 */
add_action('shopio_page_after', 'shopio_display_comments', 10);

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

/**
 * =================================================
 * Hook shopio_woocommerce_shop_loop_item_title
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_woocommerce_after_shop_loop_item_title
 * =================================================
 */

/**
 * =================================================
 * Hook shopio_woocommerce_after_shop_loop_item
 * =================================================
 */
