<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function index()
    {
        $user_list = \DB::table('users')->select('users.id', 'users.name' ,'users.username', 'users.level')
            ->get();

        return view('user.index')->with('usr', $user_list);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reg = new User;

        $reg->username = $request->input('username');
        $reg->name = $request->input('name');
        $reg->email = $request->input('email');
        $reg->password = \Hash::make($request->input('password'));
        $reg->level = $request->input('level');

        $reg->save();

        return \Redirect::to('reg');
    }
}
