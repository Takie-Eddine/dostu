<?php

namespace Database\Seeders;

use App\Models\Product;
use Faker\Factory;
use FFI;
use Illuminate\Database\Seeder;

class ProductReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        Product::all()->each(function($product) use ($faker){
            for ($i=1; $i < rand(1,3) ; $i++) {
                $product->reviews()->create([
                    'client_id'=>5,
                    'name' => $faker->userName(),
                    'email' => $faker->email(),
                    'title' => $faker->sentence(),
                    'message' => $faker->paragraph(),
                    'status' => rand(1,0),
                    'rating' => rand(1,5),
                ]);
            }

        });
    }
}
