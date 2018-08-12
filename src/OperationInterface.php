<?php

namespace GlebecV;

/**
 * Interface OperationInterface
 * @package GlebecV
 */
interface OperationInterface
{
    /**
     * @param $a
     * @param $b
     * @return mixed
     */
    public function calculate($a, $b);
}