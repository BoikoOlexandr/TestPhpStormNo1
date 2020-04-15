<?php


namespace core\components;


use core\helpAlgorithms\directoryHelper;

class view
{

    public string $template;
    public string $path;
    public $di;
    public $header;
    public $footer;
    public $css;

    public function __construct($di)
    {
        $this->di = $di;
        $this->SetTemplate();
    }

    public function SetTemplate()
    {
        $template = $this->di->Get("configuration")->GetGlobalConfig('template');
        $this->template = $template."Template";
        $this->path = dir.ds.'view'.ds.$this->template.ds;
        $this->footer = file_get_contents($this->path.'footer.php');
        $this->GetCss();
    }

    private function SetHeader()
    {
        require_once $this->path.'header.php';
    }

    private function GetCss()
    {
        $listCss = directoryHelper::GetClassList(ds.'assets'.ds.$this->template.ds.'css'.ds,'css');
        for ($i = 0; $i < count($listCss); $i++)
        {
            $this->css[$i] = $listCss[$i]["dir"].$listCss[$i]["class"].".css" ;
        }
    }

    public function Render($page, $data)
    {
        foreach ($data as $key=>$value )
        {
            ${$key} = $value;
    }
        require_once $this->path.$page.'.php';
    }

}