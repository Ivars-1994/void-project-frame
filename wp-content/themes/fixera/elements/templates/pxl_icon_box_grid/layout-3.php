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
    <div class="pxl-grid pxl-iconbox-grid pxl-iconbox-grid3" data-layout="<?php echo esc_attr($layout_mode); ?>">
        <div class="pxl-grid-inner pxl-grid-masonry row" data-gutter="15">
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
            <?php foreach ($settings['list'] as $key => $value):
                $icon_type = isset($value['icon_type']) ? $value['icon_type'] : '';
                $icon_image = isset($value['icon_image']) ? $value['icon_image'] : '';
                $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
                $widget->add_render_attribute( $icon_key, [
                    'class' => $value['pxl_icon'],
                    'aria-hidden' => 'true',
                ] );

                $title = isset($value['title']) ? $value['title'] : '';
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
                    <div class="pxl-item--inner <?php echo esc_attr($settings['pxl_animate']); ?>">
                        <?php if ( $icon_type == 'icon' && ! empty( $value['pxl_icon'] ) ) : ?>
                            <div class="pxl-item--image">
                                <a class="elementor-repeater-item-<?php echo esc_attr($value['_id']); ?>" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                    <?php if ( $is_new ):
                                        \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true' ] );
                                    elseif(!empty($value['pxl_icon'])): ?>
                                        <i class="<?php echo esc_attr( $value['pxl_icon'] ); ?>" aria-hidden="true"></i>
                                    <?php endif; ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <?php if ( $icon_type == 'image' && !empty($icon_image['id']) ) : 
                            $img_icon  = pxl_get_image_by_size( array(
                                'attach_id'  => $icon_image['id'],
                                'thumb_size' => 'full',
                            ) );
                            $thumbnail_icon    = $img_icon['thumbnail']; ?>
                            <div class="pxl-item--image">
                                <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                    <?php echo pxl_print_html($thumbnail_icon); ?>
                                <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($title)) { ?>
                            <h4 class="pxl-item--title">
                                <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?>
                                    <?php echo pxl_print_html($title); ?>
                                <?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                            </h4>                                        
                        <?php } ?>
                   </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
