<?php

namespace GlebecV\Operations;

use GlebecV\OperationInterface;

class Add implements OperationInterface
{
    public function calculate($a, $b)
    {
        return $a + $b;
    }
}