@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        <?php
           
           $userId = Auth::id();
           $user = \App\Models\User::find($userId);
           $tokens = $user->tokens;
           $tokenValue = $tokens->first()->plainTextToken;

           

        ?>
        
        @auth

       
        <h1>Dashboard</h1>
        <p class="lead">Only authenticated users can access this section.</p>

        <p>All Access Tokens in this user:</p>
        @foreach($tokens as $token)

            {{ $token->token;}}
        
        @endforeach

        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection