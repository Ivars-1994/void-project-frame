<?php
if ( ! class_exists( 'ReduxFrameworkInstances' ) ) {
	return;
}

class Fixera_CSS_Generator {
	/**
     * @access protected
     * @var scssc
     */
    protected $scssc = null;

    /**
     * ReduxFramework class instance
     *
     * @access protected
     * @var ReduxFramework
     */
    protected $redux = null;

    /**
     * Debug mode is turn on or not
     *
     * @access protected
     * @var boolean
     */
    protected $dev_mode = true;

    /**
     * opt_name of ReduxFramework
     *
     * @access protected
     * @var string
     */
    protected $opt_name = '';

	function __construct() {
		$this->opt_name = fixera()->get_option_name();  
		if ( empty( $this->opt_name ) ) {
			return;
		}
		$this->dev_mode = (defined('THEME_DEV_MODE_SCSS') && THEME_DEV_MODE_SCSS);  
        
		add_filter( 'pxl_scssc_on', '__return_true' );
		add_action( 'init', array( $this, 'init' ) );
	}

	function init() {

		if ( ! class_exists( 'scssc' ) ) {
			return;
		}

		$this->redux = ReduxFrameworkInstances::get_instance( $this->opt_name );

		if ( empty( $this->redux ) || ! $this->redux instanceof ReduxFramework ) {
			return;
		}
		add_action( 'wp', array( $this, 'fixera_generate_with_dev_mode' ) );
		add_action( "redux/options/{$this->opt_name}/saved", function () {
			$this->fixera_generate_file_options();
		} );
	}

	function fixera_generate_with_dev_mode() {
		if ( $this->dev_mode === true ) {
            $this->fixera_generate_file_options();
			$this->fixera_generate_file();
		}
	}

    function fixera_generate_file_options() {
        $scss_dir = get_template_directory() . '/assets/scss/';
        $this->scssc = new scssc();
        $this->scssc->setImportPaths( $scss_dir );
        $_options = $scss_dir . '_options.scss';
        $this->scssc->setFormatter( 'scss_formatter' );
        $this->redux->filesystem->execute( 'put_contents', $_options, array(
            'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->fixera_options_output() )
        ) );
    }

	function fixera_generate_file() {
		$scss_dir = get_template_directory() . '/assets/scss/';
		$css_dir  = get_template_directory() . '/assets/css/';

		$this->scssc = new scssc();
		$this->scssc->setImportPaths( $scss_dir );

		$css_file = $css_dir . 'style.css';

		$this->scssc->setFormatter( 'scss_formatter' );
		$this->redux->filesystem->execute( 'put_contents', $css_file, array(
			'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->scssc->compile( '@import "style.scss"' ) )
		) );
	}

	protected function print_scss_opt_colors($variable,$param){
        if(is_array($variable)){
            $k = [];
            $v = [];
            foreach ($variable as $key => $value) {
                $k[] = str_replace('-', '_', $key);
                $v[] = 'var(--'.str_replace(['#',' '], [''],$key).'-color)';
            }
            if($param === 'key'){
                return implode(',', $k);
            }else{
                return implode(',', $v);
            }
            
        } else {
            return $variable;
        }
    }

	protected function fixera_options_output() {
		$theme_colors                    = fixera_configs('theme_colors');
        $links                           = fixera_configs('link');
        $gradients                           = fixera_configs('gradient');
		ob_start();

		printf('$fixera_theme_colors_key:(%s);',$this->print_scss_opt_colors($theme_colors,'key'));
        printf('$fixera_theme_colors_val:(%s);',$this->print_scss_opt_colors($theme_colors,'val'));
        // color rgb only
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color_hex: %2$s;', str_replace('-', '_', $key), $value['value']); 
        }
        // color
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color: %2$s;', str_replace('-', '_', $key), 'var(--'.str_replace(['#',' '], [''],$key).'-color)' );
        }

        // color rgb only
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color_hex: %2$s;', str_replace('-', '_', $key), $value['value']); 
        }
        // color
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color: %2$s;', str_replace('-', '_', $key), 'var(--'.str_replace(['#',' '], [''],$key).'-color)' );
        }
         
        // link color
        foreach ($links as $key => $value) {
            printf('$link_%1$s: %2$s;', str_replace('-', '_', $key), 'var(--link-'.$key.')');
        }

        // gradient color
        foreach ($gradients as $key => $value) {
            printf('$gradient_%1$s: %2$s;', str_replace('-', '_', $key), 'var(--gradient-'.$key.')');
        }

        // gradient color hex
        /* Gradient Color Main */
        $gradient_color_hex = fixera()->get_opt( 'gradient_color' );
        if ( !empty($gradient_color_hex['from']) && isset($gradient_color_hex['from']) ) {
            printf( '$gradient_from_hex: %s;', esc_attr( $gradient_color_hex['from'] ) );
        } else {
            echo '$gradient_from_hex: #8d4cfa;';
        }
        if ( !empty($gradient_color_hex['to']) && isset($gradient_color_hex['to']) ) {
            printf( '$gradient_to_hex: %s;', esc_attr( $gradient_color_hex['to'] ) );
        } else {
            echo '$gradient_to_hex: #5f6ffb;';
        }
		return ob_get_clean();
	}
    /* Inline CSS */
    function fixera_enqueue() {
        $css = $this->fixera_inline_css();
        if ( !empty( $css ) ) {
            wp_add_inline_style( 'pxl-style', $css );
        }
    }
    protected function fixera_inline_css() {
        ob_start();

        /* Header */ ?>
        @media screen and (min-width: 1200px) {
        <?php  
            $header_layout = fixera()->get_opt('header_layout');
            $post_header = get_post($header_layout);
            $header_type = get_post_meta( $post_header->ID, 'header_type', 'px-header--default' );
            $header_sidebar_width = get_post_meta( $post_header->ID, 'header_sidebar_width', true );
            if ( isset($header_sidebar_width) && !empty($header_sidebar_width) && $header_type == 'px-header--left_sidebar' ) {
                $pd_left = $header_sidebar_width + 30;
                printf( '.bd-px-header--left_sidebar:not(.elementor-editor-active) #pxl-header-elementor .px-header--left_sidebar { width: %s; }', esc_attr( $header_sidebar_width ).'px' );
                printf( '.bd-px-header--left_sidebar:not(.elementor-editor-active) #pxl-main, .bd-px-header--left_sidebar:not(.elementor-editor-active) #pxl-footer-elementor, .bd-px-header--left_sidebar:not(.elementor-editor-active) #pxl-page-title-elementor { padding-left: %s; }', esc_attr( $header_sidebar_width ).'px' );
            }
            ?>
        }
        <?php /* End Header */
        
        return ob_get_clean();
    }
}

new Fixera_CSS_Generator();