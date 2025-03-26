@extends('layouts.app')

@section('content')
<div class="container mt-5" style="max-width: 600px;">
    <h2 class="text-center text-dark mb-4 fw-bold">Edit Activity</h2>

    <div class="card p-4 shadow-sm">
        <form action="{{ route('activities.update', $activity->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label fw-bold">Activity Name</label>
                <input type="text" name="name" class="form-control" value="{{ $activity->name }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Daily SMS Count</label>
                <input type="number" name="sms_count" class="form-control" value="{{ $activity->sms_count }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">SMS Count from Logs</label>
                <input type="number" name="log_sms_count" class="form-control" value="{{ $activity->log_sms_count }}">
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Status</label>
                <select name="status" class="form-select">
                    <option value="pending" {{ $activity->status == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="done" {{ $activity->status == 'done' ? 'selected' : '' }}>Done</option>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Remark</label>
                <textarea name="remark" class="form-control">{{ $activity->remark }}</textarea>
            </div>

            <button type="submit" class="btn btn-outline-dark w-100">Update Activity</button>
        </form>
    </div>
</div>
@endsection
