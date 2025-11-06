<?php 
$template = (int)$widget->get_setting('content_template','0');
$target = '.pxl-hidden-template-'.$template; 
if($template > 0 ){
	if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
		add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'fixera_hook_anchor_hidden_panel' );
	} 
}
?>
<div class="pxl-hidden-panel-button pxl-anchor side-panel pxl-cursor--cta <?php echo esc_attr( $settings['style'] ); ?>" data-target="<?php echo esc_attr($target)?>">
	<?php if ( $settings['style'] == 'style-1' || $settings['style'] == 'style-2' ) { ?>
		<span class="pxl-icon-line pxl-icon-line1"></span>
		<span class="pxl-icon-line pxl-icon-line2"></span>
		<span class="pxl-icon-line pxl-icon-line3"></span>
	<?php } else { ?>
		<span class="pxl-icon-line pxl-icon-line1">
			<i class="icofont icofont-square"></i>
			<i class="icofont icofont-square"></i>
			<i class="icofont icofont-square"></i>
		</span>
		<span class="pxl-icon-line pxl-icon-line2">
			<i class="icofont icofont-square"></i>
			<i class="icofont icofont-square"></i>
			<i class="icofont icofont-square"></i>
		</span>
		<span class="pxl-icon-line pxl-icon-line3">
			<i class="icofont icofont-square"></i>
			<i class="icofont icofont-square"></i>
			<i class="icofont icofont-square"></i>
		</span>
	<?php } ?>
</div>