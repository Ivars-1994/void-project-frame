<?php
$slides_to_show = range( 1, 10 );
$slides_to_show = array_combine( $slides_to_show, $slides_to_show );
$templates = fixera_get_templates_option('slider', []) ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_slider',
        'title' => esc_html__('Slider Pxl ', 'fixera'),
        'icon' => 'eicon-slider-device',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'swiper',
            'pxl-swiper',
            'fixera-swiper-slider',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'slide_height',
                            'label' => esc_html__('Slider Height', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-slider--inner' => 'min-height: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-element-slider .pxl-slider--content, {{WRAPPER}} .pxl-element-slider .pxl-slider--content > .elementor, {{WRAPPER}} .pxl-element-slider .elementor-top-section, {{WRAPPER}} .pxl-element-slider .elementor-top-section > .elementor-container' => 'height: 100%;',
                            ],
                        ),
                        array(
                            'name' => 'slides',
                            'label' => esc_html__('Slides', 'fixera'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'slide_template',
                                    'label' => esc_html__('Select Template', 'fixera'),
                                    'type' => 'select',
                                    'options' => $templates,
                                    'default' => 'df',
                                    'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                                ),
                                array(
                                    'name' => 'bg_color',
                                    'label' => esc_html__('Background Color', 'fixera' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-element-slider .pxl-slider--inner{{CURRENT_ITEM}}' => 'background-color: {{VALUE}};',
                                    ],
                                ),
                                array(
                                    'name' => 'bg_image',
                                    'label' => esc_html__('Background Image', 'fixera' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'bg_ken_burns',
                                    'label' => esc_html__('Background Ken Burns', 'fixera'),
                                    'type' => \Elementor\Controls_Manager::SWITCHER,
                                    'default' => 'false',
                                ),
                                array(
                                    'name' => 'overlay_color',
                                    'label' => esc_html__('Overlay Color', 'fixera' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                    'selectors' => [
                                        '{{WRAPPER}} .pxl-element-slider .pxl-slider--overlay{{CURRENT_ITEM}}' => 'background-color: {{VALUE}};',
                                    ],
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'section_settings_carousel',
                    'label' => esc_html__('Settings', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'arrows',
                            'label' => esc_html__('Show Arrows', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'display_arrow',
                            'label' => esc_html__('Hidden Arrows', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'arrows-show',
                            'options' => [
                                'arrows-show'   => 'Show',
                                'arrows-hidden' => 'Hidden',
                            ],
                            'condition' => [
                                'arrows' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pagination',
                            'label' => esc_html__('Show Pagination', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bullets',
                            'options' => [
                                'bullets' => 'Bullets',
                                'fraction' => 'Fraction',
                            ],
                            'condition' => [
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'fraction_color',
                            'label' => esc_html__('Fraction Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-swiper-sliders .pxl-swiper-dots, {{WRAPPER}} .pxl-swiper-sliders .pxl-swiper-dots span' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => 'fraction',
                                'pagination' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'pause_on_hover',
                            'label' => esc_html__('Pause on Hover', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay',
                            'label' => esc_html__('Autoplay', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'autoplay_speed',
                            'label' => esc_html__('Autoplay Delay', 'fixera'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 5000,
                            'condition' => [
                                'autoplay' => 'true'
                            ]
                        ),
                        array(
                            'name' => 'infinite',
                            'label' => esc_html__('Infinite Loop', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'speed',
                            'label' => esc_html__('Animation Speed', 'fixera'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 500,
                        ),
                        array(
                            'name' => 'progressbar',
                            'label' => esc_html__('Show Progress Bar', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                        ),
                    ),
                ),
            ),
        ),
    ),
    fixera_get_class_widget_path()
);