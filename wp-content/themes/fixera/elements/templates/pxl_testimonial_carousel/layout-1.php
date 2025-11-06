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

$show_star = $widget->get_setting('show_star');
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
    'slides_to_show'                => $col_xl, 
    'slides_to_show_xxl'            => $col_xxl, 
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
    'speed'                         => $speed,
    'center'                         => $center,
];
$widget->add_render_attribute( 'carousel', [
    'class'         => 'pxl-swiper-container',
    'dir'           => is_rtl() ? 'rtl' : 'ltr',
    'data-settings' => wp_json_encode($opts)
]);
if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel1 pxl-swiper-arrow-show">
        <div class="pxl-carousel-inner <?php echo esc_attr($settings['arrows_position']); ?>">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php foreach ($settings['testimonial'] as $key => $value):
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        $desc = isset($value['desc']) ? $value['desc'] : '';
                        $style_star = isset($value['style_star']) ? $value['style_star'] : '';
                        ?>
                        <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <?php if(!empty($image['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => '120x120',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];?>
                                    <div class="pxl-item--image">
                                        <div class="inner-image">
                                            <?php echo wp_kses_post($thumbnail); ?>    
                                        </div>
                                        <i class="bravisicon bravisicon-quote-bottom"></i>
                                    </div>
                                <?php } ?>
                                <div class="pxl-item--meta">
                                    <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                                    <h4 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h4>
                                    <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                    <?php if( $show_star == 'true' ) : ?>
                                        <span class="pxl-item--star pxl-item--<?php echo esc_attr( $style_star ); ?>">
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </span>
                                    <?php endif; ?>
                                </div>
                           </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php if($arrows !== 'false'): ?>
                    <div class="grap-arrows">
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="bravisicon bravisicon-angle-arrow-left rtl-icon"></i></div>
                        <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="bravisicon bravisicon-angle-arrow-left rtl-icon"></i></div>
                    </div>
                <?php endif; ?>
                <?php if($pagination !== 'false'): ?>
                    <div class="pxl-swiper-dots"></div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php endif; ?>