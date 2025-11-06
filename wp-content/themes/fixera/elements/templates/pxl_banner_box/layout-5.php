<div class="pxl-banner pxl-banner5 <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	<div class="pxl-banner-inner">
		<?php if(!empty($settings['banner_image']['id'])) { 
			$image_size = !empty($settings['img_size']) ? $settings['img_size'] : '600x600';
			$img = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_image']['id'],
				'thumb_size' => $image_size,
				'class' => 'no-lazyload'
			));
			$thumbnail = $img['thumbnail'];
			?>
			<div class="box-image-main">
				<div class="icon-quoter pxl-image-effect2">
					<svg width="88" height="86" viewBox="0 0 88 86" fill="none" xmlns="http://www.w3.org/2000/svg">
						<path d="M87.2656 0V19.8192L66.4715 0H87.2656Z"/>
						<path d="M87.2656 32.3659V52.1925L66.4715 32.3659H87.2656Z"/>
						<path d="M83.6664 85.6579L62.8796 65.8387H83.6664V85.6579Z"/>
						<path d="M52.9204 52.1925L32.1263 32.3659H52.9204V52.1925Z"/>
						<path d="M20.7942 0V19.8192L4.3869e-05 0H20.7942Z"/>
						<path d="M56.5123 0V19.8192L35.7182 0H56.5123Z"/>
					</svg>
				</div>
				<?php echo pxl_print_html($thumbnail); ?>
			</div>
		<?php } ?>
		<?php if(!empty($settings['banner_second']['id'])) : 
			$img2 = pxl_get_image_by_size( array(
				'attach_id'  => $settings['banner_second']['id'],
				'thumb_size' => 'full',
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
				'class' => 'no-lazyload'
			));
			$thumbnail3= $img3['thumbnail'];
			?>
			<div class="box-image-thrid">
				<?php echo pxl_print_html($thumbnail3); ?>
			</div>
		<?php endif; ?>
	</div>
</div>