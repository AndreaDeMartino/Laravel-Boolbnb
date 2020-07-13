<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Amenity;
use App\Message;

class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::latest('id', 'desc')->paginate(3);

        return view('pages.home', compact('places'));
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

        return view('pages.placeShow', compact('place'));
    }

    //Invia messaggi all'utente proprietario
    public function sendMessage(Request $request, $id)
    {
        $data = $request->validate([
            'guest_name' => 'required',
            'subject' => 'required',
            'mail_address' => 'required',
            'message' => 'required',
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
