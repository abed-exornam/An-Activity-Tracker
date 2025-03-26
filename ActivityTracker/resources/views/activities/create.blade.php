@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <h2 class="text-center text-dark mb-4 fw-bold">Add New Activity</h2>

    <div class="card p-4 shadow-sm">
        <form action="{{ route('activities.store') }}" method="POST">
            @csrf

            <!-- Activity Name -->
            <div class="mb-3">
                <label class="form-label fw-bold">Activity Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <!-- Daily SMS Count -->
            <div class="mb-3">
                <label class="form-label fw-bold">Daily SMS Count</label>
                <input type="number" name="sms_count" class="form-control">
            </div>

            <!-- SMS Count from Logs -->
            <div class="mb-3">
                <label class="form-label fw-bold">SMS Count from Logs</label>
                <input type="number" name="log_sms_count" class="form-control">
            </div>

            <!-- Status -->
            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-select">
                    <option value="pending">Pending</option>
                    <option value="done">Done</option>
                </select>
            </div>

            <!-- Remark -->
            <div class="mb-3">
                <label class="form-label fw-bold">Remark</label>
                <textarea name="remark" class="form-control"></textarea>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-outline-dark w-100">Save Activity</button>
        </form>
    </div>
</div>
@endsection
