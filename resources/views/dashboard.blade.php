<!-- @extends('layouts.app')

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title mb-4">Dashboard</h3>
        <p>Welcome to Support Tracker, {{ auth()->user()->name ?? 'Guest' }}!</p>
        <hr>
        <h5>Quick Links</h5>
        <ul>
            <li><a href="{{ route('activities.index') }}">View Activities</a></li>
            <li><a href="{{ route('activity_updates.index') }}">View Activity Updates</a></li>
        </ul>
    </div>
</div>
@endsection -->

@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Welcome, {{ auth()->user()->name ?? 'Guest' }}</h2>

    {{-- Add Activity --}}
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Add New Activity</div>
        <div class="card-body">
            <form action="{{ route('activities.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Activity title" required>
                </div>

                <div class="form-group mb-3">
                    <label for="description">Description</label>
                    <textarea name="description" class="form-control" rows="2" placeholder="Brief description"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Add Activity</button>
            </form>
        </div>
    </div>

    {{-- List of Activities --}}
    <div class="card">
        <div class="card-header bg-secondary text-white">All Activities</div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Activity</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($activities as $activity)
                        <tr>
                            <td>{{ $activity->title }}</td>
                            <td>{{ $activity->description }}</td>
                            <td>
                                {{ optional($activity->updates->last())->status ?? 'No update yet' }}
                            </td>
                            <td>
                                <form action="{{ route('activities.update', $activity->id) }}" method="POST" class="d-flex">
                                    @csrf
                                    <select name="status" class="form-select form-select-sm me-2">
                                        <option value="pending">Pending</option>
                                        <option value="done">Done</option>
                                    </select>
                                    <input type="text" name="remark" class="form-control form-control-sm me-2" placeholder="Remark (optional)">
                                    <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted">No activities yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
