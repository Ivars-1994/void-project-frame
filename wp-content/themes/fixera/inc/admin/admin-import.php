<?php
/**
* The Fixera_Admin_Import class
*/

if( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class Fixera_Admin_Import extends Fixera_Admin_Page {
	public function __construct() {
		$this->id = 'pxlart-import-demos';
		$this->page_title = esc_html__( 'Import Demos', 'fixera' );
		$this->menu_title = esc_html__( 'Import Demos', 'fixera' );
		$this->parent = 'pxlart';
		//$this->position = '10';
		parent::__construct();
	}

	public function display() {
		include_once( get_template_directory() . '/inc/admin/views/admin-demos.php' );
	}


	public function save() {

	}
}
new Fixera_Admin_Import;