<?php
/**
 * @package Bravisthemes
 */
$archive_readmore_text = fixera()->get_theme_opt( 'archive_readmore_text', esc_html__('Read more', 'fixera') );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('pxl-item--post pxl-item--archive'); ?>>
    <?php if (has_post_thumbnail()) { 
        echo '<div class="pxl-item--image">'; ?>
            <a href="<?php echo esc_url( get_permalink()); ?>"><?php the_post_thumbnail('fixera-archive'); ?></a>
        <?php echo '</div>';
    } ?>
    <div class="pxl-item--holder">
        <?php fixera()->blog->get_archive_meta(); ?>
        <h2 class="pxl-item--title">
            <a href="<?php echo esc_url( get_permalink()); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_title(); ?>
            </a>
        </h2>
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
        <div class="pxl-item--readmore">
            <a class="btn" href="<?php echo esc_url( get_permalink()); ?>">
                <?php echo fixera_html($archive_readmore_text); ?>
                <i class="flaticon flaticon-up-right"></i>
            </a>
        </div>
    </div>
</article><!-- #post -->