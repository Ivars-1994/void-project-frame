<?php
$default_settings = [
    'filter_alignment' => '',
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
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<?php if(isset($settings['list']) && !empty($settings['list']) && count($settings['list'])): ?>
    <div class="pxl-grid pxl-iconbox-grid pxl-iconbox-grid1" data-layout="fitRows">
        <div class="pxl-grid-inner row" data-gutter="15">
            <?php foreach ($settings['list'] as $key => $value):
                $icon_type = isset($value['icon_type']) ? $value['icon_type'] : '';
                $icon_image = isset($value['icon_image']) ? $value['icon_image'] : '';
                $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
                $widget->add_render_attribute( $icon_key, [
                    'class' => $value['pxl_icon'],
                    'aria-hidden' => 'true',
                ] );

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
                    <div class="pxl-item--inner <?php echo esc_attr($settings['style_box'].' '.$settings['pxl_animate']); ?>">
                        <?php if ( ! empty( $link['url'] ) ) { ?><a class="link-holder" <?php echo implode( ' ', [ $link_attributes ] ); ?>></a><?php } ?>
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
                                <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                    <?php echo pxl_print_html($thumbnail_icon); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if(!empty($title) || !empty($excerpt)) { ?>
                            <div class="pxl-item--meta">
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
                                <?php if ( ! empty( $link['url'] ) ) { ?>
                                    <a class="icon-link" <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                                        <i class="bravisicon-long-arrow-right-two"></i>
                                    </a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                        <?php if( $settings['style_box'] == 'box-style1') { ?>
                            <div class="pxl-icon-bottom">
                                <svg width="102" height="77" viewBox="0 0 102 77" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M85.5 170.992C38.3529 170.992 0 132.641 0 85.4959C0 38.351 38.3583 0 85.5 0C132.642 0 171 38.351 171 85.4959C171 132.641 132.647 170.992 85.5 170.992ZM85.5 2.17132C39.5526 2.17132 2.17143 39.5507 2.17143 85.4959C2.17143 131.441 39.5526 168.82 85.5 168.82C131.447 168.82 168.829 131.441 168.829 85.4959C168.829 39.5507 131.447 2.17132 85.5 2.17132Z" fill="#EFF2FC"/>
                                <path d="M85.5009 161.161C43.7769 161.161 9.83203 127.218 9.83203 85.4958C9.83203 43.7738 43.7769 9.83063 85.5009 9.83063C127.225 9.83063 161.17 43.7738 161.17 85.4958C161.17 127.218 127.225 161.161 85.5009 161.161ZM85.5009 12.002C44.9766 12.002 12.0035 44.9681 12.0035 85.4958C12.0035 126.024 44.9712 158.99 85.5009 158.99C126.031 158.99 158.998 126.024 158.998 85.4958C158.998 44.9681 126.025 12.002 85.5009 12.002Z" fill="#EFF2FC"/>
                                <path d="M85.5002 151.325C49.1994 151.325 19.668 121.795 19.668 85.4958C19.668 49.1967 49.1994 19.6667 85.5002 19.6667C121.801 19.6667 151.333 49.1967 151.333 85.4958C151.333 121.795 121.801 151.325 85.5002 151.325ZM85.5002 21.8381C50.3991 21.8381 21.8394 50.3964 21.8394 85.4958C21.8394 120.595 50.3991 149.154 85.5002 149.154C120.601 149.154 149.161 120.595 149.161 85.4958C149.161 50.3964 120.607 21.8381 85.5002 21.8381Z" fill="#EFF2FC"/>
                                <path d="M85.5011 141.494C54.6234 141.494 29.5 116.372 29.5 85.496C29.5 54.6198 54.6234 29.4976 85.5011 29.4976C116.379 29.4976 141.502 54.6198 141.502 85.496C141.502 116.372 116.379 141.494 85.5011 141.494ZM85.5011 31.6689C55.8177 31.6689 31.6714 55.814 31.6714 85.496C31.6714 115.178 55.8177 139.323 85.5011 139.323C115.185 139.323 139.331 115.178 139.331 85.496C139.331 55.814 115.185 31.6689 85.5011 31.6689Z" fill="#EFF2FC"/>
                                <path d="M85.5005 131.658C60.0459 131.658 39.3359 110.949 39.3359 85.496C39.3359 60.0427 60.0459 39.3337 85.5005 39.3337C110.955 39.3337 131.665 60.0427 131.665 85.496C131.665 110.949 110.955 131.658 85.5005 131.658ZM85.5005 41.505C61.2402 41.505 41.5074 61.2423 41.5074 85.496C41.5074 109.75 61.2456 129.487 85.5005 129.487C109.755 129.487 129.494 109.75 129.494 85.496C129.494 61.2423 109.761 41.505 85.5005 41.505Z" fill="#EFF2FC"/>
                                <path d="M85.5014 121.828C65.47 121.828 49.168 105.532 49.168 85.496C49.168 65.4601 65.4645 49.1643 85.5014 49.1643C105.538 49.1643 121.835 65.4601 121.835 85.496C121.835 105.532 105.538 121.828 85.5014 121.828ZM85.5014 51.3356C66.6642 51.3356 51.3394 66.6597 51.3394 85.496C51.3394 104.332 66.6642 119.656 85.5014 119.656C104.339 119.656 119.663 104.332 119.663 85.496C119.663 66.6597 104.339 51.3356 85.5014 51.3356Z" fill="#EFF2FC"/>
                                <path d="M85.5008 111.992C70.887 111.992 59.0039 100.104 59.0039 85.496C59.0039 70.8884 70.8925 59.0004 85.5008 59.0004C100.114 59.0004 111.998 70.8884 111.998 85.496C111.998 100.104 100.114 111.992 85.5008 111.992ZM85.5008 61.1718C72.0868 61.1718 61.1753 72.0827 61.1753 85.496C61.1753 98.9094 72.0868 109.82 85.5008 109.82C98.9148 109.82 109.826 98.9094 109.826 85.496C109.826 72.0827 98.9148 61.1718 85.5008 61.1718Z" fill="#EFF2FC"/>
                                <path d="M85.5016 102.161C76.3111 102.161 68.8359 94.6861 68.8359 85.496C68.8359 76.3058 76.3111 68.8311 85.5016 68.8311C94.6922 68.8311 102.167 76.3058 102.167 85.496C102.167 94.6861 94.6922 102.161 85.5016 102.161ZM85.5016 71.0024C77.5108 71.0024 71.0074 77.5055 71.0074 85.496C71.0074 93.4864 77.5108 99.9896 85.5016 99.9896C93.4925 99.9896 99.9959 93.4864 99.9959 85.496C99.9959 77.5055 93.4925 71.0024 85.5016 71.0024Z" fill="#EFF2FC"/>
                                </svg>
                            </div>  
                        <?php } ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
