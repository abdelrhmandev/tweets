<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'avatar',
        'username',
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tweets(){
        return $this->hasMany(Tweet::class);
    }
 
 
    public function timeline(){     
        $friends = $this->follows()->pluck('id');              

        return Tweet::with('user')->Where('user_id',$this->id)->orWhereIn('user_id',$friends)->orderByDesc('id')->paginate(50);
    }

    public function GetUnfollowedUser(){     // Not My freinds + Not me to allow adding follow process
        $friends = $this->follows()->pluck('id'); 
       
        if(empty($friends->count())) { // for the first time select users
           $friends = [];
        }
        return User::whereNotIn('id',$friends)->where('id','<>',$this->id)->latest()->paginate(50);
    }
    public function isfollowing(User $user){
        return $this->follows()->where('following_user_id',$user->id)->exists();
    }


    public function follows(){
        return $this->belongsToMany(User::class,'follows', 'user_id', 'following_user_id');
    }


    public function path($append = '')
    {
        $path = route('profile', $this->username);

        return $append ? "{$path}/{$append}" : $path;
    }

    public function Getavatar(){
        $src  = "https://i.pravatar.cc/50?u=".$this->email;
        if($this->avatar){                 
            if (\Storage::disk('public')->exists($this->avatar)) {
                $src = asset('storage/'.$this->avatar);
            }
        }
          return $src;
    }

    public function getRouteKeyName()
    {
        return 'username'; // i have change It to be more afficient from id to username for seo matters
    }


    public function setPasswordAttribute($value) // to make password encrypted automatic
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
