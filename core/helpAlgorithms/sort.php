<?php


namespace core\helpAlgorithms;


use core\helpAlgorithms\Sorts\bubleSort;

class sort
{
    protected array $array;
    protected int $arrayLarge;
    protected array $sortedArray;
    protected int $performance = 0;

    public function getSortedArray()
    {
        return $this->sortedArray;
    }

    public function GetPerformance()
    {
        return $this->performance;
    }

    public function SetArray($array)
    {
        $this->array = $array;
        $this->sortedArray = $this->array;
        $this->arrayLarge = count($array);
    }

    public function SetRandomArray($large, $min = 0, $max = 100)
    {
        $this->arrayLarge = $large;
        if(!isset($this->array)) {
            for ($i = 0; $i < $large; $i += 1)
                $this->array[$i] = rand($min, $max);

            $this->sortedArray = $this->array;
            return true;
        }
        else{
            return false;
        }
    }

    public function BubleSort()
    {
        new bubleSort($this->sortedArray, $this->arrayLarge, $this->performance );
    }

    public function GetArray()
    {
        return $this->array;
    }

    public function unsetArrays()
    {
        unset($this->array);
        unset($this->sortedArray);
    }

}