<?php
use \core\helpAlgorithms\sort;

function register($class){
   include $class.'.php';
}

spl_autoload_register('register');

$sort = new sort();
$sort->SetRandomArray(20);
$a =$sort->GetSort('q');
$a->Run();

//$sort->SetArray([6,5,3,8,5,0,3,5,54,8]);

print_r($sort->getSortedArray());

//$test = new \core\helpAlgorithms\Sorts\Test\testAlgorithms(1000);
//$test->SetSorType(3);
//$test->Test(5000);
//echo $test->Avarage();
//
//$test = new \core\helpAlgorithms\Sorts\Test\testAlgorithms();
//$test->Demo(1100, 10);
//$test->Analize();
