<?php

namespace VladimirH00\Numbers;

use InvalidArgumentException;


class FractionalNumber
{

    private $sign;
    private $intPart;
    private $floatPart;
    private $value;

    const SIGN_POSITIVE = "+";
    const SIGN_NEGATIVE = "-";

    public function __construct($intPart, $floatPart, $sign="+")
    {
        if (!in_array($sign, array(
            self::SIGN_NEGATIVE,
            self::SIGN_POSITIVE
        ))) {
            throw new InvalidArgumentException("There is no such numeric sign.");
        }
        if (!preg_match("/^[0-9]*$/", $intPart)) {
            throw new InvalidArgumentException("Invalid integer part.");
        }
        if (!preg_match("/^[0-9]*$/", $floatPart)) {
            throw new InvalidArgumentException("Invalid float part.");
        }
        $this->intPart = $intPart;
        $this->floatPart = $floatPart;
        $this->sign = $sign;

        $this->value = (double)("" . $sign . $intPart . "." . $floatPart);
    }

    private function parseNumber($value)
    {
        if ($value > 0) {
            $sign = "+";
        } else {
            $sign = "-";
            $value *= -1;
        }
        if (!preg_match("/^[0-9]*\.[0-9]*$/", $value)) {
            return new FractionalNumber($value, 0, $sign);
        }
        $arrayPart = array();
        preg_match_all("/[0-9]*/", $value, $arrayPart);
        return new FractionalNumber($arrayPart[0][0], $arrayPart[0][2], $sign);
    }

    public function format($separator, $thousandsSep)
    {
        return number_format($this->value, mb_strlen($this->floatPart), $separator, $thousandsSep);
    }

    public function summation(FractionalNumber $value)
    {
        $number = $this->value + $value->value;
        return $this->parseNumber($number);
    }

    public function subtraction(FractionalNumber $value)
    {
        $number = $this->value - $value->value;
        return $this->parseNumber($number);
    }

    public function multiplication(FractionalNumber $value)
    {
        $number = $this->value * $value->value;
        return $this->parseNumber($number);
    }

    public function divide(FractionalNumber $value)
    {
        $number = $this->value / $value->value;
        return $this->parseNumber($number);
    }

}