<?php

namespace GlebecV\Operations;

use GlebecV\OperationInterface;

class Div implements OperationInterface
{

    public function calculate($a, $b)
    {
        if (0 === (int)$b) {
            throw new \InvalidArgumentException("Cannot comply division by zero", 1);
        }
        return $a / $b;
    }
}