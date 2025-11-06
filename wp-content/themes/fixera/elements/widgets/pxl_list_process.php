<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_list_process',
        'title' => esc_html__('Process List Pxl', 'fixera' ),
        'icon' => 'eicon-table-of-contents',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_list_process/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'fixera' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_list_process/img-layout/layout2.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name'     => 'content_section',
                    'label'    => esc_html__( 'Content', 'fixera' ),
                    'tab'      => 'content',
                    'controls' => array(
                        array(
                            'name' => 'list',
                            'label' => esc_html__('List Content Extra', 'fixera'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name'     => 'item_label',
                                    'label'    => esc_html__('Item Label', 'fixera'),
                                    'type'     => 'text',
                                    'label_block' => true,
                                    'default'  => ''
                                ),
                                array(
                                    'name'     => 'item_content',
                                    'label'    => esc_html__('Item Content', 'fixera'),
                                    'type'     => 'textarea',
                                    'label_block' => true,
                                    'default'  => ''
                                ),
                            ),
                            'title_field' => '{{{ item_label }}}',
                        ),
                    )
                ),  
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'max_width',
                            'label' => esc_html__( 'Layout Max Width', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__( 'Enter number.', 'fixera' ),
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-process-list .content-inner' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'item_width',
                            'label' => esc_html__( 'Width Type', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'width-item-50' => esc_html__( '50%', 'fixera'),
                                'width-item-100' => esc_html__( '100%', 'fixera'),
                            ],
                            'default' => 'width-item-100',
                        ),
                        array(
                            'name' => 'bg_box_number',
                            'label' => esc_html__('Background Number', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-process-list .item-number' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'number_color',
                            'label' => esc_html__('Number Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-process-list .item-number' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'label_color',
                            'label' => esc_html__('Label Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-process-list label' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'label_typography',
                            'label' => esc_html__('Label Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-process-list label',
                        ),
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Content Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-process-list .item-text' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'link_typography',
                            'label' => esc_html__('Content Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-process-list .item-text',
                        ),
                        array(
                            'name' => 'bottom_spacer',
                            'label' => esc_html__( 'Item Bottom Spacer', 'fixera' ),
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
                                '{{WRAPPER}} .pxl-process-list .content-item + .content-item' => 'margin-top: {{SIZE}}{{UNIT}};',
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