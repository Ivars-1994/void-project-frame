<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_image',
        'title' => esc_html__('Image Pxl', 'fixera' ),
        'icon' => 'eicon-image',
        'categories' => array('pxltheme-core'),
        'scripts' => array(
            'tilt',
            'pxl-tweenmax',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'tab_content',
                    'label' => esc_html__( 'Content', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__( 'Choose Image', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'type_link',
                            'label' => esc_html__('Type Link', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img-link' => esc_html__( 'Image Link', 'fixera' ),
                                'img-lightbox' => esc_html__( 'Lightbox', 'fixera' ),
                            ],
                            'default' => 'img-link',
                        ),
                        array(
                            'name' => 'image_link',
                            'label' => esc_html__( 'Link', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition' => [
                                'type_link' => 'img-link',
                            ],
                        ),
                        array(
                            'name' => 'image_type',
                            'label' => esc_html__('Image Type', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img' => esc_html__( 'Image', 'fixera' ),
                                'bg' => esc_html__( 'Background', 'fixera' ),
                            ],
                            'default' => 'img',
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__( 'Image Size', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => esc_html__('Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).', 'fixera' ),
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'image_align',
                            'label' => esc_html__( 'Image Alignment', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__('Left', 'fixera' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'fixera' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'fixera' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single' => 'text-align: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'tab_style_img',
                    'label' => esc_html__('Image', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'image_max_height',
                            'label' => esc_html__( 'Image Height', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__( 'Enter number.', 'fixera' ),
                            'condition' => [
                                'image_type' => 'img',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_height',
                            'label' => esc_html__('Image Height', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'fixera' ),
                            'condition' => [
                                'image_type' => 'bg',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single .pxl-image-bg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_width',
                            'label' => esc_html__('Image Width', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                '100%' => [
                                    'title' => esc_html__('100%', 'fixera' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                                'auto' => [
                                    'title' => esc_html__('Auto', 'fixera' ),
                                    'icon' => 'eicon-h-align-stretch',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .pxl-image-single img, {{WRAPPER}} .pxl-image-single .pxl-item--inner' => 'width: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'img_effect',
                            'label' => esc_html__( 'Image Effect', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '' => 'None',
                                'pxl-image-effect1' => esc_html__('Zigzag', 'fixera' ),
                                'pxl-image-spin'    => esc_html__('Spin 1', 'fixera' ),
                                'pxl-image-spin2'    => esc_html__('Spin 2', 'fixera' ),
                                'slide-top-to-bottom' => esc_html__('Slide Top To Bottom ', 'fixera' ),
                                'pxl-image-effect2' => esc_html__('Slide Bottom To Top ', 'fixera' ),
                                'slide-right-to-left' => esc_html__('Slide Right To Left ', 'fixera' ),
                                'slide-left-to-right' => esc_html__('Slide Left To Right ', 'fixera' ),
                                'pxl-image-tilt' => 'Tilt',
                                'pxl-image-zoom' => esc_html__('Zoom', 'fixera' ),
                                'zoom-in-small' => esc_html__('Zoom Small', 'fixera' ),
                                'pxl-image-parallax' => 'Parallax Hover',
                                'pxl-parallax-scroll' => 'Parallax Scroll',
                            ],
                            'default' => '',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),

                        array(
                            'name' => 'parallax_scroll_type',
                            'label' => esc_html__('Parallax Scroll Type', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'y' => 'Effect Y',
                                'x' => 'Effect X',
                                'z' => 'Effect Z',
                            ],
                            'default' => 'y',
                            'condition' => [
                                'img_effect' => 'pxl-parallax-scroll',
                            ],
                        ),
                        array(
                            'name' => 'parallax_scroll_value_x',
                            'label' => esc_html__('Parallax Value', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'img_effect' => 'pxl-parallax-scroll',
                            ],
                            'default' => '80',
                            'description' => esc_html__('Enter number.', 'fixera' ),
                        ),
                        array(
                            'name' => 'parallax_value',
                            'label' => esc_html__('Parallax Value', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'img_effect' => 'pxl-image-parallax',
                            ],
                            'default' => '40',
                            'description' => esc_html__('Enter number.', 'fixera' ),
                        ),
                        array(
                            'name' => 'max_tilt',
                            'label' => esc_html__('Max Tilt', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'img_effect' => 'pxl-image-tilt',
                            ],
                            'default' => '10',
                            'description' => esc_html__('Enter number.', 'fixera' ),
                        ),
                        array(
                            'name' => 'speed_tilt',
                            'label' => esc_html__('Speed Tilt', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'img_effect' => 'pxl-image-tilt',
                            ],
                            'default' => '400',
                            'description' => esc_html__('Enter number.', 'fixera' ),
                        ),
                        array(
                            'name' => 'perspective_tilt',
                            'label' => esc_html__('Perspective Tilt', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'img_effect' => 'pxl-image-tilt',
                            ],
                            'default' => '1000',
                            'description' => esc_html__('Enter number.', 'fixera' ),
                        ),
                        array(
                            'name' => 'img_display',
                            'label' => esc_html__('Hide on Screen <= 1400px', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                        ),
                        array(
                            'name' => 'hide_parallax_sm',
                            'label' => esc_html__('Disable Parallax on Mobile <= 767px', 'fixera'),
                            'type' => \Elementor\Controls_Manager::SWITCHER,
                            'default' => false,
                            'condition' => [
                                'img_effect' => ['pxl-parallax-scroll'],
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