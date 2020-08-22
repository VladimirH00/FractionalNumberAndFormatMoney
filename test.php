<?php
require_once "FractionalNumber.php";
require_once "Money.php";
require_once "SorterNumber.php";

use VladimirH00\Numbers\FractionalNumber as FractionalNumber;
use VladimirH00\Numbers\SorterNumber as SorterNumber;
use VladimirH00\Numbers\Money as Money;


$numberOne = new FractionalNumber("565", "54", "-");
$numberTwo = new FractionalNumber(16, "00259", "+");
$numberThree = $numberOne->summation($numberTwo);
echo "после суммирования : " . $numberThree->format(",", " ") . "<br>";
$numberThree = $numberOne->subtraction($numberTwo);
echo "после вычитания : " . $numberThree->format(",", " ") . "<br>";
$numberThree = $numberTwo->multiplication($numberOne);
echo "после умножения : " . $numberThree->format(",", " ") . "<br>";
$numberThree = $numberOne->divide($numberTwo);
echo "после деления : " . $numberThree->format(",", " ") . "<br>";

$number_three = new Money("$", "left", 160000, 259, "+");
echo $number_three->format(",", " ") . "<br>";
$number_three = new Money("руб.", "right", 645382, 0, "+");
echo $number_three->format("/", " ") . "<br><br>";
$arr[] = array();
for ($i = 0; $i < 10; $i++) {
    $arr[] = new FractionalNumber(rand(0, 1000), rand(0, 100), "+");
}

$compareFunction = function ($oneArgument, $twoArgument) {
    $needPartOne = array();
    $needPartTwo = array();
    preg_match_all("/[0-9]*/", $oneArgument->format(".", ""), $needPartOne);
    preg_match_all("/[0-9]*/", $twoArgument->format(".", ""), $needPartTwo);
    if ($needPartOne[0][2] > $needPartTwo[0][2]) {
        return 1;
    } else if ($needPartOne[0][2] < $needPartTwo[0][2]) {
        return -1;
    }
    return 0;
};

$sort = new SorterNumber();
for ($i = 1; $i < 10; $i++) {
    echo $arr[$i]->format(".", " ");
    echo "<br>";
}
$ascArray = $sort->sortAscNumb($arr, $compareFunction);
echo "<br>Отсортированный по возрастанию массив <br>";
for ($i = 1; $i < count($ascArray); $i++) {
    echo $ascArray[$i]->format(".", " ");
    echo "<br>";
}
$descArray = $sort->sortDescNumb($arr, $compareFunction);
echo "<br>Отсортированный по убыванию массив <br>";
for ($i = 1; $i < count($descArray); $i++) {
    echo $descArray[$i]->format(".", " ");
    echo "<br>";
}