<?php
// Register Video Player Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_showcase',
        'title' => esc_html__('Showcase Pxl', 'fixera' ),
        'icon' => 'eicon-image',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_showcase/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'fixera' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_showcase/img-layout/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'item_display',
                            'label' => esc_html__('Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'item-normarl' => 'Normarl',
                                'item-comingsoon' => 'Coming Soon',
                            ],
                            'default' => 'item-normarl',
                        ),
                        array(
                            'name' => 'image_bg',
                            'label' => esc_html__('Background Image', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => array('2'),
                                'item_display'=> ['item-normarl'],
                            ],
                        ),
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Feature Image', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'sub_label',
                            'label' => esc_html__('Sub Title', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'label_block' => true,
                            'rows' => 2,
                            'condition' => [
                                'layout' => array('2'),
                                'item_display'=> ['item-normarl'],
                            ],
                        ),
                        array(
                            'name' => 'image_link',
                            'label' => esc_html__('Link', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'fixera' ),
                            'condition' => [
                                'item_display'=> ['item-normarl'],
                            ],
                        ),
                        array(
                            'name' => 'btn_text1',
                            'label' => esc_html__('Button Text 1', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'item_display'=> ['item-normarl'],
                            ],
                        ),
                        array(
                            'name' => 'link',
                            'label' => esc_html__('Link 1', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'fixera' ),
                            'condition' => [
                                'item_display'=> ['item-normarl'],
                            ],
                        ),
                        array(
                            'name' => 'btn_text2',
                            'label' => esc_html__('Button Text 2', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'item_display'=> ['item-normarl'],
                            ],
                        ),
                        array(
                            'name' => 'link2',
                            'label' => esc_html__('Link 2', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'placeholder' => esc_html__('https://your-link.com', 'fixera' ),
                            'condition' => [
                                'item_display'=> ['item-normarl'],
                            ],
                        ),                        
                        array(
                            'name' => 'notification',
                            'label' => esc_html__('Show Notification', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'false',
                            'condition' => [
                                'item_display'=> ['item-normarl'],
                            ],
                        ),
                        array(
                            'name' => 'notification_label',
                            'label' => esc_html__('Notification Text', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'notification' => 'true',
                                'item_display'=> ['item-normarl'],
                            ],
                        ),
                        array(
                            'name' => 'notification_color',
                            'label' => esc_html__('Notification Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .item-title .notification' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'notification' => 'true',
                                'item_display'=> ['item-normarl'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Title Style', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-showcase .item-title a, {{WRAPPER}} .pxl-showcase .item-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Tile Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-showcase .item-title',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_button',
                    'label' => esc_html__('Button Style', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__( 'Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item-links a',
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .inner-box .pxl-item-links a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Background Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .inner-box .pxl-item-links a, {{WRAPPER}} .pxl-showcase .notification' => 'background-color: {{VALUE}}!important;',
                                '{{WRAPPER}} .pxl-showcase .item-title cite' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .inner-box .pxl-item-links a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Background Color Hover', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .inner-box .pxl-item-links a:hover' => 'background-color: {{VALUE}}!important;',
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