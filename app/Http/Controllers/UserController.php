<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
use Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('teacher')->except('index', 'show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'fullname'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'password'=>'required'
        ]);
        $user = new User([
            'username' => $request->get('username'),
            'fullname' => $request->get('fullname'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
            'password' => Hash::make($request->get('password'))
        ]);
        $user->save();
        return redirect('/users')->with('success', 'user saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nguoidung = User::find($id);
        $messages = DB::table('messages')->where([
            ['sender_id' , '=' ,Auth::id()],
            ['sent_to_id' , '=',$id],
        ])->get();

        return view('users.show', compact('nguoidung', 'messages'));
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
        $user = User::find($id);
        return view('users.edit', [
            'nguoidung' => $user
        ]);
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
        $request->validate([
            'username'=>'required',
            'fullname'=>'required',
            'email'=>'required'
        ]);
        $user = user::find($id);
        $user->username =  $request->get('username');
        $user->fullname = $request->get('fullname');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');
        $user->password = $request->get('password');
        $user->save();
        return redirect('/users')->with('success', 'user updated!');

        dd($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect('/users')->with('success', 'user deleted!');
    }
}
