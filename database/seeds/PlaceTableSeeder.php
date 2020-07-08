<?php

use Illuminate\Database\Seeder;
use App\Place;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PlaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $counter = 20;
        $users = User::all();

        for($i = 0; $i < $counter; $i++) {
            $title = $faker->text(15);
            $newPlace = new Place();
            $newPlace->user_id = $users->random()->id;
            $newPlace->title = $title;
            $newPlace->description = $faker->text(500);
            $newPlace->num_rooms = $faker->numberBetween(1, 10);
            $newPlace->num_beds = $faker->numberBetween(1, 20);
            $newPlace->num_baths = $faker->numberBetween(1, 5);
            $newPlace->square_m = $faker->numberBetween(20, 1000);
            $newPlace->country = $faker->country();
            $newPlace->city = $faker->city();
            $newPlace->address = $faker->streetAddress();
            $newPlace->lat = $faker->latitude(-90, 90);
            $newPlace->long = $faker->longitude(-180, 180);
            $newPlace->place_img = 'https://placeimg.com/640/480/any';
            $newPlace->price = $faker->randomFloat(2, 120, 5000);
            $newPlace->visibility = $faker->boolean();
            $newPlace->slug = Str::slug($title, '-');
            $newPlace->save();
        }
    }
}
