<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_mailchimp',
        'title' => esc_html__('Mailchimp Pxl', 'fixera'),
        'icon' => 'eicon-email-field',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('General', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-none' => 'None',
                                'style-default' => 'Default',
                                'style-button-classic' => 'Classic',
                                'style-button-icon' => 'Button Icon',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Text Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp, {{WRAPPER}} .pxl-mailchimp .mc4wp-form-terms' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'h_width',
                            'label' => esc_html__( 'Max Width', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px', '%' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp .mc4wp-form' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
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
                                '{{WRAPPER}} .pxl-mailchimp' => 'text-align: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_email',
                    'label' => esc_html__('Email', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'mail_typography',
                            'label' => esc_html__('Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-mailchimp [type="email"]',
                        ),
                        array(
                            'name' => 'email_color',
                            'label' => esc_html__('Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'email_bg_color',
                            'label' => esc_html__('Background Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name'         => 'email_box_shadow',
                            'label' => esc_html__( 'Box Shadow', 'fixera' ),
                            'type'         => \Elementor\Group_Control_Box_Shadow::get_type(),
                            'control_type' => 'group',
                            'selector'     => '{{WRAPPER}} .pxl-mailchimp [type="email"]'
                        ),
                        array(
                            'name' => 'email_height',
                            'label' => esc_html__('Height', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'height: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'email_padding',
                            'label' => esc_html__('Padding', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'email_border_radius',
                            'label' => esc_html__('Border Radius', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'border_type',
                            'label' => esc_html__( 'Border Type', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => esc_html__( 'None', 'fixera' ),
                                'solid' => esc_html__( 'Solid', 'fixera' ),
                                'double' => esc_html__( 'Double', 'fixera' ),
                                'dotted' => esc_html__( 'Dotted', 'fixera' ),
                                'dashed' => esc_html__( 'Dashed', 'fixera' ),
                                'groove' => esc_html__( 'Groove', 'fixera' ),
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'border_type!' => '',
                                'style' => ['style-none','style-default','style-button-classic'],
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'style' => ['style-none', 'style-default', 'style-button-classic'],
                                'border_type!' => '',
                            ],
                        ),
                        array(
                            'name' => 'email_bottom_spacer',
                            'label' => esc_html__('Bottom Spacer', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="email"]' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => ['style-none'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'submit_typography',
                            'label' => esc_html__('Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-mailchimp [type="submit"]',
                        ),
                        array(
                            'name' => 'submit_color',
                            'label' => esc_html__('Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'submit_bgcolor',
                            'label' => esc_html__('Background Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]' => 'background-color: {{VALUE}};background-image: none;',
                            ],
                            'condition' => [
                                'style' => ['style-none', 'style-button-classic'],
                            ],
                        ),
                        array(
                            'name' => 'submit_color_hover',
                            'label' => esc_html__('Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'submit_bgcolor_hover',
                            'label' => esc_html__('Background Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]:hover' => 'background-color: {{VALUE}};background-image: none;',
                            ],
                            'condition' => [
                                'style' => ['style-none', 'style-button-classic'],
                            ],
                        ),
                        array(
                            'name' => 'submit_height',
                            'label' => esc_html__('Height', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]' => 'height: {{SIZE}}{{UNIT}} !important;line-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'submit_padding',
                            'label' => esc_html__('Padding', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'condition' => [
                                'style' => ['style-none','style-default'],
                            ],
                        ),
                        array(
                            'name' => 'submit_border_radius',
                            'label' => esc_html__('Border Radius', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-mailchimp [type="submit"]' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => ['style-none','style-default'],
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name' => 'btn_width',
                            'label' => esc_html__( 'Width', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'btn-w-auto' => 'Auto',
                                'btn-w-full' => '100%',
                            ],
                            'default' => 'btn-w-auto',
                        ),
                    ),
                ),
                fixera_widget_animation_settings(),
            ),
        ),
    ),
    fixera_get_class_widget_path()
);