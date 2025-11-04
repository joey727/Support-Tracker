<?php
namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;


class ActivityController extends Controller
{
    /**
     * Display a listing of all activities with their latest updates.
     */
    public function index()
    {
        // Eager load the latest updates and associated users
        $activities = Activity::with(['updates.user'])->latest()->get();

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new activity.
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created activity in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'nullable|boolean',
        ]);

        $validated['active'] = $validated['active'] ?? true;

        Activity::create($validated);

        return redirect()->route('activities.index')->with('success', '✅ Activity created successfully.');
    }

    /**
     * Display the specified activity and its updates.
     */
    public function show(Activity $activity)
    {
        $activity->load(['updates.user']);

        return view('activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified activity.
     */
    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    /**
     * Update the specified activity in storage.
     */
    public function update(Request $request, Activity $activity)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'nullable|boolean',
        ]);

        $data['active'] = $data['active'] ?? true;

        $activity->update($data);

        // Log update
        \App\Models\ActivityUpdate::create([
            'activity_id' => $activity->id,
            'user_id' => auth()->id(),
            'status' => $data['active'] ? 'done' : 'pending',
            'remark' => 'Activity updated',
            'actor_name' => auth()->user()->name ?? 'System',
            'actor_email' => auth()->user()->email ?? 'unknown',
            'metadata' => json_encode($data),
        ]);

        return redirect()->route('activities.index')->with('success', 'Activity updated and logged.');
    }



    /**
     * Remove the specified activity from storage.
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('activities.index')->with('success', '🗑️ Activity deleted successfully.');
    }
}
