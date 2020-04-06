<?php


namespace core\helpAlgorithms;


use core\helpAlgorithms\Sorts\bubleSort;
use core\helpAlgorithms\Sorts\combSort;
use core\helpAlgorithms\Sorts\quickSort;
use core\helpAlgorithms\Sorts\shakerSort;

class sort
{
    protected array $sortContainer;
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
        $this->InitializeSortAlgorithms();
    }

    public function SetRandomArray($large, $min = 0, $max = 100)
    {
        $this->arrayLarge = $large;
        if(!isset($this->array)) {
            for ($i = 0; $i < $large; $i += 1)
                $this->array[$i] = rand($min, $max);

            $this->sortedArray = $this->array;
            $this->InitializeSortAlgorithms();
            return true;
        }
        else{
            return false;
        }
    }

    public function InitializeSortAlgorithms()
    {
        foreach($this->GetSortList() as $className)
        {
            $fullClassName = 'core\helpAlgorithms\Sorts\\'.$className;
            $class = new $fullClassName($this->sortedArray, $this->arrayLarge, $this->performance);
            $this->SetSortContainer($className, $class);
        }
    }

    private function SetSortContainer($name, $class)
    {
        $this->sortContainer[$name] = $class;
    }

    public function GetSort($className)
    {
        $algorithmName = $this->PtotectAlgorithmName($className);
        return $this->sortContainer[$algorithmName];
    }

    private function PtotectAlgorithmName(string $className)
    {
        $classList = $this->GetSortList();
        $found = false;
        foreach ($classList as $item)
        {
            $pattern = '/'.$className.'/i';
            if(preg_match($pattern,$item)){
                if(!$found){
                    $found = true;
                    $resolt = $item;
                }
                else {
                    echo 'Не правильное имя сортировки';
                    exit();
                }
            }
        }
        return $resolt;
    }


    public function GetSortList(){
        $temp = scandir(__DIR__.'/Sorts');
        $i = 0;
        foreach ($temp as $item)
        {
            if(
                preg_match('/([\w]+)(.php)$/',$item)
            )
            {
                $item =  preg_replace('/(\.php)/','',$item);
                if($item != 'sortAlgorithms') {
                    $sortList[$i] = $item;
                    $i++;
                }
            }
        }
        return $sortList;
    }

    public function BubleSort()
    {
        new bubleSort($this->sortedArray, $this->arrayLarge, $this->performance);
    }
    public function ShakerSort()
    {
        new shakerSort($this->sortedArray, $this->arrayLarge, $this->performance);
    }
    public function CombSort()
    {
        new combSort($this->sortedArray, $this->arrayLarge, $this->performance);
    }
    public function QuickSort()
    {
        new quickSort($this->sortedArray, $this->arrayLarge, $this->performance);
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

    protected function swap(&$a, &$b)
    {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }
}