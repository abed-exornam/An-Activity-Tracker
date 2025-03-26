@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 900px;">
    <h2 class="text-center text-black mb-4" style="font-family: 'Arial', sans-serif; font-weight: bold;">Register</h2>
    <div class="card p-4 shadow-sm">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Email Address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="form-group mb-3">
                    <label class="font-weight-bold">Confirm Password</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn custom-btn">Register</button>
                </div>
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
        font-size: 16px !important;
    }
    .custom-btn:hover {
        background-color: #333 !important;
        color: white !important;
    }
</style>
@endsection
