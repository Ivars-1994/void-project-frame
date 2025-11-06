<?php
$widget->add_render_attribute( 'wrapper', 'class', 'pxl-anchor-item pxl-button' );
$widget->add_render_attribute( 'button', 'class', 'btn '.$settings['btn_hover_effect'].' '.$settings['btn_style'].' '.$settings['pxl_animate'].' pxl-icon--'.$settings['icon_align'].'' );
if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
} 
if ( ! empty( $settings['phone_link']['url'] ) ) {
    $widget->add_render_attribute( 'phone_link', 'href', $settings['phone_link']['url'] );

    if ( $settings['phone_link']['is_external'] ) {
        $widget->add_render_attribute( 'phone_link', 'target', '_blank' );
    }

    if ( $settings['phone_link']['nofollow'] ) {
        $widget->add_render_attribute( 'phone_link', 'rel', 'nofollow' );
    }
} 
$template = (int)$widget->get_setting('content_template','0');
$target = '.pxl-hidden-template-'.$template; 
if($template > 0 ){
	if ( !has_action( 'pxl_anchor_target_hidden_panel_'.$template) ){
		add_action( 'pxl_anchor_target_hidden_panel_'.$template, 'fixera_hook_anchor_hidden_panel' );
	} 
}
?>
<div class="pxl-group-grapper">
	<?php if($settings['s_display'] == 's-on') { ?>
		<div class="pxl-anchor-item pxl-search-popup-button pxl-cursor--cta <?php echo esc_attr($settings['style']); ?>">
			<?php if(!empty($settings['pxl_icon']['value'])) {
		            \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
		    } else { ?>
		    	<i class="icofont icofont-search-1"></i>
		    <?php } ?>
			<?php add_action( 'pxl_anchor_target', 'fixera_hook_anchor_search'); ?>
		</div>
	<?php } ?>
	<?php if($settings['phone_display'] == 'phone-on') { ?>
		<?php if (!empty( $settings['phone_link']['url'] ) ) { ?>
			<div class="pxl-anchor-item pxl-phone">
				<div class="pxl-icon-phone">
					<?php if (!empty( $settings['phone_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'phone_link' )); ?>><?php } ?>
					    <i class="bravisicon bravisicon-phone"></i>
				    <?php if (!empty( $settings['phone_link']['url'] ) ) { ?></a><?php } ?>
				</div>
		        <div class="pxl-phone-meta">
		        	<?php if(!empty($settings['phone_label'])) { ?>
		            	<label><?php echo pxl_print_html($settings['phone_label']); ?></label>
		            <?php } ?>
		            <?php if(!empty($settings['phone_text'])) { ?>
		                <div class="pxl-phone-text">
		                	<?php if (!empty( $settings['phone_link']['url'] ) ) { ?><a <?php pxl_print_html($widget->get_render_attribute_string( 'phone_link' )); ?>><?php } ?>
		                	<?php echo pxl_print_html($settings['phone_text']); ?>
		                	<?php if (!empty( $settings['phone_link']['url'] ) ) { ?></a><?php } ?>
		                </div>
		            <?php } ?>
		        </div>
			</div>
		<?php } ?>
	<?php } ?>
	<?php if($settings['cart_display'] == 'cart-on') { ?>
		<?php if ( class_exists( 'Woocommerce' ) ) { ?>
			<div class="pxl-anchor-item pxl-cart-sidebar-button pxl-anchor side-panel" data-target=".pxl-side-cart">
				<?php if(!empty($settings['pxl_cart_icon']['value'])) {
		            \Elementor\Icons_Manager::render_icon( $settings['pxl_cart_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
			    } else { ?>
			    	<i class="flaticon flaticon-shopping-bag"></i>
			    <?php } ?>
		        <span class="pxl_cart_counter"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'fixera' ), WC()->cart->cart_contents_count ); ?></span>
			</div>
		<?php 
		add_action( 'pxl_anchor_target', 'fixera_hook_anchor_cart');
		} ?>
	<?php } ?>
	<div class="pxl-anchor-item pxl-hidden-panel-button pxl-anchor side-panel pxl-cursor--cta <?php echo esc_attr($settings['style_hidden']); ?>" data-target="<?php echo esc_attr($target)?>">
		<?php if ( $settings['style_hidden '] == 'style-1' || $settings['style_hidden '] == 'style-2' ) { ?>
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
	<?php if($settings['btn_display'] == 'btn-on') { ?>
		<div <?php pxl_print_html($widget->get_render_attribute_string( 'wrapper' )); ?>>
		    <a <?php pxl_print_html($widget->get_render_attribute_string( 'button' )); ?> data-wow-delay="<?php echo esc_attr($settings['pxl_animate_delay']); ?>ms">
		        <?php if(!empty($settings['btn_icon'])) {
		            \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
		        } ?>
		        <span class="pxl--btn-text" data-text="<?php echo esc_attr($settings['text']); ?>">
		            <?php 
		                if($settings['btn_hover_effect'] == 'btn-nina') {
		                    $chars = str_split($settings['text']);
		                    foreach ($chars as $value) {
		                        if($value == ' ') {
		                            echo '<span class="spacer">&nbsp;</span>';
		                        } else {
		                            echo '<span>'.$value.'</span>';
		                        }
		                    }
		                } else {
		                    echo pxl_print_html($settings['text']);
		                }
		            ?>
		        </span>
		    </a>
		</div>
	<?php } ?>
</div>