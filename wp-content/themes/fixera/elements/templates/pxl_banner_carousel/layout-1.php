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
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl, 
    'slides_to_show_xxl'             => $col_xxl, 
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => $col_sm, 
    'slides_to_show_xs'             => $col_xs, 
    'slides_to_scroll'              => $slides_to_scroll,
    'arrow'                         => $arrows,
    'pagination'                    => $pagination,
    'pagination_type'               => $pagination_type,
    'autoplay'                      => $autoplay,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'delay'                         => $autoplay_speed,
    'loop'                          => $infinite,
    'speed'                         => $speed
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
$img_size = isset($settings['img_size']) ? $settings['img_size'] : '';
$image_size = !empty($img_size) ? $img_size : '1200x800';
$html_id = pxl_get_element_id($settings);
if(isset($settings['gallery']) && !empty($settings['gallery']) && count($settings['gallery'])): ?>
    <div class="pxl-swiper-sliders pxl-banner-carousel pxl-banner-carousel1" data-arrow="<?php echo esc_attr($arrows); ?>">
        <div class="pxl-carousel-inner <?php echo esc_attr($settings['arrows_position']); ?>">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['gallery'] as $key => $value):
                        $feature = isset($value['feature']) ? $value['feature'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                 <?php if(!empty($feature['id'])) { 
                                    $img_feature = pxl_get_image_by_size( array(
                                        'attach_id'  => $feature['id'],
                                        'thumb_size' => $image_size,
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail_feature = $img_feature['thumbnail'];
                                    ?>
                                    <div class="pxl-item--feature">
                                        <?php echo wp_kses_post($thumbnail_feature); ?>      
                                    </div>
                                <?php } ?>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if($arrows !== 'false'): ?>
                <div class="grap-arrows">
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="bravisicon bravisicon-angle-arrow-left"></i></div>
                    <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="bravisicon bravisicon-angle-arrow-left"></i></div>
                </div>
            <?php endif; ?>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-dots"></div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>