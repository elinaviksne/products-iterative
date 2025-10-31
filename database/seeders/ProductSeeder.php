<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        // Ģenerē 20 testu produktus
        Product::factory()->count(20)->create();
    }
}
