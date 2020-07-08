<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $counter = 30;

        for($i = 0; $i < $counter; $i++) {
            $newUser = new User();
            $newUser->name = $faker->firstName();
            $newUser->last_name = $faker->lastName();
            $newUser->birth_date = $faker->date();
            $newUser->email = $faker->email();
            $newUser->password = Hash::make('mypassword');
            $newUser->save();
        }
    }
}
