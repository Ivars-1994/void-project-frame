<?php
// Register Button Widget
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_user',
        'title' => esc_html__('User Pxl', 'fixera' ),
        'icon' => 'eicon-person',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'fixera' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'style1',
                            'options' => [
                                'style1' => esc_html__('Style 1 (Popup)', 'fixera' ),
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon--users > i' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'text_color',
                            'label' => esc_html__('Text Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon--users' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'link_color',
                            'label' => esc_html__('Link Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon--users a' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'sub_link_color',
                            'label' => esc_html__('Sub Link Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-icon--users .pxl-user-account a' => 'color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'post_type',
                            'label' => esc_html__('User Post Type', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => '',
                            'options' => [
                                '' => esc_html__('All', 'fixera' ),
                                'page' => esc_html__('Page', 'fixera' ),
                                'post' => esc_html__('Post', 'fixera' ),
                                'lp_course' => esc_html__('Course', 'fixera' ),
                                'portfolio' => esc_html__('Portfolio', 'fixera' ),
                                'product' => esc_html__('Product', 'fixera' ),
                            ],
                        ),
                        array(
                            'name' => 'name_display',
                            'label' => esc_html__('Label User Display', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'default' => 'name-show',
                            'options' => [
                                'name-show' => esc_html__('Show (Defualt)', 'fixera' ),
                                'name-show-h' => esc_html__('Hidden on small Screen', 'fixera' ),
                                'name-hidden' => esc_html__('Hidden', 'fixera' ),
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    fixera_get_class_widget_path()
);