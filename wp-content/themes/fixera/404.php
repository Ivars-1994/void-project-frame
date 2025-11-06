<?php
/**
 * @package Bravisthemes
 */
get_header(); ?>
<?php 
    $template_404 = (int)fixera()->get_theme_opt('template_404',0); 
?>
<div class="container">
    <?php if ($template_404 <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )): ?>
        <div class="row content-row">
            <div id="pxl-content-area" class="pxl-content-area col-12">
                <main id="pxl-content-main">
                    <div class="pxl-error-inner">
                        <div class="content-404">
                            <div class="pxl-number-404 wow fadeInUp">
                                <span class="text-primary"><?php echo esc_html__('404', 'fixera'); ?></span>
                                <span class="text-shadow"><?php echo esc_html__('404', 'fixera'); ?></span>
                            </div>
                            <h3 class="pxl-error-title wow fadeInUp">
                                <?php echo esc_html__('PAGE NOT FOUND', 'fixera'); ?>
                            </h3>
                            <div class="pxl-excerpt-404 wow fadeInUp">
                                <?php echo esc_html__('Oops! The page you are looking for does not exist. It might have been moved or deleted..', 'fixera'); ?>    
                            </div>
                            <form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
                                <div class="searchform-wrap">
                                    <input type="text" placeholder="<?php esc_attr_e('Search Here...', 'fixera'); ?>" name="s" class="search-field" />
                                    <button type="submit" class="search-submit"><i class="icofont icofont-search-1"></i></button>
                                </div>
                            </form>
                            <a class="btn btn-404 wow fadeInUp" href="<?php echo esc_url(home_url( '/' )); ?>"><?php echo esc_html__('Go To Home', 'fixera'); ?></a>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    <?php else: ?>
        <?php if( $template_404 > 0): ?>
            <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( $template_404); ?>      
        <?php endif; ?>
    <?php endif; ?>
</div>
<?php get_footer();
