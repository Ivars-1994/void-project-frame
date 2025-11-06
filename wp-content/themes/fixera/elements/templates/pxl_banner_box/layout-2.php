<?php
$widget->add_render_attribute( 'counter', [
    'class' => 'pxl--counter-value '.$settings['effect'].'',
    'data-duration' => $settings['duration'],
    'data-startnumber' => $settings['starting_number'],
    'data-endnumber' => $settings['ending_number'],
    'data-to-value' => $settings['ending_number'],
    'data-delimiter' => $settings['thousand_separator_char'],
] ); ?>
<div class="pxl-banner pxl-banner2 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<div class="pxl-banner-inner">
		<div class="pxl-item--meta">
		    <div class="pxl--item-counter">
		        <div class="pxl--counter-number ft-theme-default">
		            <?php if(!empty($settings['prefix'])) : ?>
		                <span class="pxl--counter-prefix"><?php echo pxl_print_html($settings['prefix']); ?></span>
		            <?php endif; ?>
		            <span <?php pxl_print_html($widget->get_render_attribute_string( 'counter' )); ?>><?php echo esc_html($settings['starting_number']); ?></span>
		            <?php if(!empty($settings['suffix'])) : ?>
		                <span class="pxl--counter-suffix"><?php echo pxl_print_html($settings['suffix']); ?></span>
		            <?php endif; ?>
		        </div>
		    </div>
	        <?php if(!empty($settings['banner_title'])) : ?>
				<div class="pxl-item--title">
					<?php echo pxl_print_html($settings['banner_title']); ?>
				</div>
			<?php endif; ?>
		</div>
		<?php if(!empty($settings['banner_image']['id'])) { 
			$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '600x746';
			$img = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_image']['id'],
				'thumb_size' => $image_size,
				'class' => 'no-lazyload'
			));
			$thumbnail = $img['thumbnail'];
			?>
			<div class="box-image-main">
				<?php echo pxl_print_html($thumbnail); ?>
			</div>
		<?php } ?>
		<?php if(!empty($settings['banner_second']['id'])) : 
			$img3 = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_second']['id'],
				'thumb_size' => 'full',
				'class' => 'no-lazyload'
			));
			$thumbnail3 = $img3['thumbnail'];
			?>
			<div class="box-image-right">
				<?php echo pxl_print_html($thumbnail3); ?>
			</div>
		<?php endif; ?>
	</div>
</div>