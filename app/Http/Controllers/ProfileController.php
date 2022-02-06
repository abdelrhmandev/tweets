<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfileRequest;
use auth;
use App\Traits\UploadTrait;
class ProfileController extends Controller
{

 
    use UploadTrait; // use trait

    public function show(User $user){ // No Query Needed Use Wild Cards 
        return view('profiles.index',['user'=>$user]);
    }

    
    public function edit(){  
        return view('profiles.edit',['user'=>auth()->user()->id]);
    }

    public function update(UpdateProfileRequest $request, $user){
    

        $attributes = $request->validated(); 

        if (request('avatar')) {

            #delete old avatar image
            if(auth()->user()->avatar){        
                if (\Storage::disk('public')->exists(auth()->user()->avatar)) {
                    \Storage::disk('public')->delete(auth()->user()->avatar);
                }  
            }

            $avatar = $request->file('avatar');
            $new_name = auth()->user()->username.'_'.time();
            $folder = 'uploads/avatar/'.auth()->user()->id.'/'; 
            $filePath = $folder . $new_name. '.' . $avatar->getClientOriginalExtension();        
            $this->uploadOne($avatar, $folder, 'public', $new_name); // save file path to database
 
 





            $attributes['avatar'] = $filePath;
        }

        
        
        auth()->user()->update($attributes);       
        return redirect()->route('profile.edit')->with('success','Profile Updated Successfully');
       


    }

}
