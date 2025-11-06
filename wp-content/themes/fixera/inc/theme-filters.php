<?php
/**
 * Filters hook for the theme
 *
 * @package Bravisthemes
 */

/* Custom Classs - Body */
function fixera_body_classes( $classes ) {   

    if (class_exists('ReduxFramework')) {
        $classes[] = ' pxl-redux-page';
    }

    $footer_fixed = fixera()->get_theme_opt('footer_fixed');
    $p_footer_fixed = fixera()->get_page_opt('p_footer_fixed');

    if($p_footer_fixed != false && $p_footer_fixed != 'inherit') {
    	$footer_fixed = $p_footer_fixed;
    }

    if(isset($footer_fixed) && $footer_fixed == 'on') {
        $classes[] = ' pxl-footer-fixed';
    }

    $header_layout = fixera()->get_opt('header_layout');
    $post_header = get_post($header_layout);
    if(!empty($post_header)) {
	    $header_type = get_post_meta( $post_header->ID, 'header_type', true );
	    if(isset($header_type)) {
	    	$classes[] = ' bd-'.$header_type.'';
	    }
    }

	$body_custom_class = fixera()->get_page_opt('body_custom_class');
	if(!empty($body_custom_class)) {
		$classes[] = $body_custom_class;
	}

    return $classes;
}
add_filter( 'body_class', 'fixera_body_classes' );

add_filter( 'pxl_server_info', 'fixera_add_server_info');
function fixera_add_server_info($infos){
  $infos = [
    'api_url' => 'https://api.bravisthemes.com/',
    'docs_url' => 'https://doc.bravisthemes.com/fixera/',
    'plugin_url' => 'https://api.bravisthemes.com/plugins/',
    'demo_url' => 'https://demo.bravisthemes.com/fixera/',
    'support_url' => 'https://bravisthemes.ticksy.com/',
    'help_url' => 'https://doc.bravisthemes.com/fixera',
    'email_support' => '',
    'video_url' => '#'
  ];
  
  return $infos;
}

/* Post Type Support Elementor*/
add_filter( 'pxl_add_cpt_support', 'fixera_add_cpt_support' );
function fixera_add_cpt_support($cpt_support) { 
	$cpt_support[] = 'service';
	$cpt_support[] = 'case';
    $cpt_support[] = 'pxl-slider';
    return $cpt_support;
}

add_filter( 'pxl_support_default_cpt', 'fixera_support_default_cpt' );
function fixera_support_default_cpt($postypes){
	return $postypes; // pxl-template
}

add_filter( 'pxl_extra_post_types', 'fixera_add_post_type' );
function fixera_add_post_type( $postypes ) {

	$case_slug = fixera()->get_theme_opt('case_slug', 'case');
	$case_name = fixera()->get_theme_opt('case_name', 'Case');
	$service_slug = fixera()->get_theme_opt('service_slug', 'service');
	$service_name = fixera()->get_theme_opt('service_name', 'Services');


	$postypes['service'] = array(
		'status' => true,
		'item_name'  => 'Service',
		'items_name' => 'Services',
		'args'       => array(
			'menu_icon'          => 'dashicons-admin-generic',
			'rewrite'             => array(
        	'slug'       => $service_slug,
 		 	),
		),
	); 

	$case_slug = fixera()->get_theme_opt('case_slug', 'case');
	$postypes['case'] = array(
		'status' => true,
		'item_name'  => 'Case Studie',
		'items_name' => 'Case Studies',
		'args'       => array(
			'menu_icon'          => 'dashicons-image-filter',
			'rewrite'             => array(
          'slug'       => $case_slug,
 		 	),
		),
	); 
	return $postypes;
}

add_filter( 'pxl_extra_taxonomies', 'fixera_add_tax' );
function fixera_add_tax( $taxonomies ) {
	$taxonomies['service-category'] = array(
		'status'     => true,
		'post_type'  => array( 'service' ),
		'taxonomy'   => 'Service Category',
		'taxonomies' => 'Service Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'service-category'
 		 	),
		),
		'labels'     => array()
	);
	
	$taxonomies['case-category'] = array(
		'status'     => true,
		'post_type'  => array( 'case' ),
		'taxonomy'   => 'Case Category',
		'taxonomies' => 'Case Categories',
		'args'       => array(
			'rewrite'             => array(
                'slug'       => 'case-category'
 		 	),
		),
		'labels'     => array()
	);
	return $taxonomies;
}

add_filter( 'pxl_theme_builder_post_types', 'fixera_theme_builder_post_type' );
function fixera_theme_builder_post_type($postypes){
	//default are header, footer, mega-menu
	//$postypes[] = 'pxl-slider';
	return $postypes;
}

add_filter( 'pxl_theme_builder_layout_ids', 'fixera_theme_builder_layout_id' );
function fixera_theme_builder_layout_id($layout_ids){
	//default [], 
	$header_layout        = (int)fixera()->get_opt('header_layout');
	$header_mobile_layout = (int)fixera()->get_opt('header_mobile_layout');
	$header_sticky_layout = (int)fixera()->get_opt('header_sticky_layout');
	$footer_layout        = (int)fixera()->get_opt('footer_layout');
	$ptitle_layout        = (int)fixera()->get_opt('ptitle_layout');
	if( $header_layout > 0) 
		$layout_ids[] = $header_layout;
	if( $header_sticky_layout > 0) 
		$layout_ids[] = $header_sticky_layout;
	if( $header_mobile_layout > 0) 
		$layout_ids[] = $header_mobile_layout;
	if( $footer_layout > 0) 
		$layout_ids[] = $footer_layout;
	if( $ptitle_layout > 0) 
		$layout_ids[] = $ptitle_layout;
	
	return $layout_ids;
}

add_filter( 'pxl_wg_get_source_id_builder', 'fixera_wg_get_source_builder' );
function fixera_wg_get_source_builder($wg_datas){
  $wg_datas['tabs'] = ['control_name' => 'tabs', 'source_name' => 'content_template'];
  return $wg_datas;
}
 
add_filter( 'pxl_template_type_support', 'fixera_template_type_support' );
function fixera_template_type_support($type){
	//default ['header','footer','mega-menu']
	$extra_type = [
		'header-mobile' => esc_html__('Header Mobile', 'fixera'), 
        'page-title'   => esc_html__('Page Title', 'fixera'), 
        'hidden-panel' => esc_html__('Hidden Panel', 'fixera'), 
        'tab'          => esc_html__('Tab', 'fixera'), 
        'slider'          => esc_html__('Slider', 'fixera'), 
	];
	$template_type = array_merge($type,$extra_type); 
	return $template_type;
}
  

add_filter( 'get_the_archive_title', 'fixera_archive_title_remove_label' );
function fixera_archive_title_remove_label( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_author() ) {
		$title = get_the_author();
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_home() ) {
		$title = single_post_title( '', false );
	}

	return $title;
}

add_filter( 'comment_reply_link', 'fixera_comment_reply_text' );
function fixera_comment_reply_text( $link ) {
	$link = str_replace( 'Reply', ''.esc_attr__('Reply', 'fixera').'', $link );
	return $link;
}

add_filter( 'pxl_enable_megamenu', 'fixera_enable_megamenu' );
function fixera_enable_megamenu() {
	return true;
}
add_filter( 'pxl_enable_onepage', 'fixera_enable_onepage' );
function fixera_enable_onepage() {
	return true;
}

add_filter( 'pxl_support_awesome_pro', 'fixera_support_awesome_pro' );
function fixera_support_awesome_pro() {
	return true;
}
 
add_filter( 'redux_pxl_iconpicker_field/get_icons', 'fixera_add_icons_to_pxl_iconpicker_field' );
function fixera_add_icons_to_pxl_iconpicker_field($icons){
	$custom_icons = [];
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}


add_filter("pxl_mega_menu/get_icons", "fixera_add_icons_to_megamenu");
function fixera_add_icons_to_megamenu($icons){
	$custom_icons = [];
	$icons = array_merge($custom_icons, $icons);
	return $icons;
}
 

/**
 * Move comment field to bottom
 */
add_filter( 'comment_form_fields', 'fixera_comment_field_to_bottom' );
function fixera_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}


/* ------Disable Lazy loading---- */
add_filter( 'wp_lazy_loading_enabled', '__return_false' );