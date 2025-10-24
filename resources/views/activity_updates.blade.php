@extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title mb-4">Activity Updates</h3>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Activity</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Remark</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activityUpdates as $update)
                    <tr>
                        <td>{{ $update->id }}</td>
                        <td>{{ $update->activity->title }}</td>
                        <td>{{ $update->user->name }}</td>
                        <td>{{ ucfirst($update->status) }}</td>
                        <td>{{ $update->remark ?? '—' }}</td>
                        <td>{{ $update->updated_at->diffForHumans() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
