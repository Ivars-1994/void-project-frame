<?php
pxl_add_custom_widget(
    array(
        'name' => 'pxl_language_switcher',
        'title' => esc_html__('Language Switcher Pxl', 'fixera'),
        'icon' => 'eicon-editor-list-ul',
        'categories' => array('pxltheme-core'),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_list',
                    'label' => esc_html__('Content', 'fixera'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'current',
                            'label' => esc_html__('Current Item', 'fixera'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'current_flag',
                            'label' => esc_html__( 'Current Flag', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'current_item_typography',
                            'label' => esc_html__('Current Item Typography', 'fixera' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .pxl-language-switcher1 .current--item',
                        ),
                        array(
                            'name' => 'current_item_color',
                            'label' => esc_html__('Current Item Color', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .pxl-language-switcher1 .current--item' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'menu_item',
                            'label' => esc_html__('Item', 'fixera'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'text',
                                    'label' => esc_html__('Text', 'fixera'),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'flag',
                                    'label' => esc_html__( 'Flag', 'fixera' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'link',
                                    'label' => esc_html__('Link', 'fixera'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ text }}}',
                        ),
                        array(
                            'name' => 'dropdown_position',
                            'label' => esc_html__('Dropdown Position', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'dr-left' => 'Left',
                                'dr-right' => 'Right',
                            ],
                            'default' => 'dr-left',
                        ),
                        array(
                            'name' => 'hover_style',
                            'label' => esc_html__('Style Display', 'fixera' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'sub-show-bottom' => 'Bottom(Defualt)',
                                'sub-show-top' => 'Top',
                            ],
                            'default' => 'sub-show-bottom',
                        )
                    ),
                ),
            ),
        ),
    ),
    fixera_get_class_widget_path()
);