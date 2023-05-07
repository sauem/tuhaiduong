<?php

use Elementor\Plugin;

class Shopio_Merlin_Config {

    private $wizard;

    public function __construct() {
        $this->init();
        add_filter('merlin_import_files', [$this, 'import_files']);
        add_action('merlin_after_all_import', [$this, 'after_import_setup'], 10, 1);
        add_filter('merlin_generate_child_functions_php', [$this, 'render_child_functions_php']);

        add_action('import_start', function () {
            add_filter('wxr_importer.pre_process.post_meta', [$this, 'fiximport_elementor'], 10, 1);
        });
    }

    public function fiximport_elementor($post_meta) {
        if ('_elementor_data' === $post_meta['key']) {
            $post_meta['value'] = wp_slash($post_meta['value']);
        }

        return $post_meta;
    }

    public function import_files(){
            return array(
                array(
                    'import_file_name'           => 'home 1',
                    'home'                       => 'home-1',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-1.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),

                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_1.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-1',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#82D175"},{"_id":"primary_hover","title":"Primary Hover","color":"#6bc85c"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 2',
                    'home'                       => 'home-2',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-2.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-2/tools.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_2.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-2',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#F89619"},{"_id":"primary_hover","title":"Primary Hover","color":"#ee8807"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 3',
                    'home'                       => 'home-3',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-3.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-3/outdoor.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_3.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-3',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#196957"},{"_id":"primary_hover","title":"Primary Hover","color":"#165e4e"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 4',
                    'home'                       => 'home-4',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-4.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-4/outdoor-1.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_4.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-4',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#CE701F"},{"_id":"primary_hover","title":"Primary Hover","color":"#b9641b"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 5',
                    'home'                       => 'home-5',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-5.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-5/coffee.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_5.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-5',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#A45E4A"},{"_id":"primary_hover","title":"Primary Hover","color":"#935442"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 6',
                    'home'                       => 'home-6',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-6.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-6/electronic.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_6.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-6',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#6355E4"},{"_id":"primary_hover","title":"Primary Hover","color":"#4a39df"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 7',
                    'home'                       => 'home-7',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-7.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),

                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_7.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-7',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#14AEC9"},{"_id":"primary_hover","title":"Primary Hover","color":"#129cb4"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 8',
                    'home'                       => 'home-8',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-8.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-8/toy.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_8.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-8',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#E27A51"},{"_id":"primary_hover","title":"Primary Hover","color":"#dd6536"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 9',
                    'home'                       => 'home-9',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-9.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-9/furniture.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_9.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-9',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#BD9C85"},{"_id":"primary_hover","title":"Primary Hover","color":"#b18b70"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 10',
                    'home'                       => 'home-10',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-10.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-10/jewelry.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_10.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-10',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#E8C592"},{"_id":"primary_hover","title":"Primary Hover","color":"#e1b472"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 11',
                    'home'                       => 'home-11',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-11.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-11/kid.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_11.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-11',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#EE6C87"},{"_id":"primary_hover","title":"Primary Hover","color":"#ea4c6d"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 12',
                    'home'                       => 'home-12',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-12.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-12/jewelry2.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_12.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-12',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#CC9966"},{"_id":"primary_hover","title":"Primary Hover","color":"#c4894f"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 13',
                    'home'                       => 'home-13',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-13.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-13/funiture-kid.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_13.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-13',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#FE634D"},{"_id":"primary_hover","title":"Primary Hover","color":"#fd462c"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 14',
                    'home'                       => 'home-14',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-14.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-14/fashion01.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_14.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-14',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#879F84"},{"_id":"primary_hover","title":"Primary Hover","color":"#779273"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 15',
                    'home'                       => 'home-15',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-15.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-15/bag-wallet.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_15.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-15',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#CB8161"},{"_id":"primary_hover","title":"Primary Hover","color":"#c36e4a"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 16',
                    'home'                       => 'home-16',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-16.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),

                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_16.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-16',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#F95B5B"},{"_id":"primary_hover","title":"Primary Hover","color":"#f73a3a"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 17',
                    'home'                       => 'home-17',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-17.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-17/tea.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_17.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-17',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#94BE90"},{"_id":"primary_hover","title":"Primary Hover","color":"#7fb17a"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 18',
                    'home'                       => 'home-18',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-18.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-18/fashion-2.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_18.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-18',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#1162fd"},{"_id":"primary_hover","title":"Primary Hover","color":"#0254f0"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 19',
                    'home'                       => 'home-19',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-19.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-19/flower.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_19.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-19',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#FE5D02"},{"_id":"primary_hover","title":"Primary Hover","color":"#e55300"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 20',
                    'home'                       => 'home-20',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-20.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-20/kitchendining.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_20.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-20',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#333333"},{"_id":"primary_hover","title":"Primary Hover","color":"#2d2d2d"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 21',
                    'home'                       => 'home-21',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-21.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-21/plants.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_21.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-21',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#59805B"},{"_id":"primary_hover","title":"Primary Hover","color":"#507351"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 22',
                    'home'                       => 'home-22',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-22.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-22/crafts-shop.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_22.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-22',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#F4C3BC"},{"_id":"primary_hover","title":"Primary Hover","color":"#eda196"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 23',
                    'home'                       => 'home-23',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-23.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-23/teashop.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_23.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-23',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#98A67C"},{"_id":"primary_hover","title":"Primary Hover","color":"#8a9a6a"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 24',
                    'home'                       => 'home-24',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-24.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-24/glasses.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_24.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-24',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#E8C592"},{"_id":"primary_hover","title":"Primary Hover","color":"#e1b472"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 25',
                    'home'                       => 'home-25',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-25.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-25/watch.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_25.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-25',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#BD9C85"},{"_id":"primary_hover","title":"Primary Hover","color":"#b18b70"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 26',
                    'home'                       => 'home-26',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-26.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-26/bagstore.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_26.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-26',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#CE701F"},{"_id":"primary_hover","title":"Primary Hover","color":"#b9641b"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 27',
                    'home'                       => 'home-27',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-27.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-27/shoes.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_27.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-27',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#D12127"},{"_id":"primary_hover","title":"Primary Hover","color":"#bc1d23"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 28',
                    'home'                       => 'home-28',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-28.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-28/flowershop.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_28.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-28',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#E56D6D"},{"_id":"primary_hover","title":"Primary Hover","color":"#df5050"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 29',
                    'home'                       => 'home-29',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-29.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-29/homeshop.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_29.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-29',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#C96838"},{"_id":"primary_hover","title":"Primary Hover","color":"#b55d31"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),

                array(
                    'import_file_name'           => 'home 30',
                    'home'                       => 'home-30',
                    'local_import_file'          => get_theme_file_path('/dummy-data/content.xml'),
                    'homepage'                   => get_theme_file_path('/dummy-data/homepage/home-30.xml'),
                    'local_import_widget_file'   => get_theme_file_path('/dummy-data/widgets.json'),
                    'import_rev_slider_file_url' => 'http://source.wpopal.com/shopio/dummy_data/revsliders/home-30/autoshop.zip',
                    'import_more_revslider_file_url' => [],
                    'import_preview_image_url'   => get_theme_file_uri('/assets/images/oneclick/home_30.jpg'),
                    'preview_url'                => 'https://demo2.wpopal.com/shopio/home-30',
                    'elementor'                  => '{"system_colors":[{"_id":"primary","title":"Primary","color":"#FA9907"},{"_id":"primary_hover","title":"Primary Hover","color":"#e28a04"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}',
                    'themeoptions'               => '{}',
                ),
            );           
        }

    public function after_import_setup($selected_import) {
        $selected_import = ($this->import_files())[$selected_import];
        $check_oneclick  = get_option('shopio_check_oneclick', []);

        $this->set_demo_menus();

        if (!isset($check_oneclick[$selected_import['home']])) {
            $this->wizard->importer->import(get_parent_theme_file_path('dummy-data/homepage/' . $selected_import['home'] . '.xml'));
            $check_oneclick[$selected_import['home']] = true;
        }

        // setup Home page
        $home = get_page_by_path($selected_import['home']);
        if ($home) {
            update_option('show_on_front', 'page');
            update_option('page_on_front', $home->ID);
        }

        // Setup Options
        $options = $this->get_all_options();

        // Elementor

        $active_kit_id = Elementor\Plugin::$instance->kits_manager->get_active_id();
        update_post_meta($active_kit_id, '_elementor_page_settings', json_decode($selected_import['elementor'], true));

        // Options
        $theme_options = $options['options'];
        foreach ($theme_options as $key => $option) {
            update_option($key, $option);
        }

        //Mailchimp
        if (!isset($check_oneclick['mailchip'])) {
            $mailchimp = $this->get_mailchimp_id();
            if ($mailchimp) {
                update_option('mc4wp_default_form_id', $mailchimp);
            }
            $check_oneclick['mailchip'] = true;
        }

        // Header Footer Builder
        $this->reset_header_footer();
        $this->set_hf($selected_import['home']);

        // WooCommerce
        if (!isset($check_oneclick['woocommerce'])) {
            update_option('woocommerce_single_image_width', 800);
            update_option('woocommerce_thumbnail_image_width', 450);
            update_option('woocommerce_thumbnail_cropping', 'uncropped');
            $check_oneclick['woocommerce'] = true;
        }

        if (!isset($check_oneclick['logo'])) {
            set_theme_mod('custom_logo', $this->get_attachment('_logo'));
            $check_oneclick['logo'] = true;
        }

        update_option('shopio_check_oneclick', $check_oneclick);

        \Elementor\Plugin::instance()->files_manager->clear_cache();
    }

    private function get_mailchimp_id() {
        $params = array(
            'post_type'      => 'mc4wp-form',
            'posts_per_page' => 1,
        );
        $post   = get_posts($params);

        return isset($post[0]) ? $post[0]->ID : 0;
    }

    private function get_attachment($key) {
        $params = array(
            'post_type'      => 'attachment',
            'post_status'    => 'inherit',
            'posts_per_page' => 1,
            'meta_key'       => $key,
        );
        $post   = get_posts($params);
        if ($post) {
            return $post[0]->ID;
        }

        return 0;
    }

    private function init() {
        $this->wizard = new Merlin(
            $config = array(
                // Location / directory where Merlin WP is placed in your theme.
                'merlin_url'         => 'merlin',
                // The wp-admin page slug where Merlin WP loads.
                'parent_slug'        => 'themes.php',
                // The wp-admin parent page slug for the admin menu item.
                'capability'         => 'manage_options',
                // The capability required for this menu to be displayed to the user.
                'dev_mode'           => true,
                // Enable development mode for testing.
                'license_step'       => false,
                // EDD license activation step.
                'license_required'   => false,
                // Require the license activation step.
                'license_help_url'   => '',
                'directory'          => '/inc/merlin',
                // URL for the 'license-tooltip'.
                'edd_remote_api_url' => '',
                // EDD_Theme_Updater_Admin remote_api_url.
                'edd_item_name'      => '',
                // EDD_Theme_Updater_Admin item_name.
                'edd_theme_slug'     => '',
                // EDD_Theme_Updater_Admin item_slug.
            ),
            $strings = array(
                'admin-menu'          => esc_html__('Theme Setup', 'shopio'),

                /* translators: 1: Title Tag 2: Theme Name 3: Closing Title Tag */
                'title%s%s%s%s'       => esc_html__('%1$s%2$s Themes &lsaquo; Theme Setup: %3$s%4$s', 'shopio'),
                'return-to-dashboard' => esc_html__('Return to the dashboard', 'shopio'),
                'ignore'              => esc_html__('Disable this wizard', 'shopio'),

                'btn-skip'                 => esc_html__('Skip', 'shopio'),
                'btn-next'                 => esc_html__('Next', 'shopio'),
                'btn-start'                => esc_html__('Start', 'shopio'),
                'btn-no'                   => esc_html__('Cancel', 'shopio'),
                'btn-plugins-install'      => esc_html__('Install', 'shopio'),
                'btn-child-install'        => esc_html__('Install', 'shopio'),
                'btn-content-install'      => esc_html__('Install', 'shopio'),
                'btn-import'               => esc_html__('Import', 'shopio'),
                'btn-license-activate'     => esc_html__('Activate', 'shopio'),
                'btn-license-skip'         => esc_html__('Later', 'shopio'),

                /* translators: Theme Name */
                'license-header%s'         => esc_html__('Activate %s', 'shopio'),
                /* translators: Theme Name */
                'license-header-success%s' => esc_html__('%s is Activated', 'shopio'),
                /* translators: Theme Name */
                'license%s'                => esc_html__('Enter your license key to enable remote updates and theme support.', 'shopio'),
                'license-label'            => esc_html__('License key', 'shopio'),
                'license-success%s'        => esc_html__('The theme is already registered, so you can go to the next step!', 'shopio'),
                'license-json-success%s'   => esc_html__('Your theme is activated! Remote updates and theme support are enabled.', 'shopio'),
                'license-tooltip'          => esc_html__('Need help?', 'shopio'),

                /* translators: Theme Name */
                'welcome-header%s'         => esc_html__('Welcome to %s', 'shopio'),
                'welcome-header-success%s' => esc_html__('Hi. Welcome back', 'shopio'),
                'welcome%s'                => esc_html__('This wizard will set up your theme, install plugins, and import content. It is optional & should take only a few minutes.', 'shopio'),
                'welcome-success%s'        => esc_html__('You may have already run this theme setup wizard. If you would like to proceed anyway, click on the "Start" button below.', 'shopio'),

                'child-header'         => esc_html__('Install Child Theme', 'shopio'),
                'child-header-success' => esc_html__('You\'re good to go!', 'shopio'),
                'child'                => esc_html__('Let\'s build & activate a child theme so you may easily make theme changes.', 'shopio'),
                'child-success%s'      => esc_html__('Your child theme has already been installed and is now activated, if it wasn\'t already.', 'shopio'),
                'child-action-link'    => esc_html__('Learn about child themes', 'shopio'),
                'child-json-success%s' => esc_html__('Awesome. Your child theme has already been installed and is now activated.', 'shopio'),
                'child-json-already%s' => esc_html__('Awesome. Your child theme has been created and is now activated.', 'shopio'),

                'plugins-header'         => esc_html__('Install Plugins', 'shopio'),
                'plugins-header-success' => esc_html__('You\'re up to speed!', 'shopio'),
                'plugins'                => esc_html__('Let\'s install some essential WordPress plugins to get your site up to speed.', 'shopio'),
                'plugins-success%s'      => esc_html__('The required WordPress plugins are all installed and up to date. Press "Next" to continue the setup wizard.', 'shopio'),
                'plugins-action-link'    => esc_html__('Advanced', 'shopio'),

                'import-header'      => esc_html__('Import Content', 'shopio'),
                'import'             => esc_html__('Let\'s import content to your website, to help you get familiar with the theme.', 'shopio'),
                'import-action-link' => esc_html__('Advanced', 'shopio'),

                'ready-header'      => esc_html__('All done. Have fun!', 'shopio'),

                /* translators: Theme Author */
                'ready%s'           => esc_html__('Your theme has been all set up. Enjoy your new theme by %s.', 'shopio'),
                'ready-action-link' => esc_html__('Extras', 'shopio'),
                'ready-big-button'  => esc_html__('View your website', 'shopio'),
                'ready-link-1'      => sprintf('<a href="%1$s" target="_blank">%2$s</a>', 'https://wordpress.org/support/', esc_html__('Explore WordPress', 'shopio')),
                'ready-link-2'      => sprintf('<a href="%1$s" target="_blank">%2$s</a>', 'https://themebeans.com/contact/', esc_html__('Get Theme Support', 'shopio')),
                'ready-link-3'      => sprintf('<a href="%1$s">%2$s</a>', admin_url('customize.php'), esc_html__('Start Customizing', 'shopio')),
            )
        );
        if (shopio_is_elementor_activated()) {

            add_action('widgets_init', [$this, 'widgets_init']);

        }
    }

    public function widgets_init() {
        require_once get_parent_theme_file_path('/inc/merlin/includes/recent-post.php');
        register_widget('Shopio_WP_Widget_Recent_Posts');
        if (shopio_is_woocommerce_activated()) {
            require_once get_parent_theme_file_path('/inc/merlin/includes/class-wc-widget-layered-nav.php');
            register_widget('Shopio_Widget_Layered_Nav');
        }
    }

    private function get_all_header_footer() {
        return [
            'home-1'  => [
                'header' => [
                    [
                        'slug'                         => 'header-1',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-1',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-2'  => [
                'header' => [
                    [
                        'slug'                         => 'header-2',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-2',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-3'  => [
                'header' => [
                    [
                        'slug'                         => 'header-3',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-3',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-4'  => [
                'header' => [
                    [
                        'slug'                         => 'header-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-5'  => [
                'header' => [
                    [
                        'slug'                         => 'header-5',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-5',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-6'  => [
                'header' => [
                    [
                        'slug'                         => 'header-8',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-7'  => [
                'header' => [
                    [
                        'slug'                         => 'header-3',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-8'  => [
                'header' => [
                    [
                        'slug'                         => 'header-6',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-6',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-9'  => [
                'header' => [
                    [
                        'slug'                         => 'header-6-absolute',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-2',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-10' => [
                'header' => [
                    [
                        'slug'                         => 'header-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-11' => [
                'header' => [
                    [
                        'slug'                         => 'header-7',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-8',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-12' => [
                'header' => [
                    [
                        'slug'                         => 'header-9',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-9',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-13' => [
                'header' => [
                    [
                        'slug'                         => 'header-5-absolute',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-8',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-14' => [
                'header' => [
                    [
                        'slug'                         => 'header-7-absolute',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-10',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-15' => [
                'header' => [
                    [
                        'slug'                         => 'header-9',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-9',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-16' => [
                'header' => [
                    [
                        'slug'                         => 'header-7',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-17' => [
                'header' => [
                    [
                        'slug'                         => 'header-10',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-11',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-18' => [
                'header' => [
                    [
                        'slug'                         => 'header-6-absolute',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-2',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-19' => [
                'header' => [
                    [
                        'slug'                         => 'header-7',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-20' => [
                'header' => [
                    [
                        'slug'                         => 'header-6-absolute',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-11',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-21' => [
                'header' => [
                    [
                        'slug'                         => 'header-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-5',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-22' => [
                'header' => [
                    [
                        'slug'                         => 'header-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-9',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-23' => [
                'header' => [
                    [
                        'slug'                         => 'header-6-absolute',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-24' => [
                'header' => [
                    [
                        'slug'                         => 'header-6',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-25' => [
                'header' => [
                    [
                        'slug'                         => 'header-5',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-2',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-26' => [
                'header' => [
                    [
                        'slug'                         => 'header-4-absolute',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-27' => [
                'header' => [
                    [
                        'slug'                         => 'header-5-absolute',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-5',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-28' => [
                'header' => [
                    [
                        'slug'                         => 'header-9',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-4',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-29' => [
                'header' => [
                    [
                        'slug'                         => 'header-6',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-5',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-30' => [
                'header' => [
                    [
                        'slug'                         => 'header-2',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-2',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
            'home-free' => [
                'header' => [
                    [
                        'slug'                         => 'header-free',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ],
                'footer' => [
                    [
                        'slug'                         => 'footer-2',
                        'ehf_target_include_locations' => ['rule' => ['basic-global'], 'specific' => []],
                    ]
                ]
            ],
        ];
    }

    private function reset_header_footer() {
        $footer_args = array(
            'post_type'      => 'elementor-hf',
            'posts_per_page' => -1,
            'meta_query'     => array(
                array(
                    'key'     => 'ehf_template_type',
                    'compare' => 'IN',
                    'value'   => ['type_footer', 'type_header']
                ),
            )
        );
        $footer      = new WP_Query($footer_args);
        while ($footer->have_posts()) : $footer->the_post();
            update_post_meta(get_the_ID(), 'ehf_target_include_locations', []);
            update_post_meta(get_the_ID(), 'ehf_target_exclude_locations', []);
        endwhile;
        wp_reset_postdata();
    }

    public function set_demo_menus() {
        $main_menu = get_term_by('name', 'Main Menu', 'nav_menu');

        set_theme_mod(
            'nav_menu_locations',
            array(
                'primary'  => $main_menu->term_id,
                'handheld' => $main_menu->term_id,
            )
        );
    }

    private function set_hf($home) {
        $all_hf = $this->get_all_header_footer();
        $datas  = $all_hf[$home];
        foreach ($datas as $item) {
            foreach ($item as $object) {
                $hf = get_page_by_path($object['slug'], OBJECT, 'elementor-hf');
                if ($hf) {
                    update_post_meta($hf->ID, 'ehf_target_include_locations', $object['ehf_target_include_locations']);
                    if (isset($object['ehf_target_exclude_locations'])) {
                        update_post_meta($hf->ID, 'ehf_target_exclude_locations', $object['ehf_target_exclude_locations']);
                    }
                }
            }
        }
    }

    public function render_child_functions_php() {
        $output
            = "<?php
/**
 * Theme functions and definitions.
 */
		 ";

        return $output;
    }

    public function get_all_options(){
        $options = [];
        $options['options']   = json_decode('{"shopio_options_social_share":"1","shopio_options_social_share_facebook":"1","shopio_options_social_share_twitter":"1","shopio_options_social_share_linkedin":"1","shopio_options_social_share_pinterest":"1","shopio_options_wocommerce_row_laptop":"3","shopio_options_wocommerce_row_tablet":"2","shopio_options_wocommerce_row_mobile":"1","shopio_options_woocommerce_archive_layout":"default","shopio_options_single_product_gallery_layout":"horizontal"}', true);
        $options['elementor']   = json_decode('{"system_colors":[{"_id":"primary","title":"Primary","color":"#82D175"},{"_id":"primary_hover","title":"Primary Hover","color":"#6bc85c"},{"_id":"text","title":"Text","color":"#666666"},{"_id":"accent","title":"Heading","color":"#000000"},{"_id":"lighter","title":"Lighter","color":"#999999"},{"_id":"border","title":"Border","color":"#E5E5E5"}],"custom_colors":[],"system_typography":[{"_id":"primary","title":"Primary","typography_typography":"custom"},{"_id":"secondary","title":"Secondary","typography_typography":"custom"},{"_id":"accent","title":"Accent","typography_typography":"custom"},{"_id":"text","title":"Text","typography_typography":"custom"},{"_id":"heading_title","title":"Heading Title","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]},"typography_line_height":{"unit":"px","size":36,"sizes":[]},"typography_line_height_mobile":{"unit":"px","size":32,"sizes":[]}},{"_id":"heading_sub","title":"heading Sub","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"600","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_line_height":{"unit":"px","size":24,"sizes":[]}},{"_id":"heading_footer","title":"heading Footer","typography_typography":"custom","typography_font_family":"Be Vietnam Pro","typography_font_weight":"700","typography_text_transform":"uppercase","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_line_height":{"unit":"px","size":22,"sizes":[]}}],"custom_typography":[],"default_generic_fonts":"Sans-serif","site_name":"Shopio","site_description":"Multi-store WooCommerce Theme","page_title_selector":"h1.entry-title","activeItemIndex":1,"active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_tablet_extra","viewport_laptop"],"viewport_md":768,"viewport_lg":1025,"container_width":{"unit":"px","size":1290,"sizes":[]},"space_between_widgets":{"unit":"px","size":0,"sizes":[]},"button_typography_typography":"custom","button_typography_font_family":"Be Vietnam Pro","button_typography_font_size":{"unit":"px","size":14,"sizes":[]},"button_typography_font_weight":"700","button_text_color":"#FFFFFF","button_background_color":"#333333","button_hover_border_radius":{"unit":"px","top":"4","right":"4","bottom":"4","left":"4","isLinked":true},"button_padding":{"unit":"px","top":"17","right":"30","bottom":"17","left":"30","isLinked":false},"__globals__":{"button_hover_background_color":"globals/colors?id=primary"}}', true);
        return $options;
    } // end get_all_options
}

return new Shopio_Merlin_Config();
