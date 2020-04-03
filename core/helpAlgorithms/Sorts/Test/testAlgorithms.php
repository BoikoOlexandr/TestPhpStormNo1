<?php


namespace core\helpAlgorithms\Sorts\Test;


use core\helpAlgorithms\sort;

class testAlgorithms
{
    private $sortType;
    private $sort;
    private $arraySize;
    private $sortPerformanseArray;
    public function __construct($arraySize = 100)
    {
        $this->sortType = 'BubleSort';
        $this->arraySize = $arraySize;
        $this -> sort = new sort();

    }
    public function Test($countOfTests)
    {
        for($i = 0; $i < $countOfTests; $i+=1)
        {
            $this->sort->SetRandomArray($this->arraySize);
            $this->sort->{$this->sortType}();
            $this->sortPerformanseArray[$i] = $this->sort->GetPerformance();
            $this->sort->unsetArrays();
        }
    }
    public function GetSortPerformanseArray()
    {
        return $this->sortPerformanseArray;
    }
    public function Avarage()
    {
        $sum = 0;
        foreach ($this->sortPerformanseArray as $item)
        {
            $sum +=$item;
        }
        return $sum / count($this->sortPerformanseArray);
    }
}