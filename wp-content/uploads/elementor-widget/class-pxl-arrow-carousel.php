<?php

class PxlArrowCarousel_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_arrow_carousel';
    protected $title = 'Nav Carousel Pxl';
    protected $icon = 'eicon-animation';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"style_section","label":"Style","tab":"content","controls":[{"name":"style","label":"Style","type":"select","options":{"style-1":"Style 1","style-2":"Style 2","style-3":"Style 3"},"default":"style-1"},{"name":"arrow_color","label":"Arrow Color","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-navigation-arrow i":"color: {{VALUE}} !important;"}},{"name":"bg_arrow_color","label":"Background Arrow Color","type":"color","selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow:before":"background-color: {{VALUE}} !important;"}},{"name":"border_arrow_color","label":"Border Arrow Color","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow":"border-color: {{VALUE}} !important;"}},{"name":"arrow_color_hv","label":"Arrow Hover Color","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-navigation-arrow:hover i":"color: {{VALUE}} !important;"}},{"name":"bg_arrow_hover","label":"Background Arrow Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow:hover:after":"background-color: {{VALUE}} !important;"}},{"name":"border_arrow_color_hv","label":"Border Arrow Hover","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-navigation-carousel .pxl-navigation-arrow:hover":"border-color: {{VALUE}} !important;"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}