

Index.blade
<h1>Profile </h1>
<p>{{ $user->name }}</p>
<p>{{ $user->username }}</p>
<p>{{ $user->email }}</p>

@if(auth()->user()->isfollowing($user)) 

<form id="unfollowing_user_id{{ $user->id }}" method="post" action="{{ route('follows.destroy',['following_user_id'=>$user->id])}}">
    @csrf
    @method('DELETE') 
    <button type="submit" class="btn btn-danger btn-icon">
        <i data-feather="delete"></i>
        UnFollow@ {{ $user->username }}#{{ $user->id }}        
      </button>
</form>


 


@else
<form id="following_user_id{{ $user->id }}" method="post" action="{{ route('follows.store',['following_user_id'=>$user->id])}}">
    @csrf
    <button type="submit" class="btn btn-success btn-icon">Follow@ {{ $user->username }}#{{ $user->id }}</button>
</form>
@endif