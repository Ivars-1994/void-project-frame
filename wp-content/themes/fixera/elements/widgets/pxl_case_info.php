<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_case_info',
        'title' => esc_html__('Case Info PXL', 'fixera' ),
        'icon' => 'eicon-post-content',
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
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_case_info/img-layout/layout1.jpg'
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
                            'name' => 'title',
                            'label' => esc_html__('Title', 'fixera' ),
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
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-item--title',
                        ),
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
                                    'type'     => 'text',
                                    'label_block' => true,
                                    'default'  => ''
                                ),
                            ),
                            'title_field' => '{{{ item_label }}}',
                        ),
                    )
                ),  
            ),
        ),
    ),
    fixera_get_class_widget_path()
);