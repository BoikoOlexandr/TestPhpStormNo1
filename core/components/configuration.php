<?php


namespace core\components;



class configuration
{
    private $di;
    private array $globalConfig;



    public function __construct($di)
    {
        $this->globalConfig = require_once dir.ds.'globalConfig.php';
        $this->di = $di;

        $this->SetGlobalConfig("template2",1);
    }
    public function GetGlobalConfig($key)
    {
        if(isset($this->globalConfig[$key]))
        {
            return $this->globalConfig[$key];
        }else{
            echo "There are no $key in Global Configurations";
            return 0;
        }
    }

    public function SetGlobalConfig($key, $value)
    {
        $config = dir.ds.'globalConfig.php';
        $content = file($config);

        for($i = 0; $i < count($content); $i++)
        {
            if(preg_match('/"(\w+)" => "(\w+)"([,]*)/',$content[$i])) {
                if (strripos($content[$i], $key)) {
                    $content[$i] = str_replace(
                      $this->GetGlobalConfig($key),
                      $value,
                        $content[$i]
                    );
                }
            }

        }
       file_put_contents($config,$content);
    }

    private function Replace()
    {

    }





}