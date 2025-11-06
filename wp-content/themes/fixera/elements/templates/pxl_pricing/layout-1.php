<?php
if ( ! empty( $settings['button_link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['button_link']['url'] );

    if ( $settings['button_link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['button_link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="pxl-pricing pxl-pricing1 <?php echo esc_attr( $settings['pxl_animate'].' '.$settings['active_popular'] ); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if(!empty($settings['popular'])) : ?>
        <div class="pxl-popular">
            <span><?php echo esc_html($settings['popular']); ?></span>
        </div>
    <?php endif; ?>
    <div class="inner-box">
        <div class="pxl-meta">
            <?php if(!empty($settings['title'])) { ?>
                <h3 class="pxl-title"><span><?php echo esc_html($settings['title']); ?></span></h3>
            <?php } ?>
            <?php if(!empty($settings['price']) || !empty($settings['pric_person'])) : ?>
                <div class="pxl-price">
                    <span class="pxl-value"><?php echo pxl_print_html($settings['price']); ?></span>
                    <span class="pxl-suffix"><?php echo pxl_print_html($settings['pric_person']); ?></span>
                </div>
            <?php endif; ?>
            <?php if(!empty($settings['sub_title'])) { ?>
                <div class="pxl-content"><?php echo esc_html($settings['sub_title']); ?></div>
            <?php } ?>
        </div>
        <div class="pxl-meta-bottom">
            <?php if(isset($settings['feature']) && !empty($settings['feature']) && count($settings['feature'])): ?>
                <ul class="pxl-feature">
                    <?php foreach ($settings['feature'] as $key => $value): ?>
                        <li class="<?php echo esc_attr($value['active']); ?>">
                            <i class="bravisicon bravisicon-check"></i>
                            <?php echo pxl_print_html($value['feature_text'])?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <?php if(!empty($settings['button_text'])) : ?>
                <div class="pxl-button">
                    <a class="btn-pric" <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                        <?php echo esc_attr($settings['button_text']); ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
        <div class="pxl-bg bg-image" <?php if(!empty($settings['banner_bg']['id'])) { ?>style="background-image: url(<?php echo esc_url($settings['banner_bg']['url']); ?>);"<?php } ?>></div>
    </div>
</div>