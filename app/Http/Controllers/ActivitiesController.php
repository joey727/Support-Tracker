<?php
namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    public function index()
    {
        // Eager load updates and the users for each update
        $activities = Activity::with('updates.user')->get();

        return view('activities.index', compact('activities'));
    }

    // Show a form to create a new activity
    public function create()
    {
        return view('activities.create');
    }

    // Store a new activity
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'nullable|boolean',
        ]);

        $data['active'] = $data['active'] ?? true;

        Activity::create($data);

        return redirect()->route('activities.index')->with('success', 'Activity created.');
    }

    // Show a single activity
    public function show(Activity $activity)
    {
        return view('activities.show', compact('activity'));
    }

    // Show a form to edit an activity
    public function edit(Activity $activity)
    {
        return view('activities.edit', compact('activity'));
    }

    // Update an activity
    public function update(Request $request, Activity $activity)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'active' => 'nullable|boolean',
        ]);

        $data['active'] = $data['active'] ?? true;

        $activity->update($data);

        return redirect()->route('activities.index')->with('success', 'Activity updated.');
    }

    // Delete an activity
    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('activities.index')->with('success', 'Activity deleted.');
    }
}
