<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_increase_quantity()
    {
        $product = Product::factory()->create(['quantity' => 5]);

        $product->increaseQuantity(3);

        $this->assertEquals(8, $product->quantity);
    }

    public function test_decrease_quantity()
    {
        $product = Product::factory()->create(['quantity' => 5]);

        $product->decreaseQuantity(2);

        $this->assertEquals(3, $product->quantity);
    }

    public function test_decrease_quantity_does_not_go_below_zero()
    {
        $product = Product::factory()->create(['quantity' => 2]);

        $product->decreaseQuantity(5);

        $this->assertEquals(0, $product->quantity);
    }
}
