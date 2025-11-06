<?php
$source = $widget->get_setting('source', '');
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 4);
$post_ids = $widget->get_setting('post_ids', '');
extract(pxl_get_posts_of_grid('service', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));
if (is_array($posts)): ?>
    <div class="pxl-service-list layout2">
        <div class="pxl-service-inner">
            <ul>
                <?php
                    foreach ($posts as $key => $post): 
                    $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
                    $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
                    $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                    ?>
                        <li class="pxl-item--title">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                                    $icon_img = pxl_get_image_by_size( array(
                                        'attach_id'  => $service_icon_img['id'],
                                        'thumb_size' => 'full',
                                    ));
                                    $icon_thumbnail = $icon_img['thumbnail'];
                                    ?>
                                    <span class="item-icon">
                                        <?php echo wp_kses_post($icon_thumbnail); ?>
                                    </span>
                                <?php endif; ?>
                                <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                    <span class="item-icon">
                                        <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                    </span>
                                <?php endif; ?>
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                                <i class="icon-right bravisicon bravisicon-long-arrow-right-three"></i>
                            </a>
                        </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>