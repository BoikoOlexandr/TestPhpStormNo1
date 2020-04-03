<?php
use \core\helpAlgorithms\sort;

function register($class){
   include $class.'.php';
}

spl_autoload_register('register');

$test = new \core\helpAlgorithms\Sorts\Test\testAlgorithms(100);
$test->Test(1000);
print_r($test->Avarage());

