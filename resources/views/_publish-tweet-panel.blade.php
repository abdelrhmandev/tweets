<form method="POST" action="{{ route('tweets.store') }}">
    @csrf
    <div class="tweetbox__input">
      <img
        src="{{ auth()->user()->Getavatar() }}"
        alt="{{ auth()->user()->name }}"
      />


  
      <input type="text" name="body" required placeholder="Hello Tweet !!" />
    </div>
    <button class="tweetBox__tweetButton">Tweet</button>
  </form>
  
  @error('body')
  <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
@enderror