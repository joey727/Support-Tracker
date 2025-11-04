@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4>Create New Activity</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('activities.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Activity Title</label>
                    <input type="text" name="title" class="form-control" required placeholder="Enter activity title">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description" class="form-control" rows="3" placeholder="Optional"></textarea>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" name="active" class="form-check-input" checked>
                    <label class="form-check-label">Mark as Active</label>
                </div>

                <button type="submit" class="btn btn-success">Create Activity</button>
                <a href="{{ route('activities.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
@endsection
