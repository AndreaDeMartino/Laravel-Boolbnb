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
        $places = Place::latest('id', 'desc')->paginate(10);

        return view('pages.home', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function sendMessage(Request $request, $id)
    {
        $data = $request -> validate([
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
        return redirect('/');
    }
}
