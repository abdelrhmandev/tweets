<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layouts.head')
  </head>
  <body>
    <!-- sidebar starts -->
    @include('layouts.sidebar')
    <!-- sidebar ends -->

    <!-- feed starts -->
    <div class="feed">
      <div class="feed__header">
        
        @include('partails.messages') 
      </div>

      <!-- tweetbox starts -->
 
      <!-- tweetbox ends -->

      <!-- post starts -->
     
      <p>{{ $user->name }}</p>
      <p>{{ $user->username }}</p>
      <p>{{ $user->email }}</p>

      <p><img src="{{ $user->Getavatar() }}"></p>
      
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
          <button type="submit" class="btn btn-primary btn-icon">Follow@ {{ $user->username }}#{{ $user->id }}</button>
      </form>
      @endif
      <!-- post ends -->

 
      <!-- post ends -->
    </div>
    <!-- feed ends -->

    <!-- widgets starts -->
    <div class="widgets">

      
  

      <div class="widgets__widgetContainer">
        <h2>Following {{ auth()->user()->follows->count() }}</h2>

        @include('_friends-list')

      </div>
    </div>
    <!-- widgets ends -->
  </body>
</html>
