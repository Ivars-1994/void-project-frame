<?php
$html_id = pxl_get_element_id($settings);
$editor_title = $widget->get_settings_for_display( 'title' );
$editor_title = $widget->parse_text_editor( $editor_title );
?>
<div class="pxl-heading">
	<div class="pxl-heading--inner">
		<?php if(!empty($settings['sub_title'])) : ?>
			<div class="pxl-item--subtitle <?php echo esc_attr( $settings['pxl_animate_sub'] ); ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay_sub']); ?>ms">
				<span><?php echo esc_html($settings['sub_title']); ?></span>
			</div>
		<?php endif; ?>
		<<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title <?php if($settings['pxl_animate'] !== 'wow letter') { echo esc_attr($settings['pxl_animate']); } ?>" data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
			<?php if($settings['source_type'] == 'text' && !empty($editor_title)) {
				if($settings['pxl_animate'] == 'wow letter') {
					$arr_str = explode(' ', $editor_title); ?>
					<span class="pxl-item--text">
			            <?php foreach ($arr_str as $index => $value) {
			                $arr_str[$index] = '<span class="pxl-text--slide"><span class="'.$settings['pxl_animate'].'">' . $value . '</span></span>';
			            }
			            $str = implode(' ', $arr_str);
			            echo wp_kses_post($str); ?>
			        </span>
				<?php } else {
					echo wp_kses_post($editor_title);
				} 
			} elseif($settings['source_type'] == 'title') {
				$titles = fixera()->page->get_title();
				pxl_print_html($titles['title']);
			}?>		
		</<?php echo esc_attr($settings['title_tag']); ?>>
		<?php if ( $settings['divider'] == 'divider-on' ) { ?>
			<span class="pxl-divider"></span>
		<?php } ?>
	</div>
</div>