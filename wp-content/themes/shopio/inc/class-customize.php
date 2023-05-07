<?php
if (!defined('ABSPATH')) {
    exit;
}
if (!class_exists('Shopio_Customize')) {

    class Shopio_Customize {


        public function __construct() {
            add_action('customize_register', array($this, 'customize_register'));
        }

        /**
         * @param $wp_customize WP_Customize_Manager
         */
        public function customize_register($wp_customize) {

            /**
             * Theme options.
             */
            require_once get_theme_file_path('inc/customize-control/editor.php');
            $this->init_shopio_blog($wp_customize);

            $this->init_shopio_social($wp_customize);

            if (shopio_is_woocommerce_activated()) {
                $this->init_woocommerce($wp_customize);
            }

            do_action('shopio_customize_register', $wp_customize);
        }


        /**
         * @param $wp_customize WP_Customize_Manager
         *
         * @return void
         */
        public function init_shopio_blog($wp_customize) {

            $wp_customize->add_section('shopio_blog_archive', array(
                'title' => esc_html__('Blog', 'shopio'),
            ));

            // =========================================
            // Select Style
            // =========================================

            $wp_customize->add_setting('shopio_options_blog_style', array(
                'type'              => 'option',
                'default'           => 'standard',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_blog_style', array(
                'section' => 'shopio_blog_archive',
                'label'   => esc_html__('Blog style', 'shopio'),
                'type'    => 'select',
                'choices' => array(
                    'standard' => esc_html__('Blog Standard', 'shopio'),
                    //====start_premium
                    'style-1'  => esc_html__('Blog Grid', 'shopio'),
                    'style-2'  => esc_html__('Blog Overlay', 'shopio'),
                    'style-3'  => esc_html__('Blog List', 'shopio')
                    //====end_premium
                ),
            ));

            $wp_customize->add_setting('shopio_options_blog_columns', array(
                'type'              => 'option',
                'default'           => 1,
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_blog_columns', array(
                'section' => 'shopio_blog_archive',
                'label'   => esc_html__('Colunms', 'shopio'),
                'type'    => 'select',
                'choices' => array(
                    1 => esc_html__('1', 'shopio'),
                    2 => esc_html__('2', 'shopio'),
                    3 => esc_html__('3', 'shopio'),
                    4 => esc_html__('4', 'shopio'),
                ),
            ));
        }

        /**
         * @param $wp_customize WP_Customize_Manager
         *
         * @return void
         */
        public function init_shopio_social($wp_customize) {

            $wp_customize->add_section('shopio_social', array(
                'title' => esc_html__('Socials', 'shopio'),
            ));
            $wp_customize->add_setting('shopio_options_social_share', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_social_share', array(
                'type'    => 'checkbox',
                'section' => 'shopio_social',
                'label'   => esc_html__('Show Social Share', 'shopio'),
            ));
            $wp_customize->add_setting('shopio_options_social_share_facebook', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_social_share_facebook', array(
                'type'    => 'checkbox',
                'section' => 'shopio_social',
                'label'   => esc_html__('Share on Facebook', 'shopio'),
            ));
            $wp_customize->add_setting('shopio_options_social_share_twitter', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_social_share_twitter', array(
                'type'    => 'checkbox',
                'section' => 'shopio_social',
                'label'   => esc_html__('Share on Twitter', 'shopio'),
            ));
            $wp_customize->add_setting('shopio_options_social_share_linkedin', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_social_share_linkedin', array(
                'type'    => 'checkbox',
                'section' => 'shopio_social',
                'label'   => esc_html__('Share on Linkedin', 'shopio'),
            ));
            $wp_customize->add_setting('shopio_options_social_share_google-plus', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_social_share_google-plus', array(
                'type'    => 'checkbox',
                'section' => 'shopio_social',
                'label'   => esc_html__('Share on Google+', 'shopio'),
            ));

            $wp_customize->add_setting('shopio_options_social_share_pinterest', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_social_share_pinterest', array(
                'type'    => 'checkbox',
                'section' => 'shopio_social',
                'label'   => esc_html__('Share on Pinterest', 'shopio'),
            ));
            $wp_customize->add_setting('shopio_options_social_share_email', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_social_share_email', array(
                'type'    => 'checkbox',
                'section' => 'shopio_social',
                'label'   => esc_html__('Share on Email', 'shopio'),
            ));
        }

        /**
         * @param $wp_customize WP_Customize_Manager
         *
         * @return void
         */
        public function init_woocommerce($wp_customize) {

            $wp_customize->add_panel('woocommerce', array(
                'title' => esc_html__('Woocommerce', 'shopio'),
            ));

            $wp_customize->add_section('shopio_woocommerce_archive', array(
                'title'      => esc_html__('Archive', 'shopio'),
                'capability' => 'edit_theme_options',
                'panel'      => 'woocommerce',
                'priority'   => 1,
            ));

            $wp_customize->add_setting('shopio_options_woocommerce_archive_layout', array(
                'type'              => 'option',
                'default'           => 'default',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_woocommerce_archive_layout', array(
                'section' => 'shopio_woocommerce_archive',
                'label'   => esc_html__('Layout Style', 'shopio'),
                'type'    => 'select',
                'choices' => array(
                    'default'   => esc_html__('Sidebar', 'shopio'),
                    //====start_premium
                    'canvas'    => esc_html__('Canvas Filter', 'shopio'),
                    'dropdown'  => esc_html__('Dropdown Filter', 'shopio'),
                    //====end_premium
                ),
            ));

            $wp_customize->add_setting('shopio_options_woocommerce_archive_width', array(
                'type'              => 'option',
                'default'           => 'default',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_woocommerce_archive_width', array(
                'section' => 'shopio_woocommerce_archive',
                'label'   => esc_html__('Layout Width', 'shopio'),
                'type'    => 'select',
                'choices' => array(
                    'default'   => esc_html__('Default', 'shopio'),
                    'wide' => esc_html__('Wide', 'shopio'),
                ),
            ));

            $wp_customize->add_setting('shopio_options_woocommerce_archive_sidebar', array(
                'type'              => 'option',
                'default'           => 'left',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_woocommerce_archive_sidebar', array(
                'section' => 'shopio_woocommerce_archive',
                'label'   => esc_html__('Sidebar Position', 'shopio'),
                'type'    => 'select',
                'choices' => array(
                    'left'  => esc_html__('Left', 'shopio'),
                    'right' => esc_html__('Right', 'shopio'),

                ),
            ));

            // =========================================
            // Single Product
            // =========================================

            $wp_customize->add_section('shopio_woocommerce_single', array(
                'title'      => esc_html__('Single Product', 'shopio'),
                'capability' => 'edit_theme_options',
                'panel'      => 'woocommerce',
            ));

            $wp_customize->add_setting('shopio_options_single_product_gallery_layout', array(
                'type'              => 'option',
                'default'           => 'horizontal',
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control('shopio_options_single_product_gallery_layout', array(
                'section' => 'shopio_woocommerce_single',
                'label'   => esc_html__('Style', 'shopio'),
                'type'    => 'select',
                'choices' => array(
                    'horizontal' => esc_html__('Horizontal', 'shopio'),
                    //====start_premium
                    'vertical'   => esc_html__('Vertical', 'shopio'),
                    'gallery'    => esc_html__('Gallery', 'shopio'),
                    'sticky'     => esc_html__('Sticky', 'shopio'),
                    //====end_premium
                ),
            ));

            $wp_customize->add_setting('shopio_options_single_product_content_meta', array(
                'type'              => 'option',
                'capability'        => 'edit_theme_options',
                'sanitize_callback' => 'shopio_sanitize_editor',
            ));

            $wp_customize->add_control(new Shopio_Customize_Control_Editor($wp_customize, 'shopio_options_single_product_content_meta', array(
                'section' => 'shopio_woocommerce_single',
                'label'   => esc_html__('Single extra description', 'shopio'),
            )));

            $wp_customize->add_setting('shopio_options_single_product_archive_sidebar', array(
                'type'              => 'option',
                'default'           => 'left',
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control('shopio_options_single_product_archive_sidebar', array(
                'section' => 'shopio_woocommerce_single',
                'label'   => esc_html__('Sidebar Position', 'shopio'),
                'type'    => 'select',
                'choices' => array(
                    'left'  => esc_html__('Left', 'shopio'),
                    'right' => esc_html__('Right', 'shopio'),

                ),
            ));


            // =========================================
            // Product
            // =========================================

            $wp_customize->add_section('shopio_woocommerce_product', array(
                'title'      => esc_html__('Product Block', 'shopio'),
                'capability' => 'edit_theme_options',
                'panel'      => 'woocommerce',
            ));

            $wp_customize->add_setting('shopio_options_wocommerce_block_style', array(
                'type'              => 'option',
                'default'           => '',
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control('shopio_options_wocommerce_block_style', array(
                'section' => 'shopio_woocommerce_product',
                'label'   => esc_html__('Style', 'shopio'),
                'type'    => 'select',
                'choices' => array(
                    ''  => esc_html__('Style 1', 'shopio'),
                    //====start_premium
                    '2' => esc_html__('Style 2', 'shopio'),
                    '3' => esc_html__('Style 3', 'shopio'),
                    '4' => esc_html__('Style 4', 'shopio'),
                    '5' => esc_html__('Style 5', 'shopio'),
                    '6' => esc_html__('Style 6', 'shopio'),
                    '7' => esc_html__('Style 7', 'shopio'),
                    '8' => esc_html__('Style 8', 'shopio'),
                    //====end_premium

                ),
            ));

            $wp_customize->add_setting('shopio_options_woocommerce_product_hover', array(
                'type'              => 'option',
                'default'           => 'none',
                'transport'         => 'refresh',
                'sanitize_callback' => 'sanitize_text_field',
            ));
            $wp_customize->add_control('shopio_options_woocommerce_product_hover', array(
                'section' => 'shopio_woocommerce_product',
                'label'   => esc_html__('Animation Image Hover', 'shopio'),
                'type'    => 'select',
                'choices' => array(
                    'none'          => esc_html__('None', 'shopio'),
                    'bottom-to-top' => esc_html__('Bottom to Top', 'shopio'),
                    'top-to-bottom' => esc_html__('Top to Bottom', 'shopio'),
                    'right-to-left' => esc_html__('Right to Left', 'shopio'),
                    'left-to-right' => esc_html__('Left to Right', 'shopio'),
                    'swap'          => esc_html__('Swap', 'shopio'),
                    'fade'          => esc_html__('Fade', 'shopio'),
                    'zoom-in'       => esc_html__('Zoom In', 'shopio'),
                    'zoom-out'      => esc_html__('Zoom Out', 'shopio'),
                ),
            ));

            $wp_customize->add_setting('shopio_options_wocommerce_row_laptop', array(
                'type'              => 'option',
                'default'           => 3,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_wocommerce_row_laptop', array(
                'section' => 'woocommerce_product_catalog',
                'label'   => esc_html__('Products per row Laptop', 'shopio'),
                'type'    => 'number',
            ));

            $wp_customize->add_setting('shopio_options_wocommerce_row_tablet', array(
                'type'              => 'option',
                'default'           => 2,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_wocommerce_row_tablet', array(
                'section' => 'woocommerce_product_catalog',
                'label'   => esc_html__('Products per row tablet', 'shopio'),
                'type'    => 'number',
            ));

            $wp_customize->add_setting('shopio_options_wocommerce_row_mobile', array(
                'type'              => 'option',
                'default'           => 1,
                'transport'         => 'postMessage',
                'sanitize_callback' => 'sanitize_text_field',
            ));

            $wp_customize->add_control('shopio_options_wocommerce_row_mobile', array(
                'section' => 'woocommerce_product_catalog',
                'label'   => esc_html__('Products per row mobile', 'shopio'),
                'type'    => 'number',
            ));
        }
    }
}
return new Shopio_Customize();
