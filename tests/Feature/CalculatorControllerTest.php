<?php

namespace Tests\Feature;

use Tests\TestCase;

class CalculatorControllerTest extends TestCase
{
    public function test_get_teszt_displays_the_calculator_form(): void
    {
        $this->get('/teszt')
            ->assertOk()
            ->assertSee('Számológép')
            ->assertSee('name="a"', false)
            ->assertSee('name="b"', false);
    }

    public function test_post_teszt_addition(): void
    {
        $this->post('/teszt', ['a' => 12, 'b' => 8, 'op' => 'add'])
            ->assertOk()
            ->assertSee('12 + 8 =')
            ->assertSee('20');
    }

    public function test_post_teszt_division_formats_decimal_result(): void
    {
        $this->post('/teszt', ['a' => 5, 'b' => 2, 'op' => 'divide'])
            ->assertOk()
            ->assertSee('5 / 2 =')
            ->assertSee('2,50');
    }

    public function test_post_teszt_division_by_zero_displays_error(): void
    {
        $this->post('/teszt', ['a' => 10, 'b' => 0, 'op' => 'divide'])
            ->assertOk()
            ->assertSee('Nullával nem lehet osztani!');
    }
}
