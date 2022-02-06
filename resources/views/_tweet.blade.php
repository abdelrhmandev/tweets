<div class="post">
  <div class="post__avatar">

 


 


    <img
      src="{{ $tweet->user->Getavatar() }}"
      alt=""
    />
  </div>

  <div class="post__body">
    <div class="post__header">
      <div class="post__headerText">
        <h3>
          {{ $tweet->user->name }}
          <span class="post__headerSpecial">@ {{ $tweet->user->username }}</span>
         
        </h3>
      </div>
      <div class="post__headerDescription">
        <p>{{ $tweet->body }}.</p>
      </div>
    </div>
 
 
  </div>

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
 
      {{ $tweet->created_at->diffForHumans() }}


</div>
