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
<div class="pxl-getintouch1 <?php echo esc_attr( $settings['pxl_animate'] ); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if(!empty($settings['feature_image']['id'])) : 
        $image_size = !empty($settings['img_size']) ? $settings['img_size'] : '900x600';
        $img = pxl_get_image_by_size( array(
            'attach_id'  => $settings['feature_image']['id'],
            'thumb_size' => $image_size,
            'class' => 'no-lazyload'
        ));
        $thumbnail = $img['thumbnail'];
        ?>
        <div class="pxl-feature">
            <?php echo pxl_print_html($thumbnail); ?>
        </div>
    <?php endif; ?>
    <div class="pxl-box-content">
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
        <?php if ( ! empty( $settings['label_box'] ) ) { ?>
            <label class="pxl-title-box">
                <?php echo pxl_print_html( $settings['label_box'] ); ?>
            </label>
        <?php } ?>
        <?php if(isset($settings['getintouch']) && !empty($settings['getintouch']) && count($settings['getintouch'])): ?>
            <ul class="list-info">
                <?php
                    foreach ($settings['getintouch'] as $key => $link):
                        $link_key = $widget->get_repeater_setting_key( 'link', 'value', $key );
                        if ( ! empty( $link['link']['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $link['link']['url'] );

                            if ( $link['link']['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }

                            if ( $link['link']['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );
                        ?>
                        <li class="item-info">
                            <?php if($link_attributes) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                <?php if( $link['text'] ) { ?>
                                    <span class="pxl-text"><?php echo pxl_print_html($link['text']); ?></span>
                                <?php } ?>
                            <?php if($link_attributes) { ?></a><?php } ?>
                        </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
</div>
