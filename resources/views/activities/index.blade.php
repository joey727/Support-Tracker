@extends('layouts.app')

@section('content')
<div class="container mt-4">

    {{-- Flash Message --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    {{-- Add Activity --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Add New Activity</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('activities.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Activity Title</label>
                    <input type="text" name="title" class="form-control" placeholder="Enter activity title" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="2" placeholder="Enter description (optional)"></textarea>
                </div>

                <button type="submit" class="btn btn-success">Create Activity</button>
            </form>
        </div>
    </div>

    {{-- List of Activities --}}
    <div class="card shadow-sm">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Existing Activities</h5>
        </div>
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($activities as $activity)
                        <tr>
                            <td>{{ $activity->id }}</td>
                            <td>{{ $activity->title }}</td>
                            <td>{{ $activity->description }}</td>
                            <td>
                                <span class="badge bg-{{ $activity->active ? 'success' : 'secondary' }}">
                                    {{ $activity->active ? 'Active' : 'Inactive' }}
                                </span>
                            </td>
                            <td>{{ $activity->created_at->format('Y-m-d') }}</td>
                            <td>
                                {{-- Edit Activity Button --}}
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{ $activity->id }}">
                                    Edit
                                </button>
                            </td>
                        </tr>

                        {{-- Edit Modal --}}
                        <div class="modal fade" id="editModal{{ $activity->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $activity->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form action="{{ route('activities.update', $activity->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel{{ $activity->id }}">Edit Activity</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label for="title" class="form-label">Title</label>
                                                <input type="text" name="title" class="form-control" value="{{ $activity->title }}" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="description" class="form-label">Description</label>
                                                <textarea name="description" class="form-control" rows="2">{{ $activity->description }}</textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="active" class="form-label">Status</label>
                                                <select name="active" class="form-select">
                                                    <option value="1" {{ $activity->active ? 'selected' : '' }}>Active</option>
                                                    <option value="0" {{ !$activity->active ? 'selected' : '' }}>Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">No activities found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
