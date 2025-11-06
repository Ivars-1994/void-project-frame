<?php

class PxlIconHiddenPanel_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_icon_hidden_panel';
    protected $title = 'Hidden Panel Pxl';
    protected $icon = 'eicon-menu-bar';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_content","label":"Content","tab":"content","controls":[{"name":"content_template","label":"Select Template","type":"select","options":["None"],"default":"df","description":"Add new tab template: \"<a href=\"https:\/\/klempner-funke.de\/wp-admin\/edit.php?post_type=pxl-template\" target=\"_blank\">Click Here<\/a>\""},{"name":"style","label":"Style","type":"select","default":"style-1","options":{"style-1":"Style1(Default)","style-2":"Style2","style-3":"Style3"}},{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line":"background-color: {{VALUE}};"},"condition":{"style":["style-1","style-2"]}},{"name":"icon_color_3","label":"Button Color","type":"color","selectors":{"{{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line i":"background-color: {{VALUE}};"},"condition":{"style":["style-3"]}},{"name":"icon_color_3_hv","label":"Button Hover Color","type":"color","selectors":{"{{WRAPPER}} .pxl-hidden-panel-button .pxl-icon-line i:hover":"background-color: {{VALUE}};"},"condition":{"style":["style-3"]}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}