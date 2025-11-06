<?php 
$img_size = '';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
} else {
    $img_size = 'full';
}
?>
<div class="pxl-video-player pxl-video-player1 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-video--inner">
        <?php if( $settings['image_type'] != 'none' && !empty( $settings['image']['url'] ) ) : 
            $img  = pxl_get_image_by_size( array(
                'attach_id'  => $settings['image']['id'],
                'thumb_size' => $img_size,
            ) );
            $thumbnail    = $img['thumbnail'];
            ?>
            <div class="pxl-video--holder">
                <?php if ($settings['image_type'] == 'img') { ?>
                    <?php if ( ! empty( $settings['image']['url'] ) ) { echo wp_kses_post($thumbnail); } ?>
                <?php } else { ?>
                    <div class="pxl-video--imagebg bg-image" style="background-image: url(<?php echo esc_url($settings['image']['url']); ?>);"></div>
                <?php } ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($settings['video_link'])) : ?>
            <div class="btn-video-wrap <?php echo esc_attr($settings['btn_video_position']); ?>">
                <a class="btn-video <?php echo esc_attr($settings['btn_video_style']); ?>" href="<?php echo esc_url($settings['video_link']); ?>">
                    <?php if ( $settings['icon_type'] == 'icon' && !empty($settings['pxl_icon']['value']) ) : ?>
                            <?php \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' ); ?>
                    <?php endif; ?>
                    <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
                            <?php $img_icon  = pxl_get_image_by_size( array(
                                    'attach_id'  => $settings['icon_image']['id'],
                                    'thumb_size' => 'full',
                                ) );
                                $thumbnail_icon    = $img_icon['thumbnail'];
                            echo pxl_print_html($thumbnail_icon); ?>
                    <?php endif; ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>