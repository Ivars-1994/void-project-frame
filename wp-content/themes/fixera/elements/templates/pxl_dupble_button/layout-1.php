<div class="pxl-dupble-button">
    <?php if ( ! empty( $settings['btn_text'] ) ) {
        $widget->add_render_attribute( 'link', 'href', $settings['link']['url'] );

        if ( $settings['link']['is_external'] ) {
            $widget->add_render_attribute( 'link', 'target', '_blank' );
        }

        if ( $settings['link']['nofollow'] ) {
            $widget->add_render_attribute( 'link', 'rel', 'nofollow' );
        } ?>
        <a class="btn active" <?php pxl_print_html($widget->get_render_attribute_string( 'link' )); ?>>
            <span><?php echo esc_html($settings['btn_text']); ?></span>
        </a>
    <?php } ?>
    <?php if ( ! empty( $settings['btn_text2'] ) ) {
        $widget->add_render_attribute( 'link2', 'href', $settings['link2']['url'] );

        if ( $settings['link2']['is_external'] ) {
            $widget->add_render_attribute( 'link2', 'target', '_blank' );
        }

        if ( $settings['link2']['nofollow'] ) {
            $widget->add_render_attribute( 'link2', 'rel', 'nofollow' );
        } ?>
        <a class="btn" <?php pxl_print_html($widget->get_render_attribute_string( 'link2' )); ?>>
            <span><?php echo esc_html($settings['btn_text2']); ?></span>
        </a>
    <?php } ?>
</div>