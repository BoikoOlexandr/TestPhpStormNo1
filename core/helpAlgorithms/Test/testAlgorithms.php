<?php


namespace core\helpAlgorithms\Test;


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
        $list = $this->sort->GetSortList();
        $this->sortType =  $list[$num];
    }
    public function Test($countOfTests)
    {
        for($i = 0; $i < $countOfTests; $i+=1)
        {

            $this->sort->SetRandomArray($this->arraySize);

           $Alg = $this->sort->GetSort($this->sortType);
            $Alg->Run();
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
        $sortNames = $this->sort->GetSortList();
        for($i = 0; $i < count($sortNames); $i += 1)
        {
            $this->SetSorType($i);

            $this->Test($countOfTests);

            $this->testResolt[$i] = $this->Avarage();
            print_r($sortNames[$i]."\t--->\t".$this->Avarage());
            echo "\n";
        }
    }
    public function Analize()
    {
        $zero = $this->testResolt[0];
        foreach ($this->testResolt as $item)
        {
            echo $zero/$item."\n";
        }
    }
}