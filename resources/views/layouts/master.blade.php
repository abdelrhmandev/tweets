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
      <div class="tweetBox">
        @auth
        @include('_publish-tweet-panel')          
        @endauth

      </div>
      <!-- tweetbox ends -->

      <!-- post starts -->
      @auth

      @include('_timeline')
      @endauth
      
      @yield('content')
      <!-- post ends -->

 
      <!-- post ends -->
    </div>
    <!-- feed ends -->

    <!-- widgets starts -->
    <div class="widgets">

      
 

      <div class="widgets__widgetContainer">
        @auth

        <h2>Following {{ auth()->user()->follows->count() }}</h2>

        @include('_friends-list')
        @endauth

        
      </div>
    </div>
    <!-- widgets ends -->
  </body>
</html>
