<?php

class PxlCaseInfo_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_case_info';
    protected $title = 'Case Info PXL';
    protected $icon = 'eicon-post-content';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_layout","label":"Layout","tab":"layout","controls":[{"name":"layout","label":"Templates","type":"layoutcontrol","default":"1","options":{"1":{"label":"Layout 1","image":"https:\/\/klempner-funke.de\/wp-content\/themes\/fixera\/elements\/templates\/pxl_case_info\/img-layout\/layout1.jpg"}}}]},{"name":"content_section","label":"Content","tab":"content","controls":[{"name":"title","label":"Title","type":"textarea","rows":2,"label_block":true},{"name":"title_tag","label":"HTML Tag","type":"select","options":{"h1":"H1","h2":"H2","h3":"H3","h4":"H4","h5":"H5","h6":"H6","div":"div","span":"span","p":"p"},"default":"h3"},{"name":"title_color","label":"Title Color","type":"color","selectors":{"{{WRAPPER}} .pxl-item--title":"color: {{VALUE}};"}},{"name":"title_typography","label":"Title Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-item--title"},{"name":"list","label":"List Content Extra","type":"repeater","controls":[{"name":"item_label","label":"Item Label","type":"text","label_block":true,"default":""},{"name":"item_content","label":"Item Content","type":"text","label_block":true,"default":""}],"title_field":"{{{ item_label }}}"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}