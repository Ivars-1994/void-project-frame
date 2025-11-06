<?php
$html_id = pxl_get_element_id($settings);
$source    = $widget->get_setting('source_'.$settings['post_type']);
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
$settings['layout']    = $settings['layout_'.$settings['post_type']];
extract(pxl_get_posts_of_grid('case', [
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
$img_size = $widget->get_setting('img_size');
$show_category = $widget->get_setting('show_category');

$opts = [
    'slide_direction'               => 'horizontal',
    'slide_percolumn'               => '1', 
    'slide_percolumnfill'           => '1', 
    'slide_mode'                    => 'slide', 
    'slides_to_show'                => $col_xl,
    'slides_to_show_xxl'             => $col_xxl,  
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
    <div class="pxl-swiper-sliders pxl-case-carousel pxl-case-carousel1">
        <div class="pxl-carousel-inner <?php echo esc_attr($settings['arrows_position']); ?>">
            <div <?php pxl_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <div class="pxl-swiper-wrapper">
                    <?php
                        $image_size = !empty($img_size) ? $img_size : '453x600';
                        foreach ($posts as $post):
                        $case_date = get_post_meta($post->ID, 'date_start', true);
                        $img_id       = get_post_thumbnail_id( $post->ID );
                        if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                            $img          = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $image_size
                            ) );
                            $thumbnail    = $img['thumbnail'];
                            ?>
                            <div class="pxl-swiper-slide">
                                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                                        <div class="item--featured">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                        <div class="item--meta">
                                            <svg width="287" height="102" viewBox="0 0 287 102" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M286.034 101.651L-5.82868 40.6905L-7 0.35495L286.034 101.651Z"/>
                                            </svg>
                                            <a class="btn-link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M1.73491 2.06407C1.73513 1.696 1.88145 1.34306 2.14172 1.08279C2.40199 0.822526 2.75493 0.676207 3.123 0.675978L14.254 0.675979C14.622 0.676208 14.975 0.822527 15.2352 1.0828C15.4955 1.34306 15.6418 1.696 15.642 2.06407L15.642 13.195C15.6291 13.5547 15.4773 13.8954 15.2184 14.1455C14.9596 14.3955 14.6139 14.5355 14.2539 14.536C13.894 14.5355 13.5483 14.3955 13.2895 14.1455C13.0306 13.8954 12.8788 13.5547 12.8659 13.195L12.8659 5.41645L3.123 15.1593C2.86252 15.4198 2.50923 15.5661 2.14086 15.5661C1.77248 15.5661 1.41919 15.4198 1.15871 15.1593C0.898234 14.8988 0.751898 14.5455 0.751898 14.1772C0.751897 13.8088 0.898233 13.4555 1.15871 13.195L10.9016 3.45217L3.123 3.45217C2.75492 3.45194 2.40199 3.30562 2.14172 3.04535C1.88145 2.78508 1.73513 2.43215 1.73491 2.06407Z"/>
                                                </svg>
                                            </a>
                                            <h3 class="pxl-item--title">
                                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                                    <?php echo esc_html(get_the_title($post->ID)); ?>
                                                </a>
                                            </h3>
                                        </div>
                                    <?php endif; ?>
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