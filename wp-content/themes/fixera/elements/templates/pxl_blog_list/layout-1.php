<?php
$source = $widget->get_setting('source', '');
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 4);
$post_ids = $widget->get_setting('post_ids', '');
$images_size = !empty($img_size) ? $img_size : '120x120';
extract(pxl_get_posts_of_grid('post', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));
if (is_array($posts)): ?>
    <div class="pxl-blog-list">
        <div class="pxl-blog-inner">
            <?php
                foreach ($posts as $key => $post): 
                $author = get_user_by('id', $post->post_author);
                    ?>
                <div class="pxl-grid-item <?php echo esc_attr( $settings['pxl_animate'] ); ?>">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                        $img_id = get_post_thumbnail_id($post->ID);
                        if($img_id) {
                            $img = pxl_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $images_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail'];
                        } else {
                            $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
                        } ?>
                        <div class="pxl-item--image">
                            <a class="bg-image" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                        <div class="pxl-item--meta">
                            <h3 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a></h3>
                            <div class="pxl-item--author">
                                <a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>">
                                    <?php echo esc_html($author->display_name); ?>
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>