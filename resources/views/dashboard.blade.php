@extends('layouts.app')

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
@endsection
