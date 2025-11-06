<?php
$default_settings = [
    'before_image' => '',
    'after_image' => '',
    'before_text' => '',
    'after_text' => '',
    'style' => 'style1',
    'img_size' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);

$default_size = 'full';
if(!empty($img_size)) {
	$default_size = $img_size;
}
$before_img = pxl_get_image_by_size( array(
	'attach_id'  => $before_image['id'],
	'thumb_size' => $default_size,
));
$before_thumbnail = $before_img['thumbnail']; 

$after_img = pxl_get_image_by_size( array(
	'attach_id'  => $after_image['id'],
	'thumb_size' => $default_size,
));
$after_thumbnail = $after_img['thumbnail']; ?>

<?php if(!empty($before_image['id']) && !empty($after_image['id'])) : ?>
	<div class="pxl-image-before-after1 <?php echo esc_attr($settings['style']); ?>">
		<div class="twentytwenty-container" data-before-text="<?php if(!empty($before_text)) { echo esc_attr($before_text); } else { echo esc_html__('Before', 'fixera'); } ?>" data-after-text="<?php if(!empty($after_text)) { echo esc_attr($after_text); } else { echo esc_html__('After', 'fixera'); } ?>">
	    	<?php echo wp_kses_post($before_thumbnail); ?>
	    	<?php echo wp_kses_post($after_thumbnail); ?>
	    </div>
	</div>
<?php endif; ?>