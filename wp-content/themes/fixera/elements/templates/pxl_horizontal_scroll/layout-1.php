
<?php 
extract($settings);
$revesal_cls = $revesal == 'true' ? 'revesal' : '';

if(empty($img_size)) {
    $img_size = 'full';
}

if( !empty( $img_gallery ) ){
	$thumbnails = [];
	foreach ($img_gallery as $gal_item) {
		$img_crop  = pxl_get_image_by_size( array(
	        'attach_id'  => $gal_item['id'],
	        'thumb_size' => $img_size,
	    ) );
	    $thumbnails[] = $img_crop['thumbnail'];
	}
}
?>
<?php if(!empty($thumbnails)): ?>
<div class="pxl-horizontal-scroll <?php echo esc_attr($revesal_cls) ?>">
	<div class="scroll-trigger gals-wrap">
	<?php foreach ($thumbnails as $img):?>
		<div class="gal-item"><?php echo wp_kses_post($img); ?></div>	 
	<?php endforeach; ?>
	</div>
</div>
<?php endif; ?>