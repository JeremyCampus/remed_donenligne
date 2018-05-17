<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('change', ['user' => $user]);
    }


    public function edit(Request $request)
    {
      $user = Auth::user();
      $user->firstname = $request->firstname;
      $user->lastname = $request->lastname;
      $user->email = $request->email;
      $user->password = bcrypt($request->password);
      $user->save();
      return view('home');
      // return redirect()->back;
    }
}
