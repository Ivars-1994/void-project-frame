<div class="pxl-banner pxl-banner3 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<div class="pxl-banner-inner">
		<div class="box-quoter">
			<svg width="122" height="106" viewBox="0 0 122 106" fill="none" xmlns="http://www.w3.org/2000/svg">
			<path d="M23.5194 0.208008C10.6394 0.208008 0.191406 10.952 0.191406 24.208C0.191406 37.456 10.6394 48.208 23.5194 48.208C46.8394 48.208 31.2954 94.6 0.191406 94.6V105.8C55.7034 105.808 77.4554 0.208008 23.5194 0.208008ZM90.7194 0.208008C77.8474 0.208008 67.3994 10.952 67.3994 24.208C67.3994 37.456 77.8474 48.208 90.7194 48.208C114.047 48.208 98.5034 94.6 67.3994 94.6V105.8C122.903 105.808 144.655 0.208008 90.7194 0.208008Z" fill="#FFCD05"/>
			</svg>
		</div>
		<?php if(!empty($settings['banner_image']['id'])) { 
			$image_size = !empty($settings['img_size']) ? $settings['img_size'] : 'full';
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
			$img2 = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_second']['id'],
				'thumb_size' => '310x310',
				'class' => 'no-lazyload'
			));
			$thumbnail2 = $img2['thumbnail'];
			?>
			<div class="box-image-right">
				<?php echo pxl_print_html($thumbnail2); ?>
			</div>
		<?php endif; ?>
		<?php if(!empty($settings['banner_third']['id'])) : 
			$img3 = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_third']['id'],
				'thumb_size' => 'full',
				'class' => 'no-lazyload slide-right-to-left'
			));
			$thumbnail3= $img3['thumbnail'];
			?>
			<div class="box-image-thrid">
				<?php echo pxl_print_html($thumbnail3); ?>
			</div>
		<?php endif; ?>
		<?php if(!empty($settings['banner_four']['id'])) : 
			$img4 = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_four']['id'],
				'thumb_size' => 'full',
				'class' => 'no-lazyload'
			));
			$thumbnail4 = $img4['thumbnail'];
			?>
			<div class="box-image-four">
				<?php echo pxl_print_html($thumbnail4); ?>
			</div>
		<?php endif; ?>
	</div>
</div>