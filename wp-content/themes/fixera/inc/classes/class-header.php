<?php

if (!class_exists('Fixera_Header')) {

    class Fixera_Header
    {
        public function getHeader()
        {
            $disable_header = fixera()->get_page_opt('disable_header','0');
            $header_layout = (int)fixera()->get_opt('header_layout'); 
            $header_layout_sticky = (int)fixera()->get_opt('header_layout_sticky'); 
            $header_mobile_layout = (int)fixera()->get_opt('header_mobile_layout'); 

            if($disable_header == '1') return;
            if ($header_layout <= 0 || !class_exists('Pxltheme_Core') || !is_callable( 'Elementor\Plugin::instance' )) {
                get_template_part( 'template-parts/header/default');
            } else {
                $args = [
                    'header_layout' => $header_layout,
                    'header_layout_sticky' => $header_layout_sticky,
                    'header_mobile_layout' => $header_mobile_layout
                ];
                get_template_part( 'template-parts/header/elementor','', $args );
            } 
             
        }
 
    }
}
