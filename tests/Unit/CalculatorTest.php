<?php

namespace Tests\Unit;

use App\Services\Calculator;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    private Calculator $calculator;

    protected function setUp(): void
    {
        parent::setUp();
        $this->calculator = new Calculator();
    }

    public function test_addition(): void
    {
        $this->assertSame(20, $this->calculator->add(15, 5));
    }

    public function test_subtraction(): void
    {
        $this->assertSame(10, $this->calculator->subtract(15, 5));
    }

    public function test_subtraction_can_return_negative_number(): void
    {
        $this->assertSame(-5, $this->calculator->subtract(5, 10));
    }

    public function test_multiplication(): void
    {
        $this->assertSame(25, $this->calculator->multiply(5, 5));
    }

    public function test_division(): void
    {
        $this->assertEqualsWithDelta(2.5, $this->calculator->divide(5, 2), 0.0000000000000001);
    }

    public function test_division_by_zero_throws_exception(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Nullával nem lehet osztani!');
        $this->calculator->divide(10, 0);
    }

    public function test_multiplication_by_zero_returns_zero(): void
    {
        $this->assertSame(0, $this->calculator->multiply(0, 150));
    }
}
