<?php
if ( ! empty( $settings['icon_link']['url'] ) ) {
    $widget->add_render_attribute( 'icon_link', 'href', $settings['icon_link']['url'] );

    if ( $settings['icon_link']['is_external'] ) {
        $widget->add_render_attribute( 'icon_link', 'target', '_blank' );
    }
    if ( $settings['icon_link']['nofollow'] ) {
        $widget->add_render_attribute( 'icon_link', 'rel', 'nofollow' );
    }
} ?>
<div class="pxl-getintouch pxl-getintouch3 <?php echo esc_attr( $settings['pxl_animate'] ); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-getintouch-inner">
        <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
            <div class="pxl-item--icon <?php echo esc_attr( $settings['effect_icon_type'] ); ?>">
                <?php if ( ! empty( $settings['icon_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'icon_link' )); ?>><?php } ?>
                    <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                <?php if ( ! empty( $settings['icon_link']['url'] ) ) { ?></a><?php } ?>
            </div>
        <?php endif; ?>
        <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
            <div class="pxl-item--icon <?php echo esc_attr( $settings['effect_icon_type'] ); ?>">
                <?php if ( ! empty( $settings['icon_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'icon_link' )); ?>><?php } ?>
                    <?php $img_icon  = pxl_get_image_by_size( array(
                            'attach_id'  => $settings['icon_image']['id'],
                            'thumb_size' => 'full',
                        ) );
                        $thumbnail_icon    = $img_icon['thumbnail'];
                    echo pxl_print_html($thumbnail_icon); ?>
                <?php if ( ! empty( $settings['icon_link']['url'] ) ) { ?></a><?php } ?>
            </div>
        <?php endif; ?>
        <div class="pxl-box-content">
            <?php if ( ! empty( $settings['label_box'] ) ) { ?>
                <label class="pxl-title-box">
                    <?php echo pxl_print_html( $settings['label_box'] ); ?>
                </label>
            <?php } ?>
            <?php if ( ! empty( $settings['content_box'] ) ) { ?>
                <div class="pxl-cotnet-info">
                    <?php if ( ! empty( $settings['icon_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'icon_link' )); ?>><?php } ?>
                        <?php echo pxl_print_html( $settings['content_box'] ); ?>
                    <?php if ( ! empty( $settings['icon_link']['url'] ) ) { ?></a><?php } ?>  
                </div>
            <?php } ?>
        </div>
    </div>
</div>