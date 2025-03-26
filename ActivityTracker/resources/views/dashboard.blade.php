@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 900px;">
    <h2 class="text-center text-black mb-4" style="font-family: 'Arial', sans-serif; font-weight: bold;">Dashboard</h2>
    <div class="card p-4 shadow-sm text-center" style="border-radius: 10px; background-color: white;">
        <p class="mb-4">Welcome to your dashboard!</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('activities.index') }}" class="btn custom-btn">View Activities</a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn custom-btn-danger">Logout</button>
            </form>
        </div>
    </div>
</div>

<style>
    .custom-btn {
        background-color: white !important;
        color: black !important;
        border: 1px solid black !important;
        padding: 8px 20px !important;
        font-size: 14px !important;
        border-radius: 5px !important;
        transition: all 0.3s ease-in-out !important;
    }
    .custom-btn:hover {
        background-color: #333 !important;
        color: white !important;
    }
    .custom-btn-danger {
        background-color: red !important;
        color: white !important;
        border: 1px solid red !important;
        padding: 8px 20px !important;
        font-size: 14px !important;
        border-radius: 5px !important;
        transition: all 0.3s ease-in-out !important;
    }
    .custom-btn-danger:hover {
        background-color: darkred !important;
        border: 1px solid darkred !important;
    }
</style>
@endsection
