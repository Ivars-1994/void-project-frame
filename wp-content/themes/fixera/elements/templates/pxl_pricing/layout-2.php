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
<div class="pxl-pricing pxl-pricing2 <?php echo esc_attr( $settings['pxl_animate'].' '.$settings['active_popular'] ); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <?php if(!empty($settings['popular'])) : ?>
        <div class="pxl-popular">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.25 5.61406H9.80782L12.9031 1.70312C12.9672 1.62031 12.9094 1.5 12.8047 1.5H6.81251C6.76876 1.5 6.72657 1.52344 6.7047 1.5625L2.65626 8.55469C2.60782 8.6375 2.6672 8.74219 2.76407 8.74219H5.48907L4.0922 14.3297C4.06251 14.4516 4.20938 14.5375 4.30001 14.45L13.3359 5.82812C13.4172 5.75156 13.3625 5.61406 13.25 5.61406Z"/>
            </svg>
            <span><?php echo esc_html($settings['popular']); ?></span>
        </div>
    <?php endif; ?>
    <div class="inner-box">
        <div class="pxl-box-meta">
            <?php if(!empty($settings['title'])) { ?>
                <h3 class="pxl-title"><span><?php echo esc_html($settings['title']); ?></span></h3>
            <?php } ?>
            <?php if(!empty($settings['sub_title'])) { ?>
                <div class="pxl-content"><?php echo esc_html($settings['sub_title']); ?></div>
            <?php } ?>
        </div>
        <div class="pxl-box-price">
            <?php if(!empty($settings['price']) || !empty($settings['pric_person'])) : ?>
                <div class="pxl-price">
                    <span class="pxl-value"><?php echo pxl_print_html($settings['price']); ?></span>
                    <span class="pxl-suffix"><?php echo pxl_print_html($settings['pric_person']); ?></span>
                </div>
            <?php endif; ?>
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
    </div>
</div>