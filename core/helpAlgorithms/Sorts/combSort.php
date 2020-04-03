<?php


namespace core\helpAlgorithms\Sorts;


use core\helpAlgorithms\sort;

class combSort extends sort implements sortAlgorithms
{

    public function __construct(&$array, &$arrayLarge, &$performance)
    {
        $performance = 0;
        $this->Algorithm($array, $arrayLarge, $performance);
    }

    public function Algorithm(&$array, &$arrayLarge, &$performance)
    {
        if(!is_array($array) || !isset($array))return false;

        $buffer = round(($arrayLarge  ) /1.247);

        $first = 0;
        $second = $buffer;
        $nextLoop = false;
        while(true)
        {
                $performance += 1;
            if($array[$first] > $array[$second])
            {
                $this->swap($array[$first] , $array[$second]);
                $nextLoop = true;
            }
            $first += 1;
            $second = $second + 1;

            if($second == $arrayLarge) {
                if ($buffer == 1 && !$nextLoop) break;
                $nextLoop = false;
                $first = 0;
                if($buffer == 2)$buffer = 1;
                else $buffer = round($buffer/1.247);
                $second = $buffer;
            }
        }
        return true;
    }
}