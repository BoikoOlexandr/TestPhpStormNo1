<?php


namespace core\helpAlgorithms\Sorts\Test;


use core\helpAlgorithms\sort;

class testAlgorithms
{
    private $sortType;
    private $sort;
    private $arraySize;
    private $sortPerformanseArray;
    private $testResolt;
    public function __construct($arraySize = 100)
    {
        $this->sortType = 'BubleSort';
        $this->arraySize = $arraySize;
        $this -> sort = new sort();

    }
    public function SetSorType($num)
    {
        switch ($num) {
            case 1: $this->sortType = 'BubleSort';break;
            case 2: $this->sortType = 'ShakerSort';break;
            case 3: $this->sortType = 'CombSort';break;
            default: echo "just 1,2 or 3"; exit();
        }
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
    public function Demo($arraySize = 100, $countOfTests = 1000){
        $this->arraySize = $arraySize;
        for($i = 1; $i <= 3; $i += 1)
        {
            $this->SetSorType($i);
            $this->Test($countOfTests);
            $this->testResolt[$i] = $this->Avarage();
            print_r($this->sortType."\t--->\t".$this->Avarage());
            echo "\n";
        }
    }
    public function Analize()
    {
        $zero = $this->testResolt[1];
        foreach ($this->testResolt as $item)
        {
            echo $zero/$item."\n";
        }
    }
}