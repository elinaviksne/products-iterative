<?php

namespace Tests\Unit;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_increases_quantity_by_one()
    {
        $product = Product::factory()->create(['quantity' => 5]);

        $product->increaseQuantity();

        $this->assertEquals(6, $product->fresh()->quantity);
    }

    /** @test */
    public function it_increases_quantity_by_a_custom_amount()
    {
        $product = Product::factory()->create(['quantity' => 5]);

        $product->increaseQuantity(3);

        $this->assertEquals(8, $product->fresh()->quantity);
    }

    /** @test */
    public function it_decreases_quantity_by_one()
    {
        $product = Product::factory()->create(['quantity' => 5]);

        $product->decreaseQuantity();

        $this->assertEquals(4, $product->fresh()->quantity);
    }

    /** @test */
    public function it_decreases_quantity_by_a_custom_amount()
    {
        $product = Product::factory()->create(['quantity' => 10]);

        $product->decreaseQuantity(4);

        $this->assertEquals(6, $product->fresh()->quantity);
    }

    /** @test */
    public function it_does_not_allow_negative_quantity()
    {
        $product = Product::factory()->create(['quantity' => 2]);

        $product->decreaseQuantity(5);

        $this->assertEquals(0, $product->fresh()->quantity);
    }

    /** @test */
    public function it_saves_changes_to_database()
    {
        $product = Product::factory()->create(['quantity' => 3]);

        $product->increaseQuantity(2);

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'quantity' => 5
        ]);
    }
}
