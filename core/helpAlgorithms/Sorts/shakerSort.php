<?php


namespace core\helpAlgorithms\Sorts;


use core\helpAlgorithms\sort;

class shakerSort extends sort implements sortAlgorithms
{
    //Как пузырьком только в разные стороны
    public function __construct(&$array, &$arrayLarge, &$performance)
    {
        $performance = 0;
        $this->Algorithm($array, $arrayLarge, $performance);
    }



    public function Algorithm(&$array, &$arrayLarge, &$performance)
    {
        if(!isset($array))
        {
            return false;
        }
        $begin = 1;
        $end = $arrayLarge-1;
       $nextLoop = false;
        while(true)
        {

            //в одну сторону
            for($i = $begin; $i < $arrayLarge; $i += 1) {
                $performance+=1;
                if ($array[$i-1] > $array[$i]) {
                    $this->swap($array[$i], $array[$i - 1]);
                    $nextLoop = true;
                    $end  = $i - 1;
                }
            }
            if(!$nextLoop)break;
            $nextLoop = false;
            //и в другую
            for($i = $end; $i >= 1; $i -= 1) {
                $performance+=1;
                if ($array[$i-1] > $array[$i]) {
                    $this->swap($array[$i], $array[$i - 1]);
                    $nextLoop = true;
                    $end = $i;
                }
            }
            if(!$nextLoop)break;
            $nextLoop = false;
        }
        return true;
    }


}