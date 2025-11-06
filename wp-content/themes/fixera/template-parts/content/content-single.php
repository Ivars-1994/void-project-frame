<?php
/**
 * Template part for displaying posts in loop
 *
 * @package Bravisthemes
 */
$post_tag = fixera()->get_theme_opt( 'post_tag', false );
$post_author_box_info = fixera()->get_theme_opt( 'post_author_box_info', false );
$post_feature_image_on = fixera()->get_page_opt( 'post_feature_image_on', false );
$post_title_on = fixera()->get_theme_opt( 'post_title_on', false );
$post_social_share = fixera()->get_theme_opt( 'post_social_share', false );
?>
<article id="pxl-post-<?php the_ID(); ?>" <?php post_class( 'pxl-item-single-post' ); ?>>
    <div class="pxl-content-top">
        <?php if($post_feature_image_on) { ?>
            <?php if (has_post_thumbnail()) {
                echo '<div class="pxl-item--image">'; ?>
                    <?php the_post_thumbnail('fixera-archive'); ?>
                <?php echo '</div>';
            } 
        } ?>
        <div class="pxl-item--holder">
            <?php fixera()->blog->get_post_metas(); ?>
            <?php if($post_title_on) { ?>
                <h2 class="pxl-item--title"><?php the_title(); ?></h2>
            <?php } ?>
            <div class="pxl-item--content clearfix">
                <?php
                    the_content();
                    wp_link_pages( array(
                        'before'      => '<div class="page-links">',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                    ) );
                ?>
            </div>
            <?php if( $post_social_share ) :  ?>
                <div class="pxl--post-footer">
                    <?php if($post_social_share) { fixera()->blog->get_socials_share(); } ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <?php if($post_author_box_info) : ?>
        <div class="pxl--author-info">
            <div class="entry-author-avatar">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 160 ); ?>
            </div>
            <div class="entry-author-meta">
                <div class="author-meta">
                    <h3 class="author-name">
                        <?php the_author_posts_link(); ?>
                    </h3>
                    <div class="author-description">
                        <?php the_author_meta( 'description' ); ?>
                    </div>
                </div>
                <?php fixera_get_user_social();?>
            </div>
        </div>
    <?php endif; ?>
</article><!-- #post -->