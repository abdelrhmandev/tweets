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
      <h1>Profile </h1>
  
      
       
      <form method="POST" action="{{ route('profile.update',['user'=>$user]) }}" enctype="multipart/form-data">
        @csrf
    
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
    
            <div class="col-md-6">
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name ?? old('name') }}" required autocomplete="name" autofocus>
    
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
    
        <div class="row mb-3">
            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('UserName') }}</label>
    
            <div class="col-md-6">
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ auth()->user()->username ?? old('username') }}" required autocomplete="username" autofocus>
    
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
    
        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('E-Mail Address') }}</label>
    
            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ auth()->user()->email ?? old('email') }}" required autocomplete="email">
    
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
    
        <div class="row mb-3">
            <label for="avatar" class="col-md-4 col-form-label text-md-end">{{ __('Avatar') }}</label>
    
            <div class="col-md-6">
                <img src="{{ auth()->user()->Getavatar() }}" title="{{ auth()->user()->name }}" alt="{{ auth()->user()->name }}">
                <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror">
    
                @error('avatar')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
    
    
    
    
    
        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>
    
            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="">
    
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    
        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>
    
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
            </div>
        </div>
    
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Update Profile') }}
                </button>
            </div>
        </div>
    </form>
      <!-- post ends -->

 
      <!-- post ends -->
    </div>
    <!-- feed ends -->

    <!-- widgets starts -->
    <div class="widgets">

      
      <div class="widgets__input">
        <span class="material-icons widgets__searchIcon"> search </span>
        <input type="text" placeholder="Search Twitter" />
      </div>

      <div class="widgets__widgetContainer">
        <h2>Following {{ auth()->user()->follows->count() }}</h2>

        @include('_friends-list')

      </div>
    </div>
    <!-- widgets ends -->
  </body>
</html>
