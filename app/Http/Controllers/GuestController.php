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

        $algoName = getenv('ALGOLIA_APP_ID');
        $algoKey = getenv('ALGOLIA_SECRET');
        // Get Actual DataTime
        $actualDate = Carbon::now();
        
        // Get all amenities
        $amenities = Amenity::all();

        //  Sponsored Places
        $placesSponsored = Place::whereHas('sponsors', 
                                    function($q) use ($actualDate){
                                        $q->where('end', '>', $actualDate)->where('places.visibility', 1);
                                    })->get();
        
        return view('pages.home', compact('placesSponsored','amenities','algoName','algoKey'));
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
            'guest_name' => ['required', 'not_regex:/[<>]/', 'string', 'min:4', 'max:50'],
            'subject' => ['required', 'not_regex:/[<>]/', 'string', 'min:5', 'max:50'],
            'mail_address' => 'required|email|string|max:50',
            'message' => ['required', 'not_regex:/[<>]/', 'string', 'min:20', 'max:600']
        ]);

        $data['place_id'] = $id;

        // Get Actual DateTime to display in message
        $actualDate = Carbon::now();
        $data['created_at'] = $actualDate;

        $newMessage = new Message();
        $newMessage->fill($data);
        $newMessage->save();

        //return redirect('place/' . $slug);
        $subject = $newMessage->subject;
        
        return redirect()->route('home.index')->with('message', $subject);
    }
}
