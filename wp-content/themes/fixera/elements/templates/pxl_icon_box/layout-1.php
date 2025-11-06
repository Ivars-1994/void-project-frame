<?php
    if ( ! empty( $settings['icon_link']['url'] ) ) {
        $widget->add_render_attribute( 'icon_link', 'href', $settings['icon_link']['url'] );

        if ( $settings['icon_link']['is_external'] ) {
            $widget->add_render_attribute( 'icon_link', 'target', '_blank' );
        }
        if ( $settings['icon_link']['nofollow'] ) {
            $widget->add_render_attribute( 'icon_link', 'rel', 'nofollow' );
        }
    } 
?>
<div class="pxl-icon-box pxl-icon-box1 <?php echo esc_attr( $settings['style_box'].' '.$settings['pxl_animate'] ); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--inner">
        <?php if(!empty($settings['number_text'])) : ?>
            <span class="pxl-item--number"><?php echo esc_html($settings['number_text']); ?></span>
        <?php endif; ?>
        <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
            <div class="pxl-item--icon">
                <div class="inner-icon">
                    <?php if ( ! empty( $settings['icon_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'icon_link' )); ?>><?php } ?>
                        <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                    <?php if ( ! empty( $settings['icon_link']['url'] ) ) { ?></a><?php } ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
            <div class="pxl-item--icon">
                <div class="inner-icon">
                    <?php if ( ! empty( $settings['icon_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'icon_link' )); ?>><?php } ?>
                        <?php $img_icon  = pxl_get_image_by_size( array(
                                'attach_id'  => $settings['icon_image']['id'],
                                'thumb_size' => 'full',
                            ) );
                            $thumbnail_icon    = $img_icon['thumbnail'];
                        echo pxl_print_html($thumbnail_icon); ?>
                    <?php if ( ! empty( $settings['icon_link']['url'] ) ) { ?></a><?php } ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="pxl-iconbox--content">
            <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty">
                <?php if ( ! empty( $settings['icon_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'icon_link' )); ?>><?php } ?>
                    <span><?php echo pxl_print_html($settings['title']); ?></span>
                <?php if ( ! empty( $settings['icon_link']['url'] ) ) { ?></a><?php } ?>
            </<?php echo esc_attr($settings['title_tag']); ?>>
            <?php if(!empty($settings['box_excerpt'])) : ?>
                <div class="pxl-item--excerpt">
                    <?php echo esc_attr($settings['box_excerpt']); ?>
                </div>
            <?php endif; ?>  
        </div>
    </div>
</div>