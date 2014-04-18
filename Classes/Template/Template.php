<?php
/**
 * Template system for page rendering
 **/

namespace Classes\Template;

class Template
{
    private $templateName;
    private $defaultViewFolder;
    const VIEWFOLDER = 'Views/';

    function __construct($templateName)
    {
        $this->templateName = $templateName;
        $this->defaultViewFolder = getcwd() . '/'. self::VIEWFOLDER;
    }

    /**
     * include automatically the header, the footer and a custom view
     **/
    public function render($viewName)
    {
        $this->includeView('header');
        $this->includeView($viewName);
        $this->includeView('footer');
    }

    private function includeView($viewName){
        $viewPath = $this->defaultViewFolder . $this->templateName . '/' .  $viewName . '.php';
        require($viewPath);
    }

    /**
     * get the template url useful for including js, css files
     **/
    public function getTemplateUrl()
    {
        return self::VIEWFOLDER . $this->templateName .'/';
    }
}

