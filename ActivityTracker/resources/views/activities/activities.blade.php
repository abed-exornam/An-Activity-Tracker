@extends('layouts.app')

@section('content')

<div class="container mt-5" style="max-width: 900px;">
    <h4 class="text-center text-dark mb-3 fw-bold">Activities Management</h4>

    <!-- Search, View Today's Activities, and Report Button in Same Row -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <form action="{{ route('activities.search') }}" method="GET" class="d-flex">
            <input type="text" name="query" class="form-control form-control-sm me-2" placeholder="Search by name or status..." required>
            <button type="submit" class="btn btn-outline-dark btn-sm">Search</button>
        </form>
        <a href="{{ route('activities.daily') }}" class="btn btn-outline-dark btn-sm">View Today's Activities</a>
    </div>

    <!-- Report Generation Form -->
    <form action="{{ route('activities.generateReport') }}" method="GET" class="mb-3">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <label for="start_date" class="form-label small">Start Date</label>
                <input type="date" name="start_date" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-5">
                <label for="end_date" class="form-label small">End Date</label>
                <input type="date" name="end_date" class="form-control form-control-sm" required>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-outline-dark btn-sm w-100">Generate Report</button>
            </div>
        </div>
    </form>

    <!-- Add New Activity Button -->
    <div class="text-end mb-2">
        <a href="{{ route('activities.create') }}" class="btn btn-outline-dark btn-sm">Add New Activity</a>
    </div>

    <!-- Activity Table -->
    <table class="table table-bordered table-striped mt-2 shadow-sm small">
        <thead class="bg-dark text-white">
            <tr class="text-center">
                <th>ID</th>
                <th>Name</th>
                <th>Daily SMS Count</th> 
                <th>SMS Count from Logs</th>
                <th>Status</th>
                <th>User</th>
                <th>Updated At</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if($activities->isEmpty())
                <tr>
                    <td colspan="9" class="text-center small">No activities found.</td>
                </tr>
            @else
                @foreach ($activities as $activity)
                    <tr class="text-center">
                        <td>{{ $activity->id }}</td>
                        <td>{{ $activity->name }}</td>
                        <td>{{ $activity->sms_count }}</td> 
                        <td>{{ $activity->log_sms_count }}</td>
                        <td>
                            <span class="badge bg-{{ $activity->status == 'done' ? 'success' : 'danger' }}">
                                {{ ucfirst($activity->status) }}
                            </span>
                        </td>
                        <td>{{ $activity->user->name ?? 'Unknown' }}</td>
                        <td>{{ $activity->updated_at }}</td>
                        <td><textarea class="form-control form-control-sm" disabled>{{ $activity->remark }}</textarea></td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-outline-primary btn-sm">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <!-- Logout Button - Positioned at Bottom Right -->
    <div class="d-flex justify-content-end mt-3">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
        </form>
    </div>
</div>

@endsection
