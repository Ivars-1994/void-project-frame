<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');
$arrows = $widget->get_setting('arrows','false');  

$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');  
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', 'false');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => 1, 
    'slides_to_show_xxl'            => 1, 
    'slides_to_show_lg'             => 1, 
    'slides_to_show_md'             => 1, 
    'slides_to_show_sm'             => 1, 
    'slides_to_show_xs'             => 1, 
    'slides_to_scroll'              => 1,
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed,
    'center'                         => $center,
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['case']) && !empty($settings['case']) && count($settings['case'])): ?>
    <div class="pxl-swiper-sliders pxl-case-carousel-extra pxl-swiper-arrow-show">
        <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['case'] as $key => $value):
                        $image = isset($value['image']) ? $value['image'] : '';
                        $title = isset($value['title']) ? $value['title'] : '';
                        $item_link = isset($value['item_link']) ? $value['item_link'] : '';
                        $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                        if ( ! empty( $item_link['url'] ) ) {
                            $widget->add_render_attribute( $link_key, 'href', $item_link['url'] );
                            if ( $item_link['is_external'] ) {
                                $widget->add_render_attribute( $link_key, 'target', '_blank' );
                            }
                            if ( $item_link['nofollow'] ) {
                                $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes = $widget->get_render_attribute_string( $link_key );

                        $item_video = isset($value['item_video']) ? $value['item_video'] : '';
                        $link_key_btn = $widget->get_repeater_setting_key( 'title2', 'value', $key );
                        if ( ! empty( $item_video['url'] ) ) {
                            $widget->add_render_attribute( $link_key_btn, 'href', $item_video['url'] );
                            if ( $item_video['is_external'] ) {
                                $widget->add_render_attribute( $link_key_btn, 'target', '_blank' );
                            }
                            if ( $item_video['nofollow'] ) {
                                $widget->add_render_attribute( $link_key_btn, 'rel', 'nofollow' );
                            }
                        }
                        $link_attributes2 = $widget->get_render_attribute_string( $link_key_btn );
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <?php if(!empty($image['id'])) { 
                                    $img_image = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => '1300x648',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img_image['thumbnail'];
                                    ?>
                                    <div class="pxl-item--image">
                                        <?php echo wp_kses_post($thumbnail); ?>
                                    </div>
                                <?php } ?>
                                <div class="pxl-meta">
                                    <div class="inner-meta">
                                        <?php if ( ! empty( $item_link['url'] ) ) { ?><a class="pxl-btn-link" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M1.73491 2.06407C1.73513 1.696 1.88145 1.34306 2.14172 1.08279C2.40199 0.822526 2.75493 0.676207 3.123 0.675978L14.254 0.675979C14.622 0.676208 14.975 0.822527 15.2352 1.0828C15.4955 1.34306 15.6418 1.696 15.642 2.06407L15.642 13.195C15.6291 13.5547 15.4773 13.8954 15.2184 14.1455C14.9596 14.3955 14.6139 14.5355 14.2539 14.536C13.894 14.5355 13.5483 14.3955 13.2895 14.1455C13.0306 13.8954 12.8788 13.5547 12.8659 13.195L12.8659 5.41645L3.123 15.1593C2.86252 15.4198 2.50923 15.5661 2.14086 15.5661C1.77248 15.5661 1.41919 15.4198 1.15871 15.1593C0.898234 14.8988 0.751898 14.5455 0.751898 14.1772C0.751897 13.8088 0.898233 13.4555 1.15871 13.195L10.9016 3.45217L3.123 3.45217C2.75492 3.45194 2.40199 3.30562 2.14172 3.04535C1.88145 2.78508 1.73513 2.43215 1.73491 2.06407Z"/>
                                            </svg>
                                        </a><?php } ?>
                                        <?php if ( ! empty( $item_video['url'] ) ) { ?>
                                            <div class="wp-button">
                                                <a class="btn-video pxl-video-button" <?php echo implode( ' ', [ $link_attributes2 ] ); ?>>
                                                    <i class="bravisicon bravisicon-right-arrow"></i>
                                                </a>
                                            </div>
                                        <?php } ?>
                                        <?php if( !empty($title) ) { ?>
                                            <h4 class="pxl-item--title el-empty">
                                                <?php if ( !empty( $item_link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                                    <?php echo pxl_print_html($title); ?>
                                                <?php if ( !empty( $item_link['url'] ) ) { ?></a><?php } ?>
                                            </h4>
                                        <?php } ?>  
                                    </div>       
                                </div>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if($arrows !== 'false'): ?>
                <div class="grap-arrows">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev style2"><i class="bravisicon-angle-arrow-left rtl-icon"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next style2"><i class="bravisicon-angle-arrow-left rtl-icon"></i></div>
                </div>
            <?php endif; ?>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-dots"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>
