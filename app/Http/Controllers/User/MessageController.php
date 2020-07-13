<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// Db Query
use Illuminate\Support\Facades\DB;
use App\User;
use App\Place;
use App\Message;

class MessageController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $messages = DB::table('messages')
            ->join('places', 'places.id', '=', 'messages.place_id')
            ->join('users', 'users.id', '=', 'places.user_id')
            ->where('messages.place_id', '=', 'places.id')
            ->where('places.user_id', '=', $user->id)
            ->select(
                'users.name', 
                'places.title', 
                'messages.guest_name', 
                'messages.mail_address', 
                'messages.subject', 
                'messages.message', 
                'messages.created_at')
            ->get();

            dd($messages);

        return view('user.inbox', compact('messages', 'user'));
    }
}
