<?php

namespace VladimirH00\Numbers;

class FractionalNumber
{

    protected $sign;
    protected $first_part;
    protected $second_part;
    protected $separator;

    public function __construct($first_part, $second_part, $sign, $separator = ",")
    {
        $this->first_part = $first_part;
        $this->second_part = $second_part;
        $this->sign = $sign;
        $this->separator = $separator;
    }

    private function parseNumber($value)
    {
        if (strpos($value, "-")) {
            $this->sign = "-";
            $value = str_replace("-", "", $value);
        } else {
            $this->sign = "+";
        }

        $position_separate = strpos($value, ".");
        $this->first_part = substr($value, 0, $position_separate);
        $this->second_part = substr($value, $position_separate + 1);
    }

    private function formatNumber()
    {
        $number = $this->outPut();
        return (double)str_replace($this->separator, ".", $number);
    }

    public function outPut()
    {
        $number = "";
        if ($this->sign == "-") {
            return $number .= $this->sign . $this->first_part . $this->separator . $this->second_part;
        }
        return $number .= $this->first_part . $this->separator . $this->second_part;
    }

    public function summation($value)
    {
        if (is_integer($value) || is_double($value)) {
            $number = $this->formatNumber() + $value;
            $this->parseNumber($number);
        }
        if ($value instanceof FractionalNumber) {
            $number = $this->formatNumber() + $value->formatNumber();
            $this->parseNumber($number);
        }
    }

    public function subtraction($value)
    {
        if (is_integer($value) || is_double($value)) {
            $number = $this->formatNumber() - $value;
            $this->parseNumber($number);
        }
        if ($value instanceof FractionalNumber) {
            $number = $this->formatNumber() - $value->formatNumber();
            $this->parseNumber($number);
        }
    }

    public function multiplication($value)
    {
        if (is_integer($value) || is_double($value)) {
            $number = $this->formatNumber() * $value;
            $this->parseNumber($number);
        }
        if ($value instanceof FractionalNumber) {
            $number = $this->formatNumber() * $value->formatNumber();
            $this->parseNumber($number);
        }
    }

    public function divide($value)
    {
        if (is_integer($value) || is_double($value)) {
            $number = $this->formatNumber() / $value;
            $this->parseNumber($number);
        }
        if ($value instanceof FractionalNumber) {
            $number = $this->formatNumber() / $value->formatNumber();
            $this->parseNumber($number);
        }
    }

    public function compare($value)
    {
        if (is_integer($value) || is_double($value)) {
            if ($value > $this->formatNumber()) {
                return $value;
            } else {
                return $this->outPut();
            }
        } else if ($value instanceof FractionalNumber) {
            if ($value->formatNumber() > $this->formatNumber()) {
                return $value->outPut();
            } else {
                return $this->outPut();
            }
        }
    }
}