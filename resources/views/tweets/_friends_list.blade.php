


<h1>Following {{ auth()->user()->follows->count() }}</h1>

 

@forelse (auth()->user()->follows as $user)
<p>
<a href="{{ route('profile.show',['user'=>$user->username])}}">Show User Profile</a>



<form method="post" action="{{ route('follows.destroy',['following_user_id'=>$user->id])}}">
    @csrf
    @method('DELETE') 
    <button type="submit" class="btn btn-danger btn-icon">
        <i data-feather="delete"></i>
        UnFollow@ {{ $user->username }}#{{ $user->id }}        
      </button>
</form>
</p>

@empty
    No followings Freinds
@endforelse