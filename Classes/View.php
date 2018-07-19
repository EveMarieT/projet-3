<?php

class View
{
    private $template;

    public function __contstruct($template)
    {
        $this->template = $template;
    }

    public function render()
    {
        $template = $this->template;
        ob_start();
        include(VIEW.$template.'.php');
        $contentPage = ob_get_clean();
        include_once(VIEW.'_template.php');
    }
}
