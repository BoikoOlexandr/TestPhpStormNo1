<?php


namespace core\helpAlgorithms;


class directoryHelper
{
    public static function GetClassList($dir){
        $temp = scandir(dir.$dir);
        $i = 0;
        foreach ($temp as $item)
        {
            if(
            preg_match('/([\w]+)(.php)$/',$item)
            )
            {
                if(is_file(dir.$dir.$item)) {

                    $item = preg_replace('/(\.php)/', '', $item);
                    $sortList[$i]['dir'] = $dir;
                    $sortList[$i]['class'] = $item;
                    $i++;
                }
            }
        }
        if (isset($sortList)){
            return $sortList;
        }else{
            echo "there no files in ".$dir;
            exit();

        }
    }
}