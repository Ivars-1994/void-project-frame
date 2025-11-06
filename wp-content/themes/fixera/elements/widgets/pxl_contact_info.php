<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_contact_info',
        'title' => esc_html__('Contact Info Pxl', 'fixera'),
        'icon' => 'eicon-alert',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_title_box',
                    'label' => esc_html__('Title Box', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title_box',
                            'label' => esc_html__('Title Box', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 2,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'title_tag',
                            'label' => esc_html__('HTML Tag', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'h1' => 'H1',
                                'h2' => 'H2',
                                'h3' => 'H3',
                                'h4' => 'H4',
                                'h5' => 'H5',
                                'h6' => 'H6',
                                'div' => 'div',
                                'span' => 'span',
                                'p' => 'p',
                            ],
                            'default' => 'h3',
                        ),
                        array(
                          'name' => 'align',
                            'label' => esc_html__( 'Alignment', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__( 'Left', 'fixera' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__( 'Center', 'fixera' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__( 'Right', 'fixera' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                                'justify' => [
                                    'title' => esc_html__( 'Justified', 'fixera' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-title-box' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-title-box' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bg_title_color',
                            'label' => esc_html__('Background Title Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-title-box' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_padding',
                            'label' => esc_html__('Title Padding', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-title-box' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_adress',
                    'label' => esc_html__('Adress Box', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'adress_text',
                            'label' => esc_html__('Adress Title', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ), 
                        array(
                            'name' => 'adress_content',
                            'label' => esc_html__('Adress Cotnent', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 2,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'adress_link',
                            'label' => esc_html__('Adress Link', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'address_typography',
                            'label' => esc_html__('Content Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-adress-content',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Row Info', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'row_title_text',
                            'label' => esc_html__('Title Info', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'row_info',
                            'label' => esc_html__('Row Info', 'fixera'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'fixera'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'fixera'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'fixera' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_time',
                    'label' => esc_html__('Opening Hour', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'time_title',
                            'label' => esc_html__('Time Title', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ), 
                        array(
                            'name' => 'time_content',
                            'label' => esc_html__('Time Cotnent', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 2,
                            'label_block' => true,
                        ),
                    ),
                ),
                array(
                    'name' => 'section_box',
                    'label' => esc_html__('Box Setting', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'label_color',
                            'label' => esc_html__( 'Label Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .pxl-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'label_typography',
                            'label' => esc_html__('Label Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-title',
                        ),
                        array(
                            'name' => 'row_color',
                            'label' => esc_html__( 'Info Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info ul li, {{WRAPPER}} .pxl-contact-info ul li a, {{WRAPPER}} .pxl-contact-info .pxl-adress-content, {{WRAPPER}} .pxl-contact-info .pxl-time-content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'line_box_color',
                            'label' => esc_html__('Line Box Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .inner-box > div' => 'border-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bottom_spacer',
                            'label' => esc_html__( 'Line Botton Spacer', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .inner-box > div' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-contact-info .inner-box > div' => 'padding-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'box_bg_color',
                            'label' => esc_html__('Background Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .inner-box' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'box_border_radius',
                            'label' => esc_html__('Border Radius', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name'         => 'box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'fixera' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-contact-info',
                        ),

                        array(
                            'name' => 'top_bottom_spacer',
                            'label' => esc_html__( 'Top & Botton Box Spacer', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-contact-info .inner-box' => 'padding-top: {{SIZE}}{{UNIT}}; padding-bottom: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                fixera_widget_animation_settings()
            ),
        ),
    ),
    fixera_get_class_widget_path()
);