<?php
$templates_df = ['0' => esc_html__('None', 'fixera')];
$templates = $templates_df + fixera_get_templates_option('hidden-panel') ;
pxl_add_custom_widget(
    array(
        'name' => 'pxl_icon_hidden_panel',
        'title' => esc_html__('Hidden Panel Pxl', 'fixera' ),
        'icon' => 'eicon-menu-bar',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'fixera' ),
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
                            'name' => 'style',
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
                                'style' => ['style-1', 'style-2'],
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
                                'style' => ['style-3'],
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
                                'style' => ['style-3'],
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    fixera_get_class_widget_path()
);