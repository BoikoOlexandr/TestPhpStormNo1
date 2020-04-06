<?php


namespace core\helpAlgorithms\Sorts;
use core\helpAlgorithms\sort;

class bubleSort extends sort implements sortAlgorithms
{

        public  $performancePointer;
        private $arrayPointer;
        private $arrayLagePointer;
    public function __construct(&$array, &$arrayLarge, &$performance)
    {
        $this->performancePointer = &$performance;
        $performance = 0;
        $this->arrayPointer = &$array;
        $this->arrayLagePointer = &$arrayLarge;
    }

    public function Run()
    {
        $this->Algorithm($this->arrayPointer, $this->arrayLagePointer, $this->performancePointer);
    }


    public function Algorithm( &$array, &$arrayLarge, &$performance)
    {
        if(!isset($array)) {
            echo "Array is not set";
            return false;
        };

        $nextLap = false;
        $i = 1;
        while (true){
            $performance += 1;
            if($array[$i-1] > $array[$i])
            {
                $this->swap($array[$i-1],$array[$i]);
                $nextLap = true;
            }
                $i += 1;

            if($i == $arrayLarge)
            {
                if(!$nextLap)break;
                $i = 1;
                $nextLap = false;
            }
        }

        return true;
    }
}