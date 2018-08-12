<?php

namespace GlebecV;

use GlebecV\Operations\Add;
use GlebecV\Operations\Div;
use GlebecV\Operations\Mul;
use GlebecV\Operations\Sub;

/**
 * Class Context
 * @package GlebecV
 * @property OperationInterface $operationExecutor
 */
class Context
{
    private const OPERATIONS = [
        '+' => Add::class,
        '-' => Sub::class,
        '/' => Div::class,
        '*' => Mul::class,
    ];

    private $operationExecutor;

    /**
     * Context constructor.
     * @param string $operation
     */
    public function __construct(string $operation)
    {
        $this->operationExecutor = $this->getExecutor($operation);
    }

    /**
     * @param string $operation
     * @return OperationInterface
     * @throws \InvalidArgumentException
     */
    private function getExecutor(string $operation): OperationInterface
    {
        if (!in_array($operation, array_keys(self::OPERATIONS))) {
            throw new \InvalidArgumentException("Operation {$operation} is not supported", 1);
        }
        $operations = self::OPERATIONS;
        return new $operations[$operation]();
    }

    /**
     * @param $a
     * @param $b
     * @return mixed
     */
    public function calculate($a, $b)
    {
        return $this->operationExecutor->calculate($a, $b);
    }

}