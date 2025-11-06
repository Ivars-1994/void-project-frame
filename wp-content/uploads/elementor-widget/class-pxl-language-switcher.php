<?php

class PxlLanguageSwitcher_Widget extends Pxltheme_Core_Widget_Base{
    protected $name = 'pxl_language_switcher';
    protected $title = 'Language Switcher Pxl';
    protected $icon = 'eicon-editor-list-ul';
    protected $categories = array( 'pxltheme-core' );
    protected $params = '{"sections":[{"name":"section_list","label":"Content","tab":"content","controls":[{"name":"current","label":"Current Item","type":"text","label_block":true},{"name":"current_flag","label":"Current Flag","type":"media"},{"name":"current_item_typography","label":"Current Item Typography","type":"typography","control_type":"group","selector":"{{WRAPPER}} .pxl-language-switcher1 .current--item"},{"name":"current_item_color","label":"Current Item Color","type":"color","selectors":{"{{WRAPPER}} .pxl-language-switcher1 .current--item":"color: {{VALUE}};"}},{"name":"menu_item","label":"Item","type":"repeater","controls":[{"name":"text","label":"Text","type":"text","label_block":true},{"name":"flag","label":"Flag","type":"media"},{"name":"link","label":"Link","type":"url","label_block":true}],"title_field":"{{{ text }}}"},{"name":"dropdown_position","label":"Dropdown Position","type":"select","options":{"dr-left":"Left","dr-right":"Right"},"default":"dr-left"},{"name":"hover_style","label":"Style Display","type":"select","options":{"sub-show-bottom":"Bottom(Defualt)","sub-show-top":"Top"},"default":"sub-show-bottom"}]}]}';
    protected $styles = array(  );
    protected $scripts = array(  );
}