@if (session()->has('success'))
<div class="alert alert-success">{!! session()->get('success') !!}</div>
@endif

<h1>Tweets {{$tweets->count()}}</h1>


<a href="{{ route('home')}}">Home</a>
 

@forelse ($tweets as $tweet)



<p>
    {{ $tweet->body }} <b>By</b> <span style="color: red;">{{ $tweet->user->name }} </span>#{{ $tweet->user->id }}
</p>
@if($tweet->user->id == auth()->user()->id)
<form method="post" action="{{ route('tweets.destroy',['id'=>$tweet->id])}}">
    @csrf
    @method('DELETE') 
    <button type="submit" class="btn btn-danger btn-icon">
        <i data-feather="delete"></i>
        Delete Tweet
      </button>
</form>
@endif
{{-- <i>On</i> --}}
    {{-- <img src="{{ auth()->user()->Getavatar() }}" alt="{{ $tweet->user->name }}"> --}}    
    {{-- {{ $tweet->created_at->diffForHumans() }} --}}





@empty
    No Tweets Added Yet
@endforelse


@include('tweets._users_list')

@include('tweets._friends_list')