<?php
// Icon List
use Elementor\Controls_Manager;

add_action( 'elementor/element/icon-list/section_text_style/after_section_end', function ($element, $args ) {
    /** @var \Elementor\Element_Base $element */
    // Remove Schema
    $element->update_control( 'icon_color', [
        'scheme' => [],
    ] );

    $element->update_control( 'text_color', [
        'scheme'    => [],
        'selectors' => [
            '{{WRAPPER}} .elementor-icon-list-items .elementor-icon-list-item .elementor-icon-list-text' => 'color: {{VALUE}};',
        ],
    ] );

    $element->update_control( 'text_color_hover', [
        'scheme'    => [],
        'selectors' => [
            '{{WRAPPER}} .elementor-icon-list-items .elementor-icon-list-item:hover .elementor-icon-list-text' => 'color: {{VALUE}};',
        ],
    ] );

    $element->update_control( 'icon_typography', [
        'scheme'    => [],
        'selectors' => '{{WRAPPER}} .elementor-icon-list-items .elementor-icon-list-item:hover .elementor-icon-list-text',
    ] );

    $element->update_control( 'divider_color', [
        'scheme'  => [],
        'default' => ''
    ] );

}, 10, 2 );

add_action( 'elementor/element/icon-list/section_icon_style/before_section_end', function ( $element, $args ) {
    $element->add_control(
        'icon_height',
        [
            'label' => esc_html__( 'Line Height', 'shopio' ),
            'type' => Controls_Manager::SLIDER,
            'selectors' => [
                '{{WRAPPER}} .elementor-icon-list-icon' => 'line-height: {{SIZE}}{{UNIT}};',
            ],
        ]
    );
    $element->add_responsive_control(
        'rotate',
        [
            'label' => esc_html__ ('Rotate', 'shopio' ),
            'type' => Controls_Manager::SLIDER,
            'size_units' => [ 'deg' ],
            'default' => [
                'size' => 0,
                'unit' => 'deg',
            ],
            'tablet_default' => [
                'unit' => 'deg',
            ],
            'mobile_default' => [
                'unit' => 'deg',
            ],
            'selectors' => [
                '{{WRAPPER}} .elementor-icon-list-icon' => 'transform: rotate({{SIZE}}{{UNIT}});',
            ],
        ]
    );
}, 10, 2 );

add_action( 'elementor/element/icon-list/section_icon/before_section_end', function ( $element, $args ) {

    $element->add_control(
        'icon_style_theme',
        [
            'label' => esc_html__('Theme Style', 'shopio'),
            'type' => Controls_Manager::SWITCHER,
            'default' => '',
            'prefix_class' => 'icon-list-style-shopio-',
        ]
    );

}, 10, 2 );
