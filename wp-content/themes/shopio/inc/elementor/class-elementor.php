<?php

if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Shopio_Elementor')) :

    /**
     * The Shopio Elementor Integration class
     */
    class Shopio_Elementor {
        private $suffix = '';

        public function __construct() {
            $this->suffix = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min';

            add_action('wp', [$this, 'register_auto_scripts_frontend']);
            add_action('elementor/init', array($this, 'add_category'));
            add_action('wp_enqueue_scripts', [$this, 'add_scripts'], 15);
            add_action('elementor/widgets/register', array($this, 'customs_widgets'));
            add_action('elementor/widgets/register', array($this, 'include_widgets'));
            add_action('elementor/frontend/after_enqueue_scripts', [$this, 'add_js']);

            // Custom Animation Scroll
            add_filter('elementor/controls/animations/additional_animations', [$this, 'add_animations_scroll']);

            // Elementor Fix Noitice WooCommerce
            add_action('elementor/editor/before_enqueue_scripts', array($this, 'woocommerce_fix_notice'));

            // Backend
            add_action('elementor/editor/after_enqueue_styles', [$this, 'add_style_editor'], 99);

            // Add Icon Custom
            add_action('elementor/icons_manager/native', [$this, 'add_icons_native']);
            add_action('elementor/controls/register', [$this, 'add_icons']);

            // Add Breakpoints
            add_action('wp_enqueue_scripts', 'shopio_elementor_breakpoints', 9999);

            if (!shopio_is_elementor_pro_activated()) {
                require trailingslashit(get_template_directory()) . 'inc/elementor/custom-css.php';
                require trailingslashit(get_template_directory()) . 'inc/elementor/sticky-section.php';
                if (is_admin()) {
                    add_action('manage_elementor_library_posts_columns', [$this, 'admin_columns_headers']);
                    add_action('manage_elementor_library_posts_custom_column', [$this, 'admin_columns_content'], 10, 2);
                }
            }

            add_filter('elementor/fonts/additional_fonts', [$this, 'additional_fonts']);
            add_action('wp_enqueue_scripts', [$this, 'elementor_kit']);
        }

        public function elementor_kit() {
            $active_kit_id = Elementor\Plugin::$instance->kits_manager->get_active_id();
            Elementor\Plugin::$instance->kits_manager->frontend_before_enqueue_styles();
            $myvals = get_post_meta($active_kit_id, '_elementor_page_settings', true);
            if (!empty($myvals)) {
                $css = '';
                foreach ($myvals['system_colors'] as $key => $value) {
                    $css .= $value['color'] !== '' ? '--' . $value['_id'] . ':' . $value['color'] . ';' : '';
                }

                $var = "body{{$css}}";
                wp_add_inline_style('shopio-style', $var);
            }
        }

        public function additional_fonts($fonts) {
            $fonts["Be Vietnam Pro"]     = 'googlefonts';
            $fonts["Comforter Brush"]    = 'googlefonts';
            $fonts["Noto Serif Display"] = 'googlefonts';
            $fonts["Allison"]            = 'googlefonts';
            return $fonts;
        }

        public function admin_columns_headers($defaults) {
            $defaults['shortcode'] = esc_html__('Shortcode', 'shopio');

            return $defaults;
        }

        public function admin_columns_content($column_name, $post_id) {
            if ('shortcode' === $column_name) {
                ob_start();
                ?>
                <input class="elementor-shortcode-input" type="text" readonly onfocus="this.select()" value="[hfe_template id='<?php echo esc_attr($post_id); ?>']"/>
                <?php
                ob_get_contents();
            }
        }

        public function add_js() {
            global $shopio_version;
            wp_enqueue_script('shopio-elementor-frontend', get_theme_file_uri('/assets/js/elementor-frontend.js'), [], $shopio_version);
        }

        public function add_style_editor() {
            global $shopio_version;
            wp_enqueue_style('shopio-elementor-editor-icon', get_theme_file_uri('/assets/css/admin/elementor/icons.css'), [], $shopio_version);
        }

        public function add_scripts() {
            global $shopio_version;
            $suffix = (defined('SCRIPT_DEBUG') && SCRIPT_DEBUG) ? '' : '.min';
            wp_enqueue_style('shopio-elementor', get_template_directory_uri() . '/assets/css/base/elementor.css', '', $shopio_version);
            wp_style_add_data('shopio-elementor', 'rtl', 'replace');

            // Add Scripts
            wp_register_script('tweenmax', get_theme_file_uri('/assets/js/vendor/TweenMax.min.js'), array('jquery'), '1.11.1');
            wp_register_script('parallaxmouse', get_theme_file_uri('/assets/js/vendor/jquery-parallax.js'), array('jquery'), $shopio_version);

            if (shopio_elementor_check_type('animated-bg-parallax')) {
                wp_enqueue_script('tweenmax');
                wp_enqueue_script('jquery-panr', get_theme_file_uri('/assets/js/vendor/jquery-panr' . $suffix . '.js'), array('jquery'), '0.0.1');
            }
        }


        public function register_auto_scripts_frontend() {
            global $shopio_version;
            wp_register_script('shopio-elementor-brand', get_theme_file_uri('/assets/js/elementor/brand.js'), array('jquery','elementor-frontend'), $shopio_version, true);
            wp_register_script('shopio-elementor-countdown', get_theme_file_uri('/assets/js/elementor/countdown.js'), array('jquery','elementor-frontend'), $shopio_version, true);
            wp_register_script('shopio-elementor-image-carousel', get_theme_file_uri('/assets/js/elementor/image-carousel.js'), array('jquery','elementor-frontend'), $shopio_version, true);
            wp_register_script('shopio-elementor-image-carousel-2', get_theme_file_uri('/assets/js/elementor/image-carousel-2.js'), array('jquery','elementor-frontend'), $shopio_version, true);
            wp_register_script('shopio-elementor-image-gallery', get_theme_file_uri('/assets/js/elementor/image-gallery.js'), array('jquery','elementor-frontend'), $shopio_version, true);
            wp_register_script('shopio-elementor-posts-grid', get_theme_file_uri('/assets/js/elementor/posts-grid.js'), array('jquery','elementor-frontend'), $shopio_version, true);
            wp_register_script('shopio-elementor-product-categories', get_theme_file_uri('/assets/js/elementor/product-categories.js'), array('jquery','elementor-frontend'), $shopio_version, true);
            wp_register_script('shopio-elementor-product-tab', get_theme_file_uri('/assets/js/elementor/product-tab.js'), array('jquery','elementor-frontend'), $shopio_version, true);
            wp_register_script('shopio-elementor-products', get_theme_file_uri('/assets/js/elementor/products.js'), array('jquery','elementor-frontend'), $shopio_version, true);
            wp_register_script('shopio-elementor-tabs', get_theme_file_uri('/assets/js/elementor/tabs.js'), array('jquery','elementor-frontend'), $shopio_version, true);
            wp_register_script('shopio-elementor-testimonial', get_theme_file_uri('/assets/js/elementor/testimonial.js'), array('jquery','elementor-frontend'), $shopio_version, true);
            wp_register_script('shopio-elementor-video', get_theme_file_uri('/assets/js/elementor/video.js'), array('jquery','elementor-frontend'), $shopio_version, true);
           
        }

        public function add_category() {
            Elementor\Plugin::instance()->elements_manager->add_category(
                'shopio-addons',
                array(
                    'title' => esc_html__('Shopio Addons', 'shopio'),
                    'icon'  => 'fa fa-plug',
                ),
                1);
        }

        public function add_animations_scroll($animations) {
            $animations['Shopio Animation'] = [
                'opal-move-up'    => 'Move Up',
                'opal-move-down'  => 'Move Down',
                'opal-move-left'  => 'Move Left',
                'opal-move-right' => 'Move Right',
                'opal-flip'       => 'Flip',
                'opal-helix'      => 'Helix',
                'opal-scale-up'   => 'Scale',
                'opal-am-popup'   => 'Popup',
            ];

            return $animations;
        }

        public function customs_widgets() {
            $files = glob(get_theme_file_path('/inc/elementor/custom-widgets/*.php'));
            foreach ($files as $file) {
                if (file_exists($file)) {
                    require_once $file;
                }
            }
        }

        /**
         * @param $widgets_manager Elementor\Widgets_Manager
         */
        public function include_widgets($widgets_manager) {
            $files = glob(get_theme_file_path('/inc/elementor/widgets/*.php'));
            foreach ($files as $file) {
                if (file_exists($file)) {
                    require_once $file;
                }
            }
        }

        public function woocommerce_fix_notice() {
            if (shopio_is_woocommerce_activated()) {
                remove_action('woocommerce_cart_is_empty', 'woocommerce_output_all_notices', 5);
                remove_action('woocommerce_shortcode_before_product_cat_loop', 'woocommerce_output_all_notices', 10);
                remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);
                remove_action('woocommerce_before_single_product', 'woocommerce_output_all_notices', 10);
                remove_action('woocommerce_before_cart', 'woocommerce_output_all_notices', 10);
                remove_action('woocommerce_before_checkout_form', 'woocommerce_output_all_notices', 10);
                remove_action('woocommerce_account_content', 'woocommerce_output_all_notices', 10);
                remove_action('woocommerce_before_customer_login_form', 'woocommerce_output_all_notices', 10);
            }
        }

        public function add_icons( $manager ) {
            $new_icons = json_decode( '{"shopio-icon-account":"account","shopio-icon-address":"address","shopio-icon-angle-down":"angle-down","shopio-icon-angle-left":"angle-left","shopio-icon-angle-right":"angle-right","shopio-icon-angle-up":"angle-up","shopio-icon-automotive":"automotive","shopio-icon-badge":"badge","shopio-icon-bag-alt":"bag-alt","shopio-icon-beauty-health":"beauty-health","shopio-icon-bed":"bed","shopio-icon-bold-flavor":"bold-flavor","shopio-icon-boost-metabolism":"boost-metabolism","shopio-icon-calendar":"calendar","shopio-icon-cart-plus":"cart-plus","shopio-icon-cart":"cart","shopio-icon-chairs":"chairs","shopio-icon-chat":"chat","shopio-icon-check-square-solid":"check-square-solid","shopio-icon-chevron-double-left":"chevron-double-left","shopio-icon-chevron-double-right":"chevron-double-right","shopio-icon-click":"click","shopio-icon-clock":"clock","shopio-icon-clothing-fashion":"clothing-fashion","shopio-icon-coffee-sourced":"coffee-sourced","shopio-icon-compare":"compare","shopio-icon-customer-say":"customer-say","shopio-icon-customer-support":"customer-support","shopio-icon-daily-deals":"daily-deals","shopio-icon-deal":"deal","shopio-icon-delivered-fresh":"delivered-fresh","shopio-icon-delivery-1":"delivery-1","shopio-icon-delivery-2":"delivery-2","shopio-icon-delivery":"delivery","shopio-icon-design-plant":"design-plant","shopio-icon-discount-01":"discount-01","shopio-icon-discount":"discount","shopio-icon-electronics":"electronics","shopio-icon-esasy-pres":"esasy-pres","shopio-icon-eye":"eye","shopio-icon-facebook-f":"facebook-f","shopio-icon-fashion-payment":"fashion-payment","shopio-icon-fashion-quality":"fashion-quality","shopio-icon-fashion":"fashion","shopio-icon-featured":"featured","shopio-icon-filter-ul":"filter-ul","shopio-icon-food-drink":"food-drink","shopio-icon-free-delivery-1":"free-delivery-1","shopio-icon-free-delivery":"free-delivery","shopio-icon-free-return":"free-return","shopio-icon-furniture-1":"furniture-1","shopio-icon-furniture":"furniture","shopio-icon-garden-care":"garden-care","shopio-icon-gift-r":"gift-r","shopio-icon-global-1":"global-1","shopio-icon-google-plus-g":"google-plus-g","shopio-icon-healh-beauty":"healh-beauty","shopio-icon-health-beauty":"health-beauty","shopio-icon-heart-1":"heart-1","shopio-icon-home-appliances":"home-appliances","shopio-icon-increase-energy":"increase-energy","shopio-icon-left-arrow":"left-arrow","shopio-icon-like":"like","shopio-icon-linkedin-in":"linkedin-in","shopio-icon-list-ul":"list-ul","shopio-icon-long-arrow-down":"long-arrow-down","shopio-icon-long-arrow-left":"long-arrow-left","shopio-icon-long-arrow-right":"long-arrow-right","shopio-icon-long-arrow-up":"long-arrow-up","shopio-icon-mailchip-01":"mailchip-01","shopio-icon-mall-fashion":"mall-fashion","shopio-icon-medica-riview":"medica-riview","shopio-icon-medica-saving":"medica-saving","shopio-icon-money-return":"money-return","shopio-icon-need":"need","shopio-icon-newsletter":"newsletter","shopio-icon-pen":"pen","shopio-icon-pet-supplies":"pet-supplies","shopio-icon-phone":"phone","shopio-icon-plane-1":"plane-1","shopio-icon-play":"play","shopio-icon-popular":"popular","shopio-icon-quality":"quality","shopio-icon-quote":"quote","shopio-icon-recommend":"recommend","shopio-icon-refund":"refund","shopio-icon-return-fashion":"return-fashion","shopio-icon-right-arrow-cicrle":"right-arrow-cicrle","shopio-icon-right-arrow":"right-arrow","shopio-icon-rocket-1":"rocket-1","shopio-icon-search-1":"search-1","shopio-icon-searches":"searches","shopio-icon-secure-payment":"secure-payment","shopio-icon-seed-supply":"seed-supply","shopio-icon-shieldcheck-01":"shieldcheck-01","shopio-icon-shopping-bag":"shopping-bag","shopio-icon-sliders-v":"sliders-v","shopio-icon-smooth-taste":"smooth-taste","shopio-icon-sports":"sports","shopio-icon-star-bestseller":"star-bestseller","shopio-icon-storage":"storage","shopio-icon-support-01":"support-01","shopio-icon-support":"support","shopio-icon-toys-kids":"toys-kids","shopio-icon-travel-outdoor":"travel-outdoor","shopio-icon-twitte-1":"twitte-1","shopio-icon-vase":"vase","shopio-icon-watering-graden":"watering-graden","shopio-icon-weight-loss":"weight-loss","shopio-icon-360":"360","shopio-icon-bars":"bars","shopio-icon-caret-down":"caret-down","shopio-icon-caret-left":"caret-left","shopio-icon-caret-right":"caret-right","shopio-icon-caret-up":"caret-up","shopio-icon-cart-empty":"cart-empty","shopio-icon-check-square":"check-square","shopio-icon-circle":"circle","shopio-icon-cloud-download-alt":"cloud-download-alt","shopio-icon-comment":"comment","shopio-icon-comments":"comments","shopio-icon-contact":"contact","shopio-icon-credit-card":"credit-card","shopio-icon-dot-circle":"dot-circle","shopio-icon-edit":"edit","shopio-icon-envelope":"envelope","shopio-icon-expand-alt":"expand-alt","shopio-icon-external-link-alt":"external-link-alt","shopio-icon-file-alt":"file-alt","shopio-icon-file-archive":"file-archive","shopio-icon-filter":"filter","shopio-icon-folder-open":"folder-open","shopio-icon-folder":"folder","shopio-icon-frown":"frown","shopio-icon-gift":"gift","shopio-icon-grid":"grid","shopio-icon-grip-horizontal":"grip-horizontal","shopio-icon-heart-fill":"heart-fill","shopio-icon-heart":"heart","shopio-icon-history":"history","shopio-icon-home":"home","shopio-icon-info-circle":"info-circle","shopio-icon-instagram":"instagram","shopio-icon-level-up-alt":"level-up-alt","shopio-icon-list":"list","shopio-icon-map-marker-check":"map-marker-check","shopio-icon-meh":"meh","shopio-icon-minus-circle":"minus-circle","shopio-icon-minus":"minus","shopio-icon-mobile-android-alt":"mobile-android-alt","shopio-icon-money-bill":"money-bill","shopio-icon-pencil-alt":"pencil-alt","shopio-icon-plus-circle":"plus-circle","shopio-icon-plus":"plus","shopio-icon-random":"random","shopio-icon-reply-all":"reply-all","shopio-icon-reply":"reply","shopio-icon-search-plus":"search-plus","shopio-icon-search":"search","shopio-icon-shield-check":"shield-check","shopio-icon-shopping-basket":"shopping-basket","shopio-icon-shopping-cart":"shopping-cart","shopio-icon-sign-out-alt":"sign-out-alt","shopio-icon-smile":"smile","shopio-icon-spinner":"spinner","shopio-icon-square":"square","shopio-icon-star":"star","shopio-icon-store":"store","shopio-icon-sync":"sync","shopio-icon-tachometer-alt":"tachometer-alt","shopio-icon-th-large":"th-large","shopio-icon-th-list":"th-list","shopio-icon-thumbtack":"thumbtack","shopio-icon-ticket":"ticket","shopio-icon-times-circle":"times-circle","shopio-icon-times":"times","shopio-icon-trophy-alt":"trophy-alt","shopio-icon-truck":"truck","shopio-icon-user-headset":"user-headset","shopio-icon-user-shield":"user-shield","shopio-icon-user":"user","shopio-icon-video":"video","shopio-icon-wishlist-empty":"wishlist-empty","shopio-icon-adobe":"adobe","shopio-icon-amazon":"amazon","shopio-icon-android":"android","shopio-icon-angular":"angular","shopio-icon-apper":"apper","shopio-icon-apple":"apple","shopio-icon-atlassian":"atlassian","shopio-icon-behance":"behance","shopio-icon-bitbucket":"bitbucket","shopio-icon-bitcoin":"bitcoin","shopio-icon-bity":"bity","shopio-icon-bluetooth":"bluetooth","shopio-icon-btc":"btc","shopio-icon-centos":"centos","shopio-icon-chrome":"chrome","shopio-icon-codepen":"codepen","shopio-icon-cpanel":"cpanel","shopio-icon-discord":"discord","shopio-icon-dochub":"dochub","shopio-icon-docker":"docker","shopio-icon-dribbble":"dribbble","shopio-icon-dropbox":"dropbox","shopio-icon-drupal":"drupal","shopio-icon-ebay":"ebay","shopio-icon-facebook":"facebook","shopio-icon-figma":"figma","shopio-icon-firefox":"firefox","shopio-icon-google-plus":"google-plus","shopio-icon-google":"google","shopio-icon-grunt":"grunt","shopio-icon-gulp":"gulp","shopio-icon-html5":"html5","shopio-icon-joomla":"joomla","shopio-icon-link-brand":"link-brand","shopio-icon-linkedin":"linkedin","shopio-icon-mailchimp":"mailchimp","shopio-icon-opencart":"opencart","shopio-icon-paypal":"paypal","shopio-icon-pinterest-p":"pinterest-p","shopio-icon-reddit":"reddit","shopio-icon-skype":"skype","shopio-icon-slack":"slack","shopio-icon-snapchat":"snapchat","shopio-icon-spotify":"spotify","shopio-icon-trello":"trello","shopio-icon-twitter":"twitter","shopio-icon-vimeo":"vimeo","shopio-icon-whatsapp":"whatsapp","shopio-icon-wordpress":"wordpress","shopio-icon-yoast":"yoast","shopio-icon-youtube":"youtube"}', true );
			$icons     = $manager->get_control( 'icon' )->get_settings( 'options' );
			$new_icons = array_merge(
				$new_icons,
				$icons
			);
			// Then we set a new list of icons as the options of the icon control
			$manager->get_control( 'icon' )->set_settings( 'options', $new_icons ); 
        }

        public function add_icons_native($tabs) {
            global $shopio_version;
            $tabs['opal-custom'] = [
                'name'          => 'shopio-icon',
                'label'         => esc_html__('Shopio Icon', 'shopio'),
                'prefix'        => 'shopio-icon-',
                'displayPrefix' => 'shopio-icon-',
                'labelIcon'     => 'fab fa-font-awesome-alt',
                'ver'           => $shopio_version,
                'fetchJson'     => get_theme_file_uri('/inc/elementor/icons.json'),
                'native'        => true,
            ];

            return $tabs;
        }
    }

endif;

return new Shopio_Elementor();
