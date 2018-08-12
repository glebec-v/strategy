<?php

use GlebecV\Context;

class ContextTest extends \PHPUnit\Framework\TestCase
{

    /**
     * @dataProvider GetExecutorProvider
     * @param string $operation
     * @throws ReflectionException
     */
    public function testGetExecutor(string $operation)
    {
        $executor = new Context($operation);
        $ref = new ReflectionMethod(Context::class, 'getExecutor');
        $ref->setAccessible(true);

        $result = $ref->invoke($executor, $operation);
        $this->assertInstanceOf(\GlebecV\OperationInterface::class, $result);
    }

    /**
     * @dataProvider calculateProvider
     * @param string $operation
     * @param $a
     * @param $b
     * @param $expectedResult
     * @throws InvalidArgumentException
     */
    public function testCalculate(string $operation, $a, $b, $expectedResult)
    {
        $executor = new Context($operation);
        $this->assertEquals($expectedResult, $executor->calculate($a, $b));
    }

    public function testCalculateWillThrowExceptionForIllegalOperation()
    {
        $this->expectException(InvalidArgumentException::class);
        $executor = new Context('**');
    }

    public function testCalculateWillThrowExceptionForSecondOperand()
    {
        $this->expectException(InvalidArgumentException::class);
        $result = (new Context('/'))->calculate(10, 0);
    }

    public function calculateProvider()
    {
        return [
            'test +' => [
                // $operation
                '+',
                // argument $a
                10,
                // argument $b
                20,
                // $expextedResult
                30
            ],
            'test -' => [
                // $operation
                '-',
                // argument $a
                10,
                // argument $b
                20,
                // $expextedResult
                -10
            ],
            'test *' => [
                // $operation
                '*',
                // argument $a
                10,
                // argument $b
                20,
                // $expextedResult
                200
            ],
            'test /' => [
                // $operation
                '/',
                // argument $a
                10,
                // argument $b
                20,
                // $expextedResult
                0.5
            ],
        ];
    }

    public function GetExecutorProvider()
    {
        return [
            'operation +' => [
                //$operation
                '+',
            ],
            'operation -' => [
                //$operation
                '-',
            ],
            'operation *' => [
                //$operation
                '*',
            ],
            'operation /' => [
                //$operation
                '/',
            ]
        ];
    }
}
