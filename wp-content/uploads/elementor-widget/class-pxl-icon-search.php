<?php

class PxlIconSearch_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_icon_search';
    protected $title = 'Search Popup Pxl';
    protected $icon = 'eicon-search';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"pxl_icon","label":"Icon","type":"icons","fa4compatibility":"icon"},{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-search-popup-button":"color: {{VALUE}};"}},{"name":"icon_color_hover","label":"Icon Color Hover","type":"color","selectors":{"{{WRAPPER}} .pxl-search-popup-button:hover":"color: {{VALUE}};"}},{"name":"icon_font_size","label":"Icon Font Size","type":"slider","control_type":"responsive","size_units":["px"],"range":{"px":{"min":0,"max":300}},"selectors":{"{{WRAPPER}} .pxl-search-popup-button":"font-size: {{SIZE}}{{UNIT}};"}},{"name":"style","label":"Style","type":"select","default":"style-1","options":{"style-1":"Style1(Default)","style-2":"Style2"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}