<?php

// int mast be higher
$this->Add('start', "/", "defaultController", "Start");
$this->Add('about', "/about/", "defaultController", "About");
$this->Add('about2', "/about/{(int)}/", "defaultController", "AboutInt");
$this->Add('about1', "/about/{(str)}/{(str)}/{(str)}/{(ínt)}/", "defaultController", "AboutStr");

//// errors
$this->Add('routerError', "", "errorController", "NoRotes");