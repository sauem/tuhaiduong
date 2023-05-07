<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;
use Elementor\Group_Control_Image_Size;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Shopio_Image_Location extends Elementor\Widget_Base
{

    public function get_name()
    {
        return 'shopio-image-location';
    }

    public function get_title()
    {
        return esc_html__('Shopio Image Location', 'shopio');
    }

    public function get_categories()
    {
        return array('shopio-addons');
    }

    public function get_icon()
    {
        return 'eicon-image-hotspot';
    }

    protected function register_controls()
    {

        $this->start_controls_section('image_location_image_section',
            [
                'label' => esc_html__('Image', 'shopio'),
            ]
        );

        $this->add_control('image_location_image',
            [
                'label' => esc_html__('Choose Image', 'shopio'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Elementor\Utils::get_placeholder_image_src(),
                ],
                'label_block' => true
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'background_image', // Actually its `image_size`.
                'default' => 'full'
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section('image_location_icons_settings',
            [
                'label' => esc_html__('Location', 'shopio'),
            ]
        );
        $repeater = new Elementor\Repeater();

        $repeater->add_responsive_control('shopio_image_location_main_horizontal_position',
            [
                'label' => esc_html__('Horizontal Position', 'shopio'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 20,
                    ],
                ],
                'default' => [
                    'size' => 50,
                    'unit' => '%'
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.shopio-image-location-content' => 'left: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $repeater->add_responsive_control('shopio_image_location_main_vertical_position',
            [
                'label' => esc_html__('Vertical Position', 'shopio'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 200,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 20,
                    ],
                ],
                'default' => [
                    'size' => 50,
                    'unit' => '%'
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}}.shopio-image-location-content' => 'top: {{SIZE}}{{UNIT}}'
                ]
            ]
        );

        $repeater->add_control('shopio_image_location_image',
            [
                'label' => esc_html__('Choose Image', 'shopio'),
                'type' => Controls_Manager::MEDIA,
                'default' => [
                    'url' => Elementor\Utils::get_placeholder_image_src(),
                ],
                'label_block' => true
            ]
        );

        $repeater->add_control('shopio_image_location_title',
            [
                'label' => esc_html__('Title', 'shopio'),
                'type' => Controls_Manager::TEXT,
                'default' => 'Low Pocket Shelf',
                'label_block' => true,
            ]);

        $repeater->add_control('shopio_image_location_price',
            [
                'label' => esc_html__('Title', 'shopio'),
                'type' => Controls_Manager::TEXT,
                'default' => '$25.00',
                'label_block' => true,
            ]);

        $repeater->add_control('shopio_image_location_price_sale',
            [
                'label' => esc_html__('Title', 'shopio'),
                'type' => Controls_Manager::TEXT,
                'default' => '$17.25',
                'label_block' => true,
            ]);

        $repeater->add_control(
            'shopio_image_location_link',
            [
                'label' => esc_html__('Link to', 'shopio'),
                'placeholder' => esc_html__('https://your-link.com', 'shopio'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#',
                ],
            ]
        );

        $repeater->add_control(
            'next_horizontal',
            [
                'label' => esc_html__('Next Horizontal', 'shopio'),
                'type' => Controls_Manager::CHOOSE,
                'label_block' => false,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'shopio'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'shopio'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
            ]
        );
        $repeater->add_responsive_control(
            'next_horizontal_value',
            [
                'type' => Controls_Manager::SLIDER,
                'show_label' => false,
                'size_units' => ['px', 'em', '%'],
                'range' => [
                    'px' => [
                        'min' => -1000,
                        'max' => 1000,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => -100,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} {{CURRENT_ITEM}} .shopio-image-location-icon .location-sub' => 'left: unset; right: unset;{{next_horizontal.value}}: {{SIZE}}{{UNIT}};',
                ]
            ]
        );

        $this->add_control('image_location_icons',
            [
                'label' => esc_html__('Location', 'shopio'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );

        $this->add_group_control(
            Elementor\Group_Control_Image_Size::get_type(),
            [
                'name' => 'shopio_image_location_image',
                'default' => 'full',
                'separator' => 'none',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_location',
            [
                'label' => esc_html__('Location', 'shopio'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_responsive_control(
            'location_width',
            [
                'label' => esc_html__('Width', 'shopio'),
                'type' => Controls_Manager::SLIDER,
                'default' => [
                    'unit' => '%',
                ],
                'tablet_default' => [
                    'unit' => '%',
                ],
                'mobile_default' => [
                    'unit' => '%',
                ],
                'size_units' => ['%', 'px', 'vw'],
                'range' => [
                    '%' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                    'px' => [
                        'min' => 1,
                        'max' => 1000,
                    ],
                    'vw' => [
                        'min' => 1,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .location-sub' => 'max-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'padding_location',
            [
                'label' => esc_html__('Padding', 'shopio'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .location-sub' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'location_border',
                'placeholder' => '1px',
                'default' => '1px',
                'selector' => '{{WRAPPER}} .location-sub',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'location_radius',
            [
                'label' => esc_html__('Border Radius', 'shopio'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .location-sub' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'location_box_shadow',
                'selector' => '{{WRAPPER}} .location-sub',
            ]
        );

        $this->add_control(
            'color_title',
            [
                'label' => esc_html__('Color Title', 'shopio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-sub .title' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_price',
            [
                'label' => esc_html__('Color Price', 'shopio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-sub .price' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'color_price_sale',
            [
                'label' => esc_html__('Color Price Sale', 'shopio'),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .location-sub .price-sale' => 'color: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $image_src = $settings['image_location_image'];
        $image_src_size = Group_Control_Image_Size::get_attachment_image_src($image_src['id'], 'background_image', $settings);
        if (empty($image_src_size)) $image_src_size = $image_src['url'];
        ?>

        <div class="shopio-image-location-container">
            <img class="shopio-addons-image-location" alt="Background" src="<?php echo esc_url($image_src_size); ?>">
            <?php foreach ($settings['image_location_icons'] as $index => $item) { ?>
                <?php
                $class_item = 'elementor-repeater-item-' . $item['_id'];
                $tab_title_setting_key = $this->get_repeater_setting_key('tab_title', 'tabs', $index);
                $this->add_render_attribute($tab_title_setting_key, [
                    'class' => ['shopio-image-location-content', $class_item],
                ]);
                ?>
                <div <?php echo shopio_elementor_get_render_attribute_string($tab_title_setting_key, $this); ?>>
                    <div class="shopio-image-location-icon">
                        <div class="location-sub">
                            <?php $this->render_image($settings, $item); ?>
                            <a class="title"
                               href="<?php echo esc_url($item['shopio_image_location_link']['url']) ?>"><?php echo esc_html($item['shopio_image_location_title']); ?></a>
                            <?php if (!empty($item['shopio_image_location_price']) || !empty($item['shopio_image_location_price_sale'])): ?>
                                <div class="price">
                                    <?php if (!empty($item['shopio_image_location_price_sale'])): ?>
                                        <span class="price-sale"><?php echo esc_html($item['shopio_image_location_price_sale']); ?></span>
                                    <?php endif; ?>
                                    <?php if (!empty($item['shopio_image_location_price'])): ?>
                                        <span class="price-title"><?php echo esc_html($item['shopio_image_location_price']); ?></span>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <span class="icon">
                            <i class="shopio-icon-plus"></i>
                        </span>
                    </div>
                </div>
            <?php } ?>
        </div>

        <?php
    }

    private function render_image($settings, $index)
    {
        if (!empty($index['shopio_image_location_image']['url'])) :
            ?>
            <div class="image">
                <?php
                $index['shopio_image_location_image_size'] = $settings['shopio_image_location_image_size'];
                $index['shopio_image_location_image_custom_dimension'] = $settings['shopio_image_location_image_custom_dimension'];
                echo Group_Control_Image_Size::get_attachment_image_html($index, 'shopio_image_location_image');
                ?>
            </div>
        <?php
        endif;
    }

}

$widgets_manager->register(new Shopio_Image_Location());
