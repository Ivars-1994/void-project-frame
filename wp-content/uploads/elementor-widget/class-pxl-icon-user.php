<?php

class PxlIconUser_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_icon_user';
    protected $title = 'User Pxl';
    protected $icon = 'eicon-person';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"source_section","label":"Source Settings","tab":"content","controls":[{"name":"style","label":"Style","type":"select","default":"style1","options":{"style1":"Style 1 (Popup)"}},{"name":"icon_color","label":"Icon Color","type":"color","selectors":{"{{WRAPPER}} .pxl-icon--users > i":"color: {{VALUE}} !important;"}},{"name":"text_color","label":"Text Color","type":"color","selectors":{"{{WRAPPER}} .pxl-icon--users":"color: {{VALUE}} !important;"}},{"name":"link_color","label":"Link Color","type":"color","selectors":{"{{WRAPPER}} .pxl-icon--users a":"color: {{VALUE}} !important;"}},{"name":"sub_link_color","label":"Sub Link Color","type":"color","selectors":{"{{WRAPPER}} .pxl-icon--users .pxl-user-account a":"color: {{VALUE}} !important;"}},{"name":"post_type","label":"User Post Type","type":"select","default":"","options":{"":"All","page":"Page","post":"Post","lp_course":"Course","portfolio":"Portfolio","product":"Product"}},{"name":"name_display","label":"Label User Display","type":"select","default":"name-show","options":{"name-show":"Show (Defualt)","name-show-h":"Hidden on small Screen","name-hidden":"Hidden"}}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}