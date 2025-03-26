@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-dark text-white fw-bold">
                    {{ __('Dashboard') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h5 class="fw-bold">{{ __('Recent Activities') }}</h5>

                    @if($activities->isEmpty())
                        <p class="text-muted">No recent activities available.</p>
                    @else
                        <ul class="list-group">
                            @foreach($activities as $activity)
                                <li class="list-group-item">
                                    <strong>{{ $activity->name }}</strong> - 
                                    <span class="badge bg-{{ $activity->status == 'done' ? 'success' : 'warning' }}">
                                        {{ ucfirst($activity->status) }}
                                    </span> 
                                    <br>
                                    <small class="text-muted">Updated at: {{ $activity->updated_at->format('d M Y, h:i A') }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <div class="text-center mt-4">
                        <a href="{{ route('activities.index') }}" class="btn custom-btn px-4">View All Activities</a>
                    </div>
                </div>
            </div>
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
        border-radius: 5px !important;
        transition: all 0.3s ease-in-out !important;
    }
    .custom-btn:hover {
        background-color: #333 !important;
        color: white !important;
    }
</style>
@endsection
