<?php
/**
* The Fixera_Admin_Dashboard base class
*/

if( !defined( 'ABSPATH' ) )
	exit; 

class Fixera_Admin_Dashboard extends Fixera_Admin_Page {
	public function __construct() {
		$this->id = 'pxlart';
		$this->page_title = fixera()->get_name();
		$this->menu_title = fixera()->get_name();
		$this->position = '50';

		parent::__construct();
	}

	public function display() {
		include_once( get_template_directory() . '/inc/admin/views/admin-dashboard.php' );
	}
 
	public function save() {

	}
}
new Fixera_Admin_Dashboard;
