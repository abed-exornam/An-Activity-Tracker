@extends('layouts.app')

@section('content')
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-4 shadow-sm text-center" style="max-width: 600px; border-radius: 10px;">
        <h2 class="text-black fw-bold mb-3">Dashboard</h2>
        <p class="mb-4">Welcome to your dashboard!</p>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('activities.index') }}" class="btn btn-outline-dark px-4">View Activities</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger px-4">Logout</button>
            </form>
        </div>
    </div>
</div>
@endsection
