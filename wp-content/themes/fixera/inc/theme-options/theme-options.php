<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = fixera()->get_option_name();
$version = fixera()->get_version();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => '', //$theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $version,
    // Version that appears at the top of your panel
    'menu_type'            => 'submenu', //class_exists('Pxltheme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'fixera'),
    'page_title'           => esc_html__('Theme Options', 'fixera'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => false,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => 80,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => 'pxlart', //class_exists('Fixera_Admin_Page') ? 'case' : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'pxlart-theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'fixera'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'fixera'),
            'default'  => '',
            'url'      => false
        ),
        array(
            'id'       => 'site_loader',
            'type'     => 'switch',
            'title'    => esc_html__('Loader', 'fixera'),
            'default'  => false
        ),
        array(
            'id'    => 'loader_style',
            'type'  => 'select',
            'title' => esc_html__('Loader Style', 'fixera'),
            'options' => [
                'style-text'           => esc_html__('Text(Default)', 'fixera'),
                'style-experiment'      => esc_html__('Experiment', 'fixera'),
                'style-business'       => esc_html__('Business', 'fixera'),
            ],
            'default' => 'style-text',
            'indent' => true,
            'required' => array( 0 => 'loading_page', 1 => 'equals', 2 => 'bd' ),
        ),
        array(
            'id'             => 'loading_text',
            'type'           => 'text',
            'title'          => esc_html__('Loading Text', 'fixera'),
            'default'        => '',
            'desc'           => esc_html__('Enter the text displayed on load.', 'fixera'),
            'required'       => array( 0 => 'loader_style', 1 => 'equals', 2 => 'style-text' ),
            'force_output'   => true
        ),
    )
));

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'fixera'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'fixera'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Scondary Color', 'fixera'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'third_color',
            'type'        => 'color',
            'title'       => esc_html__('Thrid Color', 'fixera'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'fourth_color',
            'type'        => 'color',
            'title'       => esc_html__('Fourth Color', 'fixera'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'fifth_color',
            'type'        => 'color',
            'title'       => esc_html__('Fifth Color', 'fixera'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'six_color',
            'type'        => 'color',
            'title'       => esc_html__('Six Color', 'fixera'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'          => 'sevent_color',
            'type'        => 'color',
            'title'       => esc_html__('Sevent Color', 'fixera'),
            'transparent' => false,
            'default'     => ''
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'fixera'),
            'default' => array(
                'regular' => '',
                'hover'   => '',
                'active'  => ''
            ),
            'output'  => array('a')
        ),
        array(
            'id'          => 'gradient_color',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color', 'fixera'),
            'transparent' => false,
            'default'  => array(
                'from' => '',
                'to'   => '', 
            ),
        ),
        array(
            'id'       => 'body_bg_color',
            'type'     => 'background',
            'title'    => esc_html__('Body Background Color', 'fixera'),
            'output'   => array( 'background-color' => 'body' ),
            'force_output' => true,
            'background-image' => false,
            'background-color' => true,
            'background-position' => false,
            'background-repeat' => false,
            'background-size' => false,
            'background-attachment' => false,
            'transparent' => false,
            'default'  => ''
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'fixera'),
    'icon'   => 'el el-indent-left',
    'fields' => array_merge(
        fixera_header_opts(),
        array(
            array(
                'id'       => 'sticky_scroll',
                'type'     => 'button_set',
                'title'    => esc_html__('Sticky Scroll', 'fixera'),
                'options'  => array(
                    'pxl-sticky-stt' => esc_html__('Scroll To Top', 'fixera'),
                    'pxl-sticky-stb'  => esc_html__('Scroll To Bottom', 'fixera'),
                ),
                'default'  => 'pxl-sticky-stb',
            ),
        )
    )
));


Redux::setSection($opt_name, array(
    'title'      => esc_html__('Header Mobile', 'fixera'),
    'icon'       => 'el el-indent-left',
    'fields'     => array_merge(
        fixera_header_mobile_opts()
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mobile', 'fixera'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo_m',
            'type'     => 'media',
            'title'    => esc_html__('Select Logo', 'fixera'),
             'default' => array(
                'url'=>get_template_directory_uri().'/assets/img/logo.png'
            ),
            'url'      => false
        ),
        array(
            'id'       => 'logo_height',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Height', 'fixera'),
            'width'    => false,
            'unit'     => 'px',
            'output'    => array('#pxl-header-default .pxl-header-branding img, .pxl-logo-mobile img'),
        ),
        array(
            'id'       => 'search_mobile',
            'type'     => 'switch',
            'title'    => esc_html__('Search Form', 'fixera'),
            'default'  => true
        )
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'fixera'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array_merge(
        fixera_page_title_opts() 
    )
));


/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'fixera'),
    'icon'   => 'el el-website',
    'fields' => array_merge(
        fixera_footer_opts(),
        array(
            array(
                'id'       => 'back_totop_on',
                'type'     => 'switch',
                'title'    => esc_html__('Button Back to Top', 'fixera'),
                'default'  => false,
            ),
            array(
                'id'       => 'footer_fixed',
                'type'     => 'switch',
                'title'    => esc_html__('Footer Fixed', 'fixera'),
                'default'  => false,
            )
        ) 
    )
    
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Blog Archive', 'fixera'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array_merge(
        fixera_sidebar_pos_opts([ 'prefix' => 'blog_']),
        array(
            array(
                'id'       => 'archive_author',
                'title'    => esc_html__('Author', 'fixera'),
                'subtitle' => esc_html__('Display the Author for each blog post.', 'fixera'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_date',
                'title'    => esc_html__('Date', 'fixera'),
                'subtitle' => esc_html__('Display the Date for each blog post.', 'fixera'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_category',
                'title'    => esc_html__('Category', 'fixera'),
                'subtitle' => esc_html__('Display the Category for each blog post.', 'fixera'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_comments_on',
                'title'    => esc_html__('Comment', 'fixera'),
                'subtitle' => esc_html__('Display the Comment for each blog post.', 'fixera'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'archive_excerpt_on',
                'title'    => esc_html__('Excerpt', 'fixera'),
                'subtitle' => esc_html__('Display the Excerpt for each blog post.', 'fixera'),
                'type'     => 'switch',
                'default'  => true,
            ),            
            array(
                'id'      => 'archive_excerpt_length',
                'type'    => 'text',
                'title'   => esc_html__('Excerpt Length', 'fixera'),
                'default' => '',
                'subtitle' => esc_html__('Default: 50', 'fixera'),
                'indent' => true,
                'required' => array( 0 => 'archive_excerpt_on', 1 => 'equals', 2 => true ),                
            ),
            array(
                'id'      => 'archive_readmore_text',
                'type'    => 'text',
                'title'   => esc_html__('Read More Text', 'fixera'),
                'default' => '',
                'subtitle' => esc_html__('Default: Read more', 'fixera'),
            )
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'fixera'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array_merge(
        fixera_sidebar_pos_opts([ 'prefix' => 'post_']),
        array(
            array(
                'id'       => 'post_title_on',
                'title'    => esc_html__('Title On/Off', 'fixera'),
                'subtitle' => esc_html__('Show Title image on single post.', 'fixera'),
                'type'     => 'switch',
                'default'  => false
            ),
            array(
                'id'       => 'post_date',
                'title'    => esc_html__('Date', 'fixera'),
                'subtitle' => esc_html__('Display the Date for blog post.', 'fixera'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_author',
                'title'    => esc_html__('Author', 'fixera'),
                'subtitle' => esc_html__('Display the Author for blog post.', 'fixera'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_category',
                'title'    => esc_html__('Categories', 'fixera'),
                'subtitle' => esc_html__('Display the Category for blog post.', 'fixera'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_comments_on',
                'title'    => esc_html__('Comment', 'fixera'),
                'subtitle' => esc_html__('Display the Comment for each blog post.', 'fixera'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'post_tag',
                'title'    => esc_html__('Tags', 'fixera'),
                'subtitle' => esc_html__('Display the Tag for blog post.', 'fixera'),
                'type'     => 'switch',
                'default'  => true
            ),
            array(
                'id'       => 'post_author_box_info',
                'title'    => esc_html__('Author Box Info', 'fixera'),
                'subtitle' => esc_html__('Show author box info on single post.', 'fixera'),
                'type'     => 'switch',
                'default'  => true,
            ),

            array(
                'title' => esc_html__('Social Section', 'fixera'),
                'type'  => 'section',
                'id' => 'social_section',
                'indent' => true,
            ),
            array(
                'id'       => 'post_social_share',
                'title'    => esc_html__('Social', 'fixera'),
                'subtitle' => esc_html__('Display the Social Share for blog post.', 'fixera'),
                'type'     => 'switch',
                'default'  => true,
            ),
            array(
                'id'       => 'social_facebook',
                'title'    => esc_html__('Facebook', 'fixera'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_twitter',
                'title'    => esc_html__('Twitter', 'fixera'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_pinterest',
                'title'    => esc_html__('Pinterest', 'fixera'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
            array(
                'id'       => 'social_linkedin',
                'title'    => esc_html__('LinkedIn', 'fixera'),
                'type'     => 'switch',
                'default'  => true,
                'indent' => true,
                'required' => array( 0 => 'post_social_share', 1 => 'equals', 2 => '1' ),
            ),
        )
    )
));
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Service', 'fixera'),
    'icon'       => 'el-icon-pencil',
    'subsection' => true,
    'fields'     => array_merge(
        array(
            array(
                'id'       => 'service_slug',
                'title'    => esc_html__('Service Slug', 'fixera'),
                'subtitle' => esc_html__('Enter service slug ', 'fixera'),
                'type'     => 'text',
                'default'  => ''
            ),
            array(
                'id'             => 'service_content_padding',
                'type'           => 'spacing',
                'output'         => array('.single-service #pxl-main'),
                'right'          => false,
                'left'           => false,
                'mode'           => 'padding',
                'units'          => array('px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Content Padding', 'fixera'),
                'desc'           => esc_html__('Default: Top-100px, Bottom-100px', 'fixera'),
                'default'        => array(
                    'padding-top'    => '',
                    'padding-bottom' => '',
                    'units'          => 'px',
                )
            ),
        )
    )
));
Redux::setSection($opt_name, array(
    'title'      => esc_html__('Case Studie', 'fixera'),
    'icon'       => 'el-icon-pencil',
    'subsection' => true,
    'fields'     => array_merge(
        array(
            array(
                'id'       => 'case_slug',
                'title'    => esc_html__('Case Slug', 'fixera'),
                'subtitle' => esc_html__('Enter case slug ', 'fixera'),
                'type'     => 'text',
                'default'  => ''
            ),
            array(
                'id'             => 'case_content_padding',
                'type'           => 'spacing',
                'output'         => array('.single-case #pxl-main'),
                'right'          => false,
                'left'           => false,
                'mode'           => 'padding',
                'units'          => array('px'),
                'units_extended' => 'false',
                'title'          => esc_html__('Content Padding', 'fixera'),
                'desc'           => esc_html__('Default: Top-100px, Bottom-100px', 'fixera'),
                'default'        => array(
                    'padding-top'    => '',
                    'padding-bottom' => '',
                    'units'          => 'px',
                )
            ),
        )
    )
));
/* 404 Page /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('404 Page', 'fixera'),
    'icon'   => 'el-cog-alt el',
    'fields' => array(
        array(
            'id'       => 'page_404',
            'type'     => 'button_set',
            'title'    => esc_html__('Select 404 Page', 'fixera'),
            'options'  => array(
                'default'  => esc_html__('Default', 'fixera'),
                'custom'  => esc_html__('Custom', 'fixera'),
            ),
            'default'  => 'default'
        ),
        array(
            'id'      => 'template_404',
            'type'    => 'select',
            'title'   => esc_html__('Select 404 Page Template', 'fixera'),
            'desc'    => sprintf(esc_html__('Please create your template before choosing. %sClick Here%s','fixera'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=page' ) ) . '">','</a>'),
            'options' => fixera_list_post('page'),
            'default' => '',
            'required' => array( 0 => 'page_404', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        )
    ),
));
/*--------------------------------------------------------------
# Woocommerce
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title' => esc_html__('Woocommerce', 'fixera'),
        'icon'  => 'el el-shopping-cart',
        'fields'     => array_merge(
            fixera_sidebar_pos_opts([ 'prefix' => 'shop_']),
            array(
                array(
                    'title'         => esc_html__('Products displayed per row', 'fixera'),
                    'id'            => 'products_columns',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show per row', 'fixera'),
                    'default'       => 3,
                    'min'           => 2,
                    'step'          => 1,
                    'max'           => 6,
                    'display_value' => 'text'
                ),
                array(
                    'title'         => esc_html__('Products displayed per page', 'fixera'),
                    'id'            => 'product_per_page',
                    'type'          => 'slider',
                    'subtitle'      => esc_html__('Number product to show', 'fixera'),
                    'default'       => 9,
                    'min'           => 3,
                    'step'          => 1,
                    'max'           => 50,
                    'display_value' => 'text'
                ),
            )
        )
    ));

    Redux::setSection($opt_name, array(
        'title'      => esc_html__('Single Product', 'fixera'),
        'icon'       => 'el el-shopping-cart',
        'subsection' => true,
        'fields'     => array_merge(
            fixera_sidebar_pos_opts([ 'prefix' => 'product_']),
            array(   
                array(
                    'id'       => 'product_title',
                    'type'     => 'switch',
                    'title'    => esc_html__('Product Title', 'fixera'),
                    'default'  => false
                ),
                array(
                    'id'       => 'icon_phone',
                    'type'     => 'media',
                    'title'    => esc_html__('Select Icon Phone', 'fixera'),
                     'default' => array(
                        'url'=>get_template_directory_uri().'/assets/img/phone.png'
                    ),
                    'url'      => false
                ),
                array(
                    'id'      =>'phone_label',
                    'type'    => 'text',
                    'title'   => esc_html__('Phone Label', 'fixera'),
                    'default' => '',
                    'subtitle' => esc_html__('Default: Phone Number', 'fixera'),
                ),
                array(
                    'id'      =>'phone_text',
                    'type'    => 'text',
                    'title'   => esc_html__('Phone Number', 'fixera'),
                    'default' => '',
                    'subtitle' => esc_html__('Default: +55(121)234444', 'fixera'),
                ),
                array(
                    'id'      =>'phone_link',
                    'type'    => 'text',
                    'title'   => esc_html__('Phone Link', 'fixera'),
                    'default' => '',
                    'subtitle' => esc_html__('Default: +121234444', 'fixera'),
                ),
                    
                array(
                    'id'       => 'product_social_share',
                    'type'     => 'switch',
                    'title'    => esc_html__('Social Share', 'fixera'),
                    'default'  => false
                ),
                array(
                    'id'       => 'product_variation_style',
                    'type'     => 'button_set',
                    'title'    => esc_html__('Product Variation Style', 'fixera'),
                    'subtitle' => esc_html__('Dropdown or selected list', 'fixera'),
                    'options' => array(
                        'dropdown'  => esc_html__('Dropdown', 'fixera'),
                        'list' => esc_html__('List', 'fixera')
                    ), 
                    'default' => 'dropdown'
                ),
                array(
                    'id'       => 'product_related',
                    'title'    => esc_html__('Product Related', 'fixera'),
                    'subtitle' => esc_html__('Show/Hide related product', 'fixera'),
                    'type'     => 'switch',
                    'default'  => '0',
                ),
                array(
                    'id'       => 'rel_title_icon',
                    'type'     => 'media',
                    'title'    => esc_html__('Select Related Title Icon', 'fixera'),
                     'default' => array(
                        'url'=>''
                    ),
                    'url'      => false
                ),
                array(
                    'id'      =>'rel_extra_title',
                    'type'    => 'text',
                    'title'   => esc_html__('Related Extra Title', 'fixera'),
                    'default' => '',
                    'subtitle' => esc_html__('This title show at bottom of related title', 'fixera'),
                ),
            )
        )
    ));
}
/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'fixera'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'          => 'font_body',
            'type'        => 'typography',
            'title'       => esc_html__('Body', 'fixera'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'output'      => array('body'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 1', 'fixera'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h1'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 2', 'fixera'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h2'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 3', 'fixera'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h3'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 4', 'fixera'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h4'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 5', 'fixera'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h5'),
            'units'       => 'px',
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('Heading 6', 'fixera'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h6'),
            'units'       => 'px',
        ),
    )
));