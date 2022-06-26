<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactBookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [];
        $faker = Factory::create();

        for ($i = 0; $i < 20; $i++) {
            $data[] = [
                'name' => $faker->name,
                'email' => $faker->email,
                'phone' => $faker->email,
                'address' => $faker->address,
                'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
                'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
            ];
        }

        DB::table('contact_bock')->insert($data);
    }
}
