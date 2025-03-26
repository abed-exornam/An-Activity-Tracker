@extends('layouts.app')

@section('content')
<div class="container mt-5">
    @if(isset($activitiesReport))
        <h3 class="text-center text-dark fw-bold">Activity Report</h3>
        <p class="text-center text-muted">From {{ $startDate }} to {{ $endDate }}</p>

        <div class="table-responsive mt-4">
            <table class="table table-bordered table-striped shadow-sm">
                <thead class="bg-dark text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>User</th>
                        <th>Remark</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activitiesReport as $activity)
                        <tr>
                            <td>{{ $activity->id }}</td>
                            <td>{{ $activity->name }}</td>
                            <td>
                                <span class="badge bg-{{ $activity->status == 'done' ? 'success' : 'danger' }}">
                                    {{ ucfirst($activity->status) }}
                                </span>
                            </td>
                            <td>{{ $activity->user->name ?? 'Unknown' }}</td>
                            <td>{{ $activity->remark ?? 'No remarks' }}</td>
                            <td>{{ $activity->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-muted">No report available for the selected date range.</p>
    @endif
</div>
@endsection
