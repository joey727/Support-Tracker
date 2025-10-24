@extends('layouts.app')

@section('title', 'Create Activity')

@section('content')
<h1>Create Activity</h1>

<form action="{{ route('activities.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Title</label>
        <input type="text" name="title" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control"></textarea>
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" name="active" class="form-check-input" checked>
        <label class="form-check-label">Active</label>
    </div>

    <button type="submit" class="btn btn-success">Create</button>
</form>
@endsection
