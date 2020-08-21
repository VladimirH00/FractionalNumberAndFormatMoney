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

    public function __construct($intPart, $floatPart, $sign)
    {
        if (!in_array($sign, array(
            self::SIGN_NEGATIVE,
            self::SIGN_POSITIVE
        ))) {
            throw new InvalidArgumentException("не существует такого числового знака");
        }
        if ((string)(int)($intPart) != (string)$intPart) {
            throw new InvalidArgumentException("Неверно введена целая часть");
        }
        if ((string)(double)("1." . (string)$floatPart) != "1." . (string)$floatPart) {
            throw new InvalidArgumentException("Не верно введена дробная часть");
        }
        $this->intPart = $intPart;
        $this->floatPart = $floatPart;
        $this->sign = $sign;

        $this->value = (double)("" . $sign . $intPart . "." . $floatPart);
    }

    private function parseNumber($value)
    {
        if ($value == 0) {
            return new FractionalNumber(0, 0, "+");
        }
        $sign = "+";
        if ($value < 0) {
            $sign = "-";
            $value = substr($value, strpos($value, "-") + 1);
        }
        if (!strpos($value, ".")) {
            return new FractionalNumber($value, 0, $sign);
        }
        $separatorPos = strpos("$value", ".");
        $intPart = substr($value, 0, $separatorPos);
        $floatPart = substr($value, $separatorPos + 1);
        return new FractionalNumber($intPart, $floatPart, $sign);
    }
    public function getFloat()
    {
        return $this->floatPart;
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