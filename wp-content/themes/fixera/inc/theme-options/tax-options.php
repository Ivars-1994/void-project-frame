<?php
add_action( 'pxl_taxonomy_meta_register', 'fixera_tax_options_register' );

function fixera_tax_options_register( $metabox ) {
    $package_type_group = fixera()->get_theme_opt('package_type_group', []);
 
    $package_type_group_opt = [];
    if( !empty( $package_type_group)){
    	foreach ($package_type_group as $key => $value) {
			$package_type_group_opt[$value] = $value;
		}	
    }
	$panels = [
		'package-category' => [ //taxonomy
			'opt_name'            => 'tax_package_option',
			'display_name'        => esc_html__( 'Fixera Settings', 'fixera' ),
			'show_options_object' => false,
			'sections'  => [
				'tax_package_settings' => [
					'title'  => esc_html__( 'Fixera Settings', 'fixera' ),
					'icon'   => 'el el-refresh',
					'fields' => array(
						array(
				            'id'       => 'tax_package_icon',
				            'type'     => 'pxl_iconpicker',
				            'title'    => esc_html__('Icon Font', 'fixera'),
				        ),
						array(
                            'id'       => 'fix_redux_value',
                            'type'     => 'select',
                            'title'    => esc_html__('Fix value (test)', 'fixera'),
                            'options'  => [
                                ''   => esc_html__('Default', 'fixera'),
                                'fixed'    => esc_html__('Fixed', 'fixera'),
                            ],
                            'class' => 'redux-field-meta-hidden',
                            'default'  => '',
                        )
					)
				]
			]
		],  
	];
 
	$metabox->add_meta_data( $panels );
}
 