<?php
$p_menu = fixera()->get_page_opt('p_menu');
if(!empty($p_menu) && $p_menu != '-1') {
    $menu = $p_menu;
} else {
    $menu = $settings['menu'];
}
if(!empty($menu)) { ?>
    <div class="pxl-nav-menu pxl-nav-menu1 <?php echo esc_attr( $settings['line_style']); ?> <?php if( $settings['line_style']=='line-on') { echo esc_attr( $settings['line_color_style']); } ?>">
        <?php wp_nav_menu(array(
            'theme_location' => $menu,
            'menu_id' => 'pxl-menu-'.$menu, 
            'menu_class' => 'pxl-menu-primary clearfix',
            'walker'     => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
            'link_before'     => '<span>',
            'link_after'      => '</span><i class="bravisicon-angle-arrow-down pxl-hide"></i>',
            'menu'        => wp_get_nav_menu_object($menu))
        ); ?>
    </div>
<?php } elseif( has_nav_menu( 'primary' ) ) { ?>
    <div class="pxl-nav-menu pxl-nav-menu1 <?php echo esc_attr( $settings['line_style']); ?> <?php if( $settings['line_style']=='line-on') { echo esc_attr( $settings['line_color_style']); } ?>">
        <?php $attr_menu = array(
            'theme_location' => 'primary',
            'menu_class' => 'pxl-menu-primary clearfix',
            'link_before'     => '<span>',
            'link_after'      => '</span><i class="bravisicon-angle-arrow-down pxl-hide"></i>',
            'walker'         => class_exists( 'PXL_Mega_Menu_Walker' ) ? new PXL_Mega_Menu_Walker : '',
        );
        wp_nav_menu( $attr_menu ); ?>
    </div>
<?php } ?>