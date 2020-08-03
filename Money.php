<?php

namespace VladimirH00\Numbers;

require_once "FractionalNumber.php";

use VladimirH00\Numbers\FractionalNumber as FractionalNumber;

class Money extends FractionalNumber
{
    private $format;
    private $currency;

    public function __construct($currency, $format, $first_part, $second_part, $sign)
    {
        $this->format = $format;
        $this->currency = $currency;
        parent::__construct($first_part, $second_part, $sign);
    }

    public function outPut($separator, $thousandsSep)
    {
        if ($this->format == "right") {
            return "" . parent::outPut($separator, $thousandsSep) . " " . $this->currency;
        } else {
            return "" . $this->currency . " " . parent::outPut($separator, $thousandsSep);
        }
    }
}