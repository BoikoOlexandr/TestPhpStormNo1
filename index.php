<?php
use \core\helpAlgorithms\sort;

function register($class){
   include $class.'.php';
}

spl_autoload_register('register');

//$sort = new sort();
//$sort->SetRandomArray(100);
//$sort->CombSort();
//print_r($sort->getSortedArray());

//$test = new \core\helpAlgorithms\Sorts\Test\testAlgorithms(1000);
//$test->SetSorType(3);
//$test->Test(5000);
//echo $test->Avarage();
//
$test = new \core\helpAlgorithms\Sorts\Test\testAlgorithms();
$test->Demo(1100, 10);
$test->Analize();
