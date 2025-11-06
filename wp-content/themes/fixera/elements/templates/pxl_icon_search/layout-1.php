<div class="pxl-search-popup-button pxl-cursor--cta">
	<?php if(!empty($settings['pxl_icon']['value'])) {
            \Elementor\Icons_Manager::render_icon( $settings['pxl_icon'], [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
    } else { ?>
    	<i class="icofont icofont-search-1"></i>
    <?php } ?>
</div>
<?php add_action( 'pxl_anchor_target', 'fixera_hook_anchor_search'); ?>