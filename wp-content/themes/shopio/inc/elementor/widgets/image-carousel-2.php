<?php

use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Shopio_Image_Carousel_2 extends Elementor\Widget_Base
{

    public function get_name()
    {
        return 'shopio-image-carousel-2';
    }

    public function get_title()
    {
        return __('Shopio Image Carousel 2', 'shopio');
    }

    public function get_icon()
    {
        return 'eicon-slider-push';
    }

    public function get_script_depends() {
        return [ 'shopio-elementor-image-carousel-2', 'slick' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'section_image_content',
            [
                'label' => __( 'Image', 'shopio' ),
            ]
        );

        $this->add_control(
            'carousel',
            [
                'label' => __( 'Add Images', 'shopio' ),
                'type' => Controls_Manager::GALLERY,
                'default' => [],
                'show_label' => false,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $this->add_responsive_control(
            'item_spacing',
            [
                'label' => __('Spacing', 'shopio'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'size_units' => ['px', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .image-wrapper .row' => 'margin-left: calc(-{{SIZE}}{{UNIT}}/2); margin-right: calc(-{{SIZE}}{{UNIT}}/2);',
                    '{{WRAPPER}} .image-wrapper .column-item' => 'padding-left: calc({{SIZE}}{{UNIT}}/2); padding-right: calc({{SIZE}}{{UNIT}}/2); margin-bottom: calc({{SIZE}}{{UNIT}});',
                    '{{WRAPPER}} .image-wrapper img + img' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_responsive_control(
            'column',
            [
                'label' => __('Columns', 'shopio'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => 3,
                'options' => [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6],
            ]
        );

        $this->add_control(
            'enable_carousel',
            [
                'label' => __('Enable', 'shopio'),
                'type'  => Controls_Manager::SWITCHER,
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();

        if ( empty( $settings['carousel'] ) ) {
            return;
        }

        $this->add_render_attribute('row', 'class', 'row');

        if ($settings['enable_carousel'] === 'yes'){
            $this->add_render_attribute('row', 'class', 'shopio-carousel');
            $breakpoints = \Elementor\Plugin::$instance->breakpoints->get_breakpoints();
            $tablet = isset($settings['column_tablet']) ? $settings['column_tablet'] : 2;

            $carousel_settings = array(
                'items'                   => $settings['column'],
                'items_laptop'            => isset($settings['column_laptop']) ? $settings['column_laptop'] : $settings['column'],
                'items_tablet_extra'      => isset($settings['column_tablet_extra']) ? $settings['column_tablet_extra'] : $settings['column'],
                'items_tablet'            => $tablet,
                'items_mobile_extra'      => isset($settings['column_mobile_extra']) ? $settings['column_mobile_extra'] : $tablet,
                'items_mobile'            => isset($settings['column_mobile']) ? $settings['column_mobile'] : 1,
                'breakpoint_laptop'       => $breakpoints['laptop']->get_value(),
                'breakpoint_tablet_extra' => $breakpoints['tablet_extra']->get_value(),
                'breakpoint_tablet'       => $breakpoints['tablet']->get_value(),
                'breakpoint_mobile_extra' => $breakpoints['mobile_extra']->get_value(),
                'breakpoint_mobile'       => $breakpoints['mobile']->get_value(),
                'rtl'                => is_rtl() ? true : false,
            );
            $this->add_render_attribute( 'row', 'data-settings', wp_json_encode( $carousel_settings ) );
        }else {

            if (!empty($settings['column'])) {
                $this->add_render_attribute('row', 'data-elementor-columns', $settings['column']);
            } else {
                $this->add_render_attribute('row', 'data-elementor-columns', 1);
            }

            if (!empty($settings['column_tablet'])) {
                $this->add_render_attribute('row', 'data-elementor-columns-tablet', $settings['column_tablet']);
            } else {
                $this->add_render_attribute('row', 'data-elementor-columns-tablet', 1);
            }

            if (!empty($settings['column_mobile'])) {
                $this->add_render_attribute('row', 'data-elementor-columns-mobile', $settings['column_mobile']);
            } else {
                $this->add_render_attribute('row', 'data-elementor-columns-mobile', 1);
            }
        }

        $item_number = 0;
        $html = '';
        $item_count = count($settings['carousel']);

        foreach ( $settings['carousel'] as $index => $attachment ) {

            if ($item_number%2 == 0){
                $html .= '<div class="column-item">';
                $html .='<img class="image-carousel" src="' . esc_attr( $attachment['url'] ) . '" alt="'.esc_attr($index).'" />';
            }
            else{
                $html .='<img class="image-carousel" src="' . esc_attr( $attachment['url'] ) . '" alt="'.esc_attr($index).'" />';
                $html .='</div>';
            }

            $item_number++;
        }

        if ($item_count%2 == 1){
            $html .= '</div>';
        }

        ?>
     <div class="image-wrapper">
        <div <?php echo shopio_elementor_get_render_attribute_string('row', $this); // WPCS: XSS ok ?>>
         <?php printf('%s', $html); ?>
        </div>
     </div>
<?php

    }

}

$widgets_manager->register(new Shopio_Image_Carousel_2());
