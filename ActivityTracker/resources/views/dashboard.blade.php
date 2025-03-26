@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <p>Welcome to your dashboard!</p>
    </div>
    <div>
        <a href="{{ route('activities.index') }}" class="btn btn-primary">View Activities</a>
    </div>
    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-danger">Logout</button>
</form>
@endsection
