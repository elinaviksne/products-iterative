<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductQuantityControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_increase_route_increases_quantity()
    {
        $product = Product::factory()->create(['quantity' => 5]);

        $response = $this->postJson(route('products.increase', $product));

        $response->assertStatus(200)
                 ->assertJson(['quantity' => 6]);

        $this->assertEquals(6, $product->fresh()->quantity);
    }

    public function test_decrease_route_decreases_quantity()
    {
        $product = Product::factory()->create(['quantity' => 5]);

        $response = $this->postJson(route('products.decrease', $product));

        $response->assertStatus(200)
                 ->assertJson(['quantity' => 4]);

        $this->assertEquals(4, $product->fresh()->quantity);
    }

    public function test_decrease_route_does_not_go_below_zero()
    {
        $product = Product::factory()->create(['quantity' => 1]);

        $response = $this->postJson(route('products.decrease', $product));

        $response->assertStatus(200)
                 ->assertJson(['quantity' => 0]);

        $this->assertEquals(0, $product->fresh()->quantity);
    }
}
