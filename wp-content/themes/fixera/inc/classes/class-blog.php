<?php
if (!class_exists('Fixera_Blog')) {
    class Fixera_Blog
    {
        public function get_archive_meta() {
            $archive_category = fixera()->get_theme_opt( 'archive_category', true );
            $archive_author = fixera()->get_theme_opt( 'archive_author', true );
            $archive_comments_on = fixera()->get_theme_opt( 'archive_comments_on', true );
            if( $archive_comments_on || $archive_category || $archive_author ) : ?>
                <ul class="pxl-item--meta">
                    <?php if($archive_author) : ?>
                        <li class="item--author">
                            <?php echo get_avatar(get_post()->post_author);?>
                            <?php the_author_posts_link();?>                                
                        </li>
                    <?php endif; ?>
                    <?php if($archive_category) : ?>
                        <li class="item--category">
                            <i class="bravisicon bravisicon-open-folder"></i>
                            <?php the_terms( get_the_ID(), 'category', ' ', '' ); ?>
                        </li>
                    <?php endif; ?>
                    <?php if($archive_comments_on) : ?>
                        <li class="item-comment">
                            <a href="<?php the_permalink(); ?>"><i class="bravisicon bravisicon-comment"></i>
                                <?php echo comments_number(esc_html__('0 Comments', 'fixera'),esc_html__('1 Comment', 'fixera'),esc_html__('% Comments', 'fixera')); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php endif; 
        }
        public function get_post_metas(){
            $post_date = fixera()->get_theme_opt( 'post_date', true );
            $post_comments_on = fixera()->get_theme_opt( 'post_comments_on', true );
            $post_category = fixera()->get_theme_opt( 'post_category', true );
            $post_author = fixera()->get_theme_opt( 'post_author', true );

            if( $post_comments_on || $post_date ) : ?>
                <ul class="pxl-item--meta">
                    <?php if($post_date) : ?>
                        <li class="item--date"><i class="bravisicon bravisicon-calendar-alt"></i>&nbsp;<?php echo get_the_date(); ?></li>
                    <?php endif; ?>
                    <?php if($post_author) : ?>
                        <li class="item--author">
                            <i class="bravisicon bravisicon-user-alt"></i>
                            <?php the_author_posts_link();?>
                        </li>
                    <?php endif; ?>
                    <?php if($post_category) : ?>
                        <li class="item--category">
                            <i class="bravisicon bravisicon-folder"></i>
                            <?php the_terms( get_the_ID(), 'category', '', ', ', '' ); ?>
                        </li>
                    <?php endif; ?>                    
                    <?php if($post_comments_on) : ?>
                        <li class="item-comment">
                            <i class="bravisicon bravisicon-comment"></i>
                            <a href="<?php the_permalink(); ?>">
                                <?php echo comments_number(esc_html__('0 Comments', 'fixera'),esc_html__('1 Comment', 'fixera'),esc_html__('% Comments', 'fixera')); ?>
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            <?php endif; 
        }
        public function get_excerpt(){
            $archive_excerpt_length = fixera()->get_theme_opt('archive_excerpt_length', '50');
            $fixera_the_excerpt = get_the_excerpt();
            if(!empty($fixera_the_excerpt)) {
                echo wp_trim_words( $fixera_the_excerpt, $archive_excerpt_length, $more = null );
            } else {
                echo wp_kses_post($this->get_excerpt_more( $archive_excerpt_length ));
            }
        }
        public function get_excerpt_more( $post = null ) {
            $archive_excerpt_length = fixera()->get_theme_opt('archive_excerpt_length', '50');
            $post = get_post( $post );

            if ( empty( $post ) || 0 >= $archive_excerpt_length ) {
                return '';
            }

            if ( post_password_required( $post ) ) {
                return esc_html__( 'Post password required.', 'fixera' );
            }

            $content = apply_filters( 'the_content', strip_shortcodes( $post->post_content ) );
            $content = str_replace( ']]>', ']]&gt;', $content );

            $excerpt_more = apply_filters( 'fixera_excerpt_more', '&hellip;' );
            $excerpt      = wp_trim_words( $content, $archive_excerpt_length, $excerpt_more );

            return $excerpt;
        }
        public function fixera_set_post_views( $postID ) {
            $countKey = 'post_views_count';
            $count    = get_post_meta( $postID, $countKey, true );
            if ( $count == '' ) {
                $count = 0;
                delete_post_meta( $postID, $countKey );
                add_post_meta( $postID, $countKey, '0' );
            } else {
                $count ++;
                update_post_meta( $postID, $countKey, $count );
            }
        }
        public function get_tagged_in(){
            $tags_list = get_the_tag_list( ' ', ' ' );
            if ( $tags_list )
            {
                echo '<div class="pxl--tags">';
                printf('%2$s', '', $tags_list);
                echo '</div>';
            }
        }
        public function get_socials_share() { 
            $img_url = '';
            if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
                $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
            }
            $social_facebook = fixera()->get_theme_opt( 'social_facebook', true );
            $social_twitter = fixera()->get_theme_opt( 'social_twitter', true );
            $social_pinterest = fixera()->get_theme_opt( 'social_pinterest', true );
            $social_linkedin = fixera()->get_theme_opt( 'social_linkedin', true );
            ?>
            <div class="pxl--social wow skewIn">
                <label><?php echo esc_html__('Share: ', 'fixera'); ?></label>
                <?php if($social_facebook) : ?>
                    <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'fixera'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>">
                        <span><?php echo esc_html__('Facebook', 'fixera'); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($social_twitter) : ?>
                    <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'fixera'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20">
                        <span><?php echo esc_html__('Twitter', 'fixera'); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($social_pinterest) : ?>
                    <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'fixera'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20">
                        <span><?php echo esc_html__('Pinterest', 'fixera'); ?></span>
                    </a>
                <?php endif; ?>
                <?php if($social_linkedin) : ?>
                    <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'fixera'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20">
                        <span><?php echo esc_html__('LinkedIn', 'fixera'); ?></span>
                    </a>
                <?php endif; ?>
            </div>
            <?php
        }
        public function get_post_nav() {
            global $post;
            $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
            $next     = get_adjacent_post( false, '', false );

            if ( ! $next && ! $previous )
                return;
            ?>
            <?php
            $next_post = get_next_post();
            $previous_post = get_previous_post();

            if( !empty($next_post) || !empty($previous_post) ) { 
                ?>
                <div class="pxl-post--navigation">
                    <div class="pxl--items">
                        <div class="pxl--item pxl--item-prev">
                            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                                $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                                $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'fixera-thumb-nav');
                                ?>
                                <?php if(!empty($prev_img_id)) : ?>
                                    <div class="pxl--img">
                                        <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><img src="<?php echo wp_kses_post($prev_img_url[0]); ?>" />
                                            <i class="icofont icofont-long-arrow-left"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="pxl--meta">
                                    <a class="pxl--label" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo esc_html__('Previous Post', 'fixera'); ?></a>
                                    <h3 class="pxl-title"><a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                                    </h3>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="pxl--item pxl--item-next">
                            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                                $next_img_id = get_post_thumbnail_id($next_post->ID);
                                $next_img_url = wp_get_attachment_image_src($next_img_id, 'fixera-thumb-nav');
                                ?>
                                <div class="pxl--meta">
                                    <a class="pxl--label" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo esc_html__('Next Post', 'fixera'); ?></a>
                                    <h3 class="pxl-title"><a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                                    </h3>
                                </div>
                                <?php if(!empty($next_img_id)) : ?>
                                    <div class="pxl--img">
                                        <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><img src="<?php echo wp_kses_post($next_img_url[0]); ?>" />
                                            <i class="icofont icofont-long-arrow-right"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            <?php } ?>
                        </div>
                    </div><!-- .nav-links -->
                </div>
            <?php }
        }
        public function get_related_post(){
            $post_related_on = fixera()->get_theme_opt( 'post_related_on', false );

            if($post_related_on) {
                global $post;
                $current_id = $post->ID;
                $posttags = get_the_category($post->ID);
                if (empty($posttags)) return;

                $tags = array();

                foreach ($posttags as $tag) {

                    $tags[] = $tag->term_id;
                }
                $post_number = '6';
                $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
                if (count($query_similar->posts) > 1) {
                    wp_enqueue_script( 'swiper' );
                    wp_enqueue_script( 'pxl-swiper' );
                    $opts = [
                        'slide_direction'               => 'horizontal',
                        'slide_percolumn'               => '1', 
                        'slide_mode'                    => 'slide', 
                        'slides_to_show'                => 3, 
                        'slides_to_show_lg'             => 3, 
                        'slides_to_show_md'             => 2, 
                        'slides_to_show_sm'             => 2, 
                        'slides_to_show_xs'             => 1, 
                        'slides_to_scroll'              => 1, 
                        'slides_gutter'                 => 30, 
                        'arrow'                         => false,
                        'dots'                          => true,
                        'dots_style'                    => 'bullets'
                    ];
                    $data_settings = wp_json_encode($opts);
                    $dir           = is_rtl() ? 'rtl' : 'ltr';
                    ?>
                    <div class="pxl-related-post">
                        <h4 class="widget-title"><?php echo esc_html__('Related Posts', 'fixera'); ?></h4>
                        <div class="class" data-settings="<?php echo esc_attr($data_settings) ?>" data-rtl="<?php echo esc_attr($dir) ?>">
                            <div class="pxl-related-post-inner pxl-swiper-wrapper swiper-wrapper">
                            <?php foreach ($query_similar->posts as $post):
                                $thumbnail_url = '';
                                if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                                    $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'pxl-blog-small', false);
                                endif;
                                if ($post->ID !== $current_id) : ?>
                                    <div class="pxl-swiper-slide swiper-slide grid-item">
                                        <div class="pxl-grid-item-inner">
                                            <?php if (has_post_thumbnail()) { ?>
                                                <div class="item-featured">
                                                    <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" /></a>
                                                </div>
                                            <?php } ?>
                                            <h3 class="item-title">
                                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                            </h3>
                                        </div>
                                    </div>
                                <?php endif;
                            endforeach; ?>
                            </div>
                        </div>
                    </div>
                <?php }
            }

            wp_reset_postdata();
        }
    }
}
