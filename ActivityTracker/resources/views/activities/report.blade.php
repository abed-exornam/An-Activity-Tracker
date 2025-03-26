<!-- resources/views/activities/report.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">

        <!-- Display filtered activities -->
        @if(isset($activitiesReport))
            <h3>Activity Report from {{ $startDate }} to {{ $endDate }}</h3>
            <table class="table mt-3">
                <thead>
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
                            <td>{{ $activity->status }}</td>
                            <td>{{ $activity->user->name ?? 'Unknown' }}</td>
                            <td>{{ $activity->remark }}</td>
                            <td>{{ $activity->updated_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
