<?php

if( !defined( 'ABSPATH' ) )
	exit; 

class Fixera_Admin_Templates extends Fixera_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}
 
	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'fixera' ),
		    esc_html__( 'Templates', 'fixera' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Fixera_Admin_Templates;
