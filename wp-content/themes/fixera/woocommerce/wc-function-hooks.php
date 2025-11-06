<?php
/* Remove result count & product ordering & item product category..... */
function fixera_cwoocommerce_remove_function() {
	remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5, 0 );
	remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10, 0 );
	remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10, 0 );
	remove_action( 'woocommerce_before_shop_loop' , 'woocommerce_catalog_ordering', 30 );
	remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20 );

	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_rating', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_add_to_cart', 30 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary' , 'woocommerce_template_single_sharing', 50 );
}
add_action( 'init', 'fixera_cwoocommerce_remove_function' );

/* Product Category */
add_action( 'woocommerce_before_shop_loop', 'fixera_woocommerce_nav_top', 2 );
function fixera_woocommerce_nav_top() {?>
	<div class="woocommerce-topbar">
		<div class="woocommerce-result-count">
			<?php woocommerce_result_count(); ?>
		</div>
		<div class="woocommerce-topbar-ordering">
			<?php woocommerce_catalog_ordering(); ?>
		</div>
	</div>
<?php }
add_filter( 'woocommerce_after_shop_loop_item', 'fixera_woocommerce_product' );
function fixera_woocommerce_product() {
	global $product;
	?>
	<div class="woocommerce-product-inner wow fadeInRight">
		<div class="woocommerce-product-header">
			<a class="woocommerce-product-details" href="<?php the_permalink(); ?>">
				<?php woocommerce_template_loop_product_thumbnail(); ?>
			</a>
		</div>
		<div class="woocommerce-product-content">
			<h4 class="woocommerce-product--title">
				<a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a>
			</h4>
			<div class="woocommerce-product--excerpt" style="display: none;">
				<?php woocommerce_template_single_excerpt(); ?>
			</div>
		</div>
		<div class="woo-pxl-price-rating">
			<?php woocommerce_template_loop_price(); ?>
			<?php woocommerce_template_loop_rating(); ?>
		</div>
		<div class="woocommerce-product-meta">
			<div class="meta-left">
				<?php if ( ! $product->managing_stock() && ! $product->is_in_stock() ) { ?>
				<?php } else { ?>
				    	<?php woocommerce_template_loop_add_to_cart(); ?>
				<?php } ?>
			</div>
			<div class="meta-right">
				<?php if (class_exists('WPCleverWoosc')) { ?>
				    <?php echo do_shortcode('[woosc id="'.esc_attr( $product->get_id() ).'"]'); ?>
				<?php } ?>
				<?php if (class_exists('WPCleverWoosw')) { ?>
				    <?php echo do_shortcode('[woosw id="'.esc_attr( $product->get_id() ).'"]'); ?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php }

add_filter('woocommerce_pagination_args', 'fixera_woocommerce_pagination_args');
function fixera_woocommerce_pagination_args($default){
  $default = array_merge($default, [
    'prev_text' => '<i class="bravisicon bravisicon-double-chevron-left"></i>',
    'next_text' => '<i class="bravisicon bravisicon-double-chevron-right"></i>',
    'type'      => 'plain',
	'before_page_number' => '<span class="number-wrapp">',
    'after_page_number'  => '</span>',
  ]);
  return $default;
}

/* Add the custom Tabs Specification */
function fixera_custom_product_tab_specification( $tabs ) {
	$product_specification = fixera()->get_page_opt( 'product_specification' );
	if(!empty($product_specification)) {
		$tabs['tab-product-feature'] = array(
			'title'    => esc_html__( 'Product Specification', 'fixera' ),
			'callback' => 'fixera_custom_tab_content_specification',
			'priority' => 10,
		);
		return $tabs;
	} else {
		return $tabs;
	}
}
add_filter( 'woocommerce_product_tabs', 'fixera_custom_product_tab_specification' );

/* Function that displays output for the Tab Specification. */
function fixera_custom_tab_content_specification( $slug, $tab ) { 
	$product_specification = fixera()->get_page_opt( 'product_specification' );
	$result = count($product_specification); ?>
	<div class="tab-content-wrap">
		<?php if (!empty($product_specification)) : ?>
			<div class="tab-product-feature-list">
				<?php for($i=0; $i<$result; $i+=2) { ?>
					<div class="row">
						<div class="col-xl-4 col-lg-4 col-md-12">
                	<?php echo isset($product_specification[$i])?esc_html( $product_specification[$i] ):''; ?>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12">
                	<?php echo isset($product_specification[$i+1])?esc_html( $product_specification[$i+1] ):''; ?>
                </div>
            </div>
            <div class="line-gap"></div>
				<?php } ?>
			</div>
		<?php endif; ?>
	</div>
<?php }

/* Removes the "shop" title on the main shop page */
function fixera_hide_page_title()
{
    return false;
}
add_filter('woocommerce_show_page_title', 'fixera_hide_page_title');

/* Replace text Onsale */
add_filter('woocommerce_sale_flash', 'fixera_custom_sale_text', 10, 3);
function fixera_custom_sale_text($text, $post, $_product)
{
	$regular_price = get_post_meta( get_the_ID(), '_regular_price', true);
	$sale_price = get_post_meta( get_the_ID(), '_sale_price', true);

	$product_sale = '';
	if(!empty($sale_price)) {
		$product_sale = intval( ( (intval($regular_price) - intval($sale_price)) / intval($regular_price) ) * 100);
		return '<span class="onsale">' .$product_sale. '%</span>';
	}
}

//Custom products layout on archive page
add_filter( 'loop_shop_columns', 'fixera_loop_shop_columns', 20 ); 
function fixera_loop_shop_columns() {
	$columns = isset($_GET['col']) ? sanitize_text_field($_GET['col']) : fixera()->get_theme_opt('products_columns', 4);
	return $columns;
}

/* Show product per page */
function fixera_loop_shop_per_page(){
	$product_per_page = fixera()->get_opt('product_per_page',12);

	if(isset($_REQUEST['loop_shop_per_page']) && !empty($_REQUEST['loop_shop_per_page'])) {
		return $_REQUEST['loop_shop_per_page'];
	} else {
		return $product_per_page;
	}
}
add_filter( 'loop_shop_per_page', 'fixera_loop_shop_per_page' );

/**
 * Modify image width theme support.
 */
add_filter('woocommerce_get_image_size_gallery_thumbnail', function ($size) {
    $size['width'] = 250;
    $size['height'] = 250;
    $size['crop'] = 1;
    return $size;
});

/* Product Single: Summary */
add_action( 'woocommerce_before_single_product_summary', 'fixera_woocommerce_single_summer_start', 0 );
function fixera_woocommerce_single_summer_start() { ?>
	<?php echo '<div class="woocommerce-summary-wrap row">'; ?>
<?php }
add_action( 'woocommerce_after_single_product_summary', 'fixera_woocommerce_single_summer_end', 5 );
function fixera_woocommerce_single_summer_end() { ?>
	<?php echo '</div></div>'; ?>
<?php }


add_action( 'woocommerce_single_product_summary', 'fixera_woocommerce_sg_product_title', 5 );
function fixera_woocommerce_sg_product_title() { 
	global $product; 
	$product_title = fixera()->get_opt( 'product_title', false ); 
	if($product_title ) : ?>
		<div class="woocommerce-sg-product-title">
			<?php woocommerce_template_single_title(); ?>
		</div>
<?php endif; }

add_action( 'woocommerce_single_product_summary', 'fixera_woocommerce_sg_product_rating', 10 );
function fixera_woocommerce_sg_product_rating() { global $product; ?>
	<div class="woo-sg-rate-price">
		<div class="woocommerce-sg-product-rating">
			<?php woocommerce_template_single_rating(); ?>
		</div>
<?php }

add_action( 'woocommerce_single_product_summary', 'fixera_woocommerce_sg_product_price', 10 );
function fixera_woocommerce_sg_product_price() { ?>
		<div class="woocommerce-sg-product-price">
			<?php woocommerce_template_single_price(); ?>
		</div>
	</div>
<?php }

add_action( 'woocommerce_single_product_summary', 'fixera_woocommerce_sg_product_excerpt', 20 );
function fixera_woocommerce_sg_product_excerpt() { 
	global $product; 
	$phone_label = fixera()->get_opt('phone_label', '');
	$phone_text = fixera()->get_opt('phone_text', '');
	$phone_link = fixera()->get_opt('phone_link', '');

	?>
	<div class="woocommerce-sg-product-excerpt">
		<?php woocommerce_template_single_excerpt(); ?>
	</div>
	<div class="woo-pxl-add-to-cart">
		<?php woocommerce_template_single_add_to_cart(); ?>
	</div>
	<div class="woo-pxl-call">
		<?php 
		$icon_phone = fixera()->get_theme_opt('icon_phone',['url'=>'']);
		if(!empty($icon_phone['url'])):
		?>
			<div class="icon-phone"><img src="<?php echo esc_url($icon_phone['url'])?>"></div>
		<?php endif; ?>
		<div class="woo-phone-meta">
			<?php if( $phone_link ) { ?>
				<label><?php echo fixera_html($phone_label); ?></label>
			<?php } ?>
			<?php if( $phone_link ) { ?><a class="link-phone" href="tel:<?php echo fixera_html($phone_link); ?>"><?php } ?>
				<span class="text-phone"><?php echo fixera_html($phone_text); ?></span>
			<?php if( $phone_link ) { ?></a><?php } ?>
		</div>
	</div>
<?php }

add_action( 'woocommerce_single_product_summary', 'fixera_woocommerce_sg_social_share', 40 );
function fixera_woocommerce_sg_social_share() { 
	$product_social_share = fixera()->get_opt( 'product_social_share', false );
	if($product_social_share) : ?>
		<div class="woocommerce-social-share">
			<label><?php echo esc_html__('Share:', 'fixera'); ?></label>
			<a class="fb-social" title="<?php echo esc_attr__('Facebook', 'fixera'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="bravisicon-facebook"></i></a>
	        <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'fixera'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="bravisicon-twitter"></i></a>
	        <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'fixera'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="bravisicon-linkedin"></i></a>
    </div>
<?php endif; }

/* Product Single: Gallery */
add_action( 'woocommerce_before_single_product_summary', 'fixera_woocommerce_single_gallery_start', 0 );
function fixera_woocommerce_single_gallery_start() { ?>
	<?php echo '<div class="woocommerce-gallery col-xl-6 col-lg-6 col-md-12">'; ?>
<?php }
add_action( 'woocommerce_before_single_product_summary', 'fixera_woocommerce_single_gallery_end', 30 );
function fixera_woocommerce_single_gallery_end() { ?>
	<?php echo '</div><div class="col-xl-6 col-lg-6 col-md-12">'; ?>
<?php }

/* Rating */
function fixera_rating($rating_html, $rating) {
	global $product;
	if($product) {
		$rating_count = $product->get_rating_count();
		if($rating_count == 0) {
			$rating_count = esc_html__( 'No', 'fixera' );
		}
		$rating_html = '<div class="star-rating-wrap">';
		$rating_html .= '<div class="star-rating">';
		$rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"></span>';
		$rating_html .= '</div>';
		$rating_html .= '<div class="count-rating">('.$rating_count.')</div>';
		$rating_html .= '</div>';
	}
	return $rating_html;
}
add_filter( 'woocommerce_product_get_rating_html', 'fixera_rating', 10, 2);

/* Rating */
function fixera_woosc_rating($rating_html, $rating) {
	global $product;
	if($product) {
		$rating_count = $product->get_rating_count();
		if($rating_count == 0) {
			$rating_count = esc_html__( 'No', 'fixera' );
		}
		$rating_html = '<div class="star-rating-wrap">';
		$rating_html .= '<div class="star-rating">';
		$rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"></span>';
		$rating_html .= '</div>';
		$rating_html .= '<div class="count-rating">('.$rating_count.')</div>';
		$rating_html .= '</div>';
	}
	return $rating_html;
}
add_filter( 'woosc_woocommerce_rating', 'fixera_woosc_rating', 10, 2);

/* Ajax update cart total number */

add_filter( 'woocommerce_add_to_cart_fragments', 'fixera_woocommerce_sidebar_cart_count_number' );
function fixera_woocommerce_sidebar_cart_count_number( $fragments ) {
	ob_start();
	?>
	<span class="pxl_cart_counter"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'fixera' ), WC()->cart->cart_contents_count ); ?></span>
	<?php
	
	$fragments['.pxl_cart_counter'] = ob_get_clean();
	
	return $fragments;
}

/*add_filter( 'woocommerce_output_related_products_args', 'fixera_related_products_args', 20 );
  function fixera_related_products_args( $args ) {
	$args['posts_per_page'] = 3;
	$args['columns'] = 3;
	return $args;
}*/

remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
add_action('woocommerce_after_single_product_summary','fixera_output_related_products', 20);
function fixera_output_related_products(){
	$product_related = fixera()->get_theme_opt('product_related','0');
	if($product_related == 0 || empty($product_related)) return;

	$rel_title_icon = fixera()->get_theme_opt('rel_title_icon',['url'=>'']);
	$rel_extra_title = fixera()->get_theme_opt('rel_extra_title','');
	 
	global $product;
	if ( ! $product ) {
		return;
	}
 	  
	$args = array(
		'posts_per_page' => 6,
		'columns'        => 3,
		'orderby'        => 'rand',  
		'order'          => 'desc',
	);

	$args['related_products'] = array_filter( array_map( 'wc_get_product', wc_get_related_products( $product->get_id(), $args['posts_per_page'], $product->get_upsell_ids() ) ), 'wc_products_array_filter_visible' );

	// Handle orderby.
	$args['related_products'] = wc_products_array_orderby( $args['related_products'], $args['orderby'], $args['order'] );

	// Set global loop values.
	wc_set_loop_prop( 'name', 'related' );
	wc_set_loop_prop( 'columns', apply_filters( 'woocommerce_related_products_columns', $args['columns'] ) );

	if ( $args['related_products'] ){
		?>
		<section class="related products">
			<?php
			$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'fixera' ) );
			?>
			<div class="rel-title-wrap">
				<?php 
				if ( $heading ) : ?>
					<h4 class="woo-relate-subtitle">
						<?php if(!empty($rel_title_icon['url'])): ?>
							<span class="title-icon"><img src="<?php echo esc_url($rel_title_icon['url'])?>"></span>
						<?php endif; ?>
						<?php echo esc_html( $heading ); ?>
					</h4>
				<?php endif; ?>
				<?php if(!empty($rel_extra_title)): ?>
					<h2 class="woo-extra-relate-title"><?php echo esc_html( $rel_extra_title ); ?></h2>
				<?php endif; ?>
			</div>
			<?php woocommerce_product_loop_start(); ?>

				<?php foreach ( $args['related_products'] as $related_product ) : ?>

						<?php
						$post_object = get_post( $related_product->get_id() );

						setup_postdata( $GLOBALS['post'] =& $post_object ); 
						wc_get_template_part( 'content', 'product' );
						?>

				<?php endforeach; ?>

			<?php woocommerce_product_loop_end(); ?>

		</section>
		<?php 
	}
	wp_reset_postdata();
}

/* Pagination Args */
function fixera_filter_woocommerce_pagination_args( $array ) { 
	$array['end_size'] = 1;
	$array['mid_size'] = 1;
    return $array; 
}; 
add_filter( 'woocommerce_pagination_args', 'fixera_filter_woocommerce_pagination_args', 10, 1 ); 

add_filter( 'woocommerce_checkout_before_order_review_heading', 'fixera_checkout_before_order_review_heading', 10 );
  function fixera_checkout_before_order_review_heading() {
	echo '<div class="pxl-checkout-order-review">';
}
add_filter( 'woocommerce_checkout_after_order_review', 'fixera_checkout_after_order_review', 20 );
  function fixera_checkout_after_order_review() {
	echo '</div>';
}

function fixera_woocommerce_query($type='recent_product',$post_per_page=-1,$product_ids='',$categories='',$param_args=[]){
    global $wp_query;

    $product_visibility_term_ids = wc_get_product_visibility_term_ids();
    if(!empty($product_ids)){

        if (get_query_var('paged')) {
            $pxl_paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $pxl_paged = get_query_var('page');
        } else {
            $pxl_paged = 1;
        }

        $pxl_query = new WP_Query(array(
            'post_type' => 'product',
            'post__in' => array_map('intval', explode(',', $product_ids)),
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'term_taxonomy_id',
                    'terms'    => is_search() ? $product_visibility_term_ids['exclude-from-search'] : $product_visibility_term_ids['exclude-from-catalog'],
                    'operator' => 'NOT IN',
                )
            ),
        ));
         
        $posts = $pxl_query;

        $categories = [];
    }else{
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $post_per_page,
            'post_status' => 'publish',
            'post_parent' => 0,
            'date_query' => array(
                array(
                   'before' => date('Y-m-d H:i:s', current_time( 'timestamp' ))
                )
            ),
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_visibility',
                    'field'    => 'term_taxonomy_id',
                    'terms'    => is_search() ? $product_visibility_term_ids['exclude-from-search'] : $product_visibility_term_ids['exclude-from-catalog'],
                    'operator' => 'NOT IN',
                )
            ),
        );

        if(!empty($categories)){

            $args['tax_query'][] = array(
                'taxonomy' => 'product_cat',
                'field' => 'slug',
                'operator' => 'IN',
                'terms' => $categories,
            );
        }

        if( !empty($param_args['pro_atts']) ){
            foreach ($param_args['pro_atts'] as $k => $v) {
                $args['tax_query'][] = array(
                    'taxonomy' => $k,
                    'field' => 'slug',
                    'terms' => $v
                );
            }
        }

        $args['meta_query'] = array(
            'relation'    => 'AND'
        );

        if( !empty($param_args['min_price']) && !empty($param_args['max_price'])){ 
            $args['meta_query'][] =   array(
                'key'     => '_price',
                'value'   => array( $param_args['min_price'], $param_args['max_price'] ),
                'compare' => 'BETWEEN',
                'type'    => 'DECIMAL(10,' . wc_get_price_decimals() . ')',
            );
        }

        $args = fixera_product_filter_type_args($type,$args);

        if (get_query_var('paged')){ 
            $pxl_paged = get_query_var('paged'); 
        }elseif(get_query_var('page')){ 
            $pxl_paged = get_query_var('page'); 
        }else{ 
            $pxl_paged = 1; 
        }
        if($pxl_paged > 1){
            $args['paged'] = $pxl_paged;
        }
 
        $posts = $pxl_query = new WP_Query($args);
 
        if (empty($categories)) {
            $product_categories = get_categories(array( 'taxonomy' => 'product_cat' ));
            $categories = array();
            foreach($product_categories as $key => $category){
                $categories[] = $category->slug;
            }
        }
    }
    global $wp_query;
    $wp_query = $pxl_query;
    $pagination = get_the_posts_pagination(array(
        'screen_reader_text' => '',
        'mid_size' => 2,
        'prev_text' => esc_html__('Back', 'fixera'),
        'next_text' => esc_html__('Next', 'fixera'),
    ));
    global $paged;
    $paged = $pxl_paged; 

    
    wp_reset_query(); 
    return array(
        'posts' => $posts,
        'categories' => $categories,
        'query' => $pxl_query,
        'args' => $args,
        'paged' => $paged,
        'max' => $pxl_query->max_num_pages,
        'next_link' => next_posts($pxl_query->max_num_pages, false),
        'total' => $pxl_query->found_posts,
        'pagination' => $pagination
    );
}

function fixera_product_filter_type_args($type,$args){
    switch ($type) {
        case 'best_selling':
            $args['meta_key']='total_sales';
            $args['orderby']='meta_value_num';
            $args['ignore_sticky_posts']   = 1;
            break;
        case 'featured_product':
            $args['ignore_sticky_posts'] = 1;
            $args['tax_query'][] = array(
                'taxonomy' => 'product_visibility',
                'field'    => 'term_taxonomy_id',
                'terms'    => $product_visibility_term_ids['featured'],
            );
            break;
        case 'top_rate':
            $args['meta_key']   ='_wc_average_rating';
            $args['orderby']    ='meta_value_num';
            $args['order']      ='DESC';
            break;
        case 'recent_product':
            $args['orderby']    = 'date';
            $args['order']      = 'DESC';
            break;
        case 'on_sale':
            $args['post__in'] = wc_get_product_ids_on_sale();
            break;
        case 'recent_review':
            if($post_per_page == -1) $_limit = 4;
            else $_limit = $post_per_page;
            global $wpdb;
            $query = $wpdb->prepare("SELECT c.comment_post_ID FROM {$wpdb->prefix}posts p, {$wpdb->prefix}comments c WHERE p.ID = c.comment_post_ID AND c.comment_approved > 0 AND p.post_type = 'product' AND p.post_status = 'publish' AND p.comment_count > 0 ORDER BY c.comment_date ASC LIMIT 0, %d", $_limit);
            $results = $wpdb->get_results($query, OBJECT);
            $_pids = array();
            foreach ($results as $re) {
                $_pids[] = $re->comment_post_ID;
            }

            $args['post__in'] = $_pids;
            break;
        case 'deals':
            $args['meta_query'][] = array(
                                 'key' => '_sale_price_dates_to',
                                 'value' => '0',
                                 'compare' => '>');
            $args['post__in'] = wc_get_product_ids_on_sale();
            break;
        case 'separate':
            if ( ! empty( $product_ids ) ) {
                $ids = array_map( 'trim', explode( ',', $product_ids ) );
                if ( 1 === count( $ids ) ) {
                    $args['p'] = $ids[0];
                } else {
                    $args['post__in'] = $ids;
                }
            }
            break;
    }
    return $args;
}

add_filter( 'woocommerce_dropdown_variation_attribute_options_html', 'fixera_custom_variation_attribute_options_html', 10, 2 );
function fixera_custom_variation_attribute_options_html( $html, $args){
	global $wpdb, $product;
	$product_variation_style = isset($_GET['variation-style']) ? sanitize_text_field($_GET['variation-style']) : fixera()->get_theme_opt('product_variation_style','dropdown');
	if($product_variation_style == 'dropdown') return $html;

	$options               = $args['options'];
	$product               = $args['product'];
	$attribute             = $args['attribute'];
	$name                  = $args['name'] ? $args['name'] : 'attribute_' . sanitize_title( $attribute );
	$id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
	$class                 = $args['class'];
	$show_option_none      = (bool) $args['show_option_none'];
	$show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : esc_html__( 'Choose an option', 'fixera' ); // We'll do our best to hide the placeholder, but we'll need to show something when resetting options.

	if ( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
		$attributes = $product->get_variation_attributes();
		$options    = $attributes[ $attribute ];
	}
  
	$custom_html  = '<ul id="pxl-variation-att-terms" class="pxl-variation-att-terms ' . esc_attr( $class ) . '" data-attribute_name="attribute_' . esc_attr( sanitize_title( $attribute ) ) . '" data-id="'.esc_attr($id).'">';
	if ( ! empty( $options ) ) {
		if ( $product && taxonomy_exists( $attribute ) ) {
			
			$terms = wc_get_product_terms( $product->get_id(), $attribute, array( 'fields' => 'all' ) );

			foreach ( $terms as $term ) {
				
    			$term_slug = $term->slug;
    			$variation_id = $wpdb->get_col( 
    				$wpdb->prepare( 
					    "
					        SELECT      postmeta.post_id AS product_id
					        FROM        ".$wpdb->prefix."postmeta AS postmeta
					        LEFT JOIN  ".$wpdb->prefix."posts AS products
					                ON ( products.ID = postmeta.post_id )
					        WHERE       postmeta.meta_key LIKE 'attribute_%'
					        AND postmeta.meta_value = '%s'
					        AND products.post_parent = %d
					    ",
				        $term_slug,
					    $product->get_id()
					)
    			);
    			if(!empty($variation_id)){
	    			$parent = wp_get_post_parent_id( $variation_id[0] );

	    			$vari_price = '';
	    			if ( $parent > 0 ) {
				        $_product = new WC_Product_Variation( $variation_id[0] );
				    
				        $vari_price = $_product->get_price_html();  
				    }
				}
				if ( in_array( $term->slug, $options, true )) {
					$custom_html .= '<li class="pxl-vari-item">';
					$custom_html .= '<a href="javascript:void(0)" onclick="return false;" aria-label="'. esc_html($term->name) .'" class="pro-variation-select custom-vari-enabled" data-value="'. esc_attr($term->slug) .'" ><span class="lbl">' . esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name, $term, $attribute, $product ) ) . '</span>';
						if(!empty($vari_price))
							$custom_html .= '<span class="price">'.$vari_price.'</span>';
						$custom_html .= '</a>';
					$custom_html .= '</li>';
				}
			}
		} else {
			foreach ( $options as $option ) {
				// This handles < 2.4.0 bw compatibility where text attributes were not sanitized.
				$selected = sanitize_title( $args['selected'] ) === $args['selected'] ? selected( $args['selected'], sanitize_title( $option ), false ) : selected( $args['selected'], $option, false );
				$custom_html .= '<li>';
				$custom_html .= '<a href="javascript:void(0)" onclick="return false;" aria-label="'. esc_html($name) .'" class="pro-variation-select ' . $selected . '" data-value="'. esc_attr($option) .'" >' . esc_html( apply_filters( 'woocommerce_variation_option_name', $option, null, $attribute, $product ) ) . '</a>';
				$custom_html .= '</li>';
			}
		}
	}

	$custom_html .= '</ul>';
	return $custom_html.$html;
}
