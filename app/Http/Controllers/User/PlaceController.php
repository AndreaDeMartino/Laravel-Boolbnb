<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Place;
use App\Amenity;
use App\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //  MY Places
    public function index()
    {
        // Get Actual DataTime
        $actualDate = Carbon::now();
        
        $user = Auth::user();
        $allPlaces = Place::all();

        //  Sponsored Places
        $placesSponsored = Place::whereHas('sponsors', 
                                    function($q) use ($actualDate,$user){
                                        $q->where('end', '>', $actualDate)->where('places.user_id', '=', $user->id);
                                    })->get();

        //  Unponsored Places
        $placesUnsponsored = $allPlaces->diff($placesSponsored);
                                    
        return view('user.myPlaces', compact('placesSponsored', 'placesUnsponsored', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function visibility(Place $place)
    {

        $actualValue = $place->visibility;

        if ($actualValue == 1){

            $affected = DB::table('places')
                ->where('id', $place->id)
                ->update(['visibility' => 0]);
            $value = 0;
        } else{
            $affected = DB::table('places')
              ->where('id', $place->id)
              ->update(['visibility' => 1]); 
            $value = 1;
        }

        if($affected){
            return redirect()->back()->with('hide',$value)->with('place',$place->title);
        } else{
            abort(404);
        }
    }
    

    //  Create new Places
    public function create()
    {
        $algoliaPlace = $this->algoPlace();
        $amenities = Amenity::all();
        return view('user.newPlace', compact('amenities','algoliaPlace'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //  Store new Places
    public function store(Request $request)
    {
        $data = $request->validate([

            'title'=> ['required', 'not_regex:/[<>]/', 'string', 'min:5', 'max:100'],
            'description'=> ['required', 'not_regex:/[<>]/', 'string', 'min:50', 'max:800'],
            'country' => 'required|min:2',
            'city' => 'required|min:2',
            'address'=> 'required|min:2',
            'num_rooms'=> 'required|numeric|min:1',
            'num_beds'=> 'required|numeric|min:1',
            'num_baths'=> 'required|numeric',
            'square_m'=> 'required|numeric|min:10',
            'lat'=> 'required',
            'long'=> 'required',
            'price' => 'required|numeric|min:1',
            'amenities' => [],
            'place_img'=> 'nullable|max:4096|image|mimes:jpg,jpeg,png'
        ]);

        //id utente
        $data['user_id'] = $request->user()->id;
        //Genera slug del place
        $data['slug'] = Str::slug($data['title'], '-');

        if(!empty($data['place_img'])) {
            $data['place_img'] = Storage::disk('public')->put('images', $data['place_img']);
        }

        $newPlace = new Place();
        $newPlace->fill($data);
        $saved = $newPlace->save();

        if($saved) {
            if(!empty($data['amenities'])) {
                $newPlace->amenities()->attach($data['amenities']);
            }
            return redirect()->route('place.show', $newPlace->slug);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  Edit Place
    public function edit($slug)
    {
        $algoliaPlace = $this->algoPlace();
        $place = Place::where('slug',$slug)->first();

        if (empty($place)) {
            abort(404);
        };

        $amenities = Amenity::all();
        return view('user.editPlace', compact('place', 'amenities', 'algoliaPlace'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  Update Place
    public function update(Request $request, Place $place)
    {
        $request->validate([
            'title'=> ['required', 'not_regex:/[<>]/', 'string', 'min:5', 'max:100'],
            'description'=> ['required', 'not_regex:/[<>]/', 'string', 'min:50', 'max:800'],
            'country' => 'required|min:2',
            'city' => 'required|min:2',
            'address'=> 'required|min:2',
            'num_rooms'=> 'required|numeric|min:1',
            'num_beds'=> 'required|numeric|min:1',
            'num_baths'=> 'required|numeric',
            'square_m'=> 'required|numeric|min:10',
            'price' => 'required|numeric|min:1',
            'amenities.*' => 'exists:amenities,id',
            'place_img'=> 'nullable|max:4096|image|mimes:jpg,jpeg,png'
        ]);

        
        $data = $request->all();

        $data['slug'] = Str::slug($data['title'],'-');

        if(!empty($data['place_img'])) {
            $data['place_img'] = Storage::disk('public')->put('images', $data['place_img']);
        }
        
        // @dump($place, $data);
        
        $updated = $place->update($data);

        if($updated) {
            if(!empty($data['amenities'])) {
                $place->amenities()->sync($data['amenities']);
            } else {
                $place->amenities()->detach();
            }
            return redirect()->route('place.show', $place->slug);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  Delete Place
    public function destroy($slug)
    {
        $place = Place::where('slug',$slug)->first();

        if (empty($place)){
            abort(404);
        };

        $title = $place->title;

        $place->amenities()->detach();
        
        $deleted = $place->delete();

        if ($deleted){
            
            // Cancellazione img
            if(!empty($place->place_img)){
                Storage::disk('public')->delete($place->place_img);
            }

            return redirect()->route('user.myplace.index')->with('place-deleted',$title);
        }
    }

    private function algoPlace(){
        $algoData = [
            getenv('PLACES_APP_ID'),
            getenv('PLACES_API_KEY')
        ];
        return $algoData;
      }
}
