<?php
// Register Icon Box Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_phone',
        'title' => esc_html__('Phone Call Pxl', 'fixera' ),
        'icon' => 'eicon-headphones',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'fixera' ),
                            'type' => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'fixera' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_phone/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'fixera' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_phone/img-layout/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'fixera' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_phone/img-layout/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'fixera' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_phone/img-layout/layout4.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                        ),
                        array(
                            'name' => 'pxl_icon',
                            'label' => esc_html__('Icon', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'icon_type' => 'image',
                            ],
                        ),
                        array(
                            'name' => 'phone_label',
                            'label' => esc_html__('Label', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 2,
                            'label_block' => true,
                            'condition' => [
                                'layout!' => '4',
                            ],
                        ),
                        array(
                            'name' => 'phone_text',
                            'label' => esc_html__('Phone Text', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 3,
                            'show_label' => false,
                            'condition' => [
                                'layout!' => '4',
                            ],
                        ),
                        array(
                            'name' => 'phone_link',
                            'label' => esc_html__('Phone Link', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'style_box',
                            'label' => esc_html__('Display Meta', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style-1',
                            'options' => [
                                'style-1' => esc_html__('Normal(Default)', 'fixera' ),
                                'style-2' => esc_html__('Hidden Meta on small Screen', 'fixera' ),
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'style_box3',
                            'label' => esc_html__('Display Meta', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style-1',
                            'options' => [
                                'style-1' => esc_html__('Border Box', 'fixera' ),
                                'style-2' => esc_html__('Square Box', 'fixera' ),
                            ],
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_icon',
                    'label' => esc_html__('Icon', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-phone-call .pxl-item--icon i' => 'color: {{VALUE}};text-fill-color: {{VALUE}};-webkit-text-fill-color: {{VALUE}};background-image: none;',
                                '{{WRAPPER}} .pxl-phone-call .pxl-item--icon svg path' => 'stroke: {{VALUE}}',
                            ],
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
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
                                '{{WRAPPER}} .pxl-phone-call .pxl-item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_img_max_height',
                            'label' => esc_html__('Icon Image Max Height', 'fixera' ),
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
                                '{{WRAPPER}} .pxl-phone-call .pxl-item--icon img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_type' => 'image',
                            ],
                        ),
                        array(
                            'name' => 'style_icon',
                            'label' => esc_html__('Icon Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'icon-gradient',
                            'options' => [
                                'icon-default' => esc_html__('Default', 'fixera' ),
                                'icon-gradient' => esc_html__('Gradient Box', 'fixera' ),
                            ],
                        ),
                        array(
                            'name' => 'bg_icon_color',
                            'label' => esc_html__('Background Icon', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner .pxl-item--icon' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'icon_type' => 'icon',
                                'style_icon' => 'icon-default',
                                'layout' => ['1', '2', '3'],
                            ],
                        ),
                        array(
                            'name' => 'bg_content_color',
                            'label' => esc_html__('Background Content', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--inner' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_title',
                    'label' => esc_html__('Label', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'label_color',
                            'label' => esc_html__('Label Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-phone-call .pxl-label' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'label_typography',
                            'label' => esc_html__('Title Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-phone-call .pxl-label',
                        ),
                        array(
                            'name' => 'title_bottom_spacer',
                            'label' => esc_html__('Bottom Spacer', 'fixera' ),
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
                                '{{WRAPPER}} .pxl-phone-call .pxl-label' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_desc',
                    'label' => esc_html__('Number Phone', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'phone_color',
                            'label' => esc_html__('Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-phone-call .pxl-item--phone' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'phone_typography',
                            'label' => esc_html__('Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-phone-call .pxl-item--phone',
                        ),
                        array(
                            'name' => 'line_color',
                            'label' => esc_html__('Divider Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' =>[
                                '{{WRAPPER}} .pxl-phone-call .pxl-item--phone::after' => 'background-color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_box',
                    'label' => esc_html__('Box Style', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'condition' => [
                        'layout' => ['2'],
                    ],
                    'controls' => array(
                        array(
                            'name' => 'style_box_bg',
                            'label' => esc_html__('Background Box Extra', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'bg-box-off',
                            'options' => [
                                'bg-box-off' => esc_html__('Off', 'fixera' ),
                                'bg-box-on' => esc_html__('On', 'fixera' ),
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