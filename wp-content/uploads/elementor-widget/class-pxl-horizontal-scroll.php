<?php

class PxlHorizontalScroll_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_horizontal_scroll';
    protected $title = 'Horizontal Scroll Pxl';
    protected $icon = 'eicon-slider-push';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Layout","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/klempner-funke.de\/wp-content\/themes\/fixera\/elements\/templates\/pxl_horizontal_scroll\/img-layout\/layout1.jpg"},"2":{"label":"Layout 2","image":"https:\/\/klempner-funke.de\/wp-content\/themes\/fixera\/elements\/templates\/pxl_horizontal_scroll\/img-layout\/layout2.jpg"}}}]},{"name":"content_section","label":"Content","tab":"content","controls":[{"name":"revesal","label":"Revesal Scroll","type":"switcher"},{"name":"img_size","label":"Image Size","type":"text","description":"Enter image size (Example: \"thumbnail\", \"medium\", \"large\", \"full\" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).","condition":{"layout":"1"}},{"name":"title","label":"Title","type":"textarea","label_block":true,"condition":{"layout":"2"}},{"name":"img_gallery","label":"Gallery","type":"gallery","label_block":true,"condition":{"layout":"1"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}