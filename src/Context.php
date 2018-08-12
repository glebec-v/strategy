<?php

namespace GlebecV;

use GlebecV\Operations\Add;
use GlebecV\Operations\Div;
use GlebecV\Operations\Mul;
use GlebecV\Operations\Sub;

class Context
{
    private const OPERATIONS = [
        '+' => Add::class,
        '-' => Sub::class,
        '/' => Div::class,
        '*' => Mul::class,
    ];

    private $operationExecutor;

    public function __construct(string $operation)
    {
        $this->operationExecutor = $this->getExecutor($operation);
    }

    public function getExecutor(string $operation): OperationInterface
    {
        if (!in_array($operation, array_keys(self::OPERATIONS))) {
            throw new \InvalidArgumentException("Operation {$operation} is not supported", 1);
        }

        return new (self::OPERATIONS[$operation])();
    }

    public function calculate($a, $b)
    {
        return $this->operationExecutor->calculate($a, $b);
    }

}