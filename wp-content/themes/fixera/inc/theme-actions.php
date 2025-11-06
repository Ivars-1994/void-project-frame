<?php 
/**
 * Actions Hook for the theme
 *
 * @package Bravisthemes
 */
add_action('after_setup_theme', 'fixera_setup');
function fixera_setup(){

    //Set the content width in pixels, based on the theme's design and stylesheet.
    $GLOBALS['content_width'] = apply_filters( 'fixera_content_width', 1200 );

    // Make theme available for translation.
    load_theme_textdomain( 'fixera', get_template_directory() . '/languages' );

    // Custom Header
    add_theme_support( 'custom-header' );

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    set_post_thumbnail_size( 1170, 710 );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus( array(
        'primary' => esc_html__( 'Primary', 'fixera' ),
    ) );

    // Add theme support for selective refresh for widgets.
    add_theme_support( 'customize-selective-refresh-widgets' );

    // Add support for core custom logo.
    add_theme_support( 'custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    add_theme_support( 'post-formats', array(
        'video',
        'audio',
        'gallery',
        'quote',
        'link',
    ) );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support('post-thumbnails');
    add_image_size( 'fixera-thumb-small', 600, 394, true );
    add_image_size( 'fixera-thumb-nav', 600, 600, true );
    add_image_size( 'fixera-thumb-xs', 120, 104, true );
    add_image_size( 'fixera-post', 970, 593, true );
    add_image_size( 'fixera-archive', 885, 593, true );
    add_image_size( 'fixera-thumb-nav-widget', 636, 400, true );

    add_theme_support( 'woocommerce' );
    add_theme_support( 'wc-product-gallery-zoom' );
    add_theme_support( 'wc-product-gallery-lightbox' );
    add_theme_support( 'wc-product-gallery-slider' );
    remove_theme_support('widgets-block-editor');

}

/**
 * Register Widgets Position.
 */
add_action( 'widgets_init', 'fixera_widgets_position' );
function fixera_widgets_position() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'fixera' ),
		'id'            => 'sidebar-blog',
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );
	if (class_exists('ReduxFramework')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'fixera' ),
			'id'            => 'sidebar-page',
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
	}

	if ( class_exists( 'Woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'fixera' ),
			'id'            => 'sidebar-shop',
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
	}
}

/**
 * Enqueue Styles Scripts : Front-End
 */
add_action( 'wp_enqueue_scripts', 'fixera_scripts' );
function fixera_scripts() {  
    $fixera_version = wp_get_theme( get_template() );
    /* Popup Libs */
    wp_enqueue_style( 'twentytwenty', get_template_directory_uri() . '/assets/css/twentytwenty.css', array(), '1.0.0' );
    wp_enqueue_style( 'jquery-ui', get_template_directory_uri() . '/assets/css/jquery-ui.css', array(), '1.0.0' );
    wp_enqueue_style('magnific-popup', get_template_directory_uri() . '/assets/css/libs/magnific-popup.css', array(), '1.1.0');
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/libs/magnific-popup.min.js', array( 'jquery' ), '1.1.0', true );
    wp_enqueue_style('wow-animate', get_template_directory_uri() . '/assets/css/libs/animate.min.css', array(), '1.1.0');
    wp_enqueue_script( 'wow-animate', get_template_directory_uri() . '/assets/js/libs/wow.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'jquery-ui-slider' );
    
    /* Parallax Libs */
    wp_register_script( 'stellar-parallax', get_template_directory_uri() . '/assets/js/libs/stellar-parallax.min.js', array( 'jquery' ), '0.6.2', true );
    /* Parallax Image */
    wp_register_script( 'tilt', get_template_directory_uri() . '/assets/js/libs/tilt.min.js', array( 'jquery' ), '1.0.0', true );
    
    wp_enqueue_script( 'gsap-lib', get_template_directory_uri() . '/assets/js/libs/gsap.min.js', array( 'jquery' ), '1.0.0', true );
    /* Icons Lib - CSS */
    wp_enqueue_style('icofont', get_template_directory_uri() . '/assets/fonts/icofont/css/icofont.css', array(), $fixera_version->get( 'Version' ));
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css', array(), $fixera_version->get( 'Version' ));
    // Image Before After
    wp_register_script( 'event-move', get_template_directory_uri() . '/assets/js/libs/event.move.js', array( 'jquery' ), '1.0.0', true );
    wp_register_script( 'twentytwenty', get_template_directory_uri() . '/assets/js/libs/twentytwenty.js', array( 'jquery' ), '1.0.0', true );
    
    /* Counter Effect */
    wp_register_script( 'pxl-counter-slide', get_template_directory_uri() . '/assets/js/libs/counter-slide.min.js', array( 'jquery' ), '1.0.0', true );
    /* Nice Select */
    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/libs/nice-select.min.js', array( 'jquery' ), 'all', true );
    /* Tweenmax */
    wp_register_script( 'pxl-tweenmax', get_template_directory_uri() . '/assets/js/libs/tweenmax.min.js', array( 'jquery' ), '2.1.2', true );
    /* Parallax Move Mouse */
    wp_register_script( 'pxl-parallax-move-mouse', get_template_directory_uri() . '/assets/js/libs/parallax-move-mouse.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_style( 'pxl-bravisicon', get_template_directory_uri() . '/assets/css/bravisicon.css', array(), $fixera_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-grid', get_template_directory_uri() . '/assets/css/grid.css', array(), $fixera_version->get( 'Version' ) );
	wp_enqueue_style( 'pxl-style', get_template_directory_uri() . '/assets/css/style.css', array(), $fixera_version->get( 'Version' ) );
	wp_add_inline_style( 'pxl-style', fixera_inline_styles() );
    wp_enqueue_style( 'pxl-base', get_template_directory_uri() . '/style.css', array(), $fixera_version->get( 'Version' ) );
    wp_enqueue_style( 'pxl-google-fonts', fixera_fonts_url(), array(), null );
	wp_enqueue_script( 'pxl-main', get_template_directory_uri() . '/assets/js/theme.js', array( 'jquery' ), $fixera_version->get( 'Version' ), true );
    wp_enqueue_script( 'pxl-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.js', array( 'jquery' ), $fixera_version->get( 'Version' ), true );
    wp_localize_script( 'pxl-main', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
    do_action( 'fixera_scripts');
}

/**
 * Enqueue Styles Scripts : Back-End
 */
add_action('admin_enqueue_scripts', 'fixera_admin_style');
function fixera_admin_style() {
    $theme = wp_get_theme( get_template() );
    wp_enqueue_style( 'fixera-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), $theme->get( 'Version' ) );
    wp_enqueue_style('icofont', get_template_directory_uri() . '/assets/fonts/icofont/css/icofont.css');
    wp_enqueue_style('flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');
    
    wp_enqueue_script( 'admin-widget', get_template_directory_uri() . '/inc/admin/assets/js/widget.js', array( 'jquery' ), '1.0.0', true );
}

add_action( 'elementor/editor/before_enqueue_scripts', function() {
    wp_enqueue_style( 'admin-icofont', get_template_directory_uri() . '/assets/fonts/icofont/css/icofont.css');
    wp_enqueue_style( 'admin-flaticon', get_template_directory_uri() . '/assets/fonts/flaticon/css/flaticon.css');
    wp_enqueue_style( 'fixera-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
} );


/* Favicon */
add_action('wp_head', 'fixera_site_favicon');
function fixera_site_favicon(){
    $favicon = fixera()->get_theme_opt( 'favicon' );
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
add_action( 'wp_head', 'fixera_pingback_header' );
function fixera_pingback_header() {
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
 
add_action( 'elementor/preview/enqueue_styles', 'fixera_add_editor_preview_style' );
function fixera_add_editor_preview_style() {
    wp_add_inline_style( 'editor-preview', fixera_editor_preview_inline_styles() );
}
function fixera_editor_preview_inline_styles(){
    $theme_colors = fixera_configs('theme_colors');
    ob_start();
        echo '.elementor-edit-area-active{';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
        echo '}';
    return ob_get_clean();
}

add_action( 'pxl_anchor_target', 'fixera_hook_anchor_templates_hidden_panel');
function fixera_hook_anchor_templates_hidden_panel(){

    $hidden_templates = fixera_get_templates_slug('hidden-panel');
    if(empty($hidden_templates)) return;

    foreach ($hidden_templates as $slug => $values){
        $args = [
            'slug' => $slug,
            'post_id' => $values['post_id'],
            'position' => !empty($values['position']) ? $values['position'] : 'custom-pos'
        ];
        if( did_action('pxl_anchor_target_hidden_panel_'.$values['post_id']) <= 0){  
            //can be assign from here: do_action( 'pxl_anchor_target_hidden_panel_'.$slug);
            do_action( 'pxl_anchor_target_hidden_panel_'.$values['post_id'], $args );  
        }
    } 
} 

if(!function_exists('fixera_hook_anchor_hidden_panel')){
    function fixera_hook_anchor_hidden_panel($args){  
        ?>
        <div class="pxl-hidden-template pxl-hidden-template-<?php echo esc_attr($args['post_id'])?> pos-<?php echo esc_attr($args['position']) ?>">
            <div class="pxl-popup--overlay pxl-cursor--cta"></div>
            <div class="pxl-panel-content custom_scroll">
                <span class="pxl-close" title="<?php echo esc_attr__( 'Close', 'fixera' ) ?>"></span>
               <?php echo Elementor\Plugin::$instance->frontend->get_builder_content_for_display( (int)$args['post_id']); ?>
            </div>
        </div> 
        <?php    
    }
}

function fixera_hook_anchor_custom(){
    return;
}

/* Search Popup */
if(!function_exists('fixera_hook_anchor_search')){
    function fixera_hook_anchor_search(){ ?>
        <div id="pxl-search-popup">
            <div class="pxl-item--content">
                <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                    <input type="text" placeholder="<?php esc_attr_e('Start Typing here...', 'fixera'); ?>" name="s" class="search-field" />
                    <button type="submit" class="search-submit rm-style-default">
                        <i class="icofont icofont-search-1"></i>
                    </button>
                </form>
                <div class="pxl-item--close pxl-close"></div>
            </div>
        </div>
    <?php }
}       
/* Cart Sidebar */
if(!function_exists('fixera_hook_anchor_cart')){
    function fixera_hook_anchor_cart(){ ?>
        <div class="pxl-hidden-template pxl-side-cart pos-right">
            <div class="pxl-hidden-template-wrap">
                <div class="pxl-panel-header">
                    <div class="panel-header-inner">
                        <span class="pxl-title h3"><?php echo esc_html__( 'Cart', 'fixera' ) ?><span class="widget_cart_counter">(<?php echo sprintf (_n( '%d item', '%d items', WC()->cart->cart_contents_count, 'fixera' ), WC()->cart->cart_contents_count ); ?>)</span></span>
                        <span class="pxl-close" title="<?php echo esc_attr__( 'Close', 'fixera' ) ?>"></span>
                    </div>
                </div>
                <div class="pxl-panel-content widget_shopping_cart custom_scroll">
                    <div class="widget_shopping_cart_content">
                        <?php woocommerce_mini_cart(); ?>
                    </div>
                </div>
            </div>
        </div> 
        
    <?php }
}      
