<?php


namespace VladimirH00\Numbers;
use VladimirH00\Numbers\FractionalNumber as FractionalNumber;
class SorterNumber
{
    public function sortAscNumb($array, $compareFunction)
    {
        $newArray=[];
        for($i = 1; $i < count($array); $i++){
            $newArray[] = clone $array[$i];
        }
        for ($i = 0; $i < count($newArray); $i++) {
            for ($j = 0; $j < count($newArray) - 1; $j++) {
                if ($compareFunction($newArray[$j], $newArray[$j+1]) == 1) {
                    $temp = $newArray[$j];
                    $newArray[$j] = $newArray[$j + 1];
                    $newArray[$j + 1] = $temp;
                }
            }
        }
        return $newArray;
    }
    public function sortDescNumb($array, $compareFunction)
    {
        $newArray=[];
        for($i = 1; $i < count($array); $i++){
            $newArray[] = clone $array[$i];
        }
        for ($i = 0; $i < count($newArray); $i++) {
            for ($j = 0; $j < count($newArray) - 1; $j++) {
                if ($compareFunction($newArray[$j], $newArray[$j+1]) == -1) {
                    $temp = $newArray[$j];
                    $newArray[$j] = $newArray[$j + 1];
                    $newArray[$j + 1] = $temp;
                }
            }
        }
        return $newArray;
    }
}