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

                    <h5>{{ __('Recent Activities') }}</h5>

                    @if($activities->isEmpty())
                        <p>No recent activities available.</p>
                    @else
                        <ul class="list-group">
                            @foreach($activities as $activity)
                                <li class="list-group-item">
                                    <strong>{{ $activity->name }}</strong> - {{ $activity->status }} <br>
                                    <small>Updated at: {{ $activity->updated_at->format('d M Y, h:i A') }}</small>
                                </li>
                            @endforeach
                        </ul>
                    @endif

                    <a href="{{ route('activities.index') }}" class="btn btn-primary mt-3">View All Activities</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
