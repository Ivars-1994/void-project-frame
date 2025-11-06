<?php 
extract($settings);
$revesal_cls = $revesal == 'true' ? 'revesal' : '';

if(empty($img_size)) {
    $img_size = 'full';
}

?>

<div class="pxl-horizontal-scroll <?php echo esc_attr($revesal_cls) ?>">
	<?php if(!empty($title)): ?>
		<div class="scroll-trigger scroll-text"><?php pxl_print_html($title); ?></div>
	<?php endif; ?>
</div>