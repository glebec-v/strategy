<?php

namespace GlebecV\Operations;

use GlebecV\OperationInterface;

class Mul implements OperationInterface
{

    public function calculate($a, $b)
    {
        return $a * $b;
    }
}