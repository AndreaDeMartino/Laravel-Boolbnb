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
            ->join('places', 'messages.place_id', '=', 'places.id')
            ->join('users', 'places.user_id', '=', 'users.id')
            ->where('places.user_id', '=', $user->id)
            ->select(
                'messages.guest_name', 
                'messages.place_id', 
                'places.title',
                'messages.mail_address',
                'messages.subject', 
                'messages.message', 
                'messages.created_at')
            ->get();
            
        return view('user.inbox', compact('messages', 'user'));
    }
}
