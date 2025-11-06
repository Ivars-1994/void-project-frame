<div class="pxl-search-box <?php echo esc_attr( $settings['style'] ); ?>">
	<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
		<div class="searchform-wrap">
	        <input type="text" placeholder="<?php esc_attr_e('Search', 'fixera'); ?>" name="s" class="search-field" />
	    	<button type="submit" class="search-submit"><i class="icofont icofont-search-2"></i></button>
	    </div>
	</form>
</div>