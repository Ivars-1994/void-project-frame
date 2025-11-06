<?php
/**
 * Include the TGM_Plugin_Activation class.
 */
get_template_part( 'inc/admin/libs/tgmpa/class-tgm-plugin-activation' );

add_action( 'tgmpa_register', 'fixera_register_required_plugins' );
function fixera_register_required_plugins() {
    include( locate_template( 'inc/admin/demo-data/demo-config.php' ) );
    $pxl_server_info = apply_filters( 'pxl_server_info', ['plugin_url' => 'https://api.bravisthemes.com/plugins/'] ) ; 
    $default_path = $pxl_server_info['plugin_url'];  
    $images = get_template_directory_uri() . '/inc/admin/assets/img/plugins';
    $plugins = array(
        array(
            'name'               => esc_html__('Redux Framework', 'fixera'),
            'slug'               => 'redux-framework',
            'required'           => true,
            'logo'        => $images . '/redux.png',
            'description' => esc_html__( 'Build theme options and post, page options for WordPress Theme.', 'fixera' ),
        ),

        array(
            'name'               => esc_html__('Elementor', 'fixera'),
            'slug'               => 'elementor',
            'required'           => true,
            'logo'        => $images . '/elementor.png',
            'description' => esc_html__( 'Introducing a WordPress website builder, with no limits of design. A website builder that delivers high-end page designs.', 'fixera' ),
        ),

        array(
            'name'               => esc_html__('Bravis Addons', 'fixera'),
            'slug'               => 'bravis-addons',
            'source'             => 'bravis-addons.zip',
            'required'           => true,
            'logo'        => $images . '/bravis-logo.png',
            'description' => esc_html__( 'Main process and Powerful Elements Plugin, exclusively for Kinco WordPress Theme.', 'fixera' ),
        ),

        array(
            'name'               => esc_html__('Revolution Slider', 'fixera'),
            'slug'               => 'revslider',
            'source'             => 'revslider.zip',
            'required'           => true,
            'logo'        => $images . '/rev-slider.png',
            'description' => esc_html__( 'Revolution Slider helps beginner-and mid-level designers WOW their clients with pro-level visuals. You’ll be able to create anything you can imagine.', 'fixera' )
        ),

        array(
            'name'               => esc_html__('Contact Form 7', 'fixera'),
            'slug'               => 'contact-form-7',
            'required'           => true,
            'logo'        => $images . '/contact-f7.png',
            'description' => esc_html__( 'Contact Form 7 can manage multiple contact forms, you can customize the form and the mail contents flexibly with simple markup', 'fixera' ),
            
        ), 

        array(
            'name'               => esc_html__('Mailchimp', 'fixera'),
            'slug'               => 'mailchimp-for-wp',
            'required'           => true,
            'logo'        => $images . '/mailchimp-min.png',
            'description' => esc_html__( 'Contact Form 7 can manage multiple contact forms, you can customize the form and the mail contents flexibly with simple markup', 'fixera' ),
        ),  
        array(
            'name'               => esc_html__('WooCommerce', 'fixera'),
            'slug'               => "woocommerce",
            'required'           => true,
            'logo'        => $images . '/woo.png',
            'description' => esc_html__( 'WooCommerce is the world’s most popular open-source eCommerce solution.', 'fixera' ),
        ),
    );
 

    $config = array(
        'default_path' => $default_path,           // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'is_automatic' => true,
    );

    tgmpa( $plugins, $config );

}