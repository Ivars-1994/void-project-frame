<?php
pxl_add_custom_widget(
    array(
        'name'       => 'pxl_horizontal_scroll',
        'title'      => esc_html__( 'Horizontal Scroll Pxl', 'fixera' ),
        'icon'       => 'eicon-slider-push',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name'     => 'layout_section',
                    'label'    => esc_html__( 'Layout', 'fixera' ),
                    'tab'      => 'layout',
                    'controls' => array(
                        array(
                            'name'    => 'layout',
                            'label'   => esc_html__( 'Layout', 'fixera' ),
                            'type'    => 'layoutcontrol',
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__( 'Layout 1', 'fixera' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_horizontal_scroll/img-layout/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__( 'Layout 2', 'fixera' ),
                                    'image' => get_template_directory_uri() . '/elements/templates/pxl_horizontal_scroll/img-layout/layout2.jpg'
                                ],
                            ],
                        ),
                    )
                ),
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'fixera' ),
                    'tab' => 'content',
                    'controls' => array(
                        array(
                            'name' => 'revesal',
                            'label' => esc_html__('Revesal Scroll', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition'   => ['layout' => '1']
                        ),
                        array(
                            'name'        => 'title',
                            'label'       => esc_html__( 'Title', 'fixera' ),
                            'type'        => 'textarea',
                            'label_block' => true,
                            'condition'   => ['layout' => '2']
                        ),
                        array(
                            'name'        => 'img_gallery',
                            'label'       => esc_html__( 'Gallery', 'fixera' ),
                            'type'        => 'gallery',
                            'label_block' => true,
                            'condition'   => ['layout' => '1']
                        ),
                    ),
                ),
                   
            ),
        ),
    ),
    fixera_get_class_widget_path()
);