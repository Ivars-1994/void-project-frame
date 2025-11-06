<?php 
    if(!function_exists('fixera_get_post_grid')){
    function fixera_get_post_grid($posts = [], $settings = []){ 
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['layout']) {
            case 'post-1':
                fixera_get_post_grid_layout1($posts, $settings);
                break;
            case 'case-1':
                fixera_get_case_grid_layout1($posts, $settings);
                break;
            case 'case-2':
                fixera_get_case_grid_layout2($posts, $settings);
                break;
            case 'service-1':
                fixera_get_service_grid_layout1($posts, $settings);
                break;
            case 'service-2':
                fixera_get_service_grid_layout2($posts, $settings);
                break;
            default:
                return false;
                break;
        }
    }
}

// Start Post Grid
//--------------------------------------------------
function fixera_get_post_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '740x600';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author); 
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="pxl-feature pxl-item--featured">
                            <a class="link-thumbnail" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                            <?php if($show_date == 'true') { ?>
                                <?php if($show_date == 'true'): ?>
                                    <span class="item--date">
                                        <i class="bravisicon bravisicon-calendar-2"></i>
                                        <?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?>
                                    </span>
                                <?php endif; ?>
                            <?php } ?>                            
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item--holder">
                        <?php if($show_author == 'true'): ?>
                            <div class="item--author">
                                <a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>">
                                    <?php echo get_avatar( get_the_author_meta( 'ID' ), 90 ); ?>
                                    <?php echo esc_html($author->display_name); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <h3 class="pxl-item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_html(get_the_title($post->ID)); ?></a></h3>
                        <?php if($show_excerpt == 'true'): ?>
                            <div class="pxl-item--content">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <a class="btn-showmore" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <span><?php if(!empty($button_text)) {
                                    echo esc_attr($button_text);
                                } else {
                                    echo esc_html__('Read More', 'fixera');
                                } ?></span>
                                <i class="bravisicon bravisicon-long-arrow-right-three"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}
function fixera_get_post_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '740x600';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            }
            $author = get_user_by('id', $post->post_author); 
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                            <a class="link-ovlay" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                            </a>
                        </div>
                        <div class="item--meta">
                            <?php if($show_date == 'true'): ?>
                                <div class="item--date">
                                    <i class="bravisicon bravisicon-calendar-1"></i>
                                    <?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="pxl-item--title">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <?php echo esc_html(get_the_title($post->ID)); ?>
                                </a>
                            </h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}
// End Post Grid
//--------------------------------------------------

// Start Service Grid
//--------------------------------------------------
function fixera_get_service_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '822x600';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                $thumbnail_url    = $img['url'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } 

            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $list_meta = get_post_meta($post->ID, 'list_meta', true);
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($settings['style_box'].' '.$pxl_animate); ?>" data-wow-duration="1.2s">
                    <div class="pxl-content-main">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                            <div class="item--featured">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <?php echo wp_kses_post($thumbnail); ?>    
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="pxl-item-body">
                            <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                                $icon_img = pxl_get_image_by_size( array(
                                    'attach_id'  => $service_icon_img['id'],
                                    'thumb_size' => 'full',
                                ));
                                $icon_thumbnail = $icon_img['thumbnail'];
                                ?>
                                <div class="pxl-item--icon">
                                    <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                        <?php echo wp_kses_post($icon_thumbnail); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                                <div class="pxl-item--icon">
                                    <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                        <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if($show_category == 'true'): ?>
                                <div class="item--category">
                                    <?php the_terms( $post->ID, 'service-category', '', ' ' ); ?>
                                </div>
                            <?php endif; ?>
                            <h3 class="pxl-item--title">
                                <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                    <?php echo esc_html(get_the_title($post->ID)); ?>
                                </a>
                            </h3>
                            <?php if($show_excerpt == 'true'): ?>
                                <div class="pxl-item--content">
                                    <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($show_button == 'true') :?>
                                <a class="btn-showmore" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                    <i class="bravisicon bravisicon-long-arrow-right-three"></i>
                                    <span>
                                        <?php if(!empty($button_text)) {
                                            echo esc_attr($button_text);
                                        } else {
                                            echo esc_html__('Read More', 'fixera');
                                        } ?>
                                    </span>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="pxl-content-holder">
                        <div class="bg-image" style="background-image: url(<?php echo wp_kses_post($thumbnail_url); ?>);">
                        </div>
                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                            $icon_img = pxl_get_image_by_size( array(
                                'attach_id'  => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                            <div class="pxl-item--icon">
                                <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                    <?php echo wp_kses_post($icon_thumbnail); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="pxl-item--icon">
                                <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                    <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if($show_category == 'true'): ?>
                            <div class="item--category">
                                <?php the_terms( $post->ID, 'service-category', '', ' ' ); ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="pxl-item--title">
                            <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </h3>
                        <?php if($show_excerpt == 'true'): ?>
                            <div class="pxl-item--content">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>

                        <?php if(!empty($list_meta)) { ?>
                            <ul class="pxl-list-row-info">
                            <?php foreach ($list_meta as $list_meta): ?>
                                <li>
                                    <i class="bravisicon bravisicon-check"></i>
                                    <span><?php pxl_print_html($list_meta); ?></span>
                                </li>
                            <?php endforeach;?>
                            </ul>
                        <?php } ?>
                        <?php if($show_button == 'true') :?>
                            <a class="btn-showmore" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <span>
                                    <?php if(!empty($button_text)) {
                                        echo esc_attr($button_text);
                                    } else {
                                        echo esc_html__('Read More', 'fixera');
                                    } ?>
                                </span>
                                <i class="bravisicon bravisicon-long-arrow-right-three"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}
function fixera_get_service_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '822x600';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                $thumbnail_url    = $img['url'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } 

            $service_icon_type = get_post_meta($post->ID, 'service_icon_type', true);
            $service_icon_font = get_post_meta($post->ID, 'service_icon_font', true);
            $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
            $service_external_link = get_post_meta($post->ID, 'service_external_link', true);
            $list_meta = get_post_meta($post->ID, 'list_meta', true);
            ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>    
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="pxl-item-body">
                        <?php if($service_icon_type == 'image' && !empty($service_icon_img)) : 
                            $icon_img = pxl_get_image_by_size( array(
                                'attach_id'  => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                            <div class="pxl-item--icon">
                                <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                    <?php echo wp_kses_post($icon_thumbnail); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if($service_icon_type == 'icon' && !empty($service_icon_font)) : ?>
                            <div class="pxl-item--icon">
                                <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                    <i class="<?php echo esc_attr($service_icon_font); ?>"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                        <?php if($show_category == 'true'): ?>
                            <div class="item--category">
                                <?php the_terms( $post->ID, 'service-category', '', ' ' ); ?>
                            </div>
                        <?php endif; ?>
                        <h3 class="pxl-item--title">
                            <a href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <?php echo esc_html(get_the_title($post->ID)); ?>
                            </a>
                        </h3>
                        <?php if($show_excerpt == 'true'): ?>
                            <div class="pxl-item--content">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_button == 'true') :?>
                            <a class="btn-showmore" href="<?php if(!empty($service_external_link)) { echo esc_url($service_external_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                <i class="bravisicon bravisicon-long-arrow-right-three"></i>
                                <span>
                                    <?php if(!empty($button_text)) {
                                        echo esc_attr($button_text);
                                    } else {
                                        echo esc_html__('Read More', 'fixera');
                                    } ?>
                                </span>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}
// End Service Grid
//-------------------------------------

// Start Case Grid
//--------------------------------------------------
function fixera_get_case_grid_layout1($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '800x600';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            $case_date = get_post_meta($post->ID, 'date_start', true);

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                        <div class="item--meta <?php echo esc_attr($bg_meta_style); ?>">
                            <svg width="287" height="102" viewBox="0 0 287 102" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M286.034 101.651L-5.82868 40.6905L-7 0.35495L286.034 101.651Z"/>
                            </svg>
                            <a class="btn-link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.73491 2.06407C1.73513 1.696 1.88145 1.34306 2.14172 1.08279C2.40199 0.822526 2.75493 0.676207 3.123 0.675978L14.254 0.675979C14.622 0.676208 14.975 0.822527 15.2352 1.0828C15.4955 1.34306 15.6418 1.696 15.642 2.06407L15.642 13.195C15.6291 13.5547 15.4773 13.8954 15.2184 14.1455C14.9596 14.3955 14.6139 14.5355 14.2539 14.536C13.894 14.5355 13.5483 14.3955 13.2895 14.1455C13.0306 13.8954 12.8788 13.5547 12.8659 13.195L12.8659 5.41645L3.123 15.1593C2.86252 15.4198 2.50923 15.5661 2.14086 15.5661C1.77248 15.5661 1.41919 15.4198 1.15871 15.1593C0.898234 14.8988 0.751898 14.5455 0.751898 14.1772C0.751897 13.8088 0.898233 13.4555 1.15871 13.195L10.9016 3.45217L3.123 3.45217C2.75492 3.45194 2.40199 3.30562 2.14172 3.04535C1.88145 2.78508 1.73513 2.43215 1.73491 2.06407Z"/>
                                </svg>
                            </a>
                            <h3 class="pxl-item--title">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <?php echo esc_html(get_the_title($post->ID)); ?>
                                </a>
                            </h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}
function fixera_get_case_grid_layout2($posts = [], $settings = []){ 
    extract($settings);
    $images_size = !empty($img_size) ? $img_size : '800x600';
    if (is_array($posts)):
        foreach ($posts as $key => $post):
            $item_class = "pxl-grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
            if(isset($grid_masonry) && !empty($grid_masonry[$key]) && (count($grid_masonry) > 1)) {
                $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                $item_class = "pxl-grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                $img_size_m = $grid_masonry[$key]['img_size_m'];
                if(!empty($img_size_m)) {
                    $images_size = $img_size_m;
                }
            } elseif (!empty($img_size)) {
                $images_size = $img_size;
            }

            if(!empty($tax))
                $filter_class = pxl_get_term_of_post_to_class($post->ID, array_unique($tax));
            else 
                $filter_class = '';
            $case_date = get_post_meta($post->ID, 'date_start', true);

            $img_id = get_post_thumbnail_id($post->ID);
            if($img_id) {
                $img = pxl_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
            } else {
                $thumbnail = get_the_post_thumbnail($post->ID, $images_size);
            } ?>
            <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                <div class="pxl-item--inner <?php echo esc_attr($pxl_animate); ?>" data-wow-duration="1.2s">
                    <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                        <div class="item--featured">
                            <?php echo wp_kses_post($thumbnail); ?>
                        </div>
                        <div class="item--meta <?php echo esc_attr($bg_meta_style); ?>">
                            <svg width="287" height="102" viewBox="0 0 287 102" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M286.034 101.651L-5.82868 40.6905L-7 0.35495L286.034 101.651Z"/>
                            </svg>
                            <a class="btn-link" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M1.73491 2.06407C1.73513 1.696 1.88145 1.34306 2.14172 1.08279C2.40199 0.822526 2.75493 0.676207 3.123 0.675978L14.254 0.675979C14.622 0.676208 14.975 0.822527 15.2352 1.0828C15.4955 1.34306 15.6418 1.696 15.642 2.06407L15.642 13.195C15.6291 13.5547 15.4773 13.8954 15.2184 14.1455C14.9596 14.3955 14.6139 14.5355 14.2539 14.536C13.894 14.5355 13.5483 14.3955 13.2895 14.1455C13.0306 13.8954 12.8788 13.5547 12.8659 13.195L12.8659 5.41645L3.123 15.1593C2.86252 15.4198 2.50923 15.5661 2.14086 15.5661C1.77248 15.5661 1.41919 15.4198 1.15871 15.1593C0.898234 14.8988 0.751898 14.5455 0.751898 14.1772C0.751897 13.8088 0.898233 13.4555 1.15871 13.195L10.9016 3.45217L3.123 3.45217C2.75492 3.45194 2.40199 3.30562 2.14172 3.04535C1.88145 2.78508 1.73513 2.43215 1.73491 2.06407Z"/>
                                </svg>
                            </a>
                            <h3 class="pxl-item--title">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <?php echo esc_html(get_the_title($post->ID)); ?>
                                </a>
                            </h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php
        endforeach;
    endif;
}

// End Case Grid
//-------------------------------------

add_action( 'wp_ajax_fixera_get_pagination_html', 'fixera_get_pagination_html' );
add_action( 'wp_ajax_nopriv_fixera_get_pagination_html', 'fixera_get_pagination_html' );
function fixera_get_pagination_html(){
    try{
        if(!isset($_POST['query_vars'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'fixera'));
        }
        $query = new WP_Query($_POST['query_vars']);
        ob_start();
        fixera()->page->get_pagination( $query,  true );
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'fixera'),
                'data' => array(
                    'html' => $html,
                    'query_vars' => $_POST['query_vars'],
                    'post' => $query->have_posts()
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}

add_action( 'wp_ajax_fixera_load_more_post_grid', 'fixera_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_fixera_load_more_post_grid', 'fixera_load_more_post_grid' );
function fixera_load_more_post_grid(){
    try{
        if(!isset($_POST['settings'])){
            throw new Exception(__('Something went wrong while requesting. Please try again!', 'fixera'));
        }
        $settings = $_POST['settings'];
        set_query_var('paged', $settings['paged']);
        extract(pxl_get_posts_of_grid($settings['post_type'], [
            'source' => isset($settings['source'])?$settings['source']:'',
            'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
            'order' => isset($settings['order'])?$settings['order']:'desc',
            'limit' => isset($settings['limit'])?$settings['limit']:'6',
            'post_ids' => isset($settings['post_ids'])?$settings['post_ids']:[],
        ]));
        ob_start();
         
        fixera_get_post_grid($posts, $settings);
        $html = ob_get_clean();
        wp_send_json(
            array(
                'status' => true,
                'message' => esc_attr__('Load Successfully!', 'fixera'),
                'data' => array(
                    'html' => $html,
                    'paged' => $settings['paged'],
                    'posts' => $posts,
                    'max' => $max,
                ),
            )
        );
    }
    catch (Exception $e){
        wp_send_json(array('status' => false, 'message' => $e->getMessage()));
    }
    die;
}