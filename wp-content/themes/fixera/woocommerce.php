<?php
/**
 * Custom Woocommerce shop page.
 */
get_header();
  if(is_singular('product')){
    $fixera_sidebar = fixera()->get_sidebar_args(['type' => 'product', 'content_col'=> '9']); // type: blog, post, page, shop, product
}else{
    $fixera_sidebar = fixera()->get_sidebar_args(['type' => 'shop', 'content_col'=> '9']); // type: blog, post, page, shop, product
}

?>
    <div class="container content-container">
        <div class="row content-row <?php echo esc_attr($fixera_sidebar['wrap_class']) ?>">
            <div id="primary" class="<?php echo esc_attr($fixera_sidebar['content_class']) ?>">
                <main id="main" class="site-main" role="main">
                        <?php woocommerce_content(); ?>
                </main><!-- #main -->
            </div><!-- #primary -->

            <?php if ( $fixera_sidebar['sidebar_class']): ?>
                <aside id="secondary" class="<?php echo esc_attr($fixera_sidebar['sidebar_class']) ?>">
                    <div class="sidebar-sticky pxl-sidebar-sticky">
                        <?php dynamic_sidebar( 'sidebar-shop' ); ?>
                    </div>
                </aside>
            <?php endif; ?>
        </div>
    </div>
<?php
get_footer();