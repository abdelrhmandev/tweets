@forelse (auth()->user()->follows as $user)
<blockquote class="twitter-tweet">
    <p lang="en" dir="ltr">
        <img src="{{ $user->Getavatar() }}">
       <a href="{{ route('profile.show',['user'=>$user->username])}}">@ {{ $user->username }}</a>
    </p>
</blockquote>
@empty
    No followings Freinds
@endforelse