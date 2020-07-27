<?php

use Illuminate\Database\Seeder;
use App\Visit;
use Illuminate\Support\Carbon;
use Faker\Generator as Faker;

class VisitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $counter = 18;
        for($i = 1; $i <= $counter; $i++) {
            $visit = new Visit();
            $visit->place_id = 36;
            $visit->date = Carbon::create('2020', rand(1,7), rand(1,29));
            $visit->save();
        }
    }
}
