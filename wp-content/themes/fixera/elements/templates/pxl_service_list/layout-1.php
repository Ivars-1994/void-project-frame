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
    <div class="pxl-service-list layout1">
        <div class="pxl-service-inner">
            <ul>
                <?php foreach ($posts as $key => $post): ?>
                    <li class="pxl-item--title">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            <i class="icon-right bravisicon bravisicon-long-arrow-right-three"></i>
                            <?php echo esc_html(get_the_title($post->ID)); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
<?php endif; ?>