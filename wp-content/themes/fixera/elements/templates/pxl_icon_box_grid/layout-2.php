<?php
$default_settings = [
    'filter_alignment' => '',
    'layout_mode' => 'fitRows',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = pxl_get_element_id($settings);

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');

$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);

$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
?>
<?php if(isset($settings['list']) && !empty($settings['list']) && count($settings['list'])): ?>
    <div class="pxl-grid pxl-iconbox-grid pxl-iconbox-grid2" data-layout="<?php echo esc_attr($layout_mode); ?>">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
            <?php foreach ($settings['list'] as $key => $value):
    			$image = isset($value['image']) ? $value['image'] : '';
                $title = isset($value['title']) ? $value['title'] : '';
                $excerpt = isset($value['excerpt']) ? $value['excerpt'] : '';
                $link = isset($value['link']) ? $value['link'] : '';
                $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                if ( ! empty( $link['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $link['url'] );

                    if ( $link['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $link['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );
                ?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="pxl-item--inner pxl-flipbox <?php echo esc_attr($settings['pxl_animate']); ?>">
                        <div class="pxl-flipbox--wrap">
                            <div class="pxl-box-main">
                                <?php if(!empty($image['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => 'full',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];?>
                                    <div class="pxl-item--image">
                                        <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                                        
                                    </div>
                                <?php } ?>
                                <?php if(!empty($title)) { ?>
                                    <h4 class="pxl-item--title">
                                        <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                            <?php echo pxl_print_html($title); ?>
                                        <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                                    </h4>                                        
                                <?php } ?>
                                <?php if(!empty($excerpt)) { ?>
                                    <div class="pxl-item--excerpt">
                                        <?php echo pxl_print_html($excerpt); ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="pxl-flipbox-hover">
                                <?php if(!empty($image['id'])) { 
                                    $img = pxl_get_image_by_size( array(
                                        'attach_id'  => $image['id'],
                                        'thumb_size' => 'full',
                                        'class' => 'no-lazyload',
                                    ));
                                    $thumbnail = $img['thumbnail'];?>
                                    <div class="pxl-item--image">
                                        <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                                        
                                    </div>
                                <?php } ?>
                                <?php if(!empty($title)) { ?>
                                    <h4 class="pxl-item--title">
                                        <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                            <?php echo pxl_print_html($title); ?>
                                        <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                                    </h4>                                        
                                <?php } ?>
                                <?php if(!empty($excerpt)) { ?>
                                    <div class="pxl-item--excerpt">
                                        <?php echo pxl_print_html($excerpt); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                   </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
