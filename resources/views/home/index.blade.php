@extends('layouts.app-master')

@section('content')

    <div class="bg-light p-5 rounded">
       
        @if (auth()->check() && auth()->user()->is_admin)
        <h1>Admin Dashboard</h1>
        <p class="lead">Only Admin users can access this section.</p>
        @else
        @auth
        <h1>Users Dashboard</h1>
        <p class="lead">Regular users can access this section.</p>
        @endauth
        @endif

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>
@endsection
