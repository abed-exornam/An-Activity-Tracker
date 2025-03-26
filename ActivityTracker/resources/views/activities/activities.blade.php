@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 900px;">
    <h2 class="text-center text-black mb-4" style="font-family: 'Arial', sans-serif; font-weight: bold;">Activities Management</h2>
    
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('activities.daily') }}" class="btn custom-btn">View Today's Activities</a>
        <a href="{{ route('activities.generateReport') }}" class="btn custom-btn">Generate Report</a>
        <button class="btn custom-btn" id="addActivityButton">Add New Activity</button>
    </div>

    <!-- Report Generation Form -->
    <form action="{{ route('activities.generateReport') }}" method="GET" class="mb-3">
        @csrf
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" class="form-control" required>
        </div>
        <button type="submit" class="btn custom-btn mt-2">Generate Report</button>
    </form>
    
    <div id="activityForm" class="card p-3 shadow-sm" style="display: none;">
        <form action="{{ route('activities.store') }}" method="POST">
            @csrf
            <div class="form-group mb-2">
                <label class="font-weight-bold">Activity Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">SMS Count</label>
                <input type="number" name="sms_count" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">SMS Count from Logs</label>
                <input type="number" name="log_sms_count" class="form-control" required>
            </div>
            <div class="form-group mb-2">
                <label class="font-weight-bold">Remark</label>
                <textarea name="remark" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn custom-btn">Submit Activity</button>
        </form>
    </div>

    <table class="table table-bordered table-striped mt-4 shadow-sm">
        <thead class="bg-black text-white">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Status</th>
                <th>User</th>
                <th>Updated At</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($activities as $activity)
                <tr>
                    <td>{{ $activity->id }}</td>
                    <td>{{ $activity->name }}</td>
                    <td><span class="badge bg-{{ $activity->status == 'done' ? 'success' : 'danger' }}">{{ ucfirst($activity->status) }}</span></td>
                    <td>{{ $activity->user->name ?? 'Unknown' }}</td>
                    <td>{{ $activity->updated_at }}</td>
                    <td><textarea class="form-control" disabled>{{ $activity->remark }}</textarea></td>
                    <td>
                        <form action="{{ route('activities.update', $activity->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" class="form-control mb-1">
                                <option value="pending" {{ $activity->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="done" {{ $activity->status == 'done' ? 'selected' : '' }}>Done</option>
                            </select>
                            <textarea name="remark" class="form-control mb-1">{{ $activity->remark }}</textarea>
                            <button type="submit" class="btn custom-btn">Update</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form action="{{ route('logout') }}" method="POST" class="text-center mt-3">
        @csrf
        <button type="submit" class="btn logout-btn">Logout</button>
    </form>
</div>

<script>
    document.getElementById('addActivityButton').addEventListener('click', function() {
        var form = document.getElementById('activityForm');
        form.style.display = form.style.display === 'none' ? 'block' : 'none';
    });
</script>

<style>
    .custom-btn {
        background-color: white !important;
        color: black !important;
        border: 1px solid black !important;
    }
    .custom-btn:hover {
        background-color: #333 !important;
        color: white !important;
    }
    .logout-btn {
        background-color: white !important;
        color: red !important;
        border: 1px solid red !important;
    }
    .logout-btn:hover {
        background-color: red !important;
        color: white !important;
    }
</style>
@endsection
