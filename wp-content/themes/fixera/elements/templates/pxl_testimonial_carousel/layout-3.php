
<?php
$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$col_xxl = $widget->get_setting('col_xxl', '');
$per_colum = $widget->get_setting('per_colum', '');
if($col_xxl == 'inherit') {
    $col_xxl = $col_xl;
}
$show_star = $widget->get_setting('show_star');
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');
$style_l3 = $widget->get_setting('style_l3', '');
$arrows = $widget->get_setting('arrows','false');  
$pagination = $widget->get_setting('pagination','false');
$pagination_type = $widget->get_setting('pagination_type','bullets');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$allow_touchmove = $widget->get_setting('allow_touchmove','false'); 
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite','false');  
$speed = $widget->get_setting('speed', '500');
$center = $widget->get_setting('center', 'false');
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
    'allow_touchmove'               => $allow_touchmove,
    'pause_on_hover'                => $pause_on_hover,
    'pause_on_interaction'          => 'true',
    'mousewheel'                    => 'true',
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
    <div class="pxl-swiper-sliders pxl-testimonial-carousel pxl-testimonial-carousel3 pxl-swiper-boxshadow pxl-swiper-arrow-show <?php echo esc_attr($style_l3); ?>"  ?>
    <div class="pxl-carousel-inner">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php if($settings['slider_row'] == '1') { ?>
                        <?php foreach ($settings['testimonial'] as $key => $value):
                            $desc = isset($value['desc']) ? $value['desc'] : '';
                            $title = isset($value['title']) ? $value['title'] : '';
                            $position = isset($value['position']) ? $value['position'] : '';
                            $image = isset($value['image']) ? $value['image'] : '';
                            $title1 = isset($value['title1']) ? $value['title1'] : '';
                            $style_star = isset($value['style_star']) ? $value['style_star'] : '';
                            ?>
                            <div class="pxl-swiper-slide">
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <?php if(!empty($settings['image_bg3']['id'])) { ?>
                                    <div class="bg-holder bg-image" style="background-image: url(<?php echo esc_url($settings['image_bg3']['url']); ?>);"></div>
                                <?php } ?>
                                <?php if( !empty($image['id']) || !empty($title) || !empty($position) ) { ?>
                                    <div class="pxl-meta">
                                        <?php if(!empty($image['id'])) { 
                                            $img = pxl_get_image_by_size( array(
                                                'attach_id'  => $image['id'],
                                                'thumb_size' => '100x100',
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail = $img['thumbnail'];?>
                                            <div class="pxl-item--image">
                                                <div class="inner-image">
                                                    <?php echo wp_kses_post($thumbnail); ?>
                                                </div>
                                                <div class="pxl-quote">
                                                    <i class="bravisicon bravisicon-quote-bottom"></i>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="pxl-titles">
                                            <?php if( !empty($title) ) { ?>
                                                <h4 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h4>
                                            <?php } ?>
                                            <?php if( !empty($position) ) { ?>
                                                <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if( !empty($desc) ) { ?>
                                    <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                                <?php } ?>
                                <?php if( $show_star == 'true' ) : ?>
                                    <div class="pxl-star-wrap el-empty">
                                        <label>Rating:</label>
                                        <span class="pxl-item--star pxl-item--<?php echo esc_attr( $style_star ); ?>">
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </span>
                                    </div>
                                <?php endif; ?>
                           </div>
                        </div>
                        <?php endforeach; ?>
                    <?php } else { ?>
                        <?php echo '<div class="pxl-swiper-slide">'; $i = 0; foreach ($settings['testimonial'] as $key => $value):
                             $desc = isset($value['desc']) ? $value['desc'] : '';
                             $title = isset($value['title']) ? $value['title'] : '';
                             $position = isset($value['position']) ? $value['position'] : '';
                             $image = isset($value['image']) ? $value['image'] : '';
                             $title1 = isset($value['title1']) ? $value['title1'] : '';
                             $style_star = isset($value['style_star']) ? $value['style_star'] : '';
                            ?>
                            <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
                                <?php if(!empty($settings['image_bg3']['id'])) { ?>
                                    <div class="bg-holder">
                                        <div class="bg-image" style="background-image: url(<?php echo esc_url($settings['image_bg3']['url']); ?>);"></div>
                                    </div>
                                <?php } ?>
                                <?php if( !empty($image['id']) || !empty($title) || !empty($position) ) { ?>
                                    <div class="pxl-meta">
                                        <?php if(!empty($image['id'])) { 
                                            $img = pxl_get_image_by_size( array(
                                                'attach_id'  => $image['id'],
                                                'thumb_size' => '100x100',
                                                'class' => 'no-lazyload',
                                            ));
                                            $thumbnail = $img['thumbnail'];?>
                                            <div class="pxl-item--image">
                                                <div class="inner-image">
                                                    <?php echo wp_kses_post($thumbnail); ?>
                                                </div>
                                                <div class="pxl-quote">
                                                    <i class="bravisicon bravisicon-quote-bottom"></i>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="pxl-titles">
                                            <?php if( !empty($title) ) { ?>
                                                <h4 class="pxl-item--title el-empty"><?php echo pxl_print_html($title); ?></h4>
                                            <?php } ?>
                                            <?php if( !empty($position) ) { ?>
                                                <div class="pxl-item--position el-empty"><?php echo pxl_print_html($position); ?></div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                <?php } ?>
                                <?php if( !empty($desc) ) { ?>
                                    <div class="pxl-item--desc el-empty"><?php echo pxl_print_html($desc); ?></div>
                                <?php } ?>
                                <?php if( $show_star == 'true' ) : ?>
                                    <div class="pxl-star-wrap el-empty">
                                        <label>Rating:</label>
                                        <span class="pxl-item--star pxl-item--<?php echo esc_attr( $style_star ); ?>">
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                            <i class="icofont icofont-star"></i>
                                        </span>
                                    </div>
                                <?php endif; ?>
                           </div>
                            <?php $i++;  
                            if ($i % 2 == 0 && $i != count($settings['testimonial'])) { 
                                echo '</div><div class="pxl-swiper-slide">';
                            } ?>
                        <?php endforeach; echo "</div>" ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if($arrows !== 'false'): ?>
            <div class="pxl-swiper-arrow-wrap">
                <div class="pxl-swiper-arrow pxl-swiper-arrow-prev"><i class="caseicon-angle-arrow-left rtl-icon"></i></div>
                <div class="pxl-swiper-arrow pxl-swiper-arrow-next"><i class="caseicon-angle-arrow-right rtl-icon"></i></div>
            </div>
            <?php endif; ?>
            <?php if($pagination !== 'false'): ?>
                <div class="pxl-swiper-dots style-1"></div>
        <?php endif; ?>
    </div>
<?php endif; ?>