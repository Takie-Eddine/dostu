<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Faker\Factory;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        //$supplier = Supplier::create([]);


        for ($i=1; $i <12 ; $i++) {
            $supplier = Supplier::create([
                'first_name'=> $faker->firstName,
                'last_name'=>  $faker->lastName,
                'mobile'=> $faker->numberBetween(00000000000,99999999999),
                'email'=>  $faker->unique()->safeEmail ,
                'password'=> bcrypt('123456789'),
            ]);
        }
    }
}
