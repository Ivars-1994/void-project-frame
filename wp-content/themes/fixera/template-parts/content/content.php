<?php
/**
 * @package Bravisthemes
*/
$archive_readmore_text = fixera()->get_theme_opt('archive_readmore_text', esc_html__('Continue Reading', 'fixera'));
$archive_date = fixera()->get_theme_opt( 'archive_date', true );
$archive_category = fixera()->get_theme_opt( 'archive_category', true );
$archive_excerpt_on = fixera()->get_theme_opt( 'archive_excerpt_on', true );
$img_url = '';
if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
    $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-item--archive wow fadeInUp'); ?>>
    <?php if (has_post_thumbnail()) {
        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'fixera-archive'); 
        echo '<div class="pxl-feature pxl-item--image">'; ?>
            <a href="<?php echo esc_url( get_permalink()); ?>">
                <?php the_post_thumbnail('fixera-archive'); ?>
            </a>
            <?php if($archive_date) : ?>
                <span class="item--date"><i class="bravisicon bravisicon-calendar-2"></i>&nbsp;<?php echo get_the_date(); ?></span>
            <?php endif; ?>
        <?php echo '</div>';
    } ?>
    <div class="pxl-item--holder">
        <?php fixera()->blog->get_archive_meta(); ?>
        <?php if (!has_post_format('link') && !has_post_format('quote') && !has_post_format('audio')) { ?>
            <h2 class="pxl-item--title">
                <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                    <?php if(is_sticky()) { ?>
                        <i class="bravisicon bravisicon-check"></i>
                    <?php } ?>
                    <?php the_title(); ?>
                </a>
            </h2>
            <?php if($archive_excerpt_on) : ?>
                <div class="pxl-item--excerpt">
                    <?php
                        fixera()->blog->get_excerpt();
                        wp_link_pages( array(
                            'before'      => '<div class="page-links">',
                            'after'       => '</div>',
                            'link_before' => '<span>',
                            'link_after'  => '</span>',
                        ) );
                    ?>
                </div>
            <?php endif; ?>
        <?php } ?>
        <div class="pxl-item--readmore">
            <a class="btn btn-arvhice" href="<?php echo esc_url( get_permalink()); ?>">
                <i class="bravisicon bravisicon-long-arrow-right-three"></i>
                <?php echo fixera_html($archive_readmore_text); ?>
            </a>
        </div>
    </div>
</article>