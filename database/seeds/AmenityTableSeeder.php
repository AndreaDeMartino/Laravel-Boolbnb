<?php

use Illuminate\Database\Seeder;
use App\Amenity;

class AmenityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $amenities = [
            'WiFi',
            'Posto Macchina',
            'Piscina',
            'Portineria',
            'Sauna',
            'Vista Mare'
        ];

        foreach ($amenities as $amenity) {
            $newAmenity = new Amenity();
            $newAmenity->name = $amenity;

            $newAmenity->save();
        }

    }
}
