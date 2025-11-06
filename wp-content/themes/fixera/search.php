<?php
/**
 *
 * @package Bravisthemes
 */
get_header();
$fixera_sidebar_pos = fixera()->get_theme_opt( 'blog_sidebar_pos', 'right' );
$fixera_sidebar = fixera()->get_sidebar_args(['type' => 'blog', 'content_col'=> '9']); // type: blog, post, page, shop, product
?>
<div class="container">
    <div class="row <?php echo esc_attr($fixera_sidebar['wrap_class']) ?>">
        <section id="pxl-content-area" class="<?php echo esc_attr($fixera_sidebar['content_class']) ?>">
            <main id="pxl-content-main">
                <?php if ( have_posts() ) {
                    while ( have_posts() ) {
                        the_post();
                        get_template_part( 'template-parts/content/content-search' );
                    }
                    fixera()->page->get_pagination();
                } else {
                    get_template_part( 'template-parts/content/content', 'none' );
                } ?>
            </main>
        </section>
        <?php if ($fixera_sidebar['sidebar_class']) : ?>
            <div id="pxl-sidebar-area" class="<?php echo esc_attr($fixera_sidebar['sidebar_class']) ?>">
                <div class="pxl-sidebar-sticky">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php get_footer();
