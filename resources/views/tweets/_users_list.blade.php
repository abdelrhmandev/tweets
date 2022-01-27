


<h1>List Of Users You Can Follow {{ $users->count() }}</h1>

 

@forelse ($users as $user)
 


<p>
    {{-- {{ $user->name }} --}}
<form id="following_user_id{{ $user->id }}" method="post" action="{{ route('follows.store',['following_user_id'=>$user->id])}}">
    @csrf
    <button type="submit" class="btn btn-success btn-icon">Follow@ {{ $user->username }}#{{ $user->id }}</button>
</form>

<a href="{{ route('profile.show',['user'=>$user->username])}}">Show User Profile</a>
</p>


@empty

     <div class="dangre">   No Users you can follow </div>
@endforelse