<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_box_list',
        'title' => esc_html__('Icon Box List Pxl', 'fixera'),
        'icon' => 'eicon-alert',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid'
        ],
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_icon_box_list/img-layout/layout1.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'list',
                            'label' => esc_html__('Item', 'fixera'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'pxl_icon',
                                    'label' => esc_html__('Icon', 'fixera' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Name', 'fixera'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'excerpt',
                                    'label' => esc_html__('Excerpt', 'fixera'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-boxlist-item .pxl-item--title a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-boxlist-item .pxl-item--title',
                        ),
                        array(
                            'name' => 'des_color',
                            'label' => esc_html__('Description Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-boxlist-item .pxl-item--excerpt' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'deg_typography',
                            'label' => esc_html__('Description Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-boxlist-item .pxl-item--excerpt',
                        ),
                        array(
                            'name' => 'item_active',
                            'label' => esc_html__('Item Active', 'fixera'),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 2,
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Pxl Animate', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => fixera_widget_animate(),
                            'default' => '',
                        ),
                    ),
                ),
            ),
        ),
    ),
    fixera_get_class_widget_path()
);