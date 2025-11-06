<?php 
$default_settings = [
	'post_type' => '',
	'quick_user' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>

<div class="pxl-icon--users icon-item h-btn-user <?php echo esc_attr($settings['name_display']); ?>">
	<?php 
	if (is_user_logged_in()) {
		$current_user = wp_get_current_user();
		$display_name = $current_user->display_name;
		?>
		<i class="flaticon flaticon-user"></i> <?php echo esc_html__('Hi', 'fixera'); ?>, <a href="#" class="pxl-is-login"><?php echo pxl_print_html($display_name);?></a>
		<ul class="pxl-user-account">
			<?php 
			if (class_exists('WooCommerce')) {
				$my_ac = get_option('woocommerce_myaccount_page_id'); 
				?>
				<li><a href="<?php echo esc_url(get_permalink($my_ac)); ?>"><?php echo esc_html__('My Account', 'fixera'); ?></a></li>
				<?php 
			}
			?>
			<li><a href="<?php echo esc_url(wp_logout_url()); ?>"><?php echo esc_html__('Log Out', 'fixera'); ?></a></li>
		</ul>
		<?php 
	} else {
		?>
		<div class="pxl-is-not-login">
			<i class="flaticon flaticon-user"></i>
			<a href="javascript:void(0)" class="btn-sign-in"><?php echo esc_html__('Login', 'fixera'); ?></a>
			<span>/</span>
			<a href="javascript:void(0)" class="btn-sign-up"><?php echo esc_html__('Register', 'fixera'); ?></a>
		</div>
		<?php 
	}
	?>
</div> 