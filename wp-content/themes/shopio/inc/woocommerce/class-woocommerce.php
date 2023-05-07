<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Shopio_WooCommerce')) :

    /**
     * The Shopio WooCommerce Integration class
     */
    class Shopio_WooCommerce {

        public $list_shortcodes;

        private $prefix = 'remove';

        /**
         * Setup class.
         *
         * @since 1.0
         */
        public function __construct() {
            $this->list_shortcodes = array(
                'recent_products',
                'sale_products',
                'best_selling_products',
                'top_rated_products',
                'featured_products',
                'related_products',
                'product_category',
                'products',
            );
            $this->init_shortcodes();

            add_action('after_setup_theme', array($this, 'setup'));
            add_filter('body_class', array($this, 'woocommerce_body_class'));
            add_action('widgets_init', array($this, 'widgets_init'));
            add_filter('shopio_theme_sidebar', array($this, 'set_sidebar'), 20);
            add_action('wp_enqueue_scripts', array($this, 'woocommerce_scripts'), 20);
            add_filter('woocommerce_enqueue_styles', '__return_empty_array');
            add_filter('woocommerce_output_related_products_args', array($this, 'related_products_args'));
            add_filter('woocommerce_product_thumbnails_columns', array($this, 'thumbnail_columns'));

            if (defined('WC_VERSION') && version_compare(WC_VERSION, '3.3', '<')) {
                add_filter('loop_shop_per_page', array($this, 'products_per_page'));
            }

            // Remove Shop Title
            add_filter('woocommerce_show_page_title', '__return_false');

            add_filter('shopio_register_nav_menus', [$this, 'add_location_menu']);
            add_filter('wp_nav_menu_items', [$this, 'add_extra_item_to_nav_menu'], 10, 2);

            add_filter('woocommerce_single_product_image_gallery_classes', function ($wrapper_classes) {
                $wrapper_classes[] = 'woocommerce-product-gallery-' . shopio_get_theme_option('single_product_gallery_layout', 'horizontal');

                return $wrapper_classes;
            });

            add_action('woocommerce_grouped_product_list_before_label', array(
                $this,
                'grouped_product_column_image'
            ), 10, 1);

            // Elementor Admin
            add_action('admin_action_elementor', array($this, 'register_elementor_wc_hook'), 1);
            add_filter('woocommerce_cross_sells_columns', array($this, 'woocommerce_cross_sells_columns'));

            add_action('woocommerce_before_template_part', array($this, 'action_woocommerce_before_template_part'), 10,4);
            add_action('woocommerce_after_template_part', array($this, 'action_woocommerce_after_template_part'), 10,4);
        }

        public function woocommerce_cross_sells_columns() {
            return wc_get_default_products_per_row();
        }

        public function register_elementor_wc_hook() {
            wc()->frontend_includes();
            require_once get_theme_file_path('inc/woocommerce/woocommerce-template-hooks.php');
            require_once get_theme_file_path('inc/woocommerce/template-hooks.php');
            shopio_include_hooks_product_blocks();
        }

        public function add_extra_item_to_nav_menu($items, $args) {
            if ($args->theme_location == 'my-account') {
                $items .= '<li><a href="' . esc_url(wp_logout_url(home_url())) . '">' . esc_html__('Logout', 'shopio') . '</a></li>';
            }

            return $items;
        }

        public function add_location_menu($locations) {
            $locations['my-account'] = esc_html__('My Account', 'shopio');

            return $locations;
        }

        /**
         * Sets up theme defaults and registers support for various WooCommerce features.
         *
         * Note that this function is hooked into the after_setup_theme hook, which
         * runs before the init hook. The init hook is too late for some features, such
         * as indicating support for post thumbnails.
         *
         * @return void
         * @since 2.4.0
         */
        public function setup() {
            add_theme_support(
                'woocommerce', apply_filters(
                    'shopio_woocommerce_args', array(
                        'product_grid' => array(
                            'default_columns' => 3,
                            'default_rows'    => 4,
                            'min_columns'     => 1,
                            'max_columns'     => 6,
                            'min_rows'        => 1,
                        ),
                    )
                )
            );


            /**
             * Add 'shopio_woocommerce_setup' action.
             *
             * @since  2.4.0
             */
            do_action('shopio_woocommerce_setup');
        }


        public function action_woocommerce_before_template_part($template_name, $template_path, $located, $args) {
            $product_style = shopio_get_theme_option('wocommerce_block_style', 0);
            if ($product_style != 0 && ($template_name == 'single-product/up-sells.php' || $template_name == 'single-product/related.php' || $template_name == 'cart/cross-sells.php')) {
                $template_custom = 'content-product-' . $product_style . '.php';
                add_filter('wc_get_template_part', function ($template, $slug, $name) use ($template_custom) {
                    if ($slug == 'content' && $name == 'product') {
                        return get_theme_file_path('woocommerce/' . $template_custom);
                    } else {
                        return $template;
                    }
                }, 10, 3);
            }
        }

        public function action_woocommerce_after_template_part($template_name, $template_path, $located, $args) {
            $product_style = shopio_get_theme_option('wocommerce_block_style', 0);
            if ($product_style != 0 && ($template_name == 'single-product/up-sells.php' || $template_name == 'single-product/related.php' || $template_name == 'cart/cross-sells.php')) {
                add_filter('wc_get_template_part', function ($template, $slug, $name) {
                    if ($slug == 'content' && $name == 'product') {
                        return get_theme_file_path('woocommerce/content-product.php');
                    } else {
                        return $template;
                    }
                }, 10, 3);
            }
        }

        private function init_shortcodes() {
            foreach ($this->list_shortcodes as $shortcode) {
                add_filter('shortcode_atts_' . $shortcode, array($this, 'set_shortcode_attributes'), 10, 3);

                add_action('woocommerce_shortcode_before_' . $shortcode . '_loop', array(
                    $this,
                    'shortcode_loop_start'
                ));
                add_action('woocommerce_shortcode_after_' . $shortcode . '_loop', array(
                    $this,
                    'shortcode_loop_end'
                ));
            }
        }

        public function shortcode_loop_end($atts = array()) {

            if (isset($atts['style'])) {
                if ($atts['style'] !== '') {

                    add_filter('wc_get_template_part', function ($template, $slug, $name) {
                        if ($slug == 'content' && $name == 'product') {
                            return get_theme_file_path('woocommerce/content-product.php');
                        } else {
                            return $template;
                        }
                    }, 10, 3);
                }
            }

            if (isset($atts['product_layout']) && $atts['product_layout'] === 'carousel') {
                echo '</div>';
            }
        }

        public function shortcode_loop_start($atts = array()) {
            if (isset($atts['style'])) {
                if ($atts['style'] !== '') {
                    $template_custom = 'content-product-' . $atts['style'] . '.php';

                    add_filter('wc_get_template_part', function ($template, $slug, $name) use ($template_custom) {
                        if ($slug == 'content' && $name == 'product') {
                            return get_theme_file_path('woocommerce/' . $template_custom);
                        } else {
                            return $template;
                        }
                    }, 10, 3);
                }
            }

            if (isset($atts['product_layout']) && $atts['product_layout'] === 'carousel') {
                echo '<div class="woocommerce-carousel" data-settings=\'' . $atts['carousel_settings'] . '\'>';
            }
        }

        public function set_shortcode_attributes($out, $pairs, $atts) {
            $out = wp_parse_args($atts, $out);

            return $out;
        }


        /**
         * Assign styles to individual theme mod.
         *
         * @return void
         * @since 2.1.0
         * @deprecated 2.3.1
         */
        public function set_shopio_style_theme_mods() {
            if (function_exists('wc_deprecated_function')) {
                wc_deprecated_function(__FUNCTION__, '2.3.1');
            } else {
                _deprecated_function(__FUNCTION__, '2.3.1');
            }
        }

        /**
         * Add WooCommerce specific classes to the body tag
         *
         * @param array $classes css classes applied to the body tag.
         *
         * @return array $classes modified to include 'woocommerce-active' class
         */
        public function woocommerce_body_class($classes) {
            $classes[] = 'woocommerce-active';

            // Remove `no-wc-breadcrumb` body class.
            $key = array_search('no-wc-breadcrumb', $classes, true);

            if (false !== $key) {
                unset($classes[$key]);
            }

            $style         = shopio_get_theme_option('wocommerce_block_style', 1);
            $layout        = shopio_get_theme_option('woocommerce_archive_layout', 'default');
            $width       = shopio_get_theme_option('woocommerce_archive_width', 'default');
            $sidebar       = shopio_get_theme_option('woocommerce_archive_sidebar', 'left');
            $sidebarsingle = shopio_get_theme_option('single_product_archive_sidebar', 'left');

            $classes[] = 'product-block-style-' . $style;

            if (shopio_is_product_archive()) {
                $classes[] = 'shopio-archive-product';
                $classes[] = 'shopio-archive-product-width-'.$width;

                if (is_active_sidebar('sidebar-woocommerce-shop')) {
                    if ($layout == 'default' && $sidebar == 'left') {
                        $classes[] = 'shopio-sidebar-left';
                    }

                    if ($layout == 'canvas') {
                        $classes[] = 'shopio-full-width-content shop_filter_canvas';
                    }

                    if ($layout == 'dropdown') {
                        $classes[] = 'shopio-full-width-content shop_filter_dropdown';
                    }
                } else {
                    $classes[] = 'shopio-full-width-content';
                }

            }

            if(shopio_is_product_archive() || is_cart() || is_checkout() || is_product()){

                if ($laptop = shopio_get_theme_option('wocommerce_row_laptop')) {
                    $classes[] = 'shopio-product-laptop-' . $laptop;
                }

                if ($tablet = shopio_get_theme_option('wocommerce_row_tablet')) {
                    $classes[] = 'shopio-product-tablet-' . $tablet;
                }

                if ($mobile = shopio_get_theme_option('wocommerce_row_mobile')) {
                    $classes[] = 'shopio-product-mobile-' . $mobile;
                }
            }

            if (is_product()) {
                $classes[] = 'shopio-full-width-content';
                $classes[] = 'single-product-' . shopio_get_theme_option('single_product_gallery_layout', 'horizontal');
                if (is_active_sidebar('sidebar-woocommerce-detail')) {
                    if ($sidebarsingle == 'left') {
                        $classes[] = 'shopio-sidebar-left';
                    }
                    if ($sidebarsingle == 'right') {
                        $classes[] = 'shopio-sidebar-right';
                    }
                    $classes = array_diff($classes, array(
                        'shopio-full-width-content',
                    ));
                }
            }


            return $classes;
        }

        /**
         * WooCommerce specific scripts & stylesheets
         *
         * @since 1.0.0
         */
        public function woocommerce_scripts() {
            global $shopio_version;

            $suffix = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min';
            wp_enqueue_style('shopio-woocommerce-style', get_template_directory_uri() . '/assets/css/woocommerce/woocommerce.css', array(), $shopio_version);
            wp_style_add_data('shopio-woocommerce-style', 'rtl', 'replace');

            // QuickView
            wp_dequeue_style('yith-quick-view');

            wp_register_script('shopio-header-cart', get_template_directory_uri() . '/assets/js/woocommerce/header-cart' . $suffix . '.js', array(), $shopio_version, true);
            wp_enqueue_script('shopio-header-cart');

            if (defined('WC_VERSION') && version_compare(WC_VERSION, '3.3', '<')) {
                wp_enqueue_style('shopio-woocommerce-legacy', get_template_directory_uri() . '/assets/css/woocommerce/woocommerce-legacy.css', array(), $shopio_version);
                wp_style_add_data('shopio-woocommerce-legacy', 'rtl', 'replace');
            }

            if (is_shop() || is_product() || is_product_taxonomy() || shopio_elementor_check_type('shopio-products')) {
                wp_enqueue_script('tooltipster');
                wp_enqueue_style('tooltipster');
            }

            wp_enqueue_script('shopio-products-ajax-search', get_template_directory_uri() . '/assets/js/woocommerce/product-ajax-search' . $suffix . '.js', array(
                'jquery',
                'tooltipster'
            ), $shopio_version, true);
            wp_enqueue_script('shopio-products', get_template_directory_uri() . '/assets/js/woocommerce/main' . $suffix . '.js', array(
                'jquery'
            ), $shopio_version, true);

            wp_enqueue_script('shopio-input-quantity', get_template_directory_uri() . '/assets/js/woocommerce/quantity' . $suffix . '.js', array('jquery'), $shopio_version, true);

            if (is_active_sidebar('sidebar-woocommerce-shop')) {
                wp_enqueue_script('shopio-off-canvas', get_template_directory_uri() . '/assets/js/woocommerce/off-canvas' . $suffix . '.js', array(), $shopio_version, true);
            }
            wp_enqueue_script('shopio-cart-canvas', get_template_directory_uri() . '/assets/js/woocommerce/cart-canvas' . $suffix . '.js', array(), $shopio_version, true);

            if (is_product() || is_cart()) {
                wp_enqueue_script('shopio-sticky-add-to-cart', get_template_directory_uri() . '/assets/js/sticky-add-to-cart' . $suffix . '.js', array(), $shopio_version, true);
                wp_enqueue_script('shopio-countdown');

                wp_enqueue_style('magnific-popup');
                wp_enqueue_script('magnific-popup');
                wp_enqueue_script('spritespin');

                wp_enqueue_script('slick');
                wp_enqueue_script('sticky-kit');
                wp_enqueue_script('shopio-single-product', get_template_directory_uri() . '/assets/js/woocommerce/single' . $suffix . '.js', array(
                    'jquery',
                    'slick',
                    'sticky-kit'
                ), $shopio_version, true);
            }
            if(is_product()) {
                wp_register_script('shopio-countdown-single', get_template_directory_uri() . '/assets/js/woocommerce/single-countdown' . $suffix . '.js', array('jquery'), $shopio_version, true);
            }

        }

        /**
         * Related Products Args
         *
         * @param array $args related products args.
         *
         * @return  array $args related products args
         * @since 1.0.0
         */
        public function related_products_args($args) {
            $product_items = 4;

            if (is_active_sidebar('sidebar-woocommerce-detail')) {
                $product_items = 3;
            }

            $args = apply_filters(
                'shopio_related_products_args', array(
                    'posts_per_page' => $product_items,
                    'columns'        => $product_items,
                )
            );

            return $args;
        }

        /**
         * Product gallery thumbnail columns
         *
         * @return integer number of columns
         * @since  1.0.0
         */
        public function thumbnail_columns() {
            $columns = shopio_get_theme_option('single_product_gallery_column', 3);

            if (shopio_get_theme_option('single_product_gallery_layout', 'horizontal') == 'vertical') {
                $columns = 1;
            }

            return intval(apply_filters('shopio_product_thumbnail_columns', $columns));
        }

        /**
         * Products per page
         *
         * @return integer number of products
         * @since  1.0.0
         */
        public function products_per_page() {
            return intval(apply_filters('shopio_products_per_page', 12));
        }

        /**
         * Query WooCommerce Extension Activation.
         *
         * @param string $extension Extension class name.
         *
         * @return boolean
         */
        public function is_woocommerce_extension_activated($extension = 'WC_Bookings') {
            return class_exists($extension) ? true : false;
        }

        public function widgets_init() {
            register_sidebar(array(
                'name'          => esc_html__('WooCommerce Shop', 'shopio'),
                'id'            => 'sidebar-woocommerce-shop',
                'description'   => esc_html__('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'shopio'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<span class="gamma widget-title"><span>',
                'after_title'   => '</span></span>',
            ));

            register_sidebar(array(
                'name'          => esc_html__('WooCommerce Detail', 'shopio'),
                'id'            => 'sidebar-woocommerce-detail',
                'description'   => esc_html__('Add widgets here to appear in your sidebar on blog posts and archive pages.', 'shopio'),
                'before_widget' => '<div id="%1$s" class="widget %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<span class="gamma widget-title"><span>',
                'after_title'   => '</span></span>',
            ));
        }

        public function set_sidebar($name) {
            $layout = shopio_get_theme_option('woocommerce_archive_layout', 'default');
            if (shopio_is_product_archive()) {
                if (is_active_sidebar('sidebar-woocommerce-shop') && $layout == 'default') {
                    $name = 'sidebar-woocommerce-shop';
                } else {
                    $name = '';
                }
            }
            if (is_product()) {
                if (is_active_sidebar('sidebar-woocommerce-detail')) {
                    $name = 'sidebar-woocommerce-detail';
                } else {
                    $name = '';
                }
            }
            return $name;
        }

        public function grouped_product_column_image($grouped_product_child) {
            echo '<td class="woocommerce-grouped-product-image">' . $grouped_product_child->get_image('thumbnail') . '</td>';
        }

    }

endif;

return new Shopio_WooCommerce();
