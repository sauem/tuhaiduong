<?php
//Accordion
use Elementor\Controls_Manager;

add_action( 'elementor/element/accordion/section_title_style/before_section_end', function ($element, $args ) {

    $element->add_control(
        'title_margin',
        [
            'label' => esc_html__( 'Margin', 'shopio' ),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => [ 'px', 'em', '%' ],
            'selectors' => [
                '{{WRAPPER}} .elementor-accordion .elementor-accordion-item' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
            ],
        ]
    );

    $element->add_control(
        'style_theme',
        [

            'label' => esc_html__( 'Style Theme', 'shopio' ),
            'type' => Controls_Manager::SELECT,
            'default' => '1',
            'options' => [
                '1' => esc_html__('Layout 1', 'shopio'),
                '2' => esc_html__('Layout 2', 'shopio'),
            ],
            'prefix_class'	=> 'style-theme-shopio-layout-',
        ]
    );

},10,2);
