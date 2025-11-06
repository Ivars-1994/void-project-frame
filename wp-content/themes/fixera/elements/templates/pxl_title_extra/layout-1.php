<div class="pxl-title-extra <?php echo esc_attr( $settings['shadow_style'].' '.$settings['pxl_animate'] ); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
    <div class="pxl-item--title">
    	<?php if( $settings['shadow_style'] == 'shadow-normal' ) { ?>
        	<?php echo pxl_print_html($settings['title']); ?>
        <?php } elseif($settings['shadow_style'] == 'shadow-extra') { ?>
        	<span><?php echo pxl_print_html($settings['title']); ?></span>
        	<span class="text-shadow"><?php echo pxl_print_html($settings['title']); ?></span>
        <?php } ?>
    </div>
</div>