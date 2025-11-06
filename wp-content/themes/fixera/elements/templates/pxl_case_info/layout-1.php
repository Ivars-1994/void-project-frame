<?php 
extract($settings);
if(!is_singular( 'case' )) return;
$post_id = get_the_ID();
$client = get_post_meta( $post_id, 'client', true );
$location = get_post_meta( $post_id, 'location', true );
$date_start = get_post_meta( $post_id, 'date_start', true);
$date_end = get_post_meta( $post_id, 'date_end', true);
$term_list = get_the_term_list( $post_id, 'case-category', '', ' ', '' );
$tag_list = get_the_term_list( $post_id, 'case-tag', '', ' ', '' );
?>
<div class="pxl-case-info">
    <<?php echo esc_attr($settings['title_tag']); ?> class="pxl-item--title el-empty">
            <span><?php echo pxl_print_html($settings['title']); ?></span>
    </<?php echo esc_attr($settings['title_tag']); ?>>
	<div class="content-inner">
		<?php if( is_singular( 'case' ) && $post_id > 0 ): ?>
			<?php if ( !empty( $client ) ) : ?> 
				<div class="content-item client">
					<div class="item-icon">
						<i class="bravisicon bravisicon-user-alt"></i>
					</div>
					<span class="lbl d-block"><?php echo esc_html__( 'Clients', 'fixera' ) ?></span>
					<span class="item-text"><?php pxl_print_html($client) ?></span>
				</div>
			<?php endif; ?>
			<?php if ( !is_wp_error( $term_list ) ) : ?> 
				<div class="content-item type-category">
					<div class="item-icon">
						<i class="bravisicon bravisicon-folder"></i>
					</div>
					<span class="lbl d-block"><?php echo esc_html__( 'Category', 'fixera' ) ?></span>
					<?php the_terms( $post_id, 'case-category', '', ' ' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( !is_wp_error( $tag_list ) ) : ?> 
				<div class="content-item type-tag">
					<div class="item-icon">
						<i class="bravisicon bravisicon-folder"></i>
					</div>
					<span class="lbl d-block"><?php echo esc_html__( 'Tags', 'fixera' ) ?></span>
					<?php the_terms( $post_id, 'case-tag', '', ' ' ); ?>
				</div>
			<?php endif; ?>
			<?php if ( !empty( $location ) ) : ?> 
				<div class="content-item location">
					<div class="item-icon">
						<i class="bravisicon bravisicon-user-alt"></i>
					</div>
					<span class="lbl d-block"><?php echo esc_html__( 'locations', 'fixera' ) ?></span>
					<span class="item-text"><?php pxl_print_html($location) ?></span>
				</div>
			<?php endif; ?>
			<?php if ( !empty( $date_start ) || !empty( $date_end ) ) : ?> 
				<div class="content-item date">
					<div class="item-icon">
						<i class="bravisicon bravisicon-calendar-1"></i>
					</div>
					<span class="lbl d-block"><?php echo esc_html__( 'Date', 'fixera' ) ?></span>
					<span class="item-text"><?php pxl_print_html( date('d F Y', strtotime($date_start) )); ?> - <?php pxl_print_html( date('d F Y', strtotime($date_end) )); ?></span>
				</div>
			<?php endif; ?>
		<?php endif; ?>
		<?php if(isset($list) && !empty($list) && count($list)): 
        	foreach ($list as $key => $pxl_list): ?>
        		<?php if ( !empty( $pxl_list['item_label'] ) || !empty( $pxl_list['item_content'] ) ) : ?> 
		            <div class="content-item">
		            	<div class="item-icon">
		            		<i class="bravisicon bravisicon-check-mark"></i>
		            	</div>
		                <?php if ( !empty( $pxl_list['item_label'] ) ) : ?> 
		                	<span class="lbl d-block"><?php pxl_print_html($pxl_list['item_label'])?></span>
		                <?php endif; ?>
		                <?php if ( !empty( $pxl_list['item_content'] ) ) : ?> 
		                	<span class="item-text"><?php pxl_print_html($pxl_list['item_content'])?></span>
		                <?php endif; ?>
		           </div>
	           <?php endif; ?>
	        <?php endforeach; ?>
		<?php endif; ?>
	</div>
</div>