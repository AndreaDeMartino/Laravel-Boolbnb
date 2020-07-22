<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Place;
use App\Amenity;
use App\Message;
use App\Visit;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Algolia\AlgoliaSearch\SearchIndex;
class ApiSearch extends Controller
{

    public function data(Request $request){

        // Ottengo tutti i Places visibili e con min stanze e letti coerente
        $actualDate = Carbon::now();
        $minRooms = $request->num_rooms;
        $minBeds = $request->num_beds;
        $allPlaces = Place::where(function($q1) use ($minRooms,$minBeds){
                                        $q1->where('visibility', 1)                      
                                            ->where('num_rooms', '>=',$minRooms)                             
                                            ->where('num_beds', '>=',$minBeds);
                                })->get()->toArray();
        // Ottengo tutti i Places con Sponsor Attivo
        $placesSponsored = Place::whereHas('sponsors', 
                                    function($q) use ($actualDate){
                                        $q->where('end', '>', $actualDate)->where('places.visibility', 1);
                                    })->get()->toArray();

        // Array di appoggio contentente tutte i dati di Places, comprese relazioni
        $array = [];
        $results = [];

        for ($i = 0; $i < count($allPlaces) ; $i++) { 
            $array[$i] = $allPlaces[$i];
            $placeA = Place::find($allPlaces[$i]['id']);
            $array[$i]['sponsor'] = false;
            foreach ($placesSponsored as $sponsored){
                if ($allPlaces[$i]['id'] == $sponsored['id']){
                    $array[$i]['sponsor'] = true;
                }
            }

            // Preparo campi geoloc
            $array[$i]['_geoloc'] = [
                'lat' => $array[$i]['lat'],
                'lng' => $array[$i]['long'],
            ];

            if (empty( $placeA->amenities->toArray() )){
                $array[$i]['amenities'] = [];
            }else{
                foreach ($placeA->amenities as $amenity) {
                    $array[$i]['amenities'][] = $amenity->id;
                }
            } 
        }

        // Match tra amenties in input e quelli presenti in array di appoggio
        if (is_null($request->amenities)){ 
            $results = $array;
        }else{
            foreach ($array as $arrayMatch){
                for ($i = 0; $i < count($request->amenities); $i++) { 
                    if( count(array_intersect($request->amenities, $arrayMatch['amenities'])) == count($request->amenities)){
                        $results[] = $arrayMatch;
                    }
                };
            };

            // Elimino duplicati generati in $result dalla ricerca
            if($results){
                $results = array_map("unserialize", array_unique(array_map("serialize", $results)));
            }
        }

        //Set Api
        $res = [
            'error' => 'Errore Api #1',
            'response' => []
        ];

        $res['response'] = $results;
        return response()->json($results);
    }
}
