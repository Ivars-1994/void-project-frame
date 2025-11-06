<?php
/**
 * Helper functions for the theme
 *
 * @package Bravisthemes
 */
  

function fixera_html($html){
    return $html;
}

/**
 * Google Fonts
*/
function fixera_fonts_url() {
    $fonts_url = '';
    $fonts     = array();
    $subsets   = 'latin,latin-ext';
    if ( 'off' !== _x( 'on', 'DM Sans font: on or off', 'fixera' ) ) {
        $fonts[] = 'DM Sans:ital,wght@0,300;0,400;0,500;0,600;0,700';
    }
    if ( 'off' !== _x( 'on', 'Inter font: on or off', 'fixera' ) ) {
        $fonts[] = 'Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800';
    }
    if ( $fonts ) {
        $fonts_url = add_query_arg( array(
            'family' => implode( '&family=', $fonts ),
            'subset' => urlencode( $subsets ),
        ), '//fonts.googleapis.com/css2' );
    }
    return $fonts_url;
}

/*
 * Get page ID by Slug
*/
function fixera_get_id_by_slug($slug, $post_type){
    $content = get_page_by_path($slug, OBJECT, $post_type);
    $id = $content->ID;
    return $id;
}

/**
 * Show content by slug
 **/
function fixera_content_by_slug($slug, $post_type){
    $content = fixera_get_content_by_slug($slug, $post_type);

    $id = fixera_get_id_by_slug($slug, $post_type);
    echo apply_filters('the_content',  $content);
}

/**
 * Get content by slug
 **/
function fixera_get_content_by_slug($slug, $post_type){
    $content = get_posts(
        array(
            'name'      => $slug,
            'post_type' => $post_type
        )
    );
    if(!empty($content))
        return $content[0]->post_content;
    else
        return;
}
 
/**
 * Custom Comment List
 */
function fixera_comment_list( $comment, $args, $depth ) {
	if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }
	?>
    <<?php echo ''.$tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		    <div class="comment-inner">
		        <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, 160); ?>
		        <div class="comment-content">
                    <h4 class="comment-title">
                        <?php printf( '%s', get_comment_author_link() ); ?><span><?php echo get_comment_date() ?></span>
                    </h4>
		            <div class="comment-text"><?php comment_text(); ?></div>
                    <?php comment_reply_link( array_merge( $args, array(
                        'add_below' => $add_below,
                        'depth'     => $depth,
                        'max_depth' => $args['max_depth']
                    ) ) ); ?>
		        </div>
		    </div>
		<?php if ( 'div' != $args['style'] ) : ?>
        </div>
	<?php endif;
}

/**
 * Paginate Links
 */
function fixera_ajax_paginate_links($link){
    $parts = parse_url($link);
    if( !isset($parts['query']) ) return $link;
    parse_str($parts['query'], $query);
    if(isset($query['page']) && !empty($query['page'])){
        return '#' . $query['page'];
    }
    else{
        return '#1';
    }
}


/**
 * RGB Color
 */
function fixera_hex_rgb($color) {
 
    $default = '0,0,0';
 
    //Return default if no color provided
    if(empty($color))
        return $default; 
 
    //Sanitize $color if "#" is provided 
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    //Convert hexadec to rgb
    $rgb =  array_map('hexdec', $hex);

    $output = implode(",",$rgb);

    //Return rgb(a) color string
    return $output;
}


/**
 * Image Size Crop
 */
if(!function_exists('fixera_get_image_by_size')){
    function fixera_get_image_by_size( $params = array() ) {
        $params = array_merge( array(
            'post_id' => null,
            'attach_id' => null,
            'thumb_size' => 'thumbnail',
            'class' => '',
        ), $params );

        if ( ! $params['thumb_size'] ) {
            $params['thumb_size'] = 'thumbnail';
        }

        if ( ! $params['attach_id'] && ! $params['post_id'] ) {
            return false;
        }

        $post_id = $params['post_id'];

        $attach_id = $post_id ? get_post_thumbnail_id( $post_id ) : $params['attach_id'];
        $attach_id = apply_filters( 'pxl_object_id', $attach_id );
        $thumb_size = $params['thumb_size'];
        $thumb_class = ( isset( $params['class'] ) && '' !== $params['class'] ) ? $params['class'] . ' ' : '';

        global $_wp_additional_image_sizes;
        $thumbnail = '';

        $sizes = array(
            'thumbnail',
            'thumb',
            'medium',
            'medium_large',
            'large',
            'full',
        );
        if ( is_string( $thumb_size ) && ( ( ! empty( $_wp_additional_image_sizes[ $thumb_size ] ) && is_array( $_wp_additional_image_sizes[ $thumb_size ] ) ) || in_array( $thumb_size, $sizes, true ) ) ) {
            $attributes = array( 'class' => $thumb_class . 'attachment-' . $thumb_size );
            $thumbnail = wp_get_attachment_image( $attach_id, $thumb_size, false, $attributes );
            $thumbnail_url = wp_get_attachment_image_url($attach_id, $thumb_size, false);
        } elseif ( $attach_id ) {
            if ( is_string( $thumb_size ) ) {
                preg_match_all( '/\d+/', $thumb_size, $thumb_matches );
                if ( isset( $thumb_matches[0] ) ) {
                    $thumb_size = array();
                    $count = count( $thumb_matches[0] );
                    if ( $count > 1 ) {
                        $thumb_size[] = $thumb_matches[0][0]; // width
                        $thumb_size[] = $thumb_matches[0][1]; // height
                    } elseif ( 1 === $count ) {
                        $thumb_size[] = $thumb_matches[0][0]; // width
                        $thumb_size[] = $thumb_matches[0][0]; // height
                    } else {
                        $thumb_size = false;
                    }
                }
            }
            if ( is_array( $thumb_size ) ) {
                // Resize image to custom size
                $p_img = pxl_resize( $attach_id, null, $thumb_size[0], $thumb_size[1], true );
                $alt = trim( wp_strip_all_tags( get_post_meta( $attach_id, '_wp_attachment_image_alt', true ) ) );
                $attachment = get_post( $attach_id );
                if ( ! empty( $attachment ) ) {
                    $title = trim( wp_strip_all_tags( $attachment->post_title ) );

                    if ( empty( $alt ) ) {
                        $alt = trim( wp_strip_all_tags( $attachment->post_excerpt ) ); // If not, Use the Caption
                    }
                    if ( empty( $alt ) ) {
                        $alt = $title;
                    }
                    if ( $p_img ) {

                        $attributes = pxl_stringify_attributes( array(
                            'class' => $thumb_class,
                            'src' => $p_img['url'],
                            'width' => $p_img['width'],
                            'height' => $p_img['height'],
                            'alt' => $alt,
                            'title' => $title,
                        ) );

                        $thumbnail = '<img ' . $attributes . ' />';
                    }
                }
            }
            $thumbnail_url = $p_img['url'];
        }

        $p_img_large = wp_get_attachment_image_src( $attach_id, 'large' );

        return apply_filters( 'pxl_el_getimagesize', array(
            'thumbnail' => $thumbnail,
            'url' => $thumbnail_url,
            'p_img_large' => $p_img_large,
        ), $attach_id, $params );

    }
}

/**
 * Search Form
 */
function fixera_header_mobile_search_form() { 
    $search_mobile = fixera()->get_theme_opt( 'search_mobile', false );
    if($search_mobile) : ?>
    <div class="pxl-header-mobile-search pxl-hide-xl">
        <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
            <input type="text" placeholder="<?php esc_attr_e('Search...', 'fixera'); ?>" name="s" class="search-field" />
            <button type="submit" class="search-submit"><i class="icofont icofont-search-1"></i></button>
        </form>
    </div>
<?php endif; }

/**
 * Year Shortcode [pxl_year]
 */
if(function_exists( 'pxl_register_shortcode' )) {
    function fixera_year_shortcode() {
        ob_start(); ?>
            <span><?php the_date('Y'); ?></span>
        <?php $output = ob_get_clean();
        return $output;
    }
    pxl_register_shortcode('pxl_year', 'fixera_year_shortcode');
}

/* Highlight Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function fixera_text_highlight_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'text' => '',
        ), $atts));

        ob_start();
        if(!empty($text)) : ?>
        <span class="pxl-title--highlight">
            <?php echo esc_html($text); ?>
        </span>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('highlight', 'fixera_text_highlight_shortcode');
}

/* Highlight Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function fixera_btn_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'text' => '',
         'style' => 'btn-slider1',
         'icon_class' => '',
         'link' => '',
         'text_color' => '',
        ), $atts));

        ob_start();
        if(!empty($text)) : ?>
            <?php if(!empty($link)) : ?><a class="sc-button-wrap" href="<?php echo esc_url($link); ?>"><?php endif; ?>
                <span class="btn <?php echo esc_attr($style); ?> <?php if($style == 'btn-slider1') { echo 'btn-nina'; } ?>" <?php if(!empty($text_color)) { ?>style="color: <?php echo esc_attr($text_color); ?>"<?php } ?>>
                    <?php if($style == 'btn-slider1') { ?>
                        <span class="pxl--btn-text" data-text="<?php echo esc_attr($text); ?>">
                            <?php $chars = str_split($text);
                            foreach ($chars as $value) {
                                echo '<span>'.$value.'</span>';
                            } ?>
                        </span>
                    <?php } else {
                        echo esc_html($text);
                    } ?>
                    <?php if(!empty($icon_class)) : ?>
                        <i class="<?php echo esc_attr($icon_class); ?>"></i>
                    <?php endif; ?>
                </span>
            <?php if(!empty($link)) : ?></a><?php endif; ?>
        <?php  endif;
        $output = ob_get_clean();
        return $output;
    }
    pxl_register_shortcode('pxl_button', 'fixera_btn_shortcode');
}

/* Addd shortcode Video button */
if(function_exists( 'pxl_register_shortcode' )) {
    function fixera_video_button_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'link' => '',
         'text' => '',
         'class' => 'style1',
        ), $atts));

        ob_start();
        ?>
        <div class="wrapper">
            <input type="checkbox">
            <div class="video">
                <video src="<?php echo esc_url($link); ?>" loop muted autoplay playsinline></video>
            </div>
            <div class="text">
                <?php if(!empty($text)) : ?>
                    <span class="slider-video-title"><?php echo esc_html($text); ?></span>
                <?php endif; ?>
            </div>
        </div>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_video_button', 'fixera_video_button_shortcode');
}

/* Gallery Shortcode  */
if(function_exists( 'pxl_register_shortcode' )) {
    function fixera_gallery_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'link' => '#',
         'images_id' => '',
         'cols' => '2',
         'img_size' => 'full'
        ), $atts));

        ob_start();
        ?>
        <div class="pxl-gallery gallery-<?php echo esc_attr($cols); ?>-columns">
        <?php
        $pxl_images = explode( ',', $images_id );
        foreach ($pxl_images as $key => $img_id) :
            $img = pxl_get_image_by_size( array(
                'attach_id'  => $img_id,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="pxl--item">
                <div class="pxl--item-inner <?php if($key == 1 && !empty($link)) { echo 'video-active'; } ?>">
                    <?php echo pxl_print_html($thumbnail); ?>
                    <?php if($key == 1) : ?>
                        <a href="<?php echo esc_url($link); ?>" class="btn-video"><i class="fa fa-play"></i></a>
                    <?php endif; ?>
                </div>
            </div>
            <?php
        endforeach;
        ?>
        </div>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    pxl_register_shortcode('pxl_gallery', 'fixera_gallery_shortcode');
}

/**
 * Custom Widget Categories
 */
add_filter('wp_list_categories', 'fixera_wg_category_count');
function fixera_wg_category_count($output) {
    $dir = is_rtl() ? 'pxl-left' : 'pxl-right';
    $output = str_replace("\t", '', $output);
    $output = str_replace(")\n</li>", ')</li>', $output);
    $output = str_replace('</a> (', ' <span class="pxl-count '.$dir.'">(', $output);
    $output = str_replace(")</li>", ")&nbsp;</span></a></li>", $output);
    $output = str_replace(")\n<ul", ")&nbsp;</span></a>\n<ul", $output);
    return $output;
}


/**
 * Custom Widget Archive
 */
add_filter('get_archives_link', 'fixera_archive_count_span');
function fixera_archive_count_span($links) {
    $dir = is_rtl() ? 'pxl-left' : 'pxl-right';
    $links = str_replace('</a>&nbsp;(', ' <span class="pxl-count '.$dir.'">(', $links);
    $links = str_replace(')', ')</span></a>', $links);
    return $links;
}

/**
 * Custom Widget Product Categories 
 */
add_filter('wp_list_categories', 'fixera_wc_cat_count_span');
function fixera_wc_cat_count_span($links) {
    $dir = is_rtl() ? 'pxl-left' : 'pxl-right';
    $links = str_replace('</a> <span class="pxl-count">(', ' <span class="pxl-count '.$dir.'">(', $links);
    $links = str_replace(')</span>', ')</span></a>', $links);
    return $links;
}