<?php
/**
 * @package Bravisthemes
 */
		$back_totop_on = fixera()->get_theme_opt('back_totop_on', true); ?>
		</div><!-- #main -->

		<?php fixera()->footer->getFooter(); ?>
		<?php do_action( 'pxl_anchor_target') ?>
		<?php if (isset($back_totop_on) && $back_totop_on) : ?>
		    <a class="pxl-scroll-top" href="#">
		    	<i class="icofont icofont-arrow-up"></i>
		    </a>
		<?php endif; ?>
		</div><!-- #wapper -->
	<?php wp_footer(); ?>
	</body>
</html>
