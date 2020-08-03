<?php
require_once "FractionalNumber.php";
require_once "Money.php";

use VladimirH00\Numbers\FractionalNumber as FractionalNumber;

use VladimirH00\Numbers\Money as Money;

$numberOne = new FractionalNumber("123", "54", "-");
$numberTwo = new FractionalNumber(16, "00259", "+");
$numberThree = $numberOne->summation($numberTwo);
echo "после суммирования : " . $numberThree->outPut(",", " ") . "<br>";
$numberThree = $numberOne->subtraction($numberTwo);
echo "после вычитания : " . $numberThree->outPut(",", " ") . "<br>";
$numberThree = $numberTwo->multiplication($numberOne);
echo "после умножения : " . $numberThree->outPut(",", " ") . "<br>";
$numberThree = $numberOne->divide($numberTwo);
echo "после деления : " . $numberThree->outPut(",", " ") . "<br>";
echo "сравнение двух чисел " . $numberOne->outPut(",", " ") . " и " . $numberTwo->outPut(",", " ") . " : ";
echo $numberOne->compare($numberTwo) . "<br>";
$number_three = new Money("$", "left", 160000, 259, "+");
echo $number_three->outPut(",", " ") . "<br>";
$number_three = new Money("руб.", "right", 645382, 0, "+");
echo $number_three->outPut("/", " ") . "<br>";
$arr[] = array();
for ($i = 0; $i < 10; $i++) {
    $arr[] = new FractionalNumber(rand(0, 1000), rand(0, 100), "+");
}
echo "Значения перед сортировкой массива<br>";
for ($i = 1; $i < 10; $i++) {
    echo $arr[$i]->outPut(".", " ");
    echo "<br>";
}
$arr = $arr[1]->sortArray($arr);
echo "Значения после сортировки массива<br>";
for ($i = 1; $i < 10; $i++) {
    echo $arr[$i]->outPut(".", " ");
    echo "<br>";
}

