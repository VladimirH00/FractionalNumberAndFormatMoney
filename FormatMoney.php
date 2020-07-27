<?php
namespace VladimirH00\Numbers;

require_once "FractionalNumber.php";
use VladimirH00\Numbers\FractionalNumber as FractionalNumber;

class FormatMoney extends FractionalNumber
{
    private $format;
    private $currency;
    public function __construct($currency, $format, $first_part, $second_part, $sign, $separator = ",")
    {
        $this->format = $format;
        $this->currency = $currency;
        parent::__construct($first_part, $second_part, $sign, $separator);
    }
    public function outPut(){
        if($this->format =="right"){
            return "".parent::outPut() ." ". $this->currency;
        }else {
            return "" . $this->currency . " " . parent::outPut();
        }
    }
}