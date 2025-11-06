<?php
// make some configs
if(!function_exists('fixera_configs')){
    function fixera_configs($value){
         
        $configs = [
            'theme_colors' => [
                'primary'   => [
                    'title' => esc_html__('Primary', 'fixera').' ('.fixera()->get_opt('primary_color', '#008BF9').')', 
                    'value' => fixera()->get_opt('primary_color', '#008BF9')
                ],
                'secondary'   => [
                    'title' => esc_html__('Secondary', 'fixera').' ('.fixera()->get_opt('secondary_color', '#0C2271').')', 
                    'value' => fixera()->get_opt('secondary_color', '#0C2271')
                ],
                'third'   => [
                    'title' => esc_html__('Third', 'fixera').' ('.fixera()->get_opt('third_color', '#585C7B').')', 
                    'value' => fixera()->get_opt('third_color', '#585C7B')
                ],
                'fourth'   => [
                    'title' => esc_html__('Fourth', 'fixera').' ('.fixera()->get_opt('fourth_color', '#000739').')', 
                    'value' => fixera()->get_opt('fourth_color', '#000739')
                ],
                'fifth'   => [
                    'title' => esc_html__('Fifth', 'fixera').' ('.fixera()->get_opt('fifth_color', '#FFCD05').')',
                    'value' => fixera()->get_opt('fifth_color', '#FFCD05')
                ],
                'six'   => [
                    'title' => esc_html__('Six', 'fixera').' ('.fixera()->get_opt('six_color', '#36619A').')',
                    'value' => fixera()->get_opt('six_color', '#36619A')
                ],
                'sevent'   => [
                    'title' => esc_html__('Sevent', 'fixera').' ('.fixera()->get_opt('sevent_color', '#1C2638').')',
                    'value' => fixera()->get_opt('sevent_color', '#1C2638')
                ],
            ],
            'link' => [
                'color' => fixera()->get_opt('link_color', ['regular' => '#008BF9'])['regular'],
                'color-hover'   => fixera()->get_opt('link_color', ['hover' => '#008BF9'])['hover'],
                'color-active'  => fixera()->get_opt('link_color', ['active' => '#008BF9'])['active'],
            ],
            'gradient' => [
                'color-from' => fixera()->get_opt('gradient_color', ['from' => '#008BF9'])['from'],
                'color-to' => fixera()->get_opt('gradient_color', ['to' => '#0C2271'])['to'],
            ],
               
        ];
        return $configs[$value];
    }
}
if(!function_exists('fixera_inline_styles')) {
    function fixera_inline_styles() {  
        
        $theme_colors      = fixera_configs('theme_colors');
        $link_color        = fixera_configs('link');
        $gradient_color        = fixera_configs('gradient');
            
        ob_start();
        echo ':root{';
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color: %2$s;', str_replace('#', '',$color),  $value['value']);
            }
            foreach ($theme_colors as $color => $value) {
                printf('--%1$s-color-rgb: %2$s;', str_replace('#', '',$color),  fixera_hex_rgb($value['value']));
            }
            foreach ($link_color as $color => $value) {
                printf('--link-%1$s: %2$s;', $color, $value);
            } 
            foreach ($gradient_color as $color => $value) {
                printf('--gradient-%1$s: %2$s;', $color, $value);
            } 
        echo '}';

        return ob_get_clean();
         
    }
}
 