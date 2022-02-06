<?php
namespace App\Http\Controllers;
use App\Models\Tweet;
use App\Models\User;

use App\Http\Requests\StoreTweetRequest;
 
 
class TweetController extends Controller
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
        $tweets = auth()->user()->timeline();
 
        return view('tweets.index',['tweets'=>$tweets]);
    }

 


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTweetRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTweetRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->user()->id; 
        
        Tweet::create($data);


        return redirect()->route('tweets.index')->with('success','Tweet added');
    }
 


    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tweet  $tweet
     * @return \Illuminate\Http\Response
     */
    public function destroy($tweet)
    {
        $Tweet = Tweet::where('user_id',auth()->user()->id)->findOrFail($tweet); // delete my own tweets Only
        $Tweet->delete();
        return redirect()->route('tweets.index')->with('success','tweet Deleted Successfully');
    }
}
