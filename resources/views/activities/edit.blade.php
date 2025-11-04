@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-warning text-dark">
            <h4>Edit Activity</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('activities.update', $activity->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Activity Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $activity->title }}" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3">{{ $activity->description }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="active" class="form-label">Status</label>
                    <select name="active" class="form-select">
                        <option value="1" {{ $activity->active ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ !$activity->active ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>
                <a href="{{ route('activities.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
