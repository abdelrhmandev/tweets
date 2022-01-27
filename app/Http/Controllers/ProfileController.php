<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use auth;
class ProfileController extends Controller
{

 


    public function show(User $user){ // No Query Needed Use Wild Cards 
        return view('profiles.index',['user'=>$user]);
    }

    
    public function edit(){  
        return view('profiles.edit',['user'=>auth()->user()->id]);
    }

    public function update(UpdateProfileRequest $request, $user){
    

        $attributes = $request->validated(); 

        if (request('avatar')) {
            if(auth()->user()->avatar){        
                if (\Storage::disk('public')->exists(auth()->user()->avatar)) {
                    \Storage::disk('public')->delete(auth()->user()->avatar);
                }  
            }
            $avatar = $request->file('avatar');
            $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
            $path = $request->file('avatar')->storeAs('uploads/avatar/'.auth()->user()->id, $avatarName, 'public');
            $attributes['avatar'] = $path;
        }

        
        
        auth()->user()->update($attributes);       
        return redirect()->route('profile.edit')->with('success','Profile Updated Successfully');
       


    }

}
