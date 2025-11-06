<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_arrow_carousel',
        'title' => esc_html__('Nav Carousel Pxl', 'fixera'),
        'icon' => 'eicon-animation',
        'categories' => array('pxltheme-core'),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-1' => 'Style 1',
                                'style-2' => 'Style 2',
                                'style-3' => 'Style 3',
                            ],
                            'default' => 'style-1',
                        ),
                        array(
                            'name' => 'arrow_color',
                            'label' => esc_html__( 'Arrow Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-arrow i' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bg_arrow_color',
                            'label' => esc_html__('Background Arrow Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow:before' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_arrow_color',
                            'label' => esc_html__( 'Border Arrow Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'arrow_color_hv',
                            'label' => esc_html__( 'Arrow Hover Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-arrow:hover i' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'bg_arrow_hover',
                            'label' => esc_html__('Background Arrow Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow:hover:after' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_arrow_color_hv',
                            'label' => esc_html__( 'Border Arrow Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow:hover' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    fixera_get_class_widget_path()
);