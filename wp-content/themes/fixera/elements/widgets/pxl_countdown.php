<?php
//Register Counter Widget
 pxl_add_custom_widget(
    array(
        'name'       => 'pxl_countdown',
        'title'      => esc_html__('Countdown Pxl', 'fixera'),
        'icon' => 'eicon-countdown',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'fixera' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'         => 'layout',
                            'label'        => esc_html__( 'Templates', 'fixera' ),
                            'type'         => 'layoutcontrol',
                            'default'      => '1',
                            'options'      => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'fixera' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_countdown/img-layout/layout1.jpg'
                                ],
                            ],
                            'prefix_class' => 'pxl-counter-layout',
                        ), 
                        array(
                            'name' => 'box_style',
                            'label' => esc_html__('Box Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style-1',
                            'options' => [
                                'style-1' => esc_html__('Style-1', 'fixera' ),
                                'style-2' => esc_html__('Style-2', 'fixera' ),
                            ],
                        )
                    ),
                ),
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Time to', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'time_to',
                            'label' => esc_html__('Enter the time', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DATE_TIME,
                            'picker_options' => array(
                                'dateFormat' => 'm/d/Y',
                            ), 
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_number',
                    'label' => esc_html__('Countdown Number', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'number_typography',
                            'label' => esc_html__('Number Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-countdown .pxl-countdown-container .inner-number',
                        ),
                        array(
                            'name' => 'number_color',
                            'label' => esc_html__('Number Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown .pxl-countdown-container .inner-number' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_text',
                    'label' => esc_html__('Countdown Text', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'text_typography',
                            'label' => esc_html__('Text Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-countdown .pxl-countdown-container .inner-text',
                        ),
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Text Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-countdown .pxl-countdown-container .inner-text' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            )
        )
    ),
    fixera_get_class_widget_path()
);