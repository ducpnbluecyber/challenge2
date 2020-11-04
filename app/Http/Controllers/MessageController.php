<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use Auth;
use DB;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function store(Request $request)
    {
        $request->validate([
            'body'=>'required',
        ]);
        $message = new Message([
            'sender_id' => Auth::id(),
            'sent_to_id' => $request->get('sent_to_id'),
            'body' => $request->get('body'),
        ]);
        $message->save();
        return redirect('/users')->with('success', 'user saved!');
    }

    public function index()
    {
        $messages = DB::table('messages')
            ->join('users', function ($join) {
               $join->on('messages.sender_id', '=', 'users.id')
                ->where('sent_to_id', '=', Auth::id());
           })
           ->get();

       return view('message', compact('messages'));
    }

}
