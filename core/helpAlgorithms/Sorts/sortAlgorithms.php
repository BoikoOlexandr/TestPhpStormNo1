<?php


namespace core\helpAlgorithms\Sorts;


interface sortAlgorithms
{
    public function __construct(&$array, &$arrayLarge, &$performance);
    public function Algorithm(&$array, &$arrayLarge, &$performance);

}