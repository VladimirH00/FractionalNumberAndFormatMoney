<?php
require_once "FractionalNumber.php";
require_once "FormatMoney.php";

use VladimirH00\Numbers\FractionalNumber as FractionalNumber;

use VladimirH00\Numbers\FormatMoney as FormatMoney;

$number_one = new FractionalNumber(14,256,"-");
$number_two = new FractionalNumber(16,259,"+");
echo "Number one изначально : " .$number_one->outPut() . "<br>";
$number_one->summation($number_two);
echo "Number one после суммирования с ".$number_two->outPut()." : " . $number_one->outPut(). "<br>";
$number_one->subtraction(12.98);
echo "Number one после вычитания 12.98 : ". $number_one->outPut(). "<br>";
echo "Number two изначально : ".$number_two->outPut(). "<br>";
$number_two->multiplication(4);
echo "Number two после умножения на 4 : ".$number_two->outPut() . "<br>";
$number_two->divide(5);
echo "Number two после деления на 5 : ".$number_two->outPut() . "<br>";
echo  "сравнение двух чисел ".$number_one->outPut() ." и ". $number_two->outPut() . " и вывод большего : ";
echo $number_one->compare($number_two) . "<br>";
$number_three = new FormatMoney("$","left",16,259,"+");
echo $number_three->outPut();