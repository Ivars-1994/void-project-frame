<?php
$html_id = pxl_get_element_id($settings);
if(isset($settings['download']) && !empty($settings['download']) && count($settings['download'])): ?>
    <div id="pxl-download-<?php echo esc_attr($html_id) ?>" class="pxl-download pxl-download-layout1 <?php echo esc_attr( $settings['pxl_animate'] ); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
        <?php
            foreach ($settings['download'] as $key => $value):
                $sub_title = isset($value['sub_title']) ? $value['sub_title'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $pxl_icon = isset($value['pxl_icon']) ? $value['pxl_icon'] : '';

                $value_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                if ( ! empty( $value['link']['url'] ) ) {
                    $widget->add_render_attribute( $value_key, 'href', $value['link']['url'] );

                    if ( $value['link']['is_external'] ) {
                        $widget->add_render_attribute( $value_key, 'target', '_blank' );
                    }

                    if ( $value['link']['nofollow'] ) {
                        $widget->add_render_attribute( $value_key, 'rel', 'nofollow' );
                    }
                }
                $value_attributes = $widget->get_render_attribute_string( $value_key );
                ?>
                <div class="pxl--item">
                    <?php if ( !empty($pxl_icon['value']) ) : ?>
                        <div class="pxl-item--iconfile">
                            <?php \Elementor\Icons_Manager::render_icon( $pxl_icon, [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item--meta">
                        <a class="pxl-item--link" <?php echo implode( ' ', [ $value_attributes ] ); ?>>
                            <span><?php echo esc_html($title); ?></span>
                            <span class="pxl-item--subtitle"><?php echo esc_html($sub_title); ?></span>
                        </a>
                    </div>
                </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
