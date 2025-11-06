<?php
$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('service', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$pxl_animate = $widget->get_setting('pxl_animate', '');
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
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');
$style_box = $widget->get_setting('style_box');
$show_category = $widget->get_setting('show_category');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$show_button = $widget->get_setting('show_button');
$button_text   = $widget->get_setting('button_text');
$img_size = $widget->get_setting('img_size');
$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_percolumnfill'           => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'            => $col_xxl,  
    'slides_to_show_lg'             => $col_lg, 
    'slides_to_show_md'             => $col_md, 
    'slides_to_show_sm'             => $col_sm, 
    'slides_to_show_xs'             => $col_xs, 
    'slides_to_scroll'              => $slides_to_scroll,  
    'slides_gutter'                 => 30, 
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
]); ?>

<?php if (is_array($posts)): ?>
    <div class="pxl-swiper-sliders pxl-service-carousel pxl-service-carousel2 pxl-swiper-boxshadow">
        <div class="pxl-carousel-inner <?php echo esc_attr($settings['arrows_position']); ?> <?php if($arrows == 'true') { echo esc_attr($settings['display_arrow']); } ?>">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                        $image_size = !empty($img_size) ? $img_size : '740x600';
                        foreach ($posts as $key => $post):
                        $img_id       = get_post_thumbnail_id( $post->ID );
                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $image_size
                            ) );
                            $thumbnail    = $img['thumbnail'];
                            $thumbnail_url    = $img['url'];
                            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
                            ?>
                            <div class="pxl-swiper-slide">
                                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                                        <div class="item--featured">
                                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <?php echo wp_kses_post($thumbnail); ?>    
                                            </a>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pxl-item-body">
                                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                                            $icon_img = pxl_get_image_by_size( array(
                                                'attach_id'  => $service_icon_img['id'],
                                                'thumb_size' => 'full',
                                            ));
                                            $icon_thumbnail = $icon_img['thumbnail'];
                                            ?>
                                            <div class="pxl-item--icon">
                                                <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                                    <?php echo wp_kses_post($icon_thumbnail); ?>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                            <div class="pxl-item--icon">
                                                <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                                    <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($show_category == 'true'): ?>
                                            <div class="item--category">
                                                <?php the_terms( $post->ID, 'service-category', '', ' ' ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <h3 class="pxl-item--title">
                                            <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                                <?php echo esc_html(get_the_title($post->ID)); ?>
                                            </a>
                                        </h3>
                                        <?php if($show_excerpt == 'true'): ?>
                                            <div class="pxl-item--content">
                                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                            </div>
                                        <?php endif; ?>
                                        <?php if($show_button == 'true') :?>
                                            <a class="btn-showmore" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                                <i class="bravisicon bravisicon-long-arrow-right-three"></i>
                                                <span>
                                                    <?php if(!empty($button_text)) {
                                                        echo esc_attr($button_text);
                                                    } else {
                                                        echo esc_html__('Read More', 'fixera');
                                                    } ?>
                                                </span>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div> 
            </div>
            <?php  if($arrows !== 'false'): ?>
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