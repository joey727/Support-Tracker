@extends('layouts.app')

@section('title', 'View Activity')

@section('content')
<h1>{{ $activity->title }}</h1>
<p>{{ $activity->description }}</p>
<p>Status: {{ $activity->active ? 'Active' : 'Inactive' }}</p>

<a href="{{ route('activities.index') }}" class="btn btn-secondary">Back</a>
@endsection
