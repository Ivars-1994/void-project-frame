<?php
$templates_df = ['0' => esc_html__('None', 'fixera')];
$templates = $templates_df + fixera_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_group_anchor',
        'title' => esc_html__('Group Anchor Pxl', 'fixera' ),
        'icon' => 'eicon-search',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'search_section',
                    'label' => esc_html__('Search Settings', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 's_display',
                            'label' => esc_html__('Display', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 's-on',
                            'options' => [
                                's-on' => esc_html__('On', 'fixera' ),
                                's-off' => esc_html__('Off', 'fixera' ),
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'phone_section',
                    'label' => esc_html__('Phone Settings', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'phone_label',
                            'label' => esc_html__('label', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'phone_text',
                            'label' => esc_html__('Number', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'phone_link',
                            'label' => esc_html__('Phone Link', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'phone_display',
                            'label' => esc_html__('Display', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'phone-on',
                            'options' => [
                                'phone-on' => esc_html__('On', 'fixera' ),
                                'phone-off' => esc_html__('Off', 'fixera' ),
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'cart_section',
                    'label' => esc_html__('Cart Settings', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'pxl_cart_icon',
                            'label' => esc_html__('Icon', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'cart_display',
                            'label' => esc_html__('Display', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'cart-on',
                            'options' => [
                                'cart-on' => esc_html__('On', 'fixera' ),
                                'cart-off' => esc_html__('Off', 'fixera' ),
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'button_section',
                    'label' => esc_html__('Button Settings', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'text',
                            'label' => esc_html__('Text', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('Click Here', 'fixera'),
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'default' => [
                                'url' => '#',
                            ],
                        ),
                        array(
                            'name' => 'btn_icon',
                            'label' => esc_html__('Icon', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'label_block' => true,
                            'fa4compatibility' => 'icon',
                        ),
                        array(
                            'name' => 'icon_align',
                            'label' => esc_html__('Icon Position', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'right',
                            'options' => [
                                'left' => esc_html__('Before', 'fixera' ),
                                'right' => esc_html__('After', 'fixera' ),
                            ],
                        ),
                        array(
                            'name' => 'btn_display',
                            'label' => esc_html__('Display', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'btn-on',
                            'options' => [
                                'btn-on' => esc_html__('On', 'fixera' ),
                                'btn-off' => esc_html__('Off', 'fixera' ),
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content_hidden',
                    'label' => esc_html__('Hidden Settings', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_template',
                            'label' => esc_html__('Select Template', 'fixera'),
                            'type' => 'select',
                            'options' => $templates,
                            'default' => 'df',
                            'description' => 'Add new tab template: "<a href="' . esc_url( admin_url( 'edit.php?post_type=pxl-template' ) ) . '" target="_blank">Click Here</a>"',
                        ),
                        array(
                            'name' => 'style_hidden',
                            'label' => esc_html__('Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style-1',
                            'options' => [
                                'style-1' => esc_html__('Style1(Default)', 'fixera' ),
                                'style-2' => esc_html__('Style2', 'fixera' ),
                                'style-3' => esc_html__('Style3', 'fixera' ),
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style_hidden' => ['style-1', 'style-2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color_3',
                            'label' => esc_html__('Button Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line i' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style_hidden' => ['style-3'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color_3_hv',
                            'label' => esc_html__('Button Hover Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line i:hover' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style_hidden' => ['style-3'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_search',
                    'label' => esc_html__('Seearch Style', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        's_display' => ['s-on'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'search_icon_color',
                            'label' => esc_html__('Icon Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'search_icon_color_hover',
                            'label' => esc_html__('Icon Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'search_icon_font_size',
                            'label' => esc_html__('Icon Font Size', 'fixera' ),
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
                                '{{WRAPPER}} .pxl-search-popup-button' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style-default' => 'Default',
                                'style-box' => 'Box',
                            ],
                            'default' => 'style-default',
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button.style-box' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['style-box'],
                            ],
                        ),
                        array(
                            'name' => 'box_height',
                            'label' => esc_html__('Box Height', 'fixera' ),
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
                                '{{WRAPPER}} .pxl-search-popup-button.style-box' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => ['style-box'],
                            ],
                        ),
                        array(
                            'name' => 'box_width',
                            'label' => esc_html__('Box Width', 'fixera' ),
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
                                '{{WRAPPER}} .pxl-search-popup-button.style-box' => 'width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => ['style-box'],
                            ],
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
                                '{{WRAPPER}} .pxl-search-popup-button.style-box' => 'border-style: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_width',
                            'label' => esc_html__( 'Border Width', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button.style-box' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'border_color',
                            'label' => esc_html__( 'Border Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button.style-box' => 'border-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'border_radius',
                            'label' => esc_html__('Border Radius', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-search-popup-button.style-box' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style' => ['style-box'],
                            ],
                        ),
                    ),      
                ),
                array(
                    'name' => 'section_style_cart',
                    'label' => esc_html__('Cart Style', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'cart_display' => ['cart-on'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'cart_btn_icon_color',
                            'label' => esc_html__('Icon Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'cart_btn_icon_color_hover',
                            'label' => esc_html__('Icon Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-cart-sidebar-button:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),      
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button Style', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'btn_display' => ['btn-on'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'btn_style',
                            'label' => esc_html__('Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'btn-default' => esc_html__('Default', 'fixera' ),
                                'btn-style2' => esc_html__('Style 2', 'fixera' ),
                                'btn-diagonals' => esc_html__('Diagonals', 'fixera' ),
                                'btn-style4' => esc_html__('Style 4', 'fixera' ),
                                'btn-double-swipe' => esc_html__('Double Swipe', 'fixera' ),
                            ],
                            'default' => 'btn-default',
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__( 'Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-button .btn',
                        ),
                        array(
                            'name' => 'btn_border_radius',
                            'label' => esc_html__('Border Radius', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'condition' => [
                                'btn_style' => [ 'btn-default', 'btn-style2' ],
                            ],
                        ),
                        array(
                            'name' => 'btn_border_type',
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
                                '{{WRAPPER}} .pxl-button .btn' => 'border-style: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default', 'btn-style2'],
                            ],
                        ),
                        array(
                            'name' => 'btn_border_width',
                            'label' => esc_html__( 'Border Width', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-width: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'btn_border_type!' => '',
                                'btn_style' => ['btn-default', 'btn-style2'],
                            ],
                            'responsive' => true,
                        ),
                        array(
                            'name' => 'btn_border_color',
                            'label' => esc_html__( 'Border Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'default' => '',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'border-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'btn_border_type!' => '',
                                'btn_style' => ['btn-default', 'btn-style2'],
                            ],
                        ),
                        array(
                            'name' => 'btn_padding',
                            'label' => esc_html__('Padding', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                            'condition' => [
                                'btn_style' => ['btn-default', 'btn-style2'],
                            ],
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'background-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default', 'btn-style2', 'btn-diagonals', 'btn-style4'],
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_double',
                            'label' => esc_html__('Background Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn::before, {{WRAPPER}} .pxl-button .btn::after' => 'border-bottom-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'btn_style' => [ 'btn-double-swipe' ],
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Background Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn:hover' => 'background-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default'],
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_hover_style2',
                            'label' => esc_html__('Background Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-group-grapper .pxl-button .btn.btn-style2::before' => 'background-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-style2'],
                            ],
                        ),

                        array(
                            'name' => 'btn_bg_hover_style3',
                            'label' => esc_html__('Background Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-group-grapper .pxl-button .btn::before, {{WRAPPER}} .btn::after' => 'background-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'btn_style' => ['btn-diagonals', 'btn-style4'],
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_double_hv',
                            'label' => esc_html__('Background Color hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .btn' => 'background-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'btn_style' => [ 'btn-double-swipe' ],
                            ],
                        ),
                        array(
                            'name' => 'btn_hover_effect',
                            'label' => esc_html__( 'Effect', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__( 'Default', 'fixera' ),
                                'btn-nina' => esc_html__( 'Nina', 'fixera' ),
                            ],
                            'condition' => [
                                'btn_style' => ['btn-default'],
                            ],
                        ),
                        array(
                            'name' => 'btn_icon_font_size',
                            'label' => esc_html__('Font Size', 'fixera' ),
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
                                '{{WRAPPER}} .pxl-button .btn i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_space_left',
                            'label' => esc_html__('Icon Spacer', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 10,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-icon--left i' => 'margin-right: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['left'],
                            ],
                        ),
                        array(
                            'name' => 'icon_space_right',
                            'label' => esc_html__('Icon Spacer', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'default' => [
                                'size' => 10,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-button .pxl-icon--right i' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_align' => ['right'],
                            ],
                        )
                    ),
                ),
                fixera_widget_animation_settings()
            ),
        ),
    ),
    fixera_get_class_widget_path()
);