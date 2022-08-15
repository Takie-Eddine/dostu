<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EntrustSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Factory::create();

        $adminRole = Role::create(['name' => 'admin','display_name' => 'Administration','description' => 'Administrator', 'allowed_route'=> 'client',]);
        $supervisorRole = Role::create(['name' => 'supervisor','display_name' => 'Supervisor','description' => 'Supervisor','allowed_route'=> 'client',]);
        $customerRole = Role::create(['name' => 'customer','display_name' => 'Customer','description' => 'Customer','allowed_route'=> null,]);


        $admin = User::create([
            'first_name'=>'client_admin',
            'last_name'=>'system',
            'mobile'=>'05636582314',
            'user_image'=>'avatar1',
            'status'=>1,
            'email'=>'client_admin@system.com',
            'password'=>bcrypt('123456789'),
            'remember_token'=>Str::random(10),
            'email_verified_at' =>now(),
        ]);

        $admin->attachRole($adminRole);

        $supervisor = User::create([
            'first_name'=>'client_supervisor',
            'last_name'=>'system',
            'mobile'=>'05636582315',
            'user_image'=>'avatar2',
            'status'=>1,
            'email'=>'client_supervisor@system.com',
            'password'=>bcrypt('123456789'),
            'remember_token'=>Str::random(10),
            'email_verified_at' =>now(),
        ]);

        $supervisor->attachRole($supervisorRole);


        $customer = User::create([
            'first_name'=>'client_customer',
            'last_name'=>'system',
            'mobile'=>'05636582316',
            'user_image'=>'avatar3',
            'status'=>1,
            'email'=>'client_customer@system.com',
            'password'=>bcrypt('123456789'),
            'remember_token'=>Str::random(10),
            'email_verified_at' =>now(),
        ]);
        $customer->attachRole($customerRole);


        for ($i=1; $i <20 ; $i++) {

            $random_customer = User::create([
                'first_name'=>$faker->firstName,
                'last_name'=>$faker->lastName,
                'mobile'=>$faker->numberBetween(00000000000,99999999999),
                'user_image'=>'avatar3',
                'status'=>1,
                'email'=>$faker->unique()->safeEmail,
                'password'=>bcrypt('123456789'),
                'remember_token'=>Str::random(10),
                'email_verified_at' =>now(),
            ]);
            $random_customer->attachRole($customerRole);

        }

    }
}
