<?php

namespace GlebecV\Operations;

use GlebecV\OperationInterface;

class Sub implements OperationInterface
{

    public function calculate($a, $b)
    {
        return $a - $b;
    }
}