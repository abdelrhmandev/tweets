<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExploreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users =  auth()->user()->GetUnfollowedUser(); // list all users except me and followed users
        return view('explore',['users'=>$users]);
    }
 
}
