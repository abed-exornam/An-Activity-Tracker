@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-center text-dark fw-bold">Today's Activities</h2>

    @if($activities->isEmpty())
        <p class="text-muted text-center">No activities have been updated today.</p>
    @else
        <div class="table-responsive mt-3">
            <table class="table table-bordered table-striped shadow-sm">
                <thead class="bg-dark text-white">
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
                            <td>
                                <span class="badge bg-{{ $activity->status == 'done' ? 'success' : 'danger' }}">
                                    {{ ucfirst($activity->status) }}
                                </span>
                            </td>
                            <td>{{ $activity->user->name ?? 'Unknown' }}</td>
                            <td>{{ $activity->updated_at }}</td>
                            <td>{{ $activity->remark ?? 'No remarks' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
