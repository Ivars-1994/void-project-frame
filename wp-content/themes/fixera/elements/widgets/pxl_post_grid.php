<?php
$pt_supports = ['post', 'service', 'case'];
pxl_add_custom_widget(
    array(
        'name' => 'pxl_post_grid',
        'title' => esc_html__('Post Grid Pxl', 'fixera' ),
        'icon' => 'eicon-posts-grid',
        'categories' => array('pxltheme-core'),
        'scripts' => [
            'imagesloaded',
            'isotope',
            'pxl-post-grid',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'tab_layout',
                    'label'    => esc_html__( 'Layout', 'fixera' ),
                    'tab'      => 'layout',
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'post_type',
                                'label'    => esc_html__( 'Select Post Type', 'fixera' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => fixera_get_post_type_options($pt_supports),
                                'default'  => 'post'
                            ) 
                        ),
                        fixera_get_post_grid_layout($pt_supports)
                    ),
                ),
                array(
                    'name' => 'tab_source',
                    'label' => esc_html__('Source', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array_merge(
                        array(
                            array(
                                'name'     => 'select_post_by',
                                'label'    => esc_html__( 'Select posts by', 'fixera' ),
                                'type'     => 'select',
                                'multiple' => true,
                                'options'  => [
                                    'term_selected' => esc_html__( 'Terms selected', 'fixera' ),
                                    'post_selected' => esc_html__( 'Posts selected ', 'fixera' ),
                                ],
                                'default'  => 'term_selected'
                            ) 
                        ),
                        fixera_get_grid_term_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'term_selected']]),
                        fixera_get_grid_ids_by_post_type($pt_supports, ['custom_condition' => ['select_post_by' => 'post_selected']]),
                        array(
                            array(
                                'name' => 'orderby',
                                'label' => esc_html__('Order By', 'fixera' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'date',
                                'options' => [
                                    'date' => esc_html__('Date', 'fixera' ),
                                    'ID' => esc_html__('ID', 'fixera' ),
                                    'author' => esc_html__('Author', 'fixera' ),
                                    'title' => esc_html__('Title', 'fixera' ),
                                    'rand' => esc_html__('Random', 'fixera' ),
                                ],
                            ),
                            array(
                                'name' => 'order',
                                'label' => esc_html__('Sort Order', 'fixera' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'default' => 'desc',
                                'options' => [
                                    'desc' => esc_html__('Descending', 'fixera' ),
                                    'asc' => esc_html__('Ascending', 'fixera' ),
                                ],
                            ),
                            array(
                                'name' => 'limit',
                                'label' => esc_html__('Total items', 'fixera' ),
                                'type' => \Elementor\Controls_Manager::NUMBER,
                                'default' => '6',
                            ),
                        )
                    ),
                ),
                array(
                    'name' => 'section_box_contact',
                    'label' => esc_html__('Box Contact', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'condition' => [
                        'post_type' => ['package'],
                        'layout_package' => 'package-1',
                    ],
                    'controls' => array(
                        array(
                            'name' => 'box_contact',
                            'label' => esc_html__('On/Off', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'on' => esc_html__( 'On', 'fixera' ),
                                'off' => esc_html__( 'Off', 'fixera' ),
                            ],
                            'default' => 'off',
                        ),
                        array(
                            'name' => 'banner_image',
                            'label' => esc_html__('Image Background', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'box_contact' => 'on',
                            ],
                        ),
                        array(
                            'name' => 'phone_title',
                            'label' => esc_html__('Phone Title', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 3,
                            'condition' => [
                                'box_contact' => 'on',
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-item-box-title' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'box_contact' => 'on',
                            ],
                        ),
                        array(
                            'name' => 'phone_label',
                            'label' => esc_html__('Label', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'box_contact' => 'on',
                            ],
                        ),
                        array(
                            'name' => 'phone_text',
                            'label' => esc_html__('Phone Text', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'box_contact' => 'on',
                            ],
                        ),
                        array(
                            'name' => 'phone_link',
                            'label' => esc_html__('Phone Link', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition' => [
                                'box_contact' => 'on',
                            ],
                        ),
                        array(
                            'name' => 'box_height',
                            'label' => esc_html__( 'Box Height', 'fixera' ),
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
                                '{{WRAPPER}} .item-box-contact .pxl-item--inner' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'box_contact' => 'on',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_grid',
                    'label' => esc_html__('Grid', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).',
                        ),
                        array(
                            'name' => 'pxl_animate',
                            'label' => esc_html__('Case Animate', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => fixera_widget_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'filter',
                            'label' => esc_html__('Filter on Masonry', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'true' => esc_html__('Enable', 'fixera' ),
                                'false' => esc_html__('Disable', 'fixera' ),
                            ],
                            'condition' => [
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'filter_default_title',
                            'label' => esc_html__('Filter Default Title', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => esc_html__('All', 'fixera' ),
                            'condition' => [
                                'filter' => 'true',
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                          'name' => 'filter_alignment',
                            'label' => esc_html__( 'Filter Alignment', 'fixera' ),
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
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid .pxl-grid-filter' => 'text-align: {{VALUE}};',
                            ],
                            'condition' => [
                                'filter' => 'true',
                                'select_post_by' => 'term_selected',
                            ],
                        ),
                        array(
                            'name' => 'icon_filter',
                            'label' => esc_html__('Filter Icon', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'icon-hidden',
                            'options' => [
                                'icon-on'     => esc_html__('Enable', 'fixera' ),
                                'icon-hidden' => esc_html__('Disable', 'fixera' ),
                            ],
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'filter_color',
                            'label' => esc_html__('Filter Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--filter-inner .filter-item' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'filter_color_hv',
                            'label' => esc_html__('Filter Hover Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--filter-inner .filter-item:hover, {{WRAPPER}} .pxl--filter-inner .filter-item.active, {{WRAPPER}} .pxl--filter-inner .filter-item:focus' => 'color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'bg_filter_color',
                            'label' => esc_html__('Filter Hover Background Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl--filter-inner .filter-item:hover::before, {{WRAPPER}} .pxl--filter-inner .filter-item.active::before, {{WRAPPER}} .pxl--filter-inner .filter-item:focus::before' => 'background-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'filter_typography',
                            'label' => esc_html__('Filter Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-grid-filter .filter-item',
                            'condition' => [
                                'filter' => 'true',
                            ],
                        ),
                        array(
                            'name' => 'pagination_type',
                            'label' => esc_html__('Pagination Type', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'false',
                            'options' => [
                                'pagination' => esc_html__('Pagination', 'fixera' ),
                                'loadmore' => esc_html__('Loadmore', 'fixera' ),
                                'false' => esc_html__('Disable', 'fixera' ),
                            ],
                        ),
                        array(
                          'name' => 'pagination_alignment',
                            'label' => esc_html__( 'Filter Alignment', 'fixera' ),
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
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-pagination-wrap .pxl-pagination-links' => 'justify-content: {{VALUE}};',
                            ],
                            'condition' => [
                                'pagination_type' => [ 'pagination', 'loadmore' ],
                            ],
                        ),
                        array(
                            'name' => 'pagination_style',
                            'label' => esc_html__('Pagination Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'pxl-pagination-style1',
                            'options' => [
                                'pxl-pagination-style1' => 'Style 1',
                                'pxl-pagination-style2' => 'Style 2',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'pagination_type', 'operator' => '==', 'value' => 'pagination'],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'item_padding',
                            'label' => esc_html__('Item Padding', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px' ],
                            'default' => [
                                'top' => '15',
                                'right' => '15',
                                'bottom' => '15',
                                'left' => '15'
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid-inner' => 'margin-top: -{{TOP}}{{UNIT}}; margin-right: -{{RIGHT}}{{UNIT}}; margin-bottom: -{{BOTTOM}}{{UNIT}}; margin-left: -{{LEFT}}{{UNIT}};',
                                '{{WRAPPER}} .pxl-grid-inner .pxl-grid-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                            'control_type' => 'responsive',
                        ),
                        array(
                            'name'         => 'gap_extra',
                            'label'        => esc_html__( 'Item Gap Bottom', 'fixera' ),
                            'description'  => esc_html__( 'Add extra space at bottom of each items','fixera'),
                            'type'         => \Elementor\Controls_Manager::NUMBER,
                            'default'      => 0,
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-grid-inner .pxl-grid-item' => 'margin-bottom: {{VALUE}}px;',
                            ],
                        ),
                        array(
                            'name' => 'layout_mode',
                            'label' => esc_html__('Layout Mode', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'masonry',
                            'options' => [
                                'fitRows' => esc_html__('Fit Rows(Default)', 'fixera' ),
                                'masonry' => esc_html__('Masonry', 'fixera' ),
                            ],
                        ),
                        array(
                            'name' => 'col_xs',
                            'label' => esc_html__('Columns XS Devices', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '1',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_sm',
                            'label' => esc_html__('Columns SM Devices', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '2',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_md',
                            'label' => esc_html__('Columns MD Devices', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_lg',
                            'label' => esc_html__('Columns LG Devices', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'col_xl',
                            'label' => esc_html__('Columns XL Devices', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '3',
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                            ],
                        ),
                        array(
                            'name' => 'grid_masonry',
                            'label' => esc_html__('Grid Masonry', 'fixera'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'col_xs_m',
                                    'label' => esc_html__('Columns XS Devices', 'fixera' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '1',
                                    'options' => [
                                        '1' => '1',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_sm_m',
                                    'label' => esc_html__('Columns SM Devices', 'fixera' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '2',
                                    'options' => [
                                        '1' => '1',
                                        '1.5' => '2/3',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_md_m',
                                    'label' => esc_html__('Columns MD Devices', 'fixera' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '1.5' => '2/3',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_lg_m',
                                    'label' => esc_html__('Columns LG Devices', 'fixera' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '1.5' => '2/3',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'col_xl_m',
                                    'label' => esc_html__('Columns XL Devices', 'fixera' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '3',
                                    'options' => [
                                        '1' => '1',
                                        '1.5' => '2/3',
                                        '2' => '2',
                                        '3' => '3',
                                        '4' => '4',
                                        '6' => '6',
                                    ],
                                ),
                                array(
                                    'name' => 'img_size_m',
                                    'label' => esc_html__( 'Image Size', 'fixera' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'description' => esc_html__( 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Default: 370x300 (Width x Height)).', 'fixera' ),
                                ),
                            ),
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_display',
                    'label' => esc_html__('Display', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
                    'controls' => array(
                        array(
                            'name' => 'show_category',
                            'label' => esc_html__('Show Category', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => [ 'service-1' ]]
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'show_date',
                            'label' => esc_html__('Show Date', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => ['post_type' => 'post']
                        ),
                        array(
                            'name' => 'show_author',
                            'label' => esc_html__('Show Author', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'condition' => ['post_type' => 'post']
                        ),
                        
                        array(
                            'name' => 'show_button',
                            'label' => esc_html__('Show Button Readmore', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']]
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1', 'service-2']]
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'button_text',
                            'label' => esc_html__('Button Text', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                                            ['name' => 'show_button', 'operator' => '==', 'value' => 'true']
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'show_excerpt',
                            'label' => esc_html__('Show Excerpt', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => 'true',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => [ 'post-1' ] ],
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1', 'service-2', 'service-3']]
                                        ],
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'num_words',
                            'label' => esc_html__('Number of Words', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 35,
                            'separator' => 'after',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1']],
                                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1', 'service-2']],
                                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'style_box',
                            'label' => esc_html__('Item Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'item-style1' => 'Style1',
                                'item-style2' => 'Style2',
                                'item-style3' => 'Style3',
                            ],
                            'default' => 'item-style1',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'style_box_case',
                            'label' => esc_html__('Item Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'item-style1' => 'Style1',
                                'item-style2' => 'Style2',
                            ],
                            'default' => 'item-style1',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'case'],
                                            ['name' => 'layout_case', 'operator' => 'in', 'value' => ['case-1']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'color_type',
                            'label' => esc_html__('Color Type', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'item-normal' => 'Normal',
                                'item-gradient' => 'Gradient',
                            ],
                            'default' => 'item-normal',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1', 'service-2']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_title',
                    'label' => esc_html__('Style', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'post_title_typography',
                            'label' => esc_html__('Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-grid .pxl-item--title',
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'post'],
                                            ['name' => 'layout_post', 'operator' => 'in', 'value' => ['post-1', 'post-2']],
                                            ['name' => 'show_excerpt', 'operator' => '==', 'value' => 'true']
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1', 'service-2']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'line_color',
                            'label' => esc_html__('Bg Line Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .item--meta > svg' => 'fill: {{VALUE}};',
                            ],
                            'condition' => [
                                'post_type' => ['case'],
                                'layout_case' => 'case-1',
                            ],
                        ),
                        array(
                            'name' => 'bg_meta_style',
                            'label' => esc_html__('Background Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'bg-default' => esc_html__('Default', 'fixera' ),
                                'bg-meta-gradient' => esc_html__('Gradient', 'fixera' ),
                            ],
                            'default' => 'bg-default',
                            'condition' => [
                                'post_type' => ['case'],
                                'layout_case' => 'case-1',
                            ],
                        ),
                        array(
                            'name' => 'bg_meta_color',
                            'label' => esc_html__('Bg Meta Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .item--meta:after' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'post_type' => ['case'],
                                'layout_case' => 'case-1',
                                'bg_meta_style'=> 'bg-default',
                            ],
                        ),
                        array(
                            'name' => 'button_color',
                            'label' => esc_html__('Arrow Button Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .item--meta .btn-link svg' => 'fill: {{VALUE}};',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']],
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'case'],
                                            ['name' => 'layout_case', 'operator' => 'in', 'value' => ['case-1']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                        array(
                            'name' => 'bg_button_color',
                            'label' => esc_html__('Background Button', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .item--meta .btn-link' => 'background-color: {{VALUE}};',
                            ],
                            'conditions' => [
                                'relation' => 'or',
                                'terms' => [
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'service'],
                                            ['name' => 'layout_service', 'operator' => 'in', 'value' => ['service-1']],
                                        ]
                                    ],
                                    [
                                        'terms' => [
                                            ['name' => 'post_type', 'operator' => '==', 'value' => 'case'],
                                            ['name' => 'layout_case', 'operator' => 'in', 'value' => ['case-1']],
                                        ]
                                    ],
                                ],
                            ]
                        ),
                    ),
                ),
            ),
        ),
    ),
    fixera_get_class_widget_path()
);