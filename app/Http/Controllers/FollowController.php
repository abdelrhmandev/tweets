<?php
namespace App\Http\Controllers;
use App\Models\Follow;
use Illuminate\Http\Request;
  
class FollowController extends Controller
{
 

    public function __construct()
    {
        $this->middleware('auth');
    }

 

    #save the following process
    public function store(Request $request)
    {
 
        $data['following_user_id'] = $request->following_user_id;
        $data['user_id'] = auth()->user()->id;
        Follow::create($data);
        return redirect()->route('tweets.index')->with('success','Follow added Successfully');
    }
 
    #Unfollow user
    public function destroy($id)
    { 
        $unfollow = auth()->user()->follows()->detach($id);
        return redirect()->route('tweets.index')->with('success','User Unfollowed Successfully');
    }
}
