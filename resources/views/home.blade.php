@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }} 
                    <div> 
                         
                            <p><a href="{{ route('tweets.index')}}">My Tweets</a></p>

                            <p><a href="{{ route('profile.edit')}}">Profile</a></p>

                            <p><a href="{{ route('tweets.create')}}">Create a new Tweet</a></p>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
