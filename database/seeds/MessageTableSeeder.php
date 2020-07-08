<?php

use App\Message;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Place;

class MessageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $counter = 100;
        $places = Place::all();

        for ($i=0; $i <  $counter; $i++) {

            $newMessage = new Message();
            $newMessage->place_id = $places->random()->id;
            $newMessage->guest_name = $faker->name();
            $newMessage->mail_address = $faker->email();
            $newMessage->subject = $faker->text(20);
            $newMessage->message = $faker->text(400);

            $newMessage->save();
        }
    }
}
