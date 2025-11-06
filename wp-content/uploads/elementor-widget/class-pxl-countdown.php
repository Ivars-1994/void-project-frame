<?php

class PxlCountdown_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_countdown';
    protected $title = 'Countdown Pxl';
    protected $icon = 'eicon-countdown';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"layout_section","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/klempner-funke.de\/wp-content\/themes\/fixera\/elements\/templates\/pxl_countdown\/img-layout\/layout1.jpg"}},"prefix_class":"pxl-counter-layout"},{"name":"box_style","label":"Box Style","type":"select","default":"style-1","options":{"style-1":"Style-1","style-2":"Style-2"}}]},{"name":"content_section","label":"Time to","tab":"content","controls":[{"name":"time_to","label":"Enter the time","type":"date_time","picker_options":{"dateFormat":"m\/d\/Y"},"label_block":true}]},{"name":"section_style_number","label":"Countdown Number","tab":"style","controls":[{"name":"number_typography","label":"Number Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-countdown .pxl-countdown-container .inner-number"},{"name":"number_color","label":"Number Color","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-countdown .pxl-countdown-container .inner-number":"color: {{VALUE}};"}}]},{"name":"section_style_text","label":"Countdown Text","tab":"style","controls":[{"name":"text_typography","label":"Text Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-countdown .pxl-countdown-container .inner-text"},{"name":"text_color","label":"Text Color","type":"color","default":"","selectors":{"{{WRAPPER}} .pxl-countdown .pxl-countdown-container .inner-text":"color: {{VALUE}};"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}