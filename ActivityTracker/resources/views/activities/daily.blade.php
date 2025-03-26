@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Today's Activities</h2>

    @if($activities->isEmpty())
        <p>No activities have been updated today.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>User</th>
                    <th>Updated At</th>
                    <th>Remark</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $activity->id }}</td>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->status }}</td>
                        <td>{{ $activity->user->name ?? 'Unknown' }}</td>
                        <td>{{ $activity->updated_at }}</td>
                        <td>{{ $activity->remark ?? 'No remarks' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
