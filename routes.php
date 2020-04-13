<?php

// int mast be higher
$this->Add('start', "/", "defaultController", "Start");
$this->Add('about', "/about/", "defaultController", "About");
$this->Add('about2', "/about/{(int:someName)}/", "defaultController", "AboutInt");
$this->Add('about1', "/about/{(str:name1)}/{(str:name2)}/{(int:name4)}/", "defaultController", "AboutStr");

//// errors
$this->Add('routerError', "", "errorController", "NoRotes");