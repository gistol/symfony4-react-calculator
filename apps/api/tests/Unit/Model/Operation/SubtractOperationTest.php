<?php

namespace App\Tests\Unit\Model\Operation;

use App\Model\Operation;
use PHPUnit\Framework\TestCase;

/**
 * Class SubtractOperationTest
 * @package App\Tests\Unit\Model
 */
class SubtractOperationTest extends TestCase
{

    private $operation = 'subtract';

    public function test_calculate()
    {
        $operation = new Operation();
        $result = $operation->calculate([4,2], $this->operation);
        $this->assertEquals(2, $result);

        $result = $operation->calculate([9,2,3], $this->operation);
        $this->assertEquals(4, $result);

        $result = $operation->calculate([27,3], $this->operation);
        $this->assertEquals(24, $result);

        $result = $operation->calculate([4], $this->operation);
        $this->assertEquals(-4, $result);

        $result = $operation->calculate([], $this->operation);
        $this->assertEquals(0, $result);
    }

    public function test_validate()
    {
        $operation = new Operation();

        $result = $operation->validate([1,2], $this->operation);
        $this->assertEquals(true, $result);

        $result = $operation->validate([1,2,3], $this->operation);
        $this->assertEquals(true, $result);

        $result = $operation->validate([123], $this->operation);
        $this->assertEquals(true, $result);

        $result = $operation->validate([], $this->operation);
        $this->assertEquals(false, $result);
    }

}
