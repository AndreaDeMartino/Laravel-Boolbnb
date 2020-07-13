<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Place;
use App\Amenity;
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
    public function index()
    {
        $user = Auth::user();
        $places = Place::all();
        return view('user.myPlaces', compact('places', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenities = Amenity::all();
        return view('user.newPlace', compact('amenities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'country' => 'required',
            'city' => 'required',
            'address'=> 'required',
            'num_rooms'=> 'required',
            'num_beds'=> 'required',
            'num_baths'=> 'required',
            'square_m'=> 'required',
            'price' => 'required',
            'amenities' => [],
            'place_img'=> 'nullable|image|mimes:jpg,jpeg,png'
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
    public function edit($slug)
    {
        $place = Place::where('slug',$slug)->first();

        if (empty($place)) {
            abort(404);
        };

        $amenities = Amenity::all();
        return view('user.editPlace', compact('place', 'amenities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        $request->validate([
            'title'=> 'required',
            'description'=> 'required',
            'country' => 'required',
            'city' => 'required',
            'address'=> 'required',
            'num_rooms'=> 'required',
            'num_beds'=> 'required',
            'num_baths'=> 'required',
            'square_m'=> 'required',
            'price' => 'required',
            'amenities.*' => 'exists:amenities,id',
            'place_img'=> 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        
        $data = $request->all();

        $data['slug'] = Str::slug($data['title'],'-');

        if(!empty($data['place_img'])) {
            $data['place_img'] = '';
            // $data['place_img'] = Storage::disk('public')->put('images', $data['place_img']);
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
            if(!empty($place->path_img)){
                Storage::disk('public')->delete($place->path_img);
            }

            return redirect()->route('user.myplace.index')->with('place-deleted',$title);
        }
    }
    
}
