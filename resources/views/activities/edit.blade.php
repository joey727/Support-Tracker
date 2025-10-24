@extends('layouts.app')

@section('title', 'Edit Activity')

@section('content')
<h1>Edit Activity</h1>

<form action="{{ route('activities.update', $activity) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" value="{{ $activity->title }}" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control">{{ $activity->description }}</textarea>
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" name="active" class="form-check-input" {{ $activity->active ? 'checked' : '' }}>
        <label class="form-check-label">Active</label>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection
