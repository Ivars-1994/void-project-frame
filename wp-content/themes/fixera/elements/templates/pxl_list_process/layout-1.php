<?php
	$default_settings = [
	    'list' => '',
	];
	$settings = array_merge($default_settings, $settings);
	extract($settings);
	$html_id = pxl_get_element_id($settings);
?>
<?php if(isset($settings['list']) && !empty($settings['list']) && count($settings['list'])): ?>
	<div class="pxl-process-list pxl-process-list1 <?php echo esc_attr($settings['item_width']); ?>">
		<div class="content-inner">
			 <?php foreach ($settings['list'] as $key => $value):
			 	$item_label = isset($value['item_label']) ? $value['item_label'] : '';
			 	$item_content = isset($value['item_content']) ? $value['item_content'] : '';
			 	?>
			 	<?php if ( !empty( $item_label ) || !empty( $item_content )) : ?> 
	            <div class="content-item <?php echo esc_attr($settings['pxl_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
	            	<div class="inner-item">
	                    <span class="item-number"><?php echo esc_html($key +1) ; ?></span> 
		                <?php if ( !empty( $item_label ) ) : ?> 
		                	<label class="item-label"><?php echo pxl_print_html($item_label); ?></label>
		                <?php endif; ?>
		                <?php if ( !empty( $item_content ) ) : ?> 
		                	<div class="item-text"><?php echo pxl_print_html($item_content); ?></div>
		                <?php endif; ?>
	            	</div>
	           	</div>
	           	<?php endif; ?>
		    <?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>