@extends('layouts.app')

@section('content')
    <h1>Activities</h1>

    @foreach($activities as $activity)
        <div class="activity-card">
            <h2>{{ $activity->title }}</h2>
            <p>{{ $activity->description }}</p>

            @if($activity->updates->isNotEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Status</th>
                            <th>Remark</th>
                            <th>Metadata</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activity->updates as $update)
                        <tr>
                            <td>{{ $update->user->name ?? $update->actor_name }}</td>
                            <td>{{ ucfirst($update->status) }}</td>
                            <td>{{ $update->remark }}</td>
                            <td>{{ json_encode($update->metadata) }}</td>
                            <td>{{ $update->created_at }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p>No updates yet.</p>
            @endif
        </div>
    @endforeach
@endsection
