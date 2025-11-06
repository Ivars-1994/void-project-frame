<?php 
$html_id = pxl_get_element_id($settings);
$item_active   = $widget->get_setting('item_active', '2');
?>
<?php if(isset($settings['list']) && !empty($settings['list']) && count($settings['list'])): ?>
    <div class="pxl-iconbox-list pxl-iconbox-list1">
        <?php foreach ($settings['list'] as $key => $value):
            $index_active = $key + 1;
            $active_class = ($item_active == (int)$index_active) ? 'active' : '';
            $icon_key = $widget->get_repeater_setting_key( 'pxl_icon', 'icons', $key );
            $widget->add_render_attribute( $icon_key, [
                'class' => $value['pxl_icon'],
                'aria-hidden' => 'true',
            ] );
            $title = isset($value['title']) ? $value['title'] : '';
            $excerpt = isset($value['excerpt']) ? $value['excerpt'] : '';
            ?>
            <div class="pxl-boxlist-item <?php echo esc_attr($active_class.' '.$settings['pxl_animate']) ?>">
                <div class="pxl-item--icon">
                    <?php if(!empty($value['pxl_icon'])){
                        \Elementor\Icons_Manager::render_icon( $value['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
                    } ?>
                </div>
                <div class="pxl-item--meta">
                    <?php if(!empty($title)) { ?>
                        <h4 class="pxl-item--title">
                            <?php echo pxl_print_html($title); ?>
                        </h4>                                        
                    <?php } ?>
                    <?php if(!empty($excerpt)) { ?>
                        <div class="pxl-item--excerpt">
                            <?php echo pxl_print_html($excerpt); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
