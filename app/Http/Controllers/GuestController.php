<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Place;
use App\Amenity;
use App\Message;
use App\Visit;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $places = DB::table('places')->where('visibility', '=', 1)->orderByDesc('id')->paginate(3);

        // Get Actual DataTime
        $actualDate = Carbon::now();
        
        $allPlaces = Place::where('visibility', '=', '1')->get();

        //  Sponsored Places
        $placesSponsored = Place::whereHas('sponsors', 
                                    function($q) use ($actualDate){
                                        $q->where('end', '>', $actualDate)->where('places.visibility', 1);
                                    })->get();

        // //  Unponsored Places
        $placesUnsponsored = $allPlaces->diff($placesSponsored);

        return view('pages.home', compact('placesUnsponsored','placesSponsored'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $place = Place::where('slug', $slug)->first();

        if(empty($place)) {
            abort(404);
        }

        if((Auth::id() !== $place->user_id) || !Auth::check()) { // se l'id dello user che sta visitando è diverso dallo user_id della stanza OPPURE trattasi di semplice guest
            Visit::create([ //aggiungo un record alla tabella visits
                'place_id' => $place->id,
                'date' => Carbon::now()
            ]);
        }

        return view('pages.placeShow', compact('place'));
    }

    //Invia messaggi all'utente proprietario
    public function sendMessage(Request $request, $id)
    {
        $data = $request->validate([
            'guest_name' => 'required|min:5|max:30',
            'subject' => 'required|min:5|max:20',
            'mail_address' => 'required|email',
            'message' => 'required|min:20|max:200',
        ]);

        $data['place_id'] = $id;

        $newMessage = new Message();
        $newMessage->fill($data);
        $newMessage->save();

        //return redirect('place/' . $slug);
        $subject = $newMessage->subject;

        return redirect()->route('home.index')->with('message', $subject);
    }
}
