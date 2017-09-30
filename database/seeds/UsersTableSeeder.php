<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        App\User::truncate();
        App\Address::truncate();

        Schema::enableForeignKeyConstraints();

        factory(App\User::class, 10)->create()->each(function ($user) {

            $faker = app()->make(\Faker\Generator::class);

            for ($i = 0; $i < $faker->numberBetween(1,5); $i++)
            {
                $address = factory(App\Address::class)->make();
                $user->addresses()->save($address);
            }
        });
    }
}
