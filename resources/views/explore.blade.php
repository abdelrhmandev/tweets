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
      @forelse($users as $user)
 

      <blockquote class="twitter-tweet">
        <p lang="en" dir="ltr">
            
            
 


 
     



      <form method="post" action="{{ route('follows.store',['following_user_id'=>$user->id])}}">
        @csrf
   
        <img src="{{ $user->Getavatar() }}"
        alt="{{ $user->username }}'s avatar"
        width="60"
        class="mr-4 rounded"
  >
        <button type="submit" class="btn btn-primary btn-icon">
          
           Follow@ {{ $user->username }}#{{ $user->id }}        
          </button>
    </form>
  </p>
</blockquote>
  @empty
  No Friends to explore
  @endforelse

  {{ $users->links() }}
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
